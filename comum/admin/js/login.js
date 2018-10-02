// JavaScript Document

var header = $('.login-box-header');
 

var util = {

	parseJSON : function (arr){
		
		var indexed_array = {};	
		$.map(arr, function(n, i){
			indexed_array[n['name']] = n['value'];
		});	
		return indexed_array;
		
	},
	aviso : function(msg, status){
		
		if(status == "erro") header.addClass('erro');
		else header.removeClass('erro');
		
		if(status == "ok") header.addClass('ok');
		else header.removeClass('ok');
		
		header.find('span').text(msg);
		
	}
	
}

var login = {
	init : function(){
		login.submit();	
	},	
	submit : function(){
		$('form').on('submit', function(e){ 
			e.preventDefault();
			if(login.validacao(this)) login.entrar(this); 
		});
	},
	validacao : function(form){
		var regex_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var dados = util.parseJSON($(form).serializeArray());
		//console.log(dados);
		header.removeClass('erro').removeClass('loading').removeClass('ok');
		var retorno = true;
		if(dados.login == "" || !regex_email.test(dados.login)){
			retorno = false;
			util.aviso(
				dados.login == "" ? "Insira o seu email" : "Email inválido",'erro'					
			);
		}else if(dados.senha == "") {
			retorno = false;
			util.aviso('Insira a senha', 'erro');
		}
		
		return retorno;
		
	},
	entrar : function(form){
		
		header.addClass('loading');
		$.post(baseURL + 'admin/entrar', $(form).serialize())
		.done(function(response){
			header.removeClass('erro').removeClass('loading').removeClass('ok');
			var respJSON = JSON.parse(response);
			
			//console.log(response);
			
			if(respJSON.valido){
				util.aviso('OK!', 'ok');
				setTimeout(function(){ window.location.href = baseURL + 'admin'},1000);				
			}else util.aviso('Login inválido', 'erro');			
		})
		.fail(function(data){
			util.aviso('Erro ao fazer login', 'erro');
			//console.log(data);
		})
			
	}	
}

$(function(){
	
	login.init();
	
});