$(document).ready(function () {
    // Função para ordenar a tabela
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("myTable");
        switching = true;
        // Define a direção de ordenação como ascendente:
        dir = "asc";
        /* Faça um loop que continuará até
        nenhuma troca ter sido feita: */
        while (switching) {
            // Comece dizendo: nenhuma troca é feita:
            switching = false;
            rows = table.rows;
            /* Faça um loop por todas as linhas da tabela (exceto a
            primeira, que contém cabeçalhos de tabela): */
            for (i = 1; i < (rows.length - 1); i++) {
                // Comece dizendo que não deve haver troca:
                shouldSwitch = false;
                /* Obtenha os dois elementos que você deseja comparar,
                um da linha atual e o outro da próxima: */
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /* Verifique se as duas linhas devem mudar de lugar,
                com base na direção, asc ou desc: */
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        // Se sim, marque como uma troca e interrompa o loop:
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        // Se sim, marque como uma troca e interrompa o loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                /* Se um interruptor foi marcado, faça-o
                e marque que uma troca foi feita: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                // Cada vez que uma troca é feita, aumente essa contagem em 1:
                switchcount++;
            } else {
                /* Se nenhuma troca foi feita E a direção é "asc",
                defina a direção para "desc" e execute o loop while novamente. */
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
    $("#thData").click(function(){
        var columnIndex = $(this).index();
        sortTable(columnIndex);
    });
});