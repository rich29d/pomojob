<?php $this->load->helper('url'); ?>

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-with, initial-scale=1.0">

<title>Inscrição Loop</title>

<!-- Fonts -->
<link href='https://fonts.googleapis.com/css?family=Archivo+Black|Paytone+One' rel='stylesheet' type='text/css'>
<!-- Estilo global -->
<link href="<?= base_url() ?>comum/css/global.css" rel="stylesheet" />
<!-- Estilo geral -->
<link href="<?= base_url() ?>comum/css/estilo.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script>
var baseURL = '<?= base_url() ?>';
</script>

</head>
<body>
<header>
	
    <div class="cont_header">
    
        <div class="cont_edicao">
            <div class="num_edicao"><?php echo $edicao[0]?>º EDIÇÃO</div>
            <div class="dat_edicao"><?php echo $edicao[1]?></div>
        </div>
        
        <nav>
            <ul>
                <li><a href="javascript:void(0);">site</a></li>
                <li><a href="javascript:scroll_window.para_inscricao()">inscrição</a></li>
                <li>
                	<a href="javascript:menu_desk.chama_login();">consultar</a>
                	
                   
                    
                        <div class="cont_login">
                            <form action="" method="post">
                                <div class="seta"></div>
                                <div class="campos">
                                    
                                    <div class="campo tabela cmp_rgm">
                                        <div class="icone_campo celula"><i class="fa fa-id-card" ></i></div>
                                        <div class="celula"><input type="number" name="rgm" placeholder="RGM" maxlength="12"></div>
                                        <div class="msg_erro">
                                            <p>Texto</p>
                                        </div>
                                    </div>
                                    
                                    <div class="campo tabela cmp_email">
                                        <div class="icone_campo celula"><i class="fa fa-envelope"></i></div>
                                        <div class="celula"><input type="text" name="email" placeholder="Email" maxlength="100"></div>
                                        <div class="msg_erro">
                                            <p>Texto</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="cont_enviar">
                                    <button class="enviar" type="submit">
                                        <img src="comum/imgs/ajax-loader-btn.gif" class="loading">
                                        <span>Entrar</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    
                    
                </li>
            </ul>
            <div class="lamp"></div>
            <div class="bt_menu_mob abrir" onClick="menu_mob.abrir();">
            	<img src="comum/imgs/sacuda.png" class="msn_sac" />
            	<i class="fa fa-bars"></i><i class="fa fa-close"></i>
            </div>
        </nav>
        
    </div>
    
</header>

<div class="menu_mob">
	<ul>
        <li><a href="javascript:void(0);">site</a></li>
        <li><a href="javascript:scroll_window.para_inscricao()">inscrição</a></li>
        <li><a href="javascript:menu_mob.chama_login();">consultar</a> </li>
    </ul>
    
    <div class="cont_login">
    	<form action="" method="post">
            <div class="campos">
                
                <div class="campo tabela cmp_rgm">
                    <div class="icone_campo celula"><i class="fa fa-id-card" ></i></div>
                    <div class="celula"><input type="number" name="rgm" placeholder="RGM"></div>
                    <div class="msg_erro">
                        <p>Texto</p>
                    </div>
                </div>
                
                <div class="campo tabela cmp_email">
                    <div class="icone_campo celula"><i class="fa fa-envelope"></i></div>
                    <div class="celula"><input type="text" name="email" placeholder="Email"></div>
                    <div class="msg_erro">
                        <p>Texto</p>
                    </div>
                </div>
                
            </div>
            
            <div class="cont_enviar">
                <button class="enviar left" type="button" onClick="menu_mob.esconde_login();">
                    <img src="comum/imgs/ajax-loader-btn.gif" class="loading">
                    <span>Voltar</span>
                </button>
                <button class="enviar" type="submit">
                    <img src="comum/imgs/ajax-loader-btn.gif" class="loading">
                    <span>Entrar</span>
                </button>
            </div>
        </form>
    </div>
    
</div>

