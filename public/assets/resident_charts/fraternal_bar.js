// setup 
const dataFraBar = {
    labels: type_FRA,
    datasets: [{
        label: 'occurrence(s)',
        data: type_count_FRA,
        backgroundColor: [

            '#C23B21',


        ],
        borderColor: [

            '#333333',
        ],
        borderWidth: 1
    }]
};

// config 
const configFraBar = {
    type: 'bar',
    data: dataFraBar,
    options: {
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                min: 0,
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            },
        },
        aspectRatio: 2
    }
};

// render init block
const barChartFra = new Chart(
    document.getElementById('barChartFra'),
    configFraBar
);