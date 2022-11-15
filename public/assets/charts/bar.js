const ctx1 = document.getElementById('barChart').getContext('2d');
const myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: _ydata,
        datasets: [{
            label: '# of Blotter Cases',
            data: _xdata,
            backgroundColor: [
                '#0D4C92',
                '#EB4747',
                '#F9D923',
                '#36AE7C',
                '#29252C',
                '#EDF2F6',
            ],
            borderColor: [
                '#EDF2F6'
            ],
            borderWidth: 1,
            datalabels: {
                color: 'black',
                anchor: 'end',
                align: 'top',
                offset: 3
            }
        }]
    },
    plugins: [ChartDataLabels],
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});