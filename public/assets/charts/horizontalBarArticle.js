//setup
const dataArticle = {
    labels: article_no,
    datasets: [{
        axis: 'y',
        label: 'Total number of cases',
        data: article_count,
        fill: false,
        backgroundColor: 
            '#C23B21',
            
        borderColor: 
            '#333333',
   
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