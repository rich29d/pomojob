// JavaScript Document

var nReloads = 0;

function ran(min, max) {
    return (Math.random() * (max - min) + min).toFixed(0);
}

var ret = cookie.get("esta") != "" ? JSON.parse(cookie.get("esta")).ret : [];
if(ret.length==0){
	for (var x = 1; x <= 5; x++) {
		nReloads++;
		ret.push({
			y: util.now() + '.' + x, 
			job: 0, 
			intervalo: 0
		});
	}
}

// LINE CHART
var line = new Morris.Line({
  element: 'line-chart',
  resize: true,
  data: ret,
  xkey: 'y',
  ykeys: ['job','intervalo'],
  labels: ['job', 'intervalo'],
  xLabels: '15min',
  lineColors: ['#ec501d','#dcc599'],
  pointStrokeColors:['#ec501d','#dcc599'],
  grid: false,
  hideHover: 'auto',
  pointSize: 0,
  fillOpacity: 1,
  hoverCallback: function (index, options, content, row) {
				  var intervalo = options.data[index].intervalo;
				  var job = options.data[index].job;
				  var y = options.data[index].y.split(" ");
				  var html = "\
				  			<span>" + y[1] + "<span><br>\
				  			<span style='color:" + options.lineColors[0] + "'>job: " + job + "minutos</span><br>\
				  			<span style='color:" + options.lineColors[1] + "'>intervalo: " + intervalo + "minutos</span>\
				  ";
				  
				  //console.log(options);

				  return  html ;
				 }
  //axes:false
});
dia = 1;
function data(offset) {
  for (var x = 0; x < ret.length; x++) {
    if(x!=0)ret[x-1] = ret[x];
    if(x==ret.length-1){ ret[x] = {
    	y: util.now(), 
    	job: ran(0,24), 
    	intervalo: ran(0,24)}; 
    	console.log(offset,ret[x].y);
    } 
    
  }
}
function update() {
  nReloads = ++nReloads<=23?nReloads:0;
  data(nReloads);
  line.setData(ret);
  cookie.set("esta",JSON.stringify({ret}),1);
}
setInterval(update, 15*60*1000);