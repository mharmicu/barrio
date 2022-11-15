// setup 
const dataPieIncident = {
    labels: x_type2,
    datasets: [{
        label: 'Weekly Sales',
        data: y_type2,
        backgroundColor: [
            '#0D4C92',
            '#EB4747',
            '#F49D1A',
            '#61764B',
            '#29252C',
            '#EDF2F6',
        ],
        borderColor: [
            'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
    }]
};

// config 
const configPieIncident = {
    type: 'pie',
    data: dataPieIncident,
    options: {
        plugins: {
            labels: {
                render: (args) => {
                    //if(args.percentage > 10){}
                    return `${args.label} \n ${args.percentage}%`
                },
                fontColor: '#FFFFFF',
                fontSize: 12,
                fontFamily: "'Arial', 'Helvetica', 'sans-serif'",
                outsidePadding: 4,
                textMargin: 4,
                shadowOffsetX: -5,
                shadowOffsetY: 5,
            }
        },
        aspectRatio: 2
    }
};

// render init block
const pieChartIncident = new Chart(
    document.getElementById('pieChartIncident'),
    configPieIncident
);