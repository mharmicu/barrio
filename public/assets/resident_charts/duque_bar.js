// setup 
const dataDuqBar = {
    labels: type_DUQ,
    datasets: [{
        label: 'occurrence(s)',
        data: type_count_DUQ,
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
const configDuqBar = {
    type: 'bar',
    data: dataDuqBar,
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
const barChartDuq = new Chart(
    document.getElementById('barChartDuq'),
    configDuqBar
);