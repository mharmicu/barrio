// setup 
const dataPieBlotter = {
    labels: ['Mediation', 'Conciliation', 'Arbitration'],
    datasets: [{
        label: 'Total Hearings',
        data: y_pie_blotter,
        backgroundColor: [
            '#0D4C92',
            '#EB4747',
            '#F49D1A',
            '#36AE7C',
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
const configPieBlotter = {
    type: 'pie',
    data: dataPieBlotter,
    options: {
        plugins: {
            
            labels: {
                render: (args) => {
                    //if(args.percentage > 10){}
                    return `${args.label} \n ${args.percentage}%`
                },
                fontColor: '#FFFFFF',
                fontSize: 18,
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
const pieChartBlotter = new Chart(
    document.getElementById('pieBlotter'),
    configPieBlotter
);