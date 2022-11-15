


var dataReports = {
    labels: x_type,
    datasets: [{
        label: 'Types of Incident Reports',
        data: y_type,
        backgroundColor: [
            '#0D4C92',
            '#EB4747',
            '#F49D1A',
            '#61764B',
            '#29252C',
            '#0D4C92',
            '#EB4747',
            '#F49D1A',
            '#61764B',
            '#29252C',
            '#0D4C92',
            '#EB4747',
            '#F49D1A',
            '#61764B',
            '#29252C',
            '#0D4C92',
            '#EB4747',
            '#F49D1A',
            '#61764B',
            '#29252C',
        ],
        hoverOffset: 4
    }]
};

var options = {
    plugins: {
        legend: {
            display: false
        }
    },
    aspectRatio: 1,
};

//centerText plugin
const centerText = {
    id: 'centerText',
    afterDatasetsDraw(chart, args, options) {
        const { ctx, chartArea: { left, right, top, bottom, width, height } } = chart;

        ctx.save();
        //console.log(chart);

        ctx.font = 'bolder 30px Arial';
        ctx.fillStyle = 'rgba(40, 40, 40, 1)';
        ctx.textAlign = 'center';
        ctx.fillText(report_count, width / 2, height / 2 + top)
        ctx.restore();

        ctx.font = '20px Arial';
        ctx.fillStyle = 'rgba(40, 40, 40, 1)';
        ctx.textAlign = 'center';
        ctx.fillText('Reports', width / 2, height / 2 + top + 25)
        ctx.restore();

    }
}


const context = document.querySelector("#doughnutChart");
const chart = new Chart(context, {
    type: "doughnut",
    data: dataReports,
    options,
    plugins: [centerText, {
        beforeInit: function (chart, args, options) {
            // Make sure we're applying the legend to the right chart
            if (chart.canvas.id === "doughnutChart") {
                const ul = document.createElement('ul');
                chart.data.labels.forEach((label, i) => {
                    ul.innerHTML += `
                          <li>
                              <span style="background-color: ${chart.data.datasets[0].backgroundColor[i]}">${chart.data.datasets[0].data[i]}</span>
                              ${label}
                          </li>
            `;
                });

                return document.getElementById("js-legend").appendChild(ul);
            }

            return;
        }
    }]
});




