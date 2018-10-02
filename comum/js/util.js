var util = {

	now : function(){

		var hoje = new Date();
		return hoje.getFullYear() + '-' +
				hoje.getMonth() + '-' +
				hoje.getDate() + ' ' +
				hoje.getHours() + ':' +
				hoje.getMinutes() + ':' +
				hoje.getSeconds();
	},
	date_br : function(str_date){
		arr_date = str_date.split(' ');		
		dat = arr_date[0].split('-');
		return [arr_date[1],dat[2] + '/' + dat[1] + '/' + dat[0] ];
		
	}

}