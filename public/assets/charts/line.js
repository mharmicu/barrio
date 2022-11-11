const ctx2 = document.getElementById('lineChart').getContext('2d');
const myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: _ydata,
        datasets: [{
            label: '# of Blotter Cases',
            data: _xdata,
            backgroundColor: [ 
                '#293462'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});