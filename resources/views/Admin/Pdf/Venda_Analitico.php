<?php
$logo =  url('assets/admin/img/logo-login.png');
$style='<html lang="pt-br">
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
			.lista td{padding:4px;font-size:11px}
			.lista td p{padding:1px 4px;font-size:12px}
			
			.footer{position:fixed;bottom:-28px;width:740px;left:26px;}
			.footer td b{padding:6px;display:block}
			.thead th{color:#111;padding:4px!importan;background:#ddd!important;border:0;font-size:13px!important}
			.
			
			.border-top{border-top:solid 1px #444!important}
			.border-bottom{border-bottom:solid 1px #444!important}
			.border-left{border-left:solid 1px #444!important}
			.border-right{border-right:solid 1px #444!important}
			.comentario-txt p {margin-bottom:1rem;page-break-inside: avoid}
			.cabecalho th{padding:5px 5px}
			
			.fotos img{width:100%;height:210px}
			.fotos td{padding:0rem;}
			.fotos .comentario{display:block;padding:10px;margin-bottom:8px;border:solid 1px #111;min-height:60px}
			.fotos .comentario h4,
			.fotos .comentario p{margin:0;padding:0;display:block}
			.fotos .comentario h4{padding-top:0px;font-size:14px;padding-bottom:4px;display:block}
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
	</head>';
$head='	
<body>
<div id="head" class="head">
		<table border="1" cellpadding="0" cellspacing="0" width="100%" class="border">
			<thead>
				<tr> 
					<th width="164" height="70" style="padding:10px"><img src="'.$logo.'" height="70"></th>
					<th style="vertical-align:middle">
						<table cellpadding="0" cellspacing="0" width="100%" border="0">
							<tr>
								<th align="left" class="border-bottom">
									<h1>Sistema ERP - Athenas</h1>
								</th>
							</tr>
							<tr>
								<th align="left" style="padding-top:4px">
									<small class="d-block" >CNPJ: 31.696.302/0001-70</small>
								</th>
							</tr>
							<tr>
								<th align="left" class="">
									<small class="d-block" > AV. JERONIMO DE ALBUQUERQUE, N. 14 - VINHAIS</small>
								</th>
							<tr>
							</tr>
							<tr>
								<th align="left" class="">
									<small class="d-block" > SAO LUIS-MA</small>
								</th>
							</tr>
							<tr>
								<th align="left"  style="padding-bottom:4px;position:relative">
									<small class="d-block" >Tel: (98)3304-4200</small>
									
									<div class="data">
										'. date("d/m/Y").'<br>
										'.agora().'
									</div>
								</th>								
							</tr>
						</table>
					</th>
				</tr>
			</thead>
			</table>
			
		</div>
';



$body='
	<div class="corpo">
		<div class="lista">

        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
				<thead>
					<tr> 
						<th colspan="6" class="border-bottom" style="text-transform:uppercase;padding:15px 4px;font-size:16px">RELATÓRIO ANALÍTICO DE VENDAS  <br> <small>PERÍODO:  '.databr($filtro->data1).' a '.databr($filtro->data2).'</small></th>
					</tr>					
				</thead>				
				
			</table>

            ';
            $tab = "";
                $total_geral = 0;
              
                foreach($lista as $v){
                    $tab.='
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
				<thead>
					<tr class="thead"> 
						<th align="left">Vendedor: '.$v->usuario->name.' Cliente: '.$v->cliente->nome_razao_social.' <br><small style="font-weight:inherit">MOV. Nº '.zeroEsquerda($v->id,5).'</small></th> 
						<th align="right" colspan="4">EM '.databr($v->data_venda).'</th> 
					</tr>
				</thead>				
				<tbody class="tbody thead">
                    <tr> 			
						<td align="left" class="border-right border-top"><p><small style="font-size:9px;font-weight:bold">PRODUTO</small> </td>								 
						<td align="center" class="border-right border-top"><p><small style="font-size:9px;font-weight:bold">UND.</small> </td>	
                        <td align="center" class="border-right border-top"><p><small style="font-size:9px;font-weight:bold">QTD.</small> </td>							 
						<td align="center" class="border-right border-top"><p><small style="font-size:9px;font-weight:bold">P.UNIT <br></small> </td>								 
						<td align="center" class="border-right border-top"><p><small style="font-size:9px;font-weight:bold">TOTAL</small> </td>								 
					</tr>';
                    
                    $soma = 0;
                    foreach($v->itens as $i){
                        $soma += $i->subtotal;
                        
                    $tab.=' <tr> 			
						<td align="left" class="border-right border-top"><p>'.zeroEsquerda($i->produto_id,4) .' - '. $i->produto->nome .'</p></td>	
                        <td align="center" class="border-right border-top"><p>'. $i->unidade . '</p></td>							 
						<td align="center" class="border-right border-top"><p>'. formataNumeroBr($i->quantidade) .'</p></td>								 
						<td align="center" class="border-right border-top"><p>'. formataNumeroBr($i->valor,2) .'</p></td>								 
						<td align="center" class="border-right border-top"><p> '. formataNumeroBr($i->subtotal,2) .'</p></td>								 
					</tr>';
                    }
                    $total_geral += $soma;
                    $tab.='
					<tr>								 
						<td align="right" colspan="4" class="border-top">
							<p>TOTAL:</p>
						</td>							 
						<td align="center" class="border-right border-top">
							<p> <b>'.formataNumeroBr($soma).'</b></p>
						</td>								 
					</tr>																	
					
				</tbody>
			</table>';
                    }
					$tab.='
			
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="border" style="margin-top:8px">
				
				<tr>								 
					<td align="right" colspan="5" class="border-top">
						<p>TOTAL GERAL : </p>
					</td>							 
					<td align="left" class="border-right border-top">
						<p>Qtde Vendas:'.count($lista).'</b> Total: <b>'.formataNumeroBr($total_geral).'</b></p>
					</td>								 
				</tr>
			</table>
		</div>
	</div>

</body>
</html>
';

//concatenando as variáveis
$html = $style.$head.$body.$tab;

//gerando o pdf
	 $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'); 
	//echo $html;
	//exit;
    $dompdf->loadHtml($html);
    $dompdf->setPaper("a4","portrait");
    $dompdf->render();
    $color = array(0, 0, 0);
    $font = null;
    $size = 10;
    $canvas = $dompdf->get_canvas();
   // $canvas->page_text(532, 815, "Pág: {PAGE_NUM} / {PAGE_COUNT}", $font, $size, $color);
    $dompdf->stream();
	
?>