var data;
var timeFormat = 'YYYY-MM-DD';
function initChart() {
    var canvas = document.getElementById("chart-container");
    // @ts-ignore
    var ctx = canvas.getContext('2d');
    var conf = confMap();
    // @ts-ignore
    Chart.defaults.global.defaultFontColor = '#ECF2F9';
    // @ts-ignore
    new Chart(ctx, conf);
}
function setMap() {
    var map = {};
    var types = {};
    var mOrders = [];
    var colors = ['#b092e4', '#6ed673', '#f3cd48', '#ff8176', '#61b7fb'];
    var i = 0;
    // @ts-ignore
    if (!Array.isArray(orders)) {
        // @ts-ignore
        for (var key in orders) {
            // @ts-ignore
            mOrders.push(orders[key]);
        }
    }
    else
        // @ts-ignore
        mOrders = orders.slice();
    mOrders.forEach(function (element) {
        if (!types.hasOwnProperty(element['type'])) {
            types[element['type']] = colors[i];
            i++;
        }
        map[element['type']] = {
            label: element['type'],
            data: [],
            fill: false,
            borderColor: types[element['type']]
        };
    });
    mOrders.forEach(function (element) {
        var m = map[element['type']]['data'];
        var n = {
            x: element['created_at'].split(" ")[0],
            y: parseInt(element['price'])
        };
        if (m === [])
            m = n;
        else
            m.push(n);
        map[element['type']]['data'] = m;
    });
    data = [];
    for (var key in map)
        data.push(map[key]);
}
function confMap() {
    setMap();
    return {
        type: 'line',
        data: {
            datasets: data
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: "Stats"
            },
            scales: {
                xAxes: [{
                        type: "time",
                        time: {
                            format: timeFormat,
                            tooltipFormat: 'll'
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Date'
                        }
                    }],
                yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Price'
                        }
                    }]
            }
        }
    };
}
