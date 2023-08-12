@extends("Admin.template")
@section("conteudo")
<div class="col-9 central mb-3">
  <div class="p-2 py-1 bg-title text-light text-uppercase d-flex justify-content-space-between center-middle">
		<span class=" h5 mb-0 "><i class="fas fa-plus-circle"></i> Cadastrar Venda Recorrente</span>
		<div>
			<a href="{{route('admin.vendarecorrente.index')}}" class="btn btn-azul d-inline-block btn-pequeno" title="Voltar"><i class="fas fa-arrow-left"></i> </a>	
			<a href="" class="retorna btn btn-roxo btn-pequeno ml-1 d-inline-block" title="Menu"><i class="fas fa-bars"></i></a>			
		</div>
	</div>                 
 @if(isset($vendarecorrente))    
   <form action="{{route('admin.vendarecorrente.update', $vendarecorrente->id)}}" method="POST">
   <input name="_method" type="hidden" value="PUT"/>
 @else                       
	<form action="{{route('admin.vendarecorrente.store')}}" method="Post">
@endif
	@csrf
   <div id="tab">
	  
	  <div id="tab-1">
		<div class="p-2 mt-1">
			
			<fieldset>
				<legend>Informações básicas</legend>
				
				<div class="rows">
					<div class="col-2 mb-3">
							<label class="text-label">Data Cadastro</label>	
							<input type="date" name="data_contrato"  value="{{isset($vendarecorrente->data_contrato) ? $vendarecorrente->data_contrato : hoje() }}"  class="form-campo ">
					</div>
					                    
                    <div class="col-4 mb-3">
							<label class="text-label"  >Cliente<span class="text-vermelho">*</span></label>	
							<select name="cliente_id" class="form-campo">
								@foreach($clientes as $v)
									<option value="{{$v->id}}">{{$v->nome_razao_social}}</option>
								@endforeach
							</select>
					</div>
																	
					<div class="col-4 mb-3">
							<label class="text-label">Produto Recorrente<span class="text-vermelho">*</span></label>						
							<select name="produto_recorrente_id" class="form-campo">							
								@foreach($produtos as $r)
									<option value="{{$r->id}}">{{$r->descricao}}  - R$ {{$r->valor}} </option>
								@endforeach
							</select>
					
					</div>  
					<div class="col-2 mb-3">
						<label class="text-label">Tipo Recorrencia<span class="text-vermelho">*</span></label>						
						<select name="tipo_cobranca_id" class="form-campo">							
							@foreach($tipos as $t)
								<option value="{{$t->id}}" {{$t->qtde_dias==30 ? 'selected' : ''}}>{{$t->tipo_cobranca}}</option>
							@endforeach
						</select>					
					</div>
					                                  
					<div class="col-2 mb-3">
							<label class="text-label">Primeiro Vencimento</label>	
							<input type="date" name="primeiro_vencimento" required value="{{isset($vendarecorrente->primeiro_vencimento) ? $vendarecorrente->primeiro_vencimento : hoje() }}"  class="form-campo ">
					</div>				
													
					<div class="col-2 mb-3">
							<label class="text-label">Valor Primeira Parcela</label>	
							<input type="text" name="valor_primeira_parcela" required  value="{{isset($vendarecorrente->valor_primeira_parcela) ? $vendarecorrente->valor_primeira_parcela : old('valor_primeira_parcela') }}"  class="form-campo mascara-float">
					</div>					
					
					<div class="col-2 mb-3">
							<label class="text-label">Valor Recorrente</label>	
							<input type="text" name="valor_recorrente" required value="{{isset($vendarecorrente->valor_recorrente) ? $vendarecorrente->valor_recorrente : old('valor_recorrente') }}"  class="form-campo mascara-float">
					</div>
					
					<div class="col-2 mb-3">
							<label class="text-label">Qtde Cobrança</label>	
							<input type="number" name="qtde" required value="12"  class="form-campo mascara-float">							
					</div>		
					
				</div>
			</fieldset>
			
			
		</div>
	  </div>
	  
	  
		<div class="col-12 text-center pb-4">
			<input type="submit" value="Salvar" class="btn btn-azul m-auto">
		</div>
	  </div>
	
</form>
</div>
  @include ("Admin.Cadastro.Cliente.modal.modalCadastroCliente")
<script>
	function tipoCliente(){
		var tp = $("#tipo_cliente").val();
		
		if(tp=="F"){
			$("#div_pesquisar").hide();
            $("#div_tipo_contribuinte").hide();
            $("#divIscEstadual").hide();
            $("#divSuframa").hide();
            $("#divFantasia").hide();
            
            $("#lblInscEstadual").html("RG");
            $("#lblCnpj").html('CPF');
            $("#lblRazaoSocial").html('Nome');
            $("#cnpj").mask('000.000.000-00', {reverse: true});
       
            
		}else{
			$("#div_pesquisar").show();
            $("#div_tipo_contribuinte").show();
            $("#divIscEstadual").show();
            $("#divSuframa").show();
            $("#divFantasia").show();
            
            $("#lblInscEstadual").html("Inscrição Estadual");
            $("#lblCnpj").html('CNPJ');
            $("#lblRazaoSocial").html('Razão Social');
            $("#cnpj").mask('00.000.000/0000-00', {reverse: true});
          
		}
	}
</script>
@endsection