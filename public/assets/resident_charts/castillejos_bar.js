// setup 
const dataCasBar = {
    labels: type_CAS,
    datasets: [{
        label: 'occurrence(s)',
        data: type_count_CAS,
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
const configCasBar = {
    type: 'bar',
    data: dataCasBar,
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
const barChartCas = new Chart(
    document.getElementById('barChartCas'),
    configCasBar
);