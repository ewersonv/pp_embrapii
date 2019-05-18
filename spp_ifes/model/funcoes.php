<?php

function gerarSenha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){
    $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
    $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
    $nu = "0123456789"; // $nu contem os números
    $si = "!@#$%¨&*()_+="; // $si contem os símbolos

    $senha = "";

    if ($maiusculas){
        // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($ma);
    }

    if ($minusculas){
        // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($mi);
    }

    if ($numeros){
        // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($nu);
    }

    if ($simbolos){
        // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($si);
    }

    // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
    return substr(str_shuffle($senha),0,$tamanho);
}

function limita_caracteres($texto, $limite, $quebra = true){
    /* Limita o número de caracteres exibidos e adiciona "..." ao final */

   $tamanho = strlen($texto);
   if($tamanho <= $limite){ //Verifica se o tamanho do texto é menor ou igual ao limite
      $novo_texto = $texto;
   }else{ // Se o tamanho do texto for maior que o limite
      if($quebra == true){ // Verifica a opção de quebrar o texto
         $novo_texto = trim(substr($texto, 0, $limite))."...";
      }else{ // Se não, corta $texto na última palavra antes do limite
         $ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
         $novo_texto = trim(substr($texto, 0, $ultimo_espaco))."..."; // Corta o $texto até a posição localizada
      }
   }
   return $novo_texto; // Retorna o valor formatado
}

function totalProjetos() /* retorna o número total de projetos cadastrados no sistema */
{
    $tipo = $_SESSION['tipo'];
    $id_usuario = $_SESSION['id'];

    $conn = connect();

    if($tipo == 1)
    {
        $query = "SELECT COUNT(id) FROM projeto";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($result);
    }
    else
    {
        $query = "SELECT COUNT(id) FROM projeto WHERE fk_id_usuario = '$id_usuario'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($result);
    }

    $value = $row[0];

    /* Fecha a conexão com o banco de dados */
    closeConnection($conn);

    return $value;
}

function trocaMes($mes)
{
    if ($mes == 1)
	{
		$mes = "Jan";
	}
	elseif ($mes == 2)
	{
		$mes = "Fev";
	}
	elseif ($mes == 3)
	{
		$mes = "Mar";
	}
	elseif ($mes == 4)
	{
		$mes = "Abr";
	}
	elseif ($mes == 5)
	{
		$mes = "Mai";
	}
	elseif ($mes == 6)
	{
		$mes = "Jun";
	}
	elseif ($mes == 7)
	{
		$mes = "Jul";
	}
	elseif ($mes == 8)
	{
		$mes = "Ago";
	}
	elseif ($mes == 9)
	{
		$mes = "Set";
	}
	elseif ($mes == 10)
	{
		$mes = "Out";
	}
	elseif ($mes == 11)
	{
		$mes = "Nov";
	}
	else
	{
		$mes = "Dez";
    }
    
    return $mes;
}

?>