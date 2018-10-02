// JavaScript Document

var cookie = new cookie();


var canvas = document.getElementById("can");
var ctx = canvas.getContext('2d');

var config = {
	tempo_job : cookie.get("tempo_job") != "" ? Number(cookie.get("tempo_job")) : 25, //minutos	
	tempo_intervalo : cookie.get("tempo_intervalo") != "" ? Number(cookie.get("tempo_intervalo")) : 5, //minutos	
	automatico : false,//cookie.get("automatico") != "" ? cookie.get("automatico") : true,
	som : cookie.get("som") != "" ? cookie.get("som") : null
}

var notification = [];
var delay = 10;
var interval;
var cont = 0;
var tempo = cookie.get("tempo") != "" ? Number(cookie.get("tempo")) : config.tempo_intervalo; //minutos
var status = cookie.get("status") != "" ? cookie.get("status") : "intervalo";
var ultimo_minuto = cookie.get("ultimo_minuto") != "" ? Number(cookie.get("ultimo_minuto")) : 0;
var send_bd = true;


String.prototype.capital = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

function notificacao(txt, status_notification) {
	Notification.requestPermission(function() {
		
		var tempo_final = (tempo - ultimo_minuto/60).toFixed(0);
		
		/*if(notification.length != 0) {
			for(var i = 0; i<notification.length; i++ ){
				notification[i].close();
			}			
		}*/
		if(txt == null || txt == false) txt = "você tem " +  tempo_final + " minuto" + (tempo_final>1 ? "s" : "");
        
		var this_not = notification[notification.length] = new Notification('Atenção', {
            body: txt,
      		icon: "http://www.pomojob.richardds.com.br/comum/img/icon_" + status + ".png"
        });
		
		this_not.onclick = function(event) {
		  event.preventDefault(); // prevent the browser from focusing the Notification's tab
		  for(var i = 0; i<notification.length; i++ ){ notification[i].close(); }		  
		  if(status_notification != null || status_notification != false) control(status_notification);	  
		  
		}
		
    });

}

function animacao(info_timer){
	
	cont = ((info_timer+1)*100)-100;	//ou info_timer.totalSeconds
	clearInterval(interval);	
	interval = setInterval(function(){
		cont++;		
		
		/*------CANVAS--------*/
		
		ctx.clearRect(0, 0, canvas.width, canvas.height);
		ctx.beginPath();
		ctx.moveTo(canvas.width/2,canvas.height/2);	
		ctx.arc(canvas.width/2,canvas.height/2,canvas.height, 0, 2 * Math.PI * ((cont/100)/(tempo*60)), false);
		
		var grd = ctx.createLinearGradient(0, 0, canvas.width, 180);
		grd.addColorStop(0, "#b54d2c");
		grd.addColorStop(1, "#dc3500");
		
		ctx.fillStyle = grd;
		ctx.fill();		
		
		$(".txt_tempo").text($("title").text());
		var data = new Date();
		var dataFormatada = ("0" + data.getDate()).substr(-2) + "/"  + ("0" + (data.getMonth() + 1)).substr(-2) + "/" + data.getFullYear();
		$(".total .celula").text(dataFormatada);

	},delay);
	cookie.set("ultimo_minuto",info_timer,1);
	

}

function control(ctr){
	clearInterval(interval);
	
	if(
		ctr != status &&
		(ctr == 'intervalo' || ctr == 'job')
	) $.post(baseURL + 'horario/inserir', {tipo: status=='job' ? 2 : 1});
	if(ctr == 'pause' && send_bd) $.post(baseURL + 'horario/inserir', {tipo: 3});
	if(ctr == 'resume' && send_bd) $.post(baseURL + 'horario/inserir', {tipo: 4});
	
	if(ctr == 'job' || ctr == 'intervalo'){
		status = ctr;
		tempo  = ctr=='job' ? config.tempo_job : config.tempo_intervalo;		
		ctr = 'reset';
	}
	
	if(ctr == 'inverter'){
		status = status=='job' ? 'intervalo' : 'job';
		tempo  = tempo==config.tempo_job ? config.tempo_intervalo : config.tempo_job;
		ctr = 'reset';
	}
	
	
	if(ctr == 'reset'){
	 ultimo_minuto = 0;
	 $('title').timer('remove');
	 init_timer();
	}else $('title').timer(ctr);
}

function init_timer(){ 

	if(!cookie.get("status")){
		$.post(baseURL + 'horario/inserir', {tipo: 0});
	}

	notificacao(false);
	cookie.set("tempo",tempo,1);
	cookie.set("status",status,0.1);
	$('.txt_status').text(status);

	$('title').timer({
		duration: tempo + 'm',
		format: '%M:%S',
		seconds: ultimo_minuto,
		callback: function() {	
		
			$.post(baseURL + 'horario/inserir', {tipo: status=='job' ? 2 : 1})
			.done(function(){
				send_bd = false;
				control('pause');
				send_bd = true;
				
				if(config.automatico) control('inverter');
				else{
					notificacao("Clique para continuar com o " + status, 'reset');
					notificacao("Clique para começar seu " + (status=='job' ? 'intervalo' : 'job'), 'inverter');					
				}
			})
			.fail(function(data){
				alert('Algo deu errado, tente novamente');
				console.log(data);
			});
				
			
		},
		repeat: true //repeatedly call the callback
	});
	
}
init_timer();