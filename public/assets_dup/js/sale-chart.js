var options = {
    annotations: {
        points: [{
            x: 'Sales',
            seriesIndex: 0,
            label: {
                borderColor: '#775DD0',
                offsetY: 0,
                style: {
                    color: '#fff',
                    background: '#775DD0',
                },
                text: 'Sales are good',
            }
        }]
    },
    chart: {
        height: 350,
        type: 'bar',
    },
    plotOptions: {
        bar: {
            columnWidth: '50%',
            endingShape: 'rounded'
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: 2
    },
    series: [{
        name: 'Sales',
        data: [44, 55, 41, 67, 22, 43, 21, 33, 45, 31, 87, 65, 35]
    }],
    grid: {
        row: {
            colors: ['#fff', '#fff']
        }
    },
    xaxis: {
        labels: {
            rotate: -45
        },
        categories: ['Product-1', 'Product-2', 'Product-3', 'Product-4', 'Product-5', 'Product-6',
            'Product-7', 'Product-8', 'Product-9', 'Product-10', 'Product-11', 'Product-12', 'Product-13'
        ],
    },
    yaxis: {
        title: {
            text: 'Sales',
        },

    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
        },
    },

}

var chart = new ApexCharts(
    document.querySelector("#chart"),
    options
);

chart.render();


// chart 1

var options = {
    annotations: {
        points: [{
            x: 'Sales',
            seriesIndex: 0,
            label: {
                borderColor: '#fff',
                offsetY: 0,
                style: {
                    color: '#fff',
                    background: '#775DD0',
                },
                text: 'Sales are good',
            }
        }]
    },
    chart: {
        height: 200,
        type: 'bar',
    },
    plotOptions: {
        bar: {
            columnWidth: '50%',
            endingShape: 'rounded'
        }
    },
    dataLabels: {
        enabled: false

    },
    stroke: {
        width: 2
    },
    series: [{
        name: 'Sales',
        data: [44, 55, 41, 67, 22]
    }],
    grid: {
        row: {
            colors: ['#fff', '#fff']
        }
    },
    xaxis: {
        labels: {
            rotate: -45
        },
        categories: ['Product-1', 'Product-2', 'Product-3', 'Product-4', 'Product-5'
        ],
    },
    yaxis: {
        title: {
            text: 'Sales',
        },

    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
        },
    },

}

var chart = new ApexCharts(
    document.querySelector("#chart1"),

    options
);

chart.render();



// chart 2

var options = {
    annotations: {
        points: [{
            x: 'Sales',
            seriesIndex: 0,
            label: {
                borderColor: '#fff',
                offsetY: 0,
                style: {
                    color: '#fff',
                    background: '#775DD0',
                },
                text: 'Sales are good',
            }
        }]
    },
    chart: {
        height: 200,
        type: 'bar',
    },
    plotOptions: {
        bar: {
            columnWidth: '50%',
            endingShape: 'rounded'
        }
    },
    dataLabels: {
        enabled: false

    },
    stroke: {
        width: 2
    },
    series: [{
        name: 'Sales',
        data: [44, 55, 41, 67, 22]
    }],
    grid: {
        row: {
            colors: ['#fff', '#fff']
        }
    },
    xaxis: {
        labels: {
            rotate: -45
        },
        categories: ['Product-1', 'Product-2', 'Product-3', 'Product-4', 'Product-5'
        ],
    },
    yaxis: {
        title: {
            text: 'Sales',
        },

    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
        },
    },

}

var chart = new ApexCharts(
    document.querySelector("#chart2"),

    options
);

chart.render();

// chart 3

var options = {
    annotations: {
        points: [{
            x: 'Sales',
            seriesIndex: 0,
            label: {
                borderColor: '#fff',
                offsetY: 0,
                style: {
                    color: '#fff',
                    background: '#775DD0',
                },
                text: 'Sales are good',
            }
        }]
    },
    chart: {
        height: 200,
        type: 'bar',
    },
    plotOptions: {
        bar: {
            columnWidth: '50%',
            endingShape: 'rounded'
        }
    },
    dataLabels: {
        enabled: false

    },
    stroke: {
        width: 2
    },
    series: [{
        name: 'Sales',
        data: [44, 55, 41, 67, 22]
    }],
    grid: {
        row: {
            colors: ['#fff', '#fff']
        }
    },
    xaxis: {
        labels: {
            rotate: -45
        },
        categories: ['Product-1', 'Product-2', 'Product-3', 'Product-4', 'Product-5'
        ],
    },
    yaxis: {
        title: {
            text: 'Sales',
        },

    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
        },
    },

}

var chart = new ApexCharts(
    document.querySelector("#chart3"),

    options
);

chart.render();

// chart 4

var options = {
    annotations: {
        points: [{
            x: 'Sales',
            seriesIndex: 0,
            label: {
                borderColor: '#fff',
                offsetY: 0,
                style: {
                    color: '#fff',
                    background: '#775DD0',
                },
                text: 'Sales are good',
            }
        }]
    },
    chart: {
        height: 200,
        type: 'bar',
    },
    plotOptions: {
        bar: {
            columnWidth: '50%',
            endingShape: 'rounded'
        }
    },
    dataLabels: {
        enabled: false

    },
    stroke: {
        width: 2
    },
    series: [{
        name: 'Sales',
        data: [44, 55, 41, 67, 22]
    }],
    grid: {
        row: {
            colors: ['#fff', '#fff']
        }
    },
    xaxis: {
        labels: {
            rotate: -45
        },
        categories: ['Product-1', 'Product-2', 'Product-3', 'Product-4', 'Product-5'
        ],
    },
    yaxis: {
        title: {
            text: 'Sales',
        },

    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
        },
    },

}

var chart = new ApexCharts(
    document.querySelector("#chart4"),

    options
);

chart.render();

