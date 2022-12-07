// setup 
const dataPieBlotter = {
    labels: ['Mediation', 'Conciliation', 'Arbitration'],
    datasets: [{
        label: 'Total Hearings',
        data: y_pie_blotter,
        backgroundColor: [
            '#264ED0',
            '#FFA800',
            
            '#C23B21',
        ],
        borderColor: [
            '#264ED0',
            '#FFA800',
            
            '#C23B21',
        ],
        borderWidth: 1
    }]
};

// config 
const configPieBlotter = {
    type: 'doughnut',
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