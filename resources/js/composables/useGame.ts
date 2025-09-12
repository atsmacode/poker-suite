import { computed, ref } from "vue";

export function useGame(gameState?: any) {
    const tableSeats = ref([]);
    const players = ref([]);

    const refreshGame = (gameState: any) => {
        tableSeats.value = gameState.seats;
        players.value = gameState.players;
    }

    if (gameState) {
        refreshGame(gameState.data);
    }

    const seatOrder = computed(() => {
        const seats = tableSeats.value;
        const half = Math.ceil(tableSeats.value.length / 2);
    
        return [
            seats.slice(0, half), // Upper row
            seats.slice(half).reverse() // Lower row
        ];
    });

    return {
        seatOrder,
        players,
        refreshGame,
    }
}