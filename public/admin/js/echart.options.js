var echartOptions={get smoothLine(){return{type:"line",smooth:!0}},get lineShadow(){return{shadowColor:"rgba(0, 0, 0, .2)",shadowOffsetX:-1,shadowOffsetY:8,shadowBlur:10}},get gridNoAxis(){return{show:!1,top:5,left:0,right:0,bottom:0}},get pieRing(){return{radius:["50%","60%"],selectedMode:!0,selectedOffset:0,avoidLabelOverlap:!1}},get pieLabelOff(){return{label:{show:!1},labelLine:{show:!1,emphasis:{show:!1}}}},get pieLabelCenterHover(){return{normal:{show:!1,position:"center"},emphasis:{show:!0,textStyle:{fontWeight:"bold"}}}},get pieLineStyle(){return{color:"rgba(0,0,0,0)",borderWidth:2,...this.lineShadow}},get pieThikLineStyle(){return{color:"rgba(0,0,0,0)",borderWidth:12,...this.lineShadow}},get gridAlignLeft(){return{show:!1,top:6,right:0,left:"-6%",bottom:0}},get defaultOptions(){return{grid:{show:!1,top:6,right:0,left:0,bottom:0},tooltip:{show:!0,backgroundColor:"rgba(0, 0, 0, .8)"},xAxis:{type:"category",data:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],show:!0},yAxis:{type:"value",show:!1}}},get lineFullWidth(){return{grid:{show:!1,top:0,right:"-9%",left:"-8.5%",bottom:0},tooltip:{show:!0,backgroundColor:"rgba(0, 0, 0, .8)"},xAxis:{type:"category",show:!0},yAxis:{type:"value",show:!1}}},get lineNoAxis(){return{grid:this.gridNoAxis,tooltip:{show:!0,backgroundColor:"rgba(0, 0, 0, .8)"},xAxis:{type:"category",axisLine:{show:!1},axisLabel:{textStyle:{color:"#ccc"}}},yAxis:{type:"value",splitLine:{lineStyle:{color:"rgba(0, 0, 0, .1)"}},axisLine:{show:!1},axisTick:{show:!1},axisLabel:{textStyle:{color:"#ccc"}}}}}};