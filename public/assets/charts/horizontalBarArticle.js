//setup
const dataArticle = {
    labels: article_no,
    datasets: [{
        axis: 'y',
        label: 'Blotter Case',
        data: article_count,
        fill: false,
        backgroundColor: [
            '#264ED0',
            '#FFA800',
            '#333333',
            '#C23B21',
        ],
        borderColor: [
            '#264ED0',
            '#FFA800',
            '#333333',
            '#C23B21',
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