// setup 
const dataArlBar = {
    labels: type_ARL,
    datasets: [{
        label: 'occurrence(s)',
        data: type_count_ARL,
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
const configArlBar = {
    type: 'bar',
    data: dataArlBar,
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
const barChartArl = new Chart(
    document.getElementById('barChartArl'),
    configArlBar
);