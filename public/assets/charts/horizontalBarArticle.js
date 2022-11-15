//setup
const dataArticle = {
    labels: article_no,
    datasets: [{
        axis: 'y',
        label: 'Blotter Case',
        data: article_count,
        fill: false,
        backgroundColor: [
            '#F49D1A'
        ],
        borderColor: [
            '#0D4C92'
        ],
        borderWidth: 1
    }]
};

//config
const configArticle = {
    type: 'bar',
    data: dataArticle,
    options: {
        indexAxis: 'y',
    }
};

// render init block
const horizontalBarArticle = new Chart(
    document.getElementById('horizontalBarArticle'),
    configArticle
);