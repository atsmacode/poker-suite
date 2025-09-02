import { computed, ref, watch } from "vue";
import axios from "axios";

export function useGameSetup() {
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

    const setSeats = (seats) => {
        tableSeats.value = seats;
    }

    const setForScenario = (id: number|null) => {
        forScenario.value = true;
        scenarioId.value = id; 
    }

    watch(tableSeatCount, () => {
        // Only live update the seats for scenarios
        if (forScenario.value ) {
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
        setSeats,
        setForScenario
    };
};