"use strict";var _extends=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var a=arguments[t];for(var n in a)Object.prototype.hasOwnProperty.call(a,n)&&(e[n]=a[n])}return e};$(document).ready(function(){var e=document.getElementById("echart1");if(e){var t=echarts.init(e);t.setOption(_extends({},echartOptions.defaultOptions,{series:[{type:"pie",itemStyle:echartOptions.pieLineStyle,data:[_extends({name:"Email Subscription",value:80},echartOptions.pieLabelOff,{itemStyle:{borderColor:"#4CAF50"}}),_extends({name:"Registration",value:20},echartOptions.pieLabelOff,{itemStyle:{borderColor:"#df0029"}})]}]})),$(window).on("resize",function(){setTimeout(function(){t.resize()},500)})}var a=document.getElementById("echart2");if(a){var n=echarts.init(a);n.setOption(_extends({},echartOptions.defaultOptions,{series:[{type:"pie",itemStyle:echartOptions.pieLineStyle,data:[_extends({name:"Running",value:40},echartOptions.pieLabelOff,{itemStyle:{borderColor:"#ff9800"}}),_extends({name:"Completed",value:60},echartOptions.pieLabelOff,{itemStyle:{borderColor:"#4CAF50"}})]}]})),$(window).on("resize",function(){setTimeout(function(){n.resize()},500)})}var i=document.getElementById("echart3");if(i){var r=echarts.init(i);r.setOption(_extends({},echartOptions.defaultOptions,{series:[{type:"bar",barWidth:6,itemStyle:_extends({color:"#ff9800"},echartOptions.lineShadow),data:[{name:"Bar 1",value:40},{name:"Bar 2",value:60,itemStyle:{color:"#4CAF50"}},{name:"Bar 3",value:80},{name:"Bar 4",value:70},{name:"Bar 5",value:60},{name:"Bar 6",value:70},{name:"Bar 7",value:80},{name:"Bar 8",value:40},{name:"Bar 9",value:70,itemStyle:{color:"#4CAF50"}}]}]})),$(window).on("resize",function(){setTimeout(function(){r.resize()},500)})}var o=document.getElementById("echart4");if(o){var l=echarts.init(o);l.setOption(_extends({},echartOptions.defaultOptions,{series:[{type:"bar",barWidth:6,itemStyle:_extends({color:"#ff9800"},echartOptions.lineShadow),data:[{name:"Bar 1",value:40},{name:"Bar 2",value:60,itemStyle:{color:"#4CAF50"}},{name:"Bar 3",value:80},{name:"Bar 4",value:70},{name:"Bar 5",value:60},{name:"Bar 6",value:70},{name:"Bar 7",value:80},{name:"Bar 8",value:40},{name:"Bar 9",value:70,itemStyle:{color:"#4CAF50"}}]}]})),$(window).on("resize",function(){setTimeout(function(){l.resize()},500)})}});