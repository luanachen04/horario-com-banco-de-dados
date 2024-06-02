document.addEventListener('DOMContentLoaded', function () {
    const localPartidaSelect = document.getElementById('local_partida');
    const diaSemanaSelect = document.getElementById('dia_semana');
    const table = document.getElementById('horariosTable').getElementsByTagName('tbody')[0];
    const rows = table.getElementsByTagName('tr');

    function filterTable() {
        const localPartida = localPartidaSelect.value.toLowerCase();
        const diaSemana = diaSemanaSelect.value.toLowerCase();

        for (let row of rows) {
            const partida = row.cells[2].textContent.toLowerCase();
            const dia = row.cells[1].textContent.toLowerCase();

            if ((localPartida === '' || partida === localPartida) && 
                (diaSemana === '' || dia === diaSemana)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    }

    localPartidaSelect.addEventListener('change', filterTable);
    diaSemanaSelect.addEventListener('change', filterTable);
});