// JavaScript Document

var escopo = {
	obj: null,	
	col: null,
	id: null	
};

var curso = {
	
	init : function(){
		
		$('form').on('submit', function(e){
			e.preventDefault();			
			var dataArray = $(this).serializeArray();
			console.log(dataArray[0].value);
			curso.criar_curso(String(dataArray[0].value));
			
		});
		
	},
	
	criar_curso : function (nome){
		
		if(curso.valida_alteracao('nome',nome)){
			
			$.post(baseURL + 'admin/inserir_curso', {nome:nome})
			.done(function(data){
				console.log(data);
				var dataJSON = JSON.parse(data);
				if(dataJSON.sucesso) util.aviso('Novo curso criado', 'ok');
				else {					
					txt = 'Erro na criação do curso';
					if(dataJSON.erro_code == '4-0') txt = 'Curso já existe';
					util.aviso(txt, 'erro');
				}
				
				setTimeout(function(){
					tabela.ajax.reload();
				}, 200);
				
			
			})
			.fail(function(data){
				console.log(data);
				util.aviso('Erro de requisição', 'erro');	
			});
		}
		
	},
	
	alterar_coluna : function (celula, coluna, id_curso){
		
		console.log(celula, coluna, id_curso);
		
		var valor = $(celula).val();		
		
		if(curso.valida_alteracao(coluna, valor)){
			
			util.aviso('Atualizando ' + coluna.replace('quant_semestre','Nº semestres'), 'loading');			
			
			if(coluna == 'quant_semestre') valor = valor.replace(/\D/g, '');
			
			$.post(baseURL + 'admin/alterar_coluna_curso', {coluna:coluna, valor:valor, id:id_curso})
			.done(function(data){
				console.log(data);
				var dataJSON = JSON.parse(data);
				if(dataJSON.sucesso) util.aviso('Sucesso na atualização de ' + coluna.replace('quant_semestre','Nº semestres'), 'ok');
				else {					
					txt = 'Erro na atualização de ' + coluna.replace('quant_semestre','Nº semestres');
					if(dataJSON.erro_code == '4-0') txt = 'Finalize todas as edições para realizar esta ação';
					util.aviso(txt, 'erro');
				}
				
				setTimeout(function(){
					tabela.ajax.reload();
				}, 200);
				
			
			})
			.fail(function(data){
				console.log(data);
				util.aviso('Erro de requisição', 'erro');	
			});
		}
		
	},
	excluir: function(id){
		$.post(baseURL + 'admin/deletar_curso', {id:id})
			.done(function(data){
				console.log(data);
				var dataJSON = JSON.parse(data);
				if(dataJSON.sucesso) util.aviso('Curso excluido', 'ok');
				else {					
					util.aviso('Erro na exclusão do curso', 'erro');
				}
				
				setTimeout(function(){
					tabela.ajax.reload();
				}, 200);
				
			
			})
			.fail(function(data){
				console.log(data);
				util.aviso('Erro de requisição', 'erro');	
			});
	},
	valida_alteracao : function(coluna,valor){
		
		var retorno = true;
		
		if(coluna =='nome' && valor == ''){
			retorno = false;
			util.aviso('Insira o nome do curso', 'erro' );	
		}
		
		if(coluna =='Nº Semestres' && valor == ''){
			retorno = false;
			util.aviso('Insira um número', 'erro' );	
		}
		
		return retorno;
		
	}
	
}

$(function(){
	curso.init();
});