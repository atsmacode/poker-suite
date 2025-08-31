import { computed, ref, watch } from "vue";
import axios from "axios";

export function useGameSetup() {
    const url = ref('');
    const csrfToken = ref('');
    const scenarioId = ref(null);
    const gameId = ref(null);
    const tableSeats = ref([]);
    const tableSeatCount = ref(6);

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
                url.value ?? '/',
                {
                    id: gameId.value,
                    table: {seats: tableSeatCount.value},
                    scenario: {id: scenarioId.value}
                },
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
            console.log(err.response.data);
        }
    }

    const setToken = (token: string) => {
        csrfToken.value = token;
    }
    const setRoute = (route: string) => {
        url.value = route;
    }

    watch(tableSeatCount, () => { setupGame() });

    return {
        tableSeatCount,
        seatOrder,
        setupGame,
        setToken,
        setRoute
    };
};