var chart = am4core.create("chartdiv", am4charts.XYChart);

var subTitle = chart.titles.create();
subTitle.text = "Revenue Growth";
subTitle.marginBottom = 16;
subTitle.fill = am4core.color("#fff");

var title = chart.titles.create();
title.text = "Is your business growing?";
title.fontSize = 20;
title.marginBottom = 4;
title.fill = am4core.color("#fff");



//var label = chart.chartContainer.createChild(am4core.Label);
//label.text = "Chart Caption";
//label.align = "center";

// Add data
chart.data = [{
    "date": "2020 Q4",
    "growth": 1
}, {
    "date": "2021 Q1",
    "growth": 2
}, {
    "date": "2021 Q2",
    "growth": 1
}, {
    "date": "2021 Q3",
    "growth": 3
}, {
    "date": "2022 Q4",
    "growth": 4
}, {
    "date": "2022 Q1",
    "growth": 2
}, {
    "date": "2022 Q2",
    "growth": 3
}];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "date";
categoryAxis.renderer.minGridDistance = 40;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.numberFormatter.numberFormat = "#,##'%'";

// Create series
var seriesGrowth = chart.series.push(new am4charts.LineSeries());
seriesGrowth.dataFields.valueY = "growth";
seriesGrowth.dataFields.categoryX = "date";
seriesGrowth.strokeWidth = 4;
seriesGrowth.tooltipText = "{growth}";
 

// Drop-shaped tooltips
seriesGrowth.tooltip.background.cornerRadius = 20;
seriesGrowth.tooltip.background.strokeOpacity = 0;
seriesGrowth.tooltip.pointerOrientation = "vertical";
seriesGrowth.tooltip.label.minWidth = 40;
seriesGrowth.tooltip.label.minHeight = 40;
seriesGrowth.tooltip.label.textAlign = "middle";
seriesGrowth.tooltip.label.textValign = "middle";

// Make bullets grow on hover
var bullet = seriesGrowth.bullets.push(new am4charts.CircleBullet());
bullet.circle.strokeWidth = 2;
bullet.circle.radius = 4;
bullet.circle.fill = am4core.color("#fff");

var bullethover = bullet.states.create("hover");
bullethover.properties.scale = 1.3;

// Make a panning cursor
chart.cursor = new am4charts.XYCursor();
chart.cursor.behavior = "panXY";
chart.cursor.xAxis = categoryAxis;
chart.cursor.snapToSeries = seriesGrowth;

var target = valueAxis.axisRanges.create();
target.grid.above = true;
target.value = 4;
target.grid.stroke = am4core.color("#fff");
target.grid.strokeWidth = 2;
target.grid.strokeOpacity = 0.5;
target.grid.strokeDasharray = "3,3";
target.label.inside = true;
target.label.text = "Target";
target.label.fill = target.grid.stroke;
target.label.align = "right";
target.label.verticalCenter = "bottom";

var greenRange = valueAxis.axisRanges.create();
greenRange.value = 0;
greenRange.endValue = 10;
greenRange.axisFill.fill = am4core.color("#fff");
greenRange.axisFill.fillOpacity = 0.2;
greenRange.grid.strokeOpacity = 0;