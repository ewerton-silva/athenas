@extends("Admin.template")
@section("conteudo")
<div class="col-9 central mb-3">
<div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
	<span class="d-flex center-middle"><i class="far fa-list-alt mr-1"></i> Meus dados </span>
	<div>
		<a href="{{route('admin.usuario.index')}}" class="btn btn-azul btn-pequeno d-inline-block"><i class="fas fa-arrow-left"></i>  Voltar</a>
	
	</div>
</div>                      
  
   <form action="{{route('admin.usuario.update', $usuario->id)}}" method="POST">
   <input name="_method" type="hidden" value="PUT"/>

  
	@csrf
		<div class="p-2 mt-4">
				<div class="rows">					
					
						 <div class="col-8 m-auto px-2">
						 <div class="border radius-4 p-2">
                           <div class="rows">
								<div class="col-4 mb-3 text-center">
								<label class="banner-thumb">
								@php
									$img = isset($usuario->foto) ? $usuario->foto : "img-usuario.svg" 
								@endphp
									<img src="{{asset('storage/upload/img_perfil/' . $img)}}" class="img-fluido" id="imgUp">
									<input type="file" name="file" id="img_perfil" onChange="valida_imagem('img_perfil')" class="d-none">

									<span>Carregar imagem</span>
								</label>
								</div>
							
                           <div class="col-8">
							   <div class="rows">
									<div class="col-12 mb-3">
											<label class="text-label">Nome</label>
											<input type="text" name="name" value="{{isset($usuario->name) ? $usuario->name : old('name')}}"  class="form-campo">
									</div>
									
									<div class="col-12 mb-3">
											<label class="text-label">Email</label>
											<input type="text" name="email" value="{{isset($usuario->email ) ? $usuario->email  : old('email ')}}"  class="form-campo">
									</div>
									<div class="col-6 mb-3">
											<label class="text-label">Senha</label>
											<input type="password" name="password"  class="form-campo">
									</div>
									<div class="col-6 mb-3">
											<label class="text-label">Telefone</label>
											<input type="text" name="telefone" value="{{isset($usuario->telefone) ? $usuario->telefone : old('telefone')}}"  class="form-campo">
									</div>
									 
                                         
									<div class="col-12 text-center pb-4">	
										<input type="hidden" name="senha" value="{{$usuario->password}}">									
										<input type="submit" value="Salvar" class="btn btn-azul m-auto">
									</div>									
								</div>     	
                            </div>     	
                        </div>			
                           
                        </div>
                        </div>
				</div>	 
		</div>
</form>		
	  </div>
	


<script>
function upload_banner(){
	var data 	 = new FormData();	
	var arquivos = $('#img_perfil')[0].files;
	var id = $('#id').val();
	
	if(arquivos.length > 0) {		
		data.append('file', arquivos[0]);
		data.append('id', id);
		
		$.ajax({
			type:'POST',
			url:base_url + 'lojaadmin/lojaproduto/salvarImagemJs',
			data:data,
			contentType:false,
			processData:false,
			dataType: "json",
			beforeSend: function(){
				$('#uploadStatus').html('<img src=' + base_url + '"assets/img/loading.gif"/>');
			},
            error:function(){
                alert("erro");
            },
			success:function(data){	
				lista_imagem(data);
			}
		});
	}
}

function lista_imagem(data){
	html="";
	for(var i in data){
	var path = base_url + 'storage/upload/' + $('#cnpj').val() +'/imagens_produtos/' + data[i].img;	   
	html +='<div class="col-3 mb-3">'+
		'<div class="banner-thumb">'+
			'<img src="' + path + '" class="img-fluido">'+
		'</div>'+
	'</div>';
	}
			   
   $("#lista_imagens").html(html);
}

</script>
@endsection