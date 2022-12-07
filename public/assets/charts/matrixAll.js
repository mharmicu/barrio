
function dataofIncidents() {
    const dataIncidents = [];
    for (let i = 0; i < 96; i++) {
        dataIncidents.push({
            x: _monthX[i],
            y: _streetY[i],
            value: numberArray[i],
        });
    }

    //console.log(dataIncidents);
    return dataIncidents;
}

// setup 
const dataMatrixAll = {
    // labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
    datasets: [{
        label: 'Street',
        data: dataofIncidents(),

        backgroundColor({ raw }) {
            //console.log(raw)
            //console.log(_streetY)
            const alpha = (5 + raw.value) / 10;
            return `rgba(220, 53, 53, ${alpha})`;
        },
        borderColor: 'white',
        borderWidth: 1,
        width: ({ chart }) => (chart.chartArea || {}).width / 12 - 1,
        height: ({ chart }) => (chart.chartArea || {}).height / 8 - 1,
    }]
};

// config 
const configMatrixAll = {
    type: 'matrix',
    data: dataMatrixAll,
    options: {
        maintainAspectRatio: false,
        scaleShowValues: true,
        scales: {

            x: {
                display: true,
                min: 0.5,
                max: 12.5,
                offset: false,
                ticks: {
                    maxTicksLimit: 100,
                    callback: function (label, index, labels) {
                        //console.log(label)
                        switch (label) {
                            case 1:
                                return 'JAN';
                            case 2:
                                return 'FEB';
                            case 3:
                                return 'MAR';
                            case 4:
                                return 'APR';
                            case 5:
                                return 'MAY';
                            case 6:
                                return 'JUN';
                            case 7:
                                return 'JUL';
                            case 8:
                                return 'AUG';
                            case 9:
                                return 'SEP';
                            case 10:
                                return 'OCT';
                            case 11:
                                return 'NOV';
                            case 12:
                                return 'DEC';
                        }
                    }
                }

            },
            y: {
                display: true,
                min: 0.5,
                max: 8.5,
                ticks: {

                    callback: function (label, index, labels) {
                        //console.log(label)
                        switch (label) {
                            case 1:
                                return 'Arlegui St.';
                            case 2:
                                return 'Castillejos St.';
                            case 3:
                                return 'Duque St.';
                            case 4:
                                return 'Farnecio St.';
                            case 5:
                                return 'Fraternal St.';
                            case 6:
                                return 'P. Casal St.';
                            case 7:
                                return 'Pax St.';
                            case 8:
                                return 'Vergara St.';
                        }
                    }
                }
            }
        },
        plugins: {
            legend: false,
            tooltip: {
                callbacks: {
                    title: function (context) {
                        return `${context[0].raw.value} reports`;
                    },
                    label(context) {
                        console.log(context);
                        const v = context.dataset.data[context.dataIndex];
                        //return ['x: ' + v.x, 'y: ' + v.y, 'v: ' + v.value];
                        switch (v.y) {
                            case 1:
                                return 'Arlegui St.';
                            case 2:
                                return 'Castillejos St.';
                            case 3:
                                return 'Duque St.';
                            case 4:
                                return 'Farnecio St.';
                            case 5:
                                return 'Fraternal St.';
                            case 6:
                                return 'P. Casal St.';
                            case 7:
                                return 'Pax St.';
                            case 8:
                                return 'Vergara St.';
                        }
                    }
                }
            }
        }
    }
};

// render init block
const matrixAll = new Chart(
    document.getElementById('matrixAll'),
    configMatrixAll
);