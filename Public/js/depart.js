
var lineNum = ["主席团", "宣传部"];  
var collect = document.getElementById("lines")  
var old = collect.innerHTML  
function aa() {  
    var lineNu = " "  
    for (var j = 0; j < lineNum.length; j++) {  
        lineNu += '<option>' + lineNum[j] + '</option>';  
    }  
    collect.innerHTML = old + lineNu;  
} //网页加载时执行此函数，为线路选择框动态添加选项        
aa();    
var stationName = [  
    ["社长","副社长"],  
    ["部长","副部长","干事"],
	  
];  
  
function getStationName() {  
    var line_num = document.lineandstation.lines;  
    var station_name = document.lineandstation.station;  
    var lineStation = stationName[line_num.selectedIndex - 1];  
    station_name.length = 1;  
    for (var i = 0; i < lineStation.length; i++) {  
        station_name[i + 1] = new Option(lineStation[i], lineStation[i]);  
    }  
}