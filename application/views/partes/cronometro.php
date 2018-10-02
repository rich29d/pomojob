<div class="cronometro">
    <div class="circulo cir_4">
        <div class="circulo cir_3">
            <div class="circulo cir_2">
            	<canvas id="can" width="293" height="293"></canvas>
                <div class="circulo cir_1">
					<div class="cont_visor">
                    
                    	<div class="total tabela">
                        	<div class="celula">00/00/0000</div>                            
                        </div>
                        
                        <div class="controles tabela">
                        	<div class="celula">
                            	<a href="javascript:control('pause')" data-toggle="tooltip" data-placement="top" title="pause" class="btn_ctrl"><?php $this->load->view('partes/icons/icon_pause'); ?></a>
                            </div>
                            <div class="celula">
                            	<a href="javascript:control('resume')" data-toggle="tooltip" data-placement="top" title="play" class="btn_ctrl"><?php $this->load->view('partes/icons/icon_play'); ?></a>
                            </div>
                            <div class="celula">
                            	<a href="javascript:control('reset')" data-toggle="tooltip" data-placement="top" title="reset" class="btn_ctrl"><?php $this->load->view('partes/icons/icon_reset'); ?></a>
                            </div>
                        </div>
                        
                        <div class="contagem tabela">
                        	<div class="txt_tempo celula">00:00</div>
                        </div>
                        
                        <div class="status tabela">
                        	<div class="txt_status celula"></div>
                        </div>
                        
                    </div>
                        
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="botoes_iniciar">
        <div class="cont_btn_iniciar"><button class="btn_iniciar" onclick="control('job')">INICIAR JOB</button></div>
        <div class="cont_btn_iniciar"><button class="btn_iniciar" onclick="control('intervalo')">INICIAR INTERVALO</button></div>
</div>