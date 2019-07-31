var data;
var timeFormat = 'YYYY-MM-DD';
function initChart() {
    // @ts-ignore
    //console.log(orders);
    var canvas = document.getElementById("chart-container");
    // @ts-ignore
    var ctx = canvas.getContext('2d');
    var conf = confMap();
    // @ts-ignore
    new Chart(ctx, conf);
}
function setMap() {
    var map = {};
    map["Custom"] = {
        label: "Custom",
        data: [],
        fill: false,
        borderColor: '#b092e4'
    };
    map["Pizza"] = {
        label: "Pizza",
        data: [],
        fill: false,
        borderColor: '#6ed673'
    };
    map["Cables"] = {
        label: "Cables",
        data: [],
        fill: false,
        borderColor: '#f3cd48'
    };
    map["Telescope"] = {
        label: "Telescope",
        data: [],
        fill: false,
        borderColor: '#ff8176'
    };
    map["Piano"] = {
        label: "Piano",
        data: [],
        fill: false,
        borderColor: '#61b7fb'
    };
    // @ts-ignore
    orders.forEach(function (element) {
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
                            labelString: 'value'
                        }
                    }]
            }
        }
    };
}
