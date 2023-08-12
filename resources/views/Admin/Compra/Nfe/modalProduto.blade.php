<?php
    use App\Service\ConstanteService;
?>
<div class="window form" id="formulario">
	<div class="p-2 px-4">
			<span class="d-block h3 border-bottom fw-700">Dados do Produto</span>
		 <div class="rows">
                          
								
                                <div class="col-6 mb-3">
                                        <label class="text-label">Nome do produto<span class="text-vermelho">*</span></label>
                                        <input type="text"  maxlength="100"  name="nome" id="nome"  class="form-campo">
                                </div>                         
                             	 
                               <div class="col-2 mb-3">
                                        <label class="text-label">NCM<span class="text-vermelho">*</span></label>
                                        <input type="text" name="ncm" id="ncm" data-mask="0000.00.00" maxlength="10"   class="form-campo">
                                </div>
                                
                                <div class="col-4 mb-3">
                                        <label class="text-label">GTIN/EAN</label>
                                        <input type="text" name="gtin" id="gtin"  class="form-campo">
                                </div>
                             	 
                                <div class="col-4 mb-3">
                                        <label class="text-label">Categoria Principal<span class="text-vermelho">*</span></label>
									<div class="group-btn">
                                        <?php $id_categoria = ($produto->categoria_id) ?? null ?>
                                        <select class="form-campo" name="categoria_id" id="categoria_id">                                        
                                          @foreach($categorias as $cat)
                                          	<option value="{{$cat->id}}" {{($cat->id == $id_categoria) ? 'selected': ''}}>{{$cat->categoria}}</option>
                                          @endforeach                                              
                                        </select>
									</div> 
                                </div>
                                
                              
                                <div class="col-4 mb-3">
                                        <label class="text-label">Unidade </label>
                                        <select class="form-campo" name="unidade" id="unidade" onchange="mostrarUnidade()">
                                            @foreach($unidades as $unidade)
                                          	<option value="{{$unidade}}">{{$unidade}}</option>
                                          @endforeach 
									   </select>
                                </div> 
                                
                                 
                                
                                <div class="col-4 mb-3">
                                        <label class="text-label">Origem </label>
                                        <select class="form-campo" name="origem">
                                            @foreach(ConstanteService::listaOrigem() as $chave=>$valor)
                                          	<option value="{{$chave}}">{{$chave}} - {{$valor}}</option>
                                          @endforeach 
									   </select>
                                </div>  
                                
            					           					           					
            					                
                                <div class="col-2 mb-3">
                                        <label class="text-label">Estoque Inicial</label>
                                        <input type="text" name="estoque_inicial" id="estoque_inicial"  value="0"  class="form-campo mascara-float">
                                </div>
                                <div class="col-2 mb-3">
                                        <label class="text-label">Estoque Máximo</label>
                                        <input type="text" name="estoque_maximo" id="estoque_maximo" value="100"  class="form-campo mascara-float">
                                </div>
                                <div class="col-2 mb-3">
                                        <label class="text-label">Estoque Mínimo</label>
                                        <input type="text" name="estoque_minimo" id="estoque_minimo"  value="5"  class="form-campo mascara-float">
                                </div>
                                
                                <div class="col-2 mb-3">
                                	<label class="text-label">Preço Custo<span class="text-vermelho">*</span></label>
                                	<input type="text" name="valor_custo" id="valor_custo" onkeyup="calcularPreco()" required value="{{isset($produto->valor_custo) ? $produto->valor_custo : old('valor_custo')}}"  class="form-campo  mascara-float">
                                </div>
        				   
        				   		<div class="col-2 mb-3">
                                        <label class="text-label">Preço Venda<span class="text-vermelho">*</span></label>
                                        <input type="text" name="valor_venda" id="valor_venda" onkeyup="calcularPreco()" required value="{{isset($produto->valor_venda) ? $produto->valor_venda : old('valor_venda')}}"  class="form-campo  mascara-float">
                                </div> 
                                
                               
                                
                                 
                                
                                
                        </div>	     					           					
    	<div class="rows">
        <div class="col-12">
        	<fieldset>
			<legend>Fragmentação</legend>	
				   <div class="rows">				   
				   		<div class="center-middle col-3 d-flex justify-content-center mb-3">
							<div class="width-100 border p-3 radius-4">
								<strong class="text-label text-right h5 mb-0">1 <span id="txt_unidade" class="text-vermelho"></span> =  </strong>
							</div>
					</div>
                        
				   
				   		<div class="col-2 mb-3">
                                <label class="text-label">Quantidade</label>
                                <input type="text" name="fragmentacao_qtde" id="fragmentacao_qtde"   value="{{$produto->fragmentacao_qtde ?? old('fragmentacao_qtde')}}"  class="form-campo  mascara-float">
                        </div>                        
                        
                        <div class="col-4 mb-3">
                                <label class="text-label">Unidade </label>
                                <select class="form-campo" name="fragmentacao_unidade" id="fragmentacao_unidade">
                                <option value="">Selecione</option>
                                    @foreach($unidades as $unidade)
                                  	<option value="{{$unidade}}">{{$unidade}}</option>
                                  @endforeach 
							   </select>
                        </div>
                        
                        <div class="col-2 mb-3">
                                <label class="text-label">Valor da Venda</label>                                
                                <input type="text" name="fragmentacao_valor" id="fragmentacao_valor" value="{{ $produto->fragmentacao_valor ?? old('fragmentacao_valor')}}"  class="form-campo  mascara-float">
                        </div> 				                                  
						                            
				</div>
			</fieldset>
            </div>                  
         </div> 
         </div>
		 <div class="tfooter end">
			<a href="" class="btn btn-neutro fechar">Fechar</a>
            <input type="hidden" id="nfe_item_temp_id"  >
			<input type="button" onclick="salvarCompleto()" name="" class="btn btn-azul border-bottom" value="Cadastrar">  
		 </div>
	</div>
</div>