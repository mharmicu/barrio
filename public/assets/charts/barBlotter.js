// setup 
const dataLineBlotter = {
    labels: _ydata,
    datasets: [{
        label:  '# of Blotter Cases',
        data: _xdata,
        backgroundColor: [
            '#264ED0',
            '#FFA800',
            '#333333',
            '#C23B21',
        ],
        borderColor: [
            '#264ED0',
            '#FFA800',
            '#333333',
            '#C23B21',
        ],
        borderWidth: 1
    }]
};

// config 
const configLineBlotter = {
    type: 'bar',
    data: dataLineBlotter,
    options: {
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            x: {
                min: '2022-01-01',
                max: '2022-12-31',
                type: 'time',
                time: {
                    unit: 'day'
                }
            },
            y: {
                min: 0,
                max: 5,
                beginAtZero: true,
                ticks: {
                    precision: 0
                  }
            },
            
        }
    }
};

// render init block
const lineBlotter = new Chart(
    document.getElementById('barBlotter'),
    configLineBlotter
);

function filterChart(date) {
    //console.log(date.value);
    const year = date.value.substring(0, 4);
    //console.log(year);
    const month = date.value.substring(5, 7);
    //console.log(month);

    const lastDay = (y, m) => {
        return new Date(y, m, 0).getDate()
    };

    const startDate = `${date.value}-01`;
    const endDate = `${date.value}-${lastDay(year, month)}`;

    lineBlotter.config.options.scales.x.min = startDate;
    lineBlotter.config.options.scales.x.max = endDate;
    lineBlotter.update();
}

function reset() {
    lineBlotter.config.options.scales.x.min = '2022-01-01';
    lineBlotter.config.options.scales.x.max = '2022-12-31';
    lineBlotter.update();

    document.getElementById("month").value = "";
}