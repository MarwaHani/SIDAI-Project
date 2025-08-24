document.addEventListener("DOMContentLoaded", function () {
    fetch('dados_estatisticos.php')
        .then(response => response.json())
        .then(data => {
            let tabela = document.getElementById("estatisticas-tabela");
            tabela.innerHTML = ""; // Limpa a tabela antes de inserir novos dados

            // Função auxiliar para adicionar linhas na tabela
            function adicionarLinha(indicador, valor) {
                tabela.innerHTML += `
                    <tr>
                        <td>${indicador}</td>
                        <td>${new Intl.NumberFormat().format(valor)}</td>
                        <td>-</td>
                    </tr>`;
            }

            // Adicionar dados à tabela
            adicionarLinha("População Imigrante", data.populacao_imigrante);
            adicionarLinha("Taxa de Emprego (%)", data.taxa_emprego);

            data.sexo.forEach(item => adicionarLinha(`Sexo (${item.sexo})`, item.total));
            data.grupo_etario.forEach(item => adicionarLinha(`Grupo Etário (${item.grupo_etario})`, item.total));
            data.nacionalidade.forEach(item => adicionarLinha(`Nacionalidade (${item.nacionalidade})`, item.total));

            // Criar o gráfico
            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.nacionalidade.map(n => n.nacionalidade),
                    datasets: [{
                        label: 'Número de Imigrantes por Nacionalidade',
                        data: data.nacionalidade.map(n => n.total),
                        backgroundColor: 'rgb(97, 195, 101)',
                        borderColor: '#3f8e42',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Erro ao carregar estatísticas:', error));
});
