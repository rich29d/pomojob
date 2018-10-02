// JavaScript Document

var util = {

	data_eu_br : function (data_hora){
		data    = data_hora.split(" ");
		data_eu = data[0].split('-');
		return [data[1],data_eu[2] + '/' + data_eu[1] + '/' + data_eu[0]] ;		
	},
	data_br_eu : function (data_hora){
		data    = data_hora.split(" ");
		data_br = data[0].split('-');
		return [data[1],data_br[2] + '-' + data_br[1] + '-' + data_br[0]] ;		
	},
	valida_data : function(data){
		var regex_data = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/;
		return regex_data.test(data);
	},
	aviso : function(txt, status){
		$('.msg_status')
			.removeClass('erro')
			.removeClass('loading')
			.removeClass('ok')
			.addClass(status);		
		
		$('.msg_status span').text(txt);		
		var delay_msg;
		clearTimeout( delay_msg);
		
		if(status != 'loading') delay_msg = setTimeout(function(){$('.msg_status').removeClass(status)}, 5000)
		
		
	}
	
}