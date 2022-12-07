// setup 
const dataPCasalBar = {
    labels: type_PCASAL,
    datasets: [{
        label: 'occurrence(s)',
        data: type_count_PCASAL,
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
const configPCasalBar = {
    type: 'bar',
    data: dataPCasalBar,
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
const barChartPCasal = new Chart(
    document.getElementById('barChartPCasal'),
    configPCasalBar
);