import { provide, ref, watch } from "vue";
import axios from "axios";
import { useGame } from "./useGame";

export function useGameSetup(gameState?: any) {
    const { seatOrder, players, refreshGame } = useGame(gameState);

    const postRoute = ref('');
    const csrfToken = ref('');
    const forScenario = ref(false);
    const scenarioId = ref(null);
    const gameId = ref(null);
    const tableSeatCount = ref(6);

    const refreshGameSetup = (gameState: any) => {
        refreshGame(gameState);

        scenarioId.value = gameState.scenario?.id;
        forScenario.value = gameState.scenario?.id ? true : false;
        tableSeatCount.value = gameState.seats.length;
        gameId.value = gameState.id;
    }

    const setupGameRequest = ref({
        table: {seats: tableSeatCount},
    });

    const setupScenarioRequest = ref({
        game: {id: gameId},
        table: {seats: tableSeatCount},
        scenario: {id: scenarioId}
    });

    // Set values from GameState if we have them
    if (gameState) {
        refreshGameSetup(gameState.data);
    }

    const setup = async (request: any) => {
        try {
            const res = await axios.post(
                postRoute.value,
                request.value,
                {
                    headers: {'X-CSRF-TOKEN' : csrfToken.value}
                }
            );

            console.log(res.data);

            let gameState = res.data.data;

            refreshGameSetup(gameState);
        } catch (err: any) {
            console.log(err);
        }
    }

    const setupGame = () => {
        return setup(setupGameRequest);
    }

    const setupScenario = () => {
        return setup(setupScenarioRequest);
    }

    const setToken = (token: string) => {
        csrfToken.value = token;
    }

    const setRoute = (route: string) => {
        postRoute.value = route;
    }

    const setSeatCount = (e: Event) => {
        tableSeatCount.value = e.target.value;
    }

    const setForScenario = () => {
        forScenario.value = true;
    }

    watch(tableSeatCount, () => {
        // Only live update the seats for scenarios
        if (forScenario.value) {
            setupScenario();
        }
    });

    provide('seatSelection', {setSeatCount, tableSeatCount})
    provide('scenarioSetup', {scenarioId, forScenario});
    provide('refreshGameSetup', refreshGameSetup);

    return {
        tableSeatCount,
        seatOrder,
        setupGameRequest,
        setupGame,
        setupScenario,
        setToken,
        setRoute,
        setSeatCount,
        setForScenario,
        players
    };
};