<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Boleto
 * Classe que recebe e processa os dados informados
 */

class Boleto
{

	public function dataJuliano($data)
	{
		$dia = (int)substr($data,1,2);
		$mes = (int)substr($data,3,2);
		$ano = (int)substr($data,6,4);
		$dataf = strtotime("$ano/$mes/$dia");
		$datai = strtotime(($ano-1).'/12/31');
		$dias  = (int)(($dataf - $datai)/(60*60*24));
		return str_pad($dias,3,'0',STR_PAD_LEFT).substr($data,9,4);
	}

	public function digitoVerificador_nossonumero($numero) {
		$resto2 = modulo_11($numero, 9, 1);
		$digito = 11 - $resto2;
		if ($digito == 10 || $digito == 11) {
			$dv = 0;
		} else {
			$dv = $digito;
		}
		return $dv;
	}


	public function digitoVerificador_barra($numero) {
		$resto2 = $this->modulo_11($numero, 9, 1);
		if ($resto2 == 0 || $resto2 == 1 || $resto2 == 10) {
			$dv = 1;
		} else {
			$dv = 11 - $resto2;
		}
		return $dv;
	}

	// FUN��ES
	// Algumas foram retiradas do Projeto PhpBoleto e modificadas para atender as particularidades de cada banco

	public function formata_numero($numero,$loop,$insert,$tipo = "geral") {
		if ($tipo == "geral") {
			$numero = str_replace(",","",$numero);
			while(strlen($numero)<$loop){
				$numero = $insert . $numero;
			}
		}
		if ($tipo == "valor") {
			/*
			 retira as virgulas
			formata o numero
			preenche com zeros
			*/
			$numero = str_replace(",","",$numero);
			while(strlen($numero)<$loop){
				$numero = $insert . $numero;
			}
		}
		if ($tipo == "convenio") {
			while(strlen($numero)<$loop){
				$numero = $numero . $insert;
			}
		}
		return $numero;
	}


	public function fbarcode($valor){

		$fino = 1 ;
		$largo = 3 ;
		$altura = 50 ;

		$barcodes[0] = "00110" ;
		$barcodes[1] = "10001" ;
		$barcodes[2] = "01001" ;
		$barcodes[3] = "11000" ;
		$barcodes[4] = "00101" ;
		$barcodes[5] = "10100" ;
		$barcodes[6] = "01100" ;
		$barcodes[7] = "00011" ;
		$barcodes[8] = "10010" ;
		$barcodes[9] = "01010" ;
		for($f1=9;$f1>=0;$f1--){
			for($f2=9;$f2>=0;$f2--){
				$f = ($f1 * 10) + $f2 ;
				$texto = "" ;
				for($i=1;$i<6;$i++){
					$texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
				}
				$barcodes[$f] = $texto;
			}
		}


		//Desenho da barra


		//Guarda inicial
		$image_properties_1 = array(
				'src' => 'imagens/p.png',
				'width' => $fino,
				'height' => $altura,
				'border' => '0',
		);

		$image_properties_2 = array(
				'src' => 'imagens/b.png',
				'width' => $fino,
				'height' => $altura,
				'border' => '0',
		);

		$image_properties_3 = array(
				'src' => 'imagens/p.png',
				'width' => $fino,
				'height' => $altura,
				'border' => '0',
		);

		$image_properties_4 = array(
				'src' => 'imagens/b.png',
				'width' => $fino,
				'height' => $altura,
				'border' => '0',
		);

		echo img($image_properties_1);
		echo img($image_properties_2);
		echo img($image_properties_3);
		echo img($image_properties_4);

		$texto = $valor ;
		if((strlen($texto) % 2) <> 0){
			$texto = "0" . $texto;
		}

		// Draw dos dados
		while (strlen($texto) > 0) {
			$i = round($this->esquerda($texto,2));
			$texto = $this->direita($texto,strlen($texto)-2);
			$f = $barcodes[$i];
			for($i=1;$i<11;$i+=2){
				if (substr($f,($i-1),1) == "0") {
					$f1 = $fino ;
				}else{
					$f1 = $largo ;
				}
				$image_properties_5 = array(
						'src' => 'imagens/p.png',
						'width' => $f1,
						'height' => $altura,
						'border' => '0',
				);
				echo img($image_properties_5);

				if (substr($f,$i,1) == "0") {
					$f2 = $fino ;
				}else{
					$f2 = $largo ;
				}
				$image_properties_6 = array(
						'src' => 'imagens/b.png',
						'width' => $f2,
						'height' => $altura,
						'border' => '0',
				);
				echo img($image_properties_6);



			}
		}
		$image_properties_7 = array(
				'src' => 'imagens/p.png',
				'width' => $largo,
				'height' => $altura,
				'border' => '0',
		);
		echo img($image_properties_7);

		$image_properties_8 = array(
				'src' => 'imagens/b.png',
				'width' => $fino,
				'height' => $altura,
				'border' => '0',
		);
		echo img($image_properties_8);

		$image_properties_9 = array(
				'src' => 'imagens/p.png',
				'width' => 1,
				'height' => $altura,
				'border' => '0',
		);
		echo img($image_properties_9);
		// Draw guarda final


	} //Fim da fun��o

