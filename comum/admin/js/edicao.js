// JavaScript Document

var escopo = {
	obj: null,	
	col: null,
	id: null	
};

var edicao = {
	
	init : function(){
		
		$('.cmp_tbl.sel').change(function(e) {
            edicao.alterar_coluna(this,'status', $(this).data('id-edicao'));        
		});
		
		$('form').on('submit', function(e){
			e.preventDefault();
			var dataArray = $(this).serializeArray();
			//console.log(dataArray[0].value);
			edicao.criar_edicao(String(dataArray[0].value));
			
		});
		
		
		setTimeout(function(){
			$('.redirect').on('click', function(){			
				if($.isNumeric( $(this).data('id-edicao') )) window.location.href = baseURL + 'admin/consulta_' + $(this).data('tabela') + '/' + $(this).data('id-edicao');			
			});
		},300);
		
		
		
		
	},
	
	inserir_obj : function(obj, col, id){ escopo.obj = obj; escopo.col = col; escopo.id = id;},
	
	criar_edicao : function (data){
		
		if(edicao.valida_alteracao('data',data)){
			
			var valor = util.data_br_eu(data);
			//console.log(valor);
			$.post(baseURL + 'admin/inserir_edicao', {data:valor})
			.done(function(data){
				//console.log(data);
				var dataJSON = JSON.parse(data);
				if(dataJSON.sucesso) util.aviso('Nova edição do LOOP criada', 'ok');
				else {					
					txt = 'Erro na criação da edição';
					if(dataJSON.erro_code == '0-0') txt = 'Finalize todas as edições para realizar esta ação';
					util.aviso(txt, 'erro');
				}
				
				setTimeout(function(){
					obj_carregado = false;
					tabela.ajax.reload();
				}, 200);
				
				escopo.obj = null;
				escopo.col = null;
				escopo.id = null;
			
			})
			.fail(function(data){
				//console.log(data);
				util.aviso('Erro de requisição', 'erro');	
			});
		}
		
	},
	
	alterar_coluna : function (celula, coluna, id_edicao){
		
		var valor = $(celula).val();		
		
		if(edicao.valida_alteracao(coluna,valor)){
			
			util.aviso('Atualizando ' + coluna, 'loading');
			
			if(coluna == 'data') valor = util.data_br_eu(valor);
			
			//console.log(valor, coluna, id_edicao);
			
			$.post(baseURL + 'admin/alterar_coluna_edicao', {coluna:coluna, valor:valor, id:id_edicao})
			.done(function(data){
				//console.log(data);
				var dataJSON = JSON.parse(data);
				if(dataJSON.sucesso) util.aviso('Sucesso na atualização de ' + coluna, 'ok');
				else {					
					txt = 'Erro na atualização de ' + coluna;
					if(dataJSON.erro_code == '0-0') txt = 'Finalize todas as edições para realizar esta ação';
					util.aviso(txt, 'erro');
				}
				
				setTimeout(function(){
					obj_carregado = false;
					tabela.ajax.reload();
				}, 200);
				
				escopo.obj = null;
				escopo.col = null;
				escopo.id = null;
			
			})
			.fail(function(data){
				//console.log(data);
				util.aviso('Erro de requisição', 'erro');	
			});
		}
		
	},
	valida_alteracao : function(coluna, valor){
		
		var retorno = true;
		
		if(coluna == 'data'){
			if(!util.valida_data(valor)){
				retorno = false;
				util.aviso(valor=='' ? 'Insira uma data' : 'insira uma data com formato valido (dd/mm/aaaa)', 'erro' );	
			}
		}
		
		return retorno;
		
	}
	
}

$(function(){
	
});