<article>

    <section class="sec_1">
    
        <div class="cont_det">
            <div class="det_esq">
                <div class="det_tip_1">
                    <div class="det d1"></div>
                    <div class="det d2"></div>            
                </div>
                <div class="det_tip_2">
                    <div class="det d1"></div>
                    <div class="det d2"></div>
                    <div class="det d3"></div>
                </div>
            </div>
            <div class="det_dir">
                <div class="det_tip_2">
                    <div class="det d1"></div>
                </div>
                <div class="det_tip_1">
                    <div class="det d1"></div>
                </div>
            </div>
        </div>
    
        
        <div class="fundo fundo_1">
            <div class="logo">
                <img src="<?= base_url() ?>comum/imgs/logo.png">
            </div>
        </div>
        
    </section>
    
    <section class="sec_2">
    
        <div class="cont_det">
            
            <div class="det_esq">
                <div class="det_tip_2">
                    <div class="det d1"></div>
                </div>
                <div class="det_tip_1">
                    <div class="det d1"></div>
                </div>
            </div>
            
            <div class="det_dir">
                <div class="det_tip_1">
                    <div class="det d1"></div>
                    <div class="det d2"></div>            
                </div>
                <div class="det_tip_2">
                    <div class="det d1"></div>
                    <div class="det d2"></div>
                    <div class="det d3"></div>
                </div>
            </div>
            
        </div>
        
        <div class="logo_java"><img  src="comum/imgs/logo_java.png"></div>
        <div class="inclinacao">
            <div class="fundo fundo_2">
            
                <div class="txt_sec_2">
                    <div class="txt">
                        Você<br>Esta<br>Pronto?
                        <div class="borda"></div>
                    </div>
                </div>
            
            </div>
        </div>
        
    </section>
    
    <section class="sec_3">
        <div class="cont_form">
        
        <div class="cont_bullets">
            <a href="javascript:void(0);" class="bullet b1 ativo">1</a>
            <a href="javascript:void(0);" class="bullet b2">2</a>
            <a href="javascript:void(0);" class="bullet b3">3</a>
            <a href="javascript:void(0);" class="bullet b4">4</a>
        </div>
            
        <div class="form">
        	
            <form action="" method="get" data-txt="Sucesso!">
            
            	<input type="hidden" name="acao">
            
                <div class="campos padding">
                    <div class="texto_form">
                        Insira o nome <br class="mobile"/>do grupo
                    </div>
                    <div class="campo tabela cmp_grupo">
                        <div class="icone_campo celula"><i class="fa fa-group"></i></div>
                        <div class="celula"><input type="text" name="grupo" placeholder="Nome do grupo"  maxlength="150"></div>
                        <div class="status_campo celula">
                            <img src="comum/imgs/ajax-loader.gif" class="loading">
                            <i class="fa fa-check ok" aria-hidden="true"></i>
                            <i class="fa fa-times erro" aria-hidden="true"></i>
                        </div>
                        <div class="msg_erro">
                        	<p>Texto</p>
                        </div>
                    </div>
                </div>
                
                <div class="cont_enviar">
                    <button class="enviar btn_criar" type="submit" data-num="1">
                    	<img src="comum/imgs/ajax-loader-btn.gif" class="loading">
                    	<span>Criar</span>
                    </button>
                    <button class="enviar left btn_ja_existe" type="submit" data-num="1">
                    	<img src="comum/imgs/ajax-loader-btn.gif" class="loading">
                    	<span>Meu grupo já foi criado</span>
                    </button>
                </div>
            
            </form>
                
        </div>
        
        <?php for($i=2; $i<=4; $i++){?>
        
            <div class="form">
            	<form action="" method="get" data-txt="Parabéns, você esta inscrito.">
                
                	<input type="hidden" name="id" value="0">
                    <input type="hidden" name="id_grupo">
                    <input type="hidden" name="id_relacao" value="">
                    <input type="hidden" name="acao_aluno" value="cadastrar">
                
                    <div class="campos">
                    
                        <div class="campo tabela cmp_rgm">
                            <div class="icone_campo celula"><i class="fa fa-id-card" ></i></div>
                            <div class="celula"><input type="text" name="rgm" placeholder="RGM" maxlength="12"></div>
                            <div class="status_campo celula">
                                <img src="comum/imgs/ajax-loader.gif" class="loading">
                                <i class="fa fa-check ok" aria-hidden="true"></i>
                                <i class="fa fa-times erro" aria-hidden="true"></i>
                            </div>
                            <div class="msg_erro">
                                <p>Texto</p>
                            </div>
                        </div>
                        
                        <div class="campo tabela cmp_nome">
                            <div class="icone_campo celula"><i class="fa fa-user"></i></div>
                            <div class="celula"><input type="text" name="nome" placeholder="Nome"  maxlength="50"></div>
                            <div class="status_campo celula">
                                <img src="comum/imgs/ajax-loader.gif" class="loading">
                                <i class="fa fa-check ok" aria-hidden="true"></i>
                                <i class="fa fa-times erro" aria-hidden="true"></i>
                            </div>
                            <div class="msg_erro">
                                <p>Texto</p>
                            </div>
                        </div>
                        
                        <div class="campo tabela cmp_email">
                            <div class="icone_campo celula"><i class="fa fa-envelope"></i></div>
                            <div class="celula"><input type="text" name="email" placeholder="Email"  maxlength="100"></div>
                            <div class="status_campo celula">
                                <img src="comum/imgs/ajax-loader.gif" class="loading">
                                <i class="fa fa-check ok" aria-hidden="true"></i>
                                <i class="fa fa-times erro" aria-hidden="true"></i>
                            </div>
                            <div class="msg_erro">
                                <p>Texto</p>
                            </div>
                        </div>
                        
                        <div class="campo x2 tabela selecao cmp_curso">
                        	<input type="hidden" name="id_curso">
                        	<div class="icone_campo celula"><i class="fa fa-graduation-cap"></i></div>
                            <div class="celula"><input type="text"  placeholder="Curso" disabled></div>
                            <div class="seta_campo celula"><i class="fa fa-caret-down"></i></div>
                            <div class="opcoes">
                                
                            </div>
                            <div class="msg_erro">
                                <p>Texto</p>
                            </div>
                        </div>
                        
                        <div class="campo x2 tabela selecao cmp_semestre">
                        	<input type="hidden" name="semestre">
                            <div class="icone_campo celula"><i class="fa fa-calendar"></i></div>
                            <div class="celula"><input type="text"  placeholder="Semestre" disabled></div>
                            <div class="seta_campo celula"><i class="fa fa-caret-down"></i></div>
                            <div class="opcoes">
                                <div class="opt" data-opt=""><span>Primeiro selecione um curso</span></div>
                            </div>
                            <div class="msg_erro">
                                <p>Texto</p>
                            </div>
                        </div>
                        
                    </div>                
            
                    <div class="cont_enviar">
                        <button class="enviar" type="submit" data-num="<?= $i ?>">
                        	<img src="comum/imgs/ajax-loader-btn.gif" class="loading">
                        	<span>Cadastrar</span>
                        </button>
                        <?php if($i!=2){?>
                        <a class="enviar left" href="javascript:formulario.prox(4)">
                           Finalizar
                        </a>
                        <?php }?>
                    </div>
                    
                </form>
                
            </div>
            
            <?php } ?>
            
        </div>
    </section>
    
    <section class="sec_4">
    
        <div class="cont_det">
            <div class="det_esq">
                <div class="det_tip_1">
                    <div class="det d1"></div>
                    <div class="det d2"></div>            
                </div>
                <div class="det_tip_2">
                    <div class="det d1"></div>
                    <div class="det d2"></div>
                    <div class="det d3"></div>
                </div>
            </div>
            <div class="det_dir">
                <div class="det_tip_2">
                    <div class="det d1"></div>
                </div>
                <div class="det_tip_1">
                    <div class="det d1"></div>
                </div>
            </div>
        </div>
        
        <div class="inclinacao">
            <div class="fundo fundo_3">
                
                <div class="logo">
                    <img src="<?= base_url() ?>comum/imgs/logo.png">
                </div>
                <div class="texto">            	
                    Obrigado por se inscrever,<br>
                    um bom LOOP para você. <br>
                     <small>→ ↑ L O O P ↓ ← </small>
                </div>
                
            </div>
        </div>
        
    </section>
    
    <div class="cont_aviso">
    	<div class="aviso">
        	<p> aviso </p>
        </div>
    </div>
    
</article>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="<?= base_url() ?>comum/js/jquery.ios-shake.js"></script>
<script src="<?= base_url() ?>comum/js/jquery.ui.shake.js"></script>
<script src="<?= base_url() ?>comum/js/script.js"></script>


<script>
$.shake({ callback: function() {
	if(!menu_mob.status) menu_mob.abrir();
	else menu_mob.fechar();
  }
});
</script>
</body>
</html>