	public function esquerda($entra,$comp){
		return substr($entra,0,$comp);
	}

	public function direita($entra,$comp){
		return substr($entra,strlen($entra)-$comp,$comp);
	}

	public function fator_vencimento($data) {
		$data = explode("/",$data);
		$ano = $data[2];
		$mes = $data[1];
		$dia = $data[0];
		return(abs(($this->_dateToDays("1997","10","07")) - ($this->_dateToDays($ano, $mes, $dia))));
	}

	public function _dateToDays($year,$month,$day) {
		$century = substr($year, 0, 2);
		$year = substr($year, 2, 2);
		if ($month > 2) {
			$month -= 3;
		} else {
			$month += 9;
			if ($year) {
				$year--;
			} else {
				$year = 99;
				$century --;
			}
		}
		return ( floor((  146097 * $century)    /  4 ) +
				floor(( 1461 * $year)        /  4 ) +
				floor(( 153 * $month +  2) /  5 ) +
				$day +  1721119);
	}

	public function modulo_10($num) {
		$numtotal10 = 0;
		$fator = 2;

		// Separacao dos numeros
		for ($i = strlen($num); $i > 0; $i--) {
			// pega cada numero isoladamente
			$numeros[$i] = substr($num,$i-1,1);
			// Efetua multiplicacao do numero pelo (falor 10)
			// 2002-07-07 01:33:34 Macete para adequar ao Mod10 do Ita�
			$temp = $numeros[$i] * $fator;
			$temp0=0;
			foreach (preg_split('//',$temp,-1,PREG_SPLIT_NO_EMPTY) as $k=>$v){
				$temp0+=$v;
			}
			$parcial10[$i] = $temp0; //$numeros[$i] * $fator;
			// monta sequencia para soma dos digitos no (modulo 10)
			$numtotal10 += $parcial10[$i];
			if ($fator == 2) {
				$fator = 1;
			} else {
				$fator = 2; // intercala fator de multiplicacao (modulo 10)
			}
		}
			
		// v�rias linhas removidas, vide fun��o original
		// Calculo do modulo 10
		$resto = $numtotal10 % 10;
		$digito = 10 - $resto;
		if ($resto == 0) {
			$digito = 0;
		}
			
		return $digito;
			
	}

	public function modulo_11($num, $base=9, $r=0)  {
		/**
		 *   Autor:
		 *           Pablo Costa <pablo@users.sourceforge.net>
		 *
		 *   Fun��o:
		 *    Calculo do Modulo 11 para geracao do digito verificador
		 *    de boletos bancarios conforme documentos obtidos
		 *    da Febraban - www.febraban.org.br
		 *
		 *   Entrada:
		 *     $num: string num�rica para a qual se deseja calcularo digito verificador;
		 *     $base: valor maximo de multiplicacao [2-$base]
		 *     $r: quando especificado um devolve somente o resto
		 *
		 *   Sa�da:
		 *     Retorna o Digito verificador.
		 *
		 *   Observa��es:
		 *     - Script desenvolvido sem nenhum reaproveitamento de c�digo pr� existente.
		 *     - Assume-se que a verifica��o do formato das vari�veis de entrada � feita antes da execu��o deste script.
		 */

		$soma = 0;
		$fator = 2;

		/* Separacao dos numeros */
		for ($i = strlen($num); $i > 0; $i--) {
			// pega cada numero isoladamente
			$numeros[$i] = substr($num,$i-1,1);
			// Efetua multiplicacao do numero pelo falor
			$parcial[$i] = $numeros[$i] * $fator;
			// Soma dos digitos
			$soma += $parcial[$i];
			if ($fator == $base) {
				// restaura fator de multiplicacao para 2
				$fator = 1;
			}
			$fator++;
		}

		/* Calculo do modulo 11 */
		if ($r == 0) {
			$soma *= 10;
			$digito = $soma % 11;
			if ($digito == 10) {
				$digito = 0;
			}
			return $digito;
		} elseif ($r == 1){
			$resto = $soma % 11;
			return $resto;
		}
	}

