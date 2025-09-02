import { computed, ref, watch } from "vue";
import axios from "axios";

export function useGameSetup(gameState: any) {
    const postRoute = ref('');
    const csrfToken = ref('');
    const forScenario = ref(false);
    const scenarioId = ref(null);
    const gameId = ref(null);
    const tableSeats = ref([]);
    const tableSeatCount = ref(6);

    const setupRequest = ref({
        id: gameId,
        table: {seats: tableSeatCount},
        scenario: {id: scenarioId},
        for_scenario: forScenario
    });

    // Set values from GameState if we have them
    if (gameState) {
        const data = gameState.data;

        tableSeats.value = data.seats;
        forScenario.value = data.scenario?.id ? true : false;
        scenarioId.value = data.scenario?.id;
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

    const setupGame = async () => {
        try {
            const res = await axios.post(
                postRoute.value,
                setupRequest.value,
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

    const setToken = (token: string) => {
        csrfToken.value = token;
    }
    const setRoute = (route: string) => {
        postRoute.value = route;
    }

    const setSeatCount = (count: number) => {
        tableSeatCount.value = count;
    }
    const setForScenario = () => {
        forScenario.value = true;
    }

    watch(tableSeatCount, () => {
        // Only live update the seats for scenarios
        if (forScenario.value) {
            setupGame();
        }
    });

    return {
        tableSeatCount,
        seatOrder,
        setupRequest,
        setupGame,
        setToken,
        setRoute,
        setSeatCount,
        setForScenario
    };
};