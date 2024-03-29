<?php
/**
 * 	@author Solluzi Tecnologia
 * 	@data 20/12/2014
 *
 *	Este layout é especificamente utilizado para o boleto do santander, como o nome já sugere
 */
?>

<!DOCTYPE HTML PUBLIC '-//W3C//Dtd HTML 4.0 transitional//EN'>
<HTML>
	<HEAD>
		<TITLE><?php echo $dadosboleto["identificacao"]; ?></TITLE>
		<META http-equiv=Content-Type content=text/html charset=UTF-8>
		<style type=text/css>
		<!--
		html, body {height: 100%;}
		html {
			display: table;
    		margin: auto;
		}

		body {
    		display: table-cell;
    		vertical-align: middle;
		}

		.cp {
			font: bold 12px Arial;
			color: black
		}

		<!--
		.ti {font: 9px Arial, Helvetica, sans-serif}

		<!--
		.ld {
			font: bold 15px Arial;
			color: #000000
		}
		
		.d {border-bottom: solid;}

		<!--
		.ct {
			font: 9px "Arial Narrow";
			COLOR: #000033
		}

		<!--
		.cn {
			font: 9px Arial;
			COLOR: black
		}

		<!--
		.bc {
			font: bold 20px Arial;
			color: #000000
		}

		<!--
		.ld2 {
			font: bold 12px Arial;
			color: #000000
		}
		-->
	</style>
</head>

