/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Chartjs init js
*/


// get colors array from the string
function getChartColorsArray(chartId) {
    if (document.getElementById(chartId) !== null) {
        var colors = document.getElementById(chartId).getAttribute("data-colors");
        colors = JSON.parse(colors);
        return colors.map(function (value) {
            var newValue = value.replace(" ", "");
            if (newValue.indexOf(",") === -1) {
                var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
                if (color) return color; else return newValue;;
            } else {
                var val = value.split(',');
                if(val.length == 2){
                    var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
                    rgbaColor = "rgba("+rgbaColor+","+val[1]+")";
                    return rgbaColor;
                } else {
                    return newValue;
                }
            }
        });
    }
}

Chart.defaults.borderColor= "rgba(133, 141, 152, 0.1)";
Chart.defaults.color= "#858d98";

// line chart
var islinechart = document.getElementById('lineChart');
lineChartColor =  getChartColorsArray('lineChart');
if(lineChartColor){
islinechart.setAttribute("width", islinechart.parentElement.offsetWidth);

var lineChart = new Chart(islinechart, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Agst", "Sept", "Okt", "Nov", "Des"],
        datasets: [
            {
                label: "Rencana Keuangan",
                fill: false,
                lineTension: 0,
                backgroundColor: lineChartColor[0],
                borderColor: lineChartColor[1],
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: lineChartColor[1],
                pointBackgroundColor: "#fff",
                pointBorderWidth: 8,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: lineChartColor[1],
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [null, 15, 22, 31, 40, 48, 60, 66, 73, 80, 91,100]
            },
            {
                label: "Realisasi Keuangan",
                fill: false,
                lineTension: 0,
                backgroundColor: lineChartColor[2],
                borderColor: lineChartColor[3],
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: lineChartColor[3],
                pointBackgroundColor: "#fff",
                pointBorderWidth: 8,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: lineChartColor[3],
                pointHoverBorderColor: "#eef0f2",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [null, 18, 25, 33, 40, 53, 64, 69, 77, 85, 96,100]
            }
        ]
    },
    

    


    
});
}

