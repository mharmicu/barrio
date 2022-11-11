// date settings
function isoDayOfWeek(dt) {
    let wd = dt.getDay(); // 0..6, from sunday
    wd = (wd + 6) % 7 + 1 // 1..7 starting week monday
    return '' + wd; // string so it gets parsed 
};

// setup date 365 days // squares 
// function generateData() {
//     const d = new Date();
//     const today = new Date(d.getFullYear(), d.getMonth(), d.getDate(), 0, 0, 0, 0);
//     const data2 = [];
//     const end = today;
//     let dt = new Date(new Date().setDate(end.getDate() - 365));
//     while (dt <= end) {
//         const iso = dt.toISOString().substr(0, 10);
//         data2.push({
//             x: iso,
//             y: isoDayOfWeek(dt),
//             d: iso,
//             v: Math.random() * 50
//         });
//         dt = new Date(dt.setDate(dt.getDate() + 1));
//     }
//     console.log(data2);
//     return data2;
// }

//testing code block 
function dataFromDB() {
    const d = new Date();
    const today = new Date(d.getFullYear(), d.getMonth(), d.getDate(), 0, 0, 0, 0);
    const data2 = [];
    const end = today;
    let dt = new Date(new Date().setDate(end.getDate() - 365));

    while (dt <= end) {
        const iso = dt.toISOString().substr(0, 10);
        x.forEach(myFunction);
        function myFunction(item, index) {
            if (iso == item) {
                data2.push({
                    x: iso,
                    y: isoDayOfWeek(dt),
                    d: iso,
                    v: y[index]
                });
            }
        }
        //console.log(dt);
        dt = new Date(dt.setDate(dt.getDate() + 1));
    }
    console.log(data2);
    return data2;
}

//setup block
const data = {
    datasets: [{
        label: 'Heat Map',
        data: dataFromDB(),
        backgroundColor(c) {
            const value = c.dataset.data[c.dataIndex].v
            const alpha = (10 + value) / 30;
            return `rgba(0, 200, 0, ${alpha})`;
        },
        borderColor: 'green',
        borderRadius: 1,
        borderWidth: 1,
        hoverBackgroundColor: 'rgba(255, 26, 104, 0.2)',
        hoverBorderColor: 'rgba(255, 26, 104, 1)',
        width(c) {
            const a = c.chart.chartArea || {};
            return (a.right - a.left) / 53 - 1;
        },
        height(c) {
            const a = c.chart.chartArea || {};
            return (a.bottom - a.top) / 7 - 1;
        },
    }]
};

// scales block 
const scales = {
    y: {
        type: 'time',
        offset: true,
        time: {
            unit: 'day',
            round: 'day',
            isoWeek: 1,
            parser: 'i',
            displayFormats: {
                day: 'iii'
            }
        },
        reverse: true,
        position: 'right',
        ticks: {
            maxRotation: 0,
            autoSkip: true,
            padding: 1,
            font: {
                size: 9
            }
        },
        grid: {
            display: false,
            drawBorder: false,
            tickLength: 0
        }
    },
    x: {
        type: 'time',
        position: 'bottom',
        offset: true,
        time: {
            unit: 'week',
            round: 'week',
            isoWeekDay: 1,
            displayFormats: {
                week: 'MMM dd'
            }
        },
        ticks: {
            maxRotation: 0,
            autoSkip: true,
            font: {
                size: 9
            }
        },
        grid: {
            display: false,
            drawBorder: false,
            tickLength: 0
        }
    }
};

// config 
const config = {
    type: 'matrix',
    data,
    options: {
        maintainAspectRatio: false,
        scales: scales,
        plugins: {
            tooltip: {
                callbacks: {
                    title: function (context) {
                        console.log(context[0].raw.x);
                        const d = new Date(context[0].raw.x);
                        const formattedDate = d.toLocaleString([], {
                            year: 'numeric',
                            month: 'short',
                            day: 'numeric'
                        });
                        return `${context[0].raw.v} reports on ${formattedDate}`;
                    },
                    label: function (context){
                        return ``
                    }
                },
            },
            legend: {
                display: false
            }
        }
    }
};

// render init block
const myChart = new Chart(
    document.getElementById('matrixChart'),
    config
);