<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0>
	<table width=666 cellspacing=0 cellpadding=0 border=0>
		<tr>
			<td valign=top class=cp><div align="center">Instruções de Impressão</div></td>
		</tr>
		<tr>
			<td valign=top class=cp>
				<div align="left">
					<p>
						Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta (Não use modo econômico).<br>					
						Utilize folha A4 (210 x 297 mm) - Corte na linha indicada.
					</p>
				</div>
			</td>
		</tr>
	</table>
	<br>
	<table cellspacing=0 cellpadding=0 width=666 border=0>
		<tbody>
			<tr>
				<td class=ct width=666><img height=1 src=<?php echo base_url();?>imagens/6.png width=665 border=0></td>
			</tr>
			<tr>
				<td class=ct width=666><div align=right><b class=cp>Recibo do Sacado</b></div></td>
			</tr>
		</tbody>
	</table>
	<table width=666 cellspacing=5 cellpadding=0 border=0>
		<tr>
			<td width=41></td>
		</tr>
	</table>
	
	<table cellspacing=0 cellpadding=0 width=666 border=0>
		<tr>
			<td class=cp width=150>
				<span class="campo">
					<img src="<?php echo base_url();?>imagens/logosantander.jpg" width="140" height="37" border=0>
				</span>
			</td>
			<td width=3 valign=bottom>
				<img height=22 src=<?php echo base_url();?>imagens/3.png width=2 border=0>
			</td>
			<td class=cpt width=58 valign=bottom>
				<div align=center>
					<font class=bc><?php echo $dadosboleto["codigo_banco_com_dv"]?></font>
				</div>
			</td>
			<td width=3 valign=bottom>
				<img height=22 src=<?php echo base_url();?>imagens/3.png width=2 border=0>
			</td>
			<td class=ld align=right width=453 valign=bottom>
				<span class=ld> 
					<span class="campotitulo"><?php echo $dadosboleto["linha_digitavel"]?></span>
				</span>
			</td>
		</tr>
		<tbody>
			<tr>
				<td colspan=5><img height=2 src=<?php echo base_url();?>imagens/2.png width=666 border=0></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 border=0>
		<tbody>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=298 height=13>Cedente</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=126 height=13>Agência/Código do Cedente</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=34 height=13>Espécie</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=53 height=13>Quantidade</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=120 height=13>Nosso número</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=298 height=12><span class="campo"><?php echo $dadosboleto["cedente"]; ?></span></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=126 height=12>
					<span class="campo"> 
						<?php 
							$tmp2 = $dadosboleto["codigo_cliente"];
							$tmp2 = substr($tmp2,0,strlen($tmp2)-1).'-'.substr($tmp2,strlen($tmp2)-1,1);
						?> 
						<?php echo $dadosboleto["ponto_venda"]." <img src='<?php echo base_url();?>imagens/b.png' width=10 height=1> ".$tmp2?>
					</span>
				</td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=34 height=12><span class="campo"><?php echo $dadosboleto["especie"]?></span></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=53 height=12><span class="campo"><?php echo $dadosboleto["quantidade"]?></span></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top align=right width=120 height=12>
					<span class="campo"> 
						<?php 
							$tmp = $dadosboleto["nosso_numero"]; 
							$tmp = substr($tmp,0,strlen($tmp)-1).'-'.substr($tmp,strlen($tmp)-1,1);
     						print $tmp; 
     					?>
					</span>
				</td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=298 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=298 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=126 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=126 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=34 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=34 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=53 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=53 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=120 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=120 border=0></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 border=0>
		<tbody>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top colspan=3 height=13>Número do documento</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=132 height=13>CPF/CNPJ</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=134 height=13>Vencimento</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>Valor documento</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top colspan=3 height=12><span class="campo"> <?php echo $dadosboleto["numero_documento"]?></span></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=132 height=12><span class="campo"> <?php echo $dadosboleto["cpf_cnpj"]?> </span></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=134 height=12><span class="campo"> <?php echo $dadosboleto["data_vencimento"]?></span></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12><span class="campo"> <?php echo $dadosboleto["valor_boleto"]?></span></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=113 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=113 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=72 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=72 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=132 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=132 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=134 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=134 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=180 border=0></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 border=0>
		<tbody>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=113 height=13>(-) Desconto / Abatimentos</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=112 height=13>(-) Outras deduções</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=113 height=13>(+) Mora / Multa</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=113 height=13>(+) Outros acréscimos</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(=) Valor cobrado</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top align=right width=113 height=12></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top align=right width=112 height=12></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top align=right width=113 height=12></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top align=right width=113 height=12></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=113 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=113 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=112 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=112 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=113 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=113 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=113 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=113 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=180 border=0></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 border=0>
		<tbody>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=659 height=13>Sacado</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=659 height=12><span class="campo"><?php echo $dadosboleto["sacado"]?>
				</span></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=659 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=659 border=0></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 border=0>
		<tbody>
			<tr>
				<td class=ct width=7 height=12></td>
				<td class=ct width=564>Demonstrativo</td>
				<td class=ct width=7 height=12></td>
				<td class=ct width=88>Autenticação mecánica</td>
			</tr>
			<tr>
				<td width=7></td>
				<td class=cp width=564>
					<span class="campo"> 
						<?php echo $dadosboleto["demonstrativo1"]?><br>
						<?php echo $dadosboleto["demonstrativo2"]?><br> 
						<?php echo $dadosboleto["demonstrativo3"]?><br>
					</span>
				</td>
				<td width=7></td>
				<td width=88></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 width=666 border=0>
		<tbody>
			<tr>
				<td width=7></td>
					<td width=500 class=cp><br><br><br>
				</td>
				<td width=159></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 width=666 border=0>
		<tr>
			<td class=ct width=666></td>
		</tr>
		<tbody>
			<tr>
				<td class=ct width=666>
					<div align=right>Corte na linha pontilhada</div>
				</td>
			</tr>
			<tr>
				<td class=ct width=666><img height=1 src=<?php echo base_url();?>imagens/6.png width=665 border=0></td>
			</tr>
		</tbody>
	</table>
	<br>
	<table cellspacing=0 cellpadding=0 width=666 border=0>
		<tr>
			<td class=cp width=150><span class="campo"><img src="<?php echo base_url();?>imagens/logosantander.jpg" width="140" height="37" border=0></span></td>
			<td width=3 valign=bottom><img height=22 src=<?php echo base_url();?>imagens/3.png width=2 border=0></td>
			<td class=cpt width=58 valign=bottom>
				<div align=center>
					<font class=bc><?php echo $dadosboleto["codigo_banco_com_dv"]?></font>
				</div>
			</td>
			<td width=3 valign=bottom><img height=22 src=<?php echo base_url();?>imagens/3.png width=2 border=0></td>
			<td class=ld align=right width=453 valign=bottom>
				<span class=ld><span class="campotitulo"><?php echo $dadosboleto["linha_digitavel"]?></span></span>
			</td>
		</tr>
		<tbody>
			<tr>
				<td colspan=5><img height=2 src=<?php echo base_url();?>imagens/2.png width=666 border=0></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 border=0 width=666 class="d">
		<tr>
			<td>
				<center><b>BOLETO DE PROPOSTA</b></center>