	public function modulo_11_invertido($num)  // Calculo de Modulo 11 "Invertido" (com pesos de 9 a 2  e n�o de 2 a 9)
	{
		$ftini = 2;
		$fator = $ftfim = 9;
		$soma = 0;

		for ($i = strlen($num); $i > 0; $i--)
		{
			$soma += substr($num,$i-1,1) * $fator;
			if(--$fator < $ftini)
				$fator = $ftfim;
		}

		$digito = $soma % 11;

		if($digito > 9)
			$digito = 0;

		return $digito;
	}

	public function monta_linha_digitavel($codigo)
	{
		// Posi��o 	Conte�do
		// 1 a 3    N�mero do banco
		// 4        C�digo da Moeda - 9 para Real ou 8 - outras moedas
		// 5        Fixo "9'
		// 6 a 9    PSK - codigo cliente (4 primeiros digitos)
		// 10 a 12  Restante do PSK (3 digitos)
		// 13 a 19  7 primeiros digitos do Nosso Numero
		// 20 a 25  Restante do Nosso numero (8 digitos) - total 13 (incluindo digito verificador)
		// 26 a 26  IOS
		// 27 a 29  Tipo Modalidade Carteira
		// 30 a 30  D�gito verificador do c�digo de barras
		// 31 a 34  Fator de vencimento (qtdade de dias desde 07/10/1997 at� a data de vencimento)
		// 35 a 44  Valor do t�tulo

		// 1. Primeiro Grupo - composto pelo c�digo do banco, c�digo da mo�da, Valor Fixo "9"
		// e 4 primeiros digitos do PSK (codigo do cliente) e DV (modulo10) deste campo
		$campo1 = substr($codigo,0,3) . substr($codigo,3,1) . substr($codigo,19,1) . substr($codigo,20,4);
		$campo1 = $campo1 . $this->modulo_10($campo1);
		$campo1 = substr($campo1, 0, 5).'.'.substr($campo1, 5);



		// 2. Segundo Grupo - composto pelas 3 �ltimas posi�oes do PSK e 7 primeiros d�gitos do Nosso N�mero
		// e DV (modulo10) deste campo
		$campo2 = substr($codigo,24,10);
		$campo2 = $campo2 . $this->modulo_10($campo2);
		$campo2 = substr($campo2, 0, 5).'.'.substr($campo2, 5);


		// 3. Terceiro Grupo - Composto por : Restante do Nosso Numero (6 digitos), IOS, Modalidade da Carteira
		// e DV (modulo10) deste campo
		$campo3 = substr($codigo,34,10);
		$campo3 = $campo3 . $this->modulo_10($campo3);
		$campo3 = substr($campo3, 0, 5).'.'.substr($campo3, 5);



		// 4. Campo - digito verificador do codigo de barras
		$campo4 = substr($codigo, 4, 1);



		// 5. Campo composto pelo fator vencimento e valor nominal do documento, sem
		// indicacao de zeros a esquerda e sem edicao (sem ponto e virgula). Quando se
		// tratar de valor zerado, a representacao deve ser 0000000000 (dez zeros).
		$campo5 = substr($codigo, 5, 4) . substr($codigo, 9, 10);

		return "$campo1 $campo2 $campo3 $campo4 $campo5";
	}

	public function geraCodigoBanco($numero) {
		$parte1 = substr($numero, 0, 3);
		$parte2 = $this->modulo_11($parte1);
		return $parte1 . "-" . $parte2;
	}
}