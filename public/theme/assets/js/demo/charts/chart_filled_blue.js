/*
 * charts/chart_filled_blue.js
 *
 * Demo JavaScript used on charts-page for "Filled Chart (Blue)".
 */

"use strict";

function gd(year, month, day) {
	return new Date(year, month - 1, day).getTime();
}

$(document).ready(function(){

	// Sample Data
	var d1 = getLineChartData();

	var data1 = [
		{ label: "Masuk", data: d1, color: App.getLayoutColorCode('blue') }
	];

	var dayOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thr", "Fri", "Sat"];

	$.plot("#chart_filled_blue", data1, $.extend(true, {}, Plugins.getFlotDefaults(), {
		xaxis: {
			min: (new Date(2017, 8, 1)).getTime(),
			max: (new Date(2017, 9, 1)).getTime(),
			mode: "time",
			tickFormatter: function(val, axis) {
				//return dayOfWeek[new Date(val).getDay()];
				return new Date(val).getDate();
			},
			timeformat: "%m/%d",
			tickSize: [1, "day"],
			//monthNames: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "10", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"],
			tickLength: 0
		},
		series: {
			lines: {
				fill: true,
				lineWidth: 1.5
			},
			points: {
				show: true,
				radius: 2.5,
				lineWidth: 1.1
			},
			grow: { active: true, growings:[ { stepMode: "maximum" } ] }
		},
		grid: {
			hoverable: true,
			clickable: true
		},
		tooltip: true,
		tooltipOpts: {
			content: '%s: %y'
		}
	}));


});