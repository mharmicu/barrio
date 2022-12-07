// setup 
const dataPaxBar = {
    labels: type_PAX,
    datasets: [{
        label: 'occurrence(s)',
        data: type_count_PAX,
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
const configPaxBar = {
    type: 'bar',
    data: dataPaxBar,
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
const barChartPax = new Chart(
    document.getElementById('barChartPax'),
    configPaxBar
);