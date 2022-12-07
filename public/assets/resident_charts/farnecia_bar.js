// setup 
const dataFarBar = {
    labels: type_FAR,
    datasets: [{
        label: 'occurrence(s)',
        data: type_count_FAR,
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
const configFarBar = {
    type: 'bar',
    data: dataFarBar,
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
const barChartFar = new Chart(
    document.getElementById('barChartFar'),
    configFarBar
);