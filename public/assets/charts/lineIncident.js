// setup 
const dataLineIncident = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    datasets: [{
        label: 'occurrence(s)',
        data: numberArray2,
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
const configLineIncident = {
    type: 'line',
    data: dataLineIncident,
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
            x: {
                display: true,
                
                ticks: {
                    maxTicksLimit: 100,
                    callback: function (label, index, labels) {
                        //console.log(label)
                        switch (label) {
                            case 0:
                                return 'JAN';
                            case 1:
                                return 'FEB';
                            case 2:
                                return 'MAR';
                            case 3:
                                return 'APR';
                            case 4:
                                return 'MAY';
                            case 5:
                                return 'JUN';
                            case 6:
                                return 'JUL';
                            case 7:
                                return 'AUG';
                            case 8:
                                return 'SEP';
                            case 9:
                                return 'OCT';
                            case 10:
                                return 'NOV';
                            case 11:
                                return 'DEC';
                        }
                    }
                }

            },
        },
        aspectRatio: 2
    }
};

// render init block
const lineIncident = new Chart(
    document.getElementById('lineIncident'),
    configLineIncident
);