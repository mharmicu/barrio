// setup 
const dataVerBar = {
    labels: type_VER,
    datasets: [{
        label: 'occurrence(s)',
        data: type_count_VER,
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
const configVerBar = {
    type: 'bar',
    data: dataVerBar,
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
const barChartVer = new Chart(
    document.getElementById('barChartVer'),
    configVerBar
);