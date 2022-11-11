const ctx3 = document.getElementById('doughnutChart').getContext('2d');
const myChart2 = new Chart(ctx3, {
    type: 'doughnut',
    data: {
        labels: x_type,
        datasets: [{
            label: 'Types of Incident Reports',
            data: y_type,
            backgroundColor: [
                '#28c3bf', '#5d63b4', '#bd95de', '#63b48f', '#ffc432', '#f3726e', '#c22f00', '#981e7c', '#4c006d', '#194aa6', '#3da8eb', '#8fb001', '#e5c500',
            ],
            borderColor: [
                'rgba(0, 0, 0, 0.5)',
            ],
            borderWidth: 1,
            hoverOffset: 4
        }]
    },
    options: {
        scales: {
            x: {
                grid: {
                    display: false,
                    drawBorder: false,

                },
                ticks: {
                    display: false //this will remove only the label
                }
            },
            y: {
                grid: {
                    display: false,
                    drawBorder: false,
                },
                ticks: {
                    display: false //this will remove only the label
                }
            }
        },
        plugins: {
            
            legend: {
                display: false,
                position: 'right',

            },



            tooltip: {
                callbacks: {
                    title: function (context) {
                        //console.log(context[0]);
                    }
                }
            },

        },
        aspectRatio: 2

    }
});
