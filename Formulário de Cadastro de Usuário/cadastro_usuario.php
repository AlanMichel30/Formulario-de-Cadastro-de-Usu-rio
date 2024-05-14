<?php
  $nome = $_POST["fidNome"];
  $endereco = $_POST["fidEndereco"];
  $numero = $_POST["fidNumero"];
  $bairro = $_POST["fidBairro"];
  $cidade = $_POST["fidCidade"];
  $estado = $_POST["fidEstado"];
  $cep = $_POST["fidCEP"];
  $telefone = $_POST["fidTelefone"];
  $cpf = $_POST["fidCPF"];
  $estado_civil = $_POST["fidEstadoCivil"];
  $email = $_POST["fidEmail"];
  $senha = $_POST["fldSenha"];

  $conexao_bd = mysql_connect("localhost","root");
  $bd_conectado = ture;

if(!$conexao_bd) {
    $bd_conectado = false;
    echo"<h2>Não foi possível conectar ao banco de dados do site</h2>";
    echo mysql_error ();
}

if($bd_conectado) {
    mysql_select_db('projeto_imobiliaria', $conexao_bd);

    $comando_sql = "INSERT INTO clinete(Nome_Cliente, Endereco, Numero, Bairro, Cidade, Estado, CEP, Telefone, CPF, Estado_Civil, Email, Senha_Acesso) VALUE('$nome','$endereco','$numero','$bairro','$cidade','$estado','$cep','$telefone','$cpf','$estado_civil','$email','$senha')";

    $registro_novo = mysql_query($comando_sql);

    if($registro_novo != 0) {
        echo"<div align='center'>";
        echo"<table width=759 borber=0>";
        echo"<tr>";
        echo"<td bgcolor='#FF9900'>";
        echo"<div align='center'>";
        echo"<font face=Verdana size=3><b>Confirmação de Cadastro</b>";
        echo"</div>";
        echo"</td>";
        echo"</tr>";
        echo"<tr>";
        echo"<td>&nbsp;</td>";
        echo"</tr>";
        echo"<tr>";
        echo"<td>";
        echo"<div align='center'>";
        echo"<font face=Arial size=3><i>Usuário cadastrado com sucesso !</b>";
        echo"</div>";
        echo"</td>";
        echo"</tr>";
        echo"</table>";
        echo"</div>";
        echo"<p>&nbsp;</p>";
        echo"<br><br>";
        echo"Nome: $nome<br>";
        echo"Endereço: $endereco, $numero<br>";
        echo"Bairro: $bairro<br>";
        echo"Cidade: $cidade<br>";
        echo"Estado: $estado<br>";
        echo"CEP: $cep<br>";
        echo"Tel. fixo: $telefone<br>";
        echo"CPF: $cpf<br>";
        echo"Email: $email<br>";
    }
    else{
        echo"<h2><center>Erro no cadastro do usuário !</center></h2>";
        echo"<br><br>";
        echo mysql_error();
    }
}
mysql_close($conexao_bd);
?>
