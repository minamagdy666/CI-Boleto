<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: solluzi
 * Date: 22/12/14
 * Time: 11:15
 */
class Treinamento extends CI_Controller
{
	/**
	 * Metodo gerador do boleto
	 */
    public function gerarBoleto()
    {   
    	$this->load->library('boleto');
	    	
    	// DADOS DO BOLETO PARA O SEU CLIENTE
        $dias_de_prazo_para_pagamento   = 10; 
    	$taxa_boleto                    = 1.50;
    	$data_venc                      = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006";
    	$valor_cobrado                  = '149,90'; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
    	$valor_cobrado                  = str_replace(",", ".",$valor_cobrado);
    	$valor_boleto                   = number_format($valor_cobrado+$taxa_boleto, 2, ',', '');
    	$nosso_numero                   = 777777777;
    	
    	$this->data['dadosboleto']["nosso_numero"]          = $nosso_numero;  // Nosso numero sem o DV - REGRA: M�ximo de 7 caracteres!
    	$this->data['dadosboleto']["numero_documento"]      = $nosso_numero;	// Num do pedido ou nosso numero
    	$this->data['dadosboleto']["data_vencimento"]       = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
    	$this->data['dadosboleto']["data_documento"]        = date('d/m/Y'); // Data de emiss�o do Boleto
    	$this->data['dadosboleto']["data_processamento"]    = date('d/m/Y'); // Data de processamento do boleto (opcional)
    	$this->data['dadosboleto']["valor_boleto"]          = $valor_boleto; 	// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula
    	
    	// DADOS DO SEU CLIENTE
    	$this->data['dadosboleto']["sacado"]                = 'Nome do Cliente';
    	$this->data['dadosboleto']["endereco1"]             = 'Rua, Número, Complemento';
    	$this->data['dadosboleto']["endereco2"]             = 'Cidade, Estado, CEP';
    	
    	// INFORMACOES PARA O CLIENTE
    	$this->data['dadosboleto']["demonstrativo1"]= "Compra do produto Teste ";
    	$this->data['dadosboleto']["demonstrativo2"]= "Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
    	$this->data['dadosboleto']["demonstrativo3"]= "Nome fantasia- Site";
    	$this->data['dadosboleto']["instrucoes1"]   = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
    	$this->data['dadosboleto']["instrucoes2"]   = "- Receber até 10 dias após o vencimento";
    	$this->data['dadosboleto']["instrucoes3"]   = "- Em caso de dúvidas entre em contato conosco: contato@solluzi.com";
    	$this->data['dadosboleto']["instrucoes4"]   = "&nbsp; Emitido pela Empresa";
    	
    	// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
    	$this->data['dadosboleto']["quantidade"]        = "";
    	$this->data['dadosboleto']["valor_unitario"]    = "";
    	$this->data['dadosboleto']["aceite"]            = "";
    	$this->data['dadosboleto']["especie"]           = "R$";
    	$this->data['dadosboleto']["especie_doc"]       = "";
    	
    	
    	// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //
    	
    	
    	// DADOS PERSONALIZADOS - SANTANDER BANESPA
    	$carteira_def   = "102";
    	$codigo_cliente = "7777777";
    	$this->data['dadosboleto']["codigo_cliente"]    = '7777777'; // C�digo do Cliente (PSK) (Somente 7 digitos)
    	$this->data['dadosboleto']["ponto_venda"]       = "0000"; // Ponto de Venda = Agencia
    	$this->data['dadosboleto']["carteira"]          = $carteira_def;  // Cobran�a Simples - SEM Registro
    	$this->data['dadosboleto']["carteira_descricao"]= "COBRANÇA SIMPLES - CSR";  // Descri��o da Carteira
    	
    	// SEUS DADOS
    	$this->data['dadosboleto']["identificacao"] = "Nome fantasia";
    	$this->data['dadosboleto']["cpf_cnpj"]      = "11.111.111/1111-11";
    	$this->data['dadosboleto']["endereco"]      = "Endereço";
    	$this->data['dadosboleto']["cidade_uf"]     = "Cidade - Estado";
    	$this->data['dadosboleto']["cedente"]       = "Razão Social";
    	 
    	$codigobanco = "033"; //Antigamente era 353
    	$codigo_banco_com_dv = $this->boleto->geraCodigoBanco($codigobanco);
    	$nummoeda = "9";
    	$fixo     = "9";   // Numero fixo para a posi��o 05-05
    	$ios	  = "0";   // IOS - somente para Seguradoras (Se 7% informar 7, limitado 9%)
    	// Demais clientes usar 0 (zero)
    	$fator_vencimento = $this->boleto->fator_vencimento($data_venc);
    	
    	//valor tem 10 digitos, sem virgula
    	$valor = $this->boleto->formata_numero($this->data['dadosboleto']["valor_boleto"],10,0,"valor");
    	//Modalidade Carteira
    	$carteira = $carteira_def;
    	//codigocedente deve possuir 7 caracteres
    	$codigocliente = $this->boleto->formata_numero($codigo_cliente,7,0);
    	
    	//nosso n�mero (sem dv) � 11 digitos
    	$nnum = $this->boleto->formata_numero($nosso_numero,7,0);
    	//dv do nosso n�mero
    	$dv_nosso_numero = $this->boleto->modulo_11($nnum,9,0);
    	// nosso n�mero (com dvs) s�o 13 digitos
    	$nossonumero = "00000".$nnum.$dv_nosso_numero;
    	
    	$vencimento = $data_venc;
    	
    	$vencjuliano = $this->boleto->dataJuliano($vencimento);
    	
    	// 43 numeros para o calculo do digito verificador do codigo de barras
    	$barra = "$codigobanco$nummoeda$fator_vencimento$valor$fixo$codigocliente$nossonumero$ios$carteira";
    	
    	//$barra = "$codigobanco$nummoeda$fixo$codigocliente$nossonumero$ios$carteira";
    	$dv = $this->boleto->digitoVerificador_barra($barra);
    	// Numero para o codigo de barras com 44 digitos
    	$linha = substr($barra,0,4) . $dv . substr($barra,4);
    	
    	$this->data['dadosboleto']["codigo_barras"]         = $linha;
    	$this->data['dadosboleto']["linha_digitavel"]       = $this->boleto->monta_linha_digitavel($linha);
    	$this->data['dadosboleto']["nosso_numero"]          = $nossonumero;
    	$this->data['dadosboleto']["codigo_banco_com_dv"]   = $codigo_banco_com_dv;


        //$this->load->vars($this->data);
        $this->load->view('boleto/include/layout_santander_banespa', $this->data);
    }
}
