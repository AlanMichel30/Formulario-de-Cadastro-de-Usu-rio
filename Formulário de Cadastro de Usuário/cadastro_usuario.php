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
  $senha = $_POST["fidSenha"];

  $conexao_bd = mysqli_connect("localhost","root","12345","teste");
  $bd_conectado = true;

  if(!$conexao_bd) {
    $bd_conectado = false;
    echo "<h2>Não foi possível conectar ao banco de dados do site</h2>";
    error_reporting(E_ALL); 
    ini_set('display_errors', 1);
  }

  if($bd_conectado) {
    mysqli_select_db($conexao_bd, 'teste');

    $comando_sql = "INSERT INTO teste.cliente(Nome, Endereco, Numero, Bairro, Cidade, Estado, CEP, Telefone, CPF, Estado_Civil, Email, Senha_Acesso) VALUE('$nome','$endereco','$numero','$bairro','$cidade','$estado','$cep','$telefone','$cpf','$estado_civil','$email','$senha')";

    $registro_novo = mysqli_query($conexao_bd,$comando_sql);

    if($registro_novo != 0) {
?>
      <div align='center'>
        <table width='759' border='0'>
          <tr>
            <td bgcolor='#FF9900'>
              <div align='center'>
                <font face='Verdana' size='3'><b>Confirmação de Cadastro</b>
              </div>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>
              <div align='center'>
                <font face='Arial' size='3'><i>Usuário cadastrado com sucesso !</i></b>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <p>&nbsp;</p>
      <br><br>
      Nome: <?php echo $nome ?><br>
      Endereço: <?php echo $endereco ?>, <?php echo $numero ?><br>
      Bairro: <?php echo $bairro ?><br>
      Cidade: <?php echo $cidade ?><br>
      Estado: <?php echo $estado ?><br>
      CEP: <?php echo $cep ?><br>
      Tel. fixo: <?php echo $telefone ?><br>
      CPF: <?php echo $cpf ?><br>
      Email: <?php echo $email ?><br>
      Senha: <?php echo $senha ?><br>
<?php
    } else {
      echo "<h2><center>Erro no cadastro do usuário !</center></h2>";
      echo mysqli_error($conexao_bd);
    }
  }
  mysqli_close($conexao_bd);
?>
