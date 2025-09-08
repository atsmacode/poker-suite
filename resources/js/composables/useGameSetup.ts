import { computed, provide, ref, watch } from "vue";
import axios from "axios";

export function useGameSetup(gameState?: any) {
    const postRoute = ref('');
    const csrfToken = ref('');
    const forScenario = ref(false);
    const scenarioId = ref(null);
    const gameId = ref(null);
    const tableSeats = ref([]);
    const tableSeatCount = ref(6);

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
        let data = gameState.data;

        tableSeats.value = data.seats;
        scenarioId.value = data.scenario?.id;
        forScenario.value = data.scenario?.id ? true : false;
        tableSeatCount.value = data.seats.length;
        gameId.value = data.id;
    }

    const seatOrder = computed(() => {
        const seats = tableSeats.value;
        const half = Math.ceil(tableSeats.value.length / 2);
    
        return [
            seats.slice(0, half), // Upper row
            seats.slice(half).reverse() // Lower row
        ];
    });

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

            scenarioId.value = gameState.scenario?.id;
            gameId.value = gameState.id;
            tableSeats.value = gameState.seats;
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

    provide('seatsChangedHandler', setSeatCount);
    provide('selectedSeatCount', tableSeatCount.value);

    return {
        tableSeatCount,
        seatOrder,
        setupGameRequest,
        setupGame,
        setupScenario,
        setToken,
        setRoute,
        setSeatCount,
        setForScenario
    };
};