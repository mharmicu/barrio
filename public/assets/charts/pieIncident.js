// setup 
const dataPieIncident = {
    labels: x_type2,
    datasets: [{
        label: 'Incident type',
        data: y_type2,
        backgroundColor: [
           
            '#FFA800',
            
            
        ],
        borderColor: [
            
            '#333333',
        ],
        borderWidth: 1
    }]
};

// config 
const configPieIncident = {
    type: 'bar',
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