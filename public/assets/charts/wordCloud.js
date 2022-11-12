const withoutQuotes = complaint_desc.replaceAll('&quot;', '');
//console.log(withoutQuotes)
const text = withoutQuotes,
    lines = text.replace(/[\[\]"():'?0-9]+/g, '').split(/[,\. ]+/g),
    
    data = lines.reduce((arr, word) => {
        let obj = Highcharts.find(arr, obj => obj.name === word);
        if (obj) {
            obj.weight += 1;
        } else {
            obj = {
                name: word,
                weight: 1
            };
            arr.push(obj);
        }
        return arr;
    }, []);

Highcharts.chart('container', {
    accessibility: {
        screenReaderSection: {
            beforeChartFormat: '<h5>{chartTitle}</h5>' +
                '<div>{chartSubtitle}</div>' +
                '<div>{chartLongdesc}</div>' +
                '<div>{viewTableButton}</div>'
        }
    },
    series: [{
        type: 'wordcloud',
        data,
        name: 'Occurrences'
    }],
    title: {
        text: 'Wordcloud of Blotter Reports Complaint Description'
    },
    subtitle: {
        text: 'Common words in Complaint Description'
    },
    tooltip: {
        headerFormat: '<span style="font-size: 16px"><b>{point.key}</b></span><br>'
    }
});
