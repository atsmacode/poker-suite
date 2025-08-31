import { computed, ref } from "vue";
import axios from "axios";

export function useGameSetup() {
    const token = ref('');
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

    const setupGame = async (route: string) => {
        try {
            const res = await axios.post(
                route,
                {
                    id: gameId.value,
                    table: {seats: tableSeatCount.value},
                    scenario: {id: scenarioId.value}
                },
                {
                    headers: {'X-CSRF-TOKEN' : token.value}
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
        token = token;
    }

    return {
        tableSeatCount,
        seatOrder,
        setupGame,
        setToken
    };
};