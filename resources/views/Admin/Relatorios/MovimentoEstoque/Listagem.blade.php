<?php $logo = 'https://erpmjailton.com.br/assets/img/logo-login.png';?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">	
		<style>
			*{font-family:arial,sans-serif;font-size:12px;padding:0;margin:0}
				@page {
						margin-top:160px!important;
						margin-bottom: 80px!important;
					}
				
			.corpo{width:740px;margin:0 auto;}
			table{width:100%}
			.corpo .tt-topo{font-size:16px;padding:1rem 0;text-transform:uppercase}
			#head{position:fixed;width:740px;left:26px;right:4px;top:-123px;}
			.head h1{font-size:18px;display:block;padding:8px;text-transform:uppercase}
			.head small{font-size:.85rem;display:block;padding:2px 8px;font-weight:inherit}
			.head p{font-size:.95rem;display:block;padding-bottom:4px;padding-top:3px}
			.head h5{font-size:1rem;padding-bottom:5px;padding-top:0}
			.lista{margin-bottom:1rem}
			.lista .thead th{padding:10px;font-size:18px;}
			.lista td{padding:4px;font-size:9px}
			.lista td p{padding:4px;font-size:9px}
			
			.footer{position:fixed;bottom:-28px;width:740px;left:26px;}
			.footer td b{padding:6px;display:block}
			.thead th{color:#111;padding:4px!importan;background:#ddd!important;border:0;font-size:11px!important}			
			
			.border-top{border-top:solid 1px #444!important}
			.border-bottom{border-bottom:solid 1px #444!important}
			.border-left{border-left:solid 1px #444!important}
			.border-right{border-right:solid 1px #444!important}
			.comentario-txt p {margin-bottom:1rem;page-break-inside: avoid}
			.cabecalho th{padding:5px 5px}
			
				input[type="checkbox"]:before{font-family:"DejaVu Sans"; }
				input[type="radio"]:before{font-family:"DejaVu Sans"; }
				.altura{
					height:42px
				}
			.border{border:solid 1px #000;}
			.border-bottom{border-bottom:solid 1px #000;}
			.border-left{border-left:solid 1px #000;}
			.border-right{border-right:solid 1px #000;}
			.border-top{border-top:solid 1px #000;}
			
			.tab,.tab .cell{width:100%;float:left;}
			.tab .col{width:50%;float:left;}
			.data{position:absolute;right:5px;top:-28px;padding:8px;text-align:right}
		</style>				 
	</head>
<body>
<div id="head" class="head">
		<table border="1" cellpadding="0" cellspacing="0" width="100%" class="border">
			<thead>
				<tr> 
					<th width="164" height="70" style="padding:10px"><img src="<?php echo $logo?>" height="70"></th>
					<th style="vertical-align:middle">
						<table cellpadding="0" cellspacing="0" width="100%" border="0">
							<tr>
								<th align="left" class="border-bottom">
									<h1>Sistema ERP - Athenas</h1>
								</th>
							</tr>
							<tr>
								<th align="left" style="padding-top:4px">
									<small class="d-block" >CNPJ: {{$usuario->empresa->cpf_cnpj}}</small>
								</th>
							</tr>
							<tr>
								<th align="left" class="">
									<small class="d-block" > {{$usuario->empresa->logradouro}}, {{$usuario->empresa->numero}} - {{$usuario->empresa->complemento}}</small>
								</th>
							<tr>
							</tr>
							<tr>
								<th align="left" class="">
									<small class="d-block" > {{$usuario->empresa->cidade}} - {{$usuario->empresa->uf}}</small>
								</th>
							</tr>
							<tr>
								<th align="left"  style="padding-bottom:4px;position:relative">
									<small class="d-block" >Tel: {{$usuario->empresa->fone}}</small>
									
									<div class="data">
										{{date("d/m/Y H:i:s")}}<br>
										usuario: {{$usuario->name}}
									</div>
								</th>								
							</tr>
						</table>
					</th>
				</tr>
			</thead>
		</table>			
	</div>

	<div class="corpo">
		<div class="lista">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
				<thead>
					<tr> 
						<th colspan="8" class="border-bottom" style="text-transform:uppercase;padding:15px 4px;font-size:16px">RELATORIO  DE MOVIMENTOS</th>
					</tr>
					<tr class="thead"> 
						  <th align="center" class="border-bottom">Id</th>
                          <th align="center" class="border-bottom">Data</th>
                          <th align="left" class="border-bottom">Produto</th>
                          <th align="center" class="border-bottom">Valor</th>
                          <th align="center" class="border-bottom">qtde</th>
                          <th align="center" class="border-bottom">Subtotal</th>
                          <th align="center" class="border-bottom">Tipo</th>
                          <th align="center" class="border-bottom">Descrição</th>
                                  						
					</tr>
				</thead>
                                       
				<tbody class="tbody thead">	
				@foreach($lista as $m)	
					<tr style="text-transform:uppercase">
						<td class="border-bottom" align="center">{{$m->id}}</td>
						<td class="border-bottom" align="center">{{databr($m->data_movimento)}}</td>
						<td class="border-bottom" align="center">{{$m->produto->nome ?? "--"}}</td> 
						<td class="border-bottom" align="center">{{$m->valor_movimento}}</td>											
						<td class="border-bottom" align="center">{{$m->qtde_movimento}}</td>											
						<td class="border-bottom" align="center">{{$m->subtotal_movimento}}</td>											
						<td class="border-bottom" align="center">{{$m->tipoMovimento->tipo_movimento ?? "--"}}</td>											
						<td class="border-bottom" align="center">{{$m->descricao}}</td>
									
                                      			
					</tr>
				@endforeach
									
				</tbody>
			</table>
			
		</div>
	</div>

</body>
</html>

	