<h5>ESTE BOLETO SE REFERE A UMA PROPOSTA JÁ FEITA A VOCÊ E O SEU PAGAMENTO
NÃO É OBRIGATÓRIO.<br>
Deixar de pagá-lo não dará causa a protesto, a cobrança judicial ou extrajudicial, nem a
inserção de seu nome em cadastro de restrição ao crédito.<br>
Pagar até a data de vencimento significa aceitar a proposta.<br>
Informações adicionais sobre a proposta e sobre o respectivo contrato poderão ser solicitadas
a qualquer momento ao beneficiário, por meio de seus canais de atendimento.</h5>
				
			</td>
		</tr>
	</table> 
	<table cellspacing=0 cellpadding=0 border=0>
		<tbody>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=472 height=13>Local de pagamento</td>
				<td class=ct valign=top width=7 height=13><img height=13	src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>Vencimento</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=472 height=12>PAGAR PREFERENCIALMENTE NO BANCO SANTANDER</td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12>
					<span class="campo"> <?php echo $dadosboleto["data_vencimento"]?></span>
				</td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=472 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=472 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=180 border=0></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 border=0>
		<tbody>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=472 height=13>Cedente</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>Ponto Venda / Ident. cedente</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=472 height=12><span class="campo"> <?php echo $dadosboleto["cedente"]?></span></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12>
					<span class="campo"> 
						<?php 
							$tmp2 = $dadosboleto["codigo_cliente"];
							$tmp2 = substr($tmp2,0,strlen($tmp2)-1).'-'.substr($tmp2,strlen($tmp2)-1,1);
						?> 
						<?php echo $dadosboleto["ponto_venda"]." <img src='<?php echo base_url();?>imagens/b.png' width=10 height=1> ".$tmp2?>
					</span>
				</td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=472 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=472 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=180 border=0></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 border=0>
		<tbody>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=113 height=13>Data do documento</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=153 height=13>N<u>o</u> documento</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=62 height=13>Espécie doc.</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=34 height=13>Aceite</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=72 height=13>Data processamento</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>Nosso número</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=113 height=12>
					<div align=left>
						<span class="campo"><?php echo $dadosboleto["data_documento"]?></span>
					</div>
				</td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=153 height=12><span class="campo"><?php echo $dadosboleto["numero_documento"]?></span></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=62 height=12>
					<div align=left><span class="campo"> <?php echo $dadosboleto["especie_doc"]?></span></div>
				</td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=34 height=12>
					<div align=left>
						<span class="campo"><?php echo $dadosboleto["aceite"]?></span>
					</div>
				</td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=82 height=12>
					<div align=left><span class="campo"> <?php echo $dadosboleto["data_processamento"]?></span></div>
				</td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12><span class="campo"> <?php echo $tmp; ?></span></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=113 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=113 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=153 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=153 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=62 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=62 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=34 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=34 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=82 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=82 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=180 border=0></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 border=0>
		<tbody>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top colspan="5" height=13>Carteira</td>
				<td class=ct valign=top height=13 width=7><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=53 height=13>Espécie</td>
				<td class=ct valign=top height=13 width=7><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=123 height=13>Quantidade</td>
				<td class=ct valign=top height=13 width=7><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=70 height=13>Valor Documento</td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(=) Valor documento</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td valign=top class=cp height=12 COLSPAN="5"><div align=left></div>
					<div align=left>
						<span class="campo"> <?php echo $dadosboleto["carteira_descricao"]?></span>
					</div>
				</td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=53>
					<div align=left>
						<span class="campo"> <?php echo $dadosboleto["especie"]?></span>
					</div>
				</td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=123><span class="campo"><?php echo $dadosboleto["quantidade"]?></span></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=70><span class="campo"><?php echo $dadosboleto["valor_unitario"]?></span></td>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12><span class="campo"> <?php echo $dadosboleto["valor_boleto"]?></span></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=75 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=31 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=31 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=83 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=83 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=53 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=53 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=123 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=123 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=72 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=72 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=180 border=0></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 width=666 border=0>
		<tbody>
			<tr>
				<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>
						<tbody>
							<tr>
								<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
							</tr>
							<tr>
								<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
							</tr>
							<tr>
								<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=1 border=0></td>
							</tr>
						</tbody>
					</table></td>
				<td valign=top width=468 rowspan=5>
					<font class=ct>Instruções (Texto de responsabilidade do cedente)</font><br> <br> 
						<span class=cp> 
							<font class=campo> 
								<?php echo $dadosboleto["instrucoes1"]; ?><br> 
								<?php echo $dadosboleto["instrucoes2"]; ?><br>
								<?php echo $dadosboleto["instrucoes3"]; ?><br> 
								<?php echo $dadosboleto["instrucoes4"]; ?>
							</font><br> <br>
						</span>
				</td>
				<td align=right width=188>
					<table cellspacing=0 cellpadding=0 border=0>
						<tbody>
							<tr>
								<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
								<td class=ct valign=top width=180 height=13>(-) Desconto / Abatimentos</td>
							</tr>
							<tr>
								<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
								<td class=cp valign=top align=right width=180 height=12></td>
							</tr>
							<tr>
								<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
								<td valign=top width=180 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=180 border=0></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td align=right width=10>
					<table cellspacing=0 cellpadding=0 border=0 align=left>
						<tbody>
							<tr>
								<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
							</tr>
							<tr>
								<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
							</tr>
							<tr>
								<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=1 border=0></td>
							</tr>
						</tbody>
					</table>
				</td>
				<td align=right width=188>
					<table cellspacing=0 cellpadding=0 border=0>
						<tbody>
							<tr>
								<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
								<td class=ct valign=top width=180 height=13>(-) Outras deduções</td>
							</tr>
							<tr>
								<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
								<td class=cp valign=top align=right width=180 height=12></td>
							</tr>
							<tr>
								<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
								<td valign=top width=180 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=180 border=0>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td align=right width=10>
					<table cellspacing=0 cellpadding=0 border=0 align=left>
						<tbody>
							<tr>
								<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
							</tr>
							<tr>
								<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
							</tr>
							<tr>
								<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=1 border=0></td>
							</tr>
						</tbody>
					</table>
				</td>
				<td align=right width=188>
					<table cellspacing=0 cellpadding=0 border=0>
						<tbody>
							<tr>
								<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
								<td class=ct valign=top width=180 height=13>(+) Mora / Multa</td>
							</tr>
							<tr>
								<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
								<td class=cp valign=top align=right width=180 height=12></td>
							</tr>
							<tr>
								<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
								<td valign=top width=180 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=180 border=0>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td align=right width=10>
					<table cellspacing=0 cellpadding=0 border=0 align=left>
						<tbody>
							<tr>
								<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
							</tr>
							<tr>
								<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
							</tr>
							<tr>
								<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=1 border=0></td>
							</tr>
						</tbody>
					</table>
				</td>
				<td align=right width=188>
					<table cellspacing=0 cellpadding=0 border=0>
						<tbody>
							<tr>
								<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
								<td class=ct valign=top width=180 height=13>(+) Outros acréscimos</td>
							</tr>
							<tr>
								<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
								<td class=cp valign=top align=right width=180 height=12></td>
							</tr>
							<tr>
								<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
								<td valign=top width=180 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=180 border=0></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td align=right width=10>
					<table cellspacing=0 cellpadding=0 border=0
						align=left>
						<tbody>
							<tr>
								<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
							</tr>
							<tr>
								<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
							</tr>
						</tbody>
					</table>
				</td>
				<td align=right width=188>
					<table cellspacing=0 cellpadding=0 border=0>
						<tbody>
							<tr>
								<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
								<td class=ct valign=top width=180 height=13>(=) Valor cobrado</td>
							</tr>
							<tr>
								<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
								<td class=cp valign=top align=right width=180 height=12></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 width=666 border=0>
		<tbody>
			<tr>
				<td valign=top width=666 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=666 border=0></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 border=0>
		<tbody>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=659 height=13>Sacado</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=659 height=12><span class="campo"> <?php echo $dadosboleto["sacado"]?></span></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 border=0>
		<tbody>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=659 height=12><span class="campo"> <?php echo $dadosboleto["endereco1"]?></span></td>
			</tr>
		</tbody>
	</table>
	<table cellspacing=0 cellpadding=0 border=0>
		<tbody>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=cp valign=top width=472 height=13><span class="campo"> <?php echo $dadosboleto["endereco2"]?></span></td>
				<td class=ct valign=top width=7 height=13><img height=13 src=<?php echo base_url();?>imagens/1.png width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>Cód. baixa</td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=472 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=472 border=0></td>
				<td valign=top width=7 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src=<?php echo base_url();?>imagens/2.png width=180 border=0></td>
			</tr>
		</tbody>
	</table>
	<table cellSpacing=0 cellPadding=0 border=0 width=666>
		<tbody>
			<tr>
				<td class=ct width=7 height=12></td>
				<td class=ct width=409>Sacador/Avalista</td>
				<td class=ct width=250><div align=right>Autenticaçao mecánica - <b class=cp>Ficha de Compensação</b></div></td>
			</tr>
			<tr>
				<td class=ct colspan=3></td>
			</tr>
		</tbody>
	</table>
	<table cellSpacing=0 cellPadding=0 width=666 border=0>
		<tbody>
			<tr>
				<td valign=bottom align=left height=50><?php $this->boleto->fbarcode($dadosboleto["codigo_barras"]); ?></td>
			</tr>
		</tbody>
	</table>
	<table cellSpacing=0 cellPadding=0 width=666 border=0>
		<tr>
			<td class=ct width=666></td>
		</tr>
		<tbody>
			<tr>
				<td class=ct width=666><div align=right>Corte na linha pontilhada</div>
				</td>
			</tr>
			<tr>
				<td class=ct width=666><img height=1 src=<?php echo base_url();?>imagens/6.png width=665 border=0></td>
			</tr>
		</tbody>
	</table>	
</BODY>
</HTML>