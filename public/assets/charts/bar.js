const ctx1 = document.getElementById('barChart').getContext('2d');
const myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: _ydata,
        datasets: [{
            label: '# of Blotter Cases',
            data: _xdata,
            backgroundColor: [
                'rgba(255, 44, 44, 0.6)',
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