<?php

  // Oculta todos os erros
  // error_reporting(0);
  // ini_set("display_errors", 0);

  session_start();

  if($_COOKIE['usuario']) {
      $_SESSION['usuario'] = $_COOKIE['usuario'];
  }

  if(!$_SESSION['usuario']){
      header('location: index.php');
  }
        
  require_once "./dados.php";
  
  
  if(isset($_GET['excluir'])) {

    $excluirSQL = "DELETE FROM numeros WHERE id = ?"; 
    $stmt = $conexao->prepare($excluirSQL); 
    $stmt->bind_param("i", $_GET['excluir']);
    if($stmt->execute()){
      echo "<script language='javascript' type='text/javascript'>
      alert('Excluído com sucesso');window.location.href='pagina_inicial.php';</script>";
    }
  }

      
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="./css/tela.css">
  <title>Lott</title>
</head>

<body>

 <div class="container">

  <div class="login">

    <div class="areaUsuario">

      <div class="logoMarca">
        <img class="logMarca" src="./img/slogan.svg" alt="logomarca">
      </div>

      <div class="bemVindo">

        <h2>Bem-Vindo(a)</h2>

        <p>
          <?php echo $_SESSION['usuario']; ?>
        </p>

      </div>

      <div class="mega">

        <h2>Números do jogo</h2>

        <div class="megaNumeros">

          <?php for($n = 0; $n <= 5; $n++) : ?>

            <span class="numerosMega"><?= $array[$n]; ?></span>
              
          <?php endfor ?>

        </div>

      </div>

      <div class="qtdJogadores">

        <h2>Jogadores</h2>

        <p>
          <?php echo $tamanho; ?>
        </p>

      </div>

      <div class="totalPago">

        <h2>Total Pago</h2>

        <p>
          <?php echo "R$ " . $tamanho * 4.50; ?>
        </p>

      </div>

    </div>

  </div>

  <div class="dados">

    <div class="numerosAcertados">

  
      
      <div class="nameJogo">
        <p>Jogo</p>
      </div>

      <form id="EnvioNumeros">

        <div class="verificarNumeros">
          <ul>
            <li><input type="text" name="jogo01"></li> <span>Ⅰ</span>
            <li><input type="text" name="jogo02"></li> <span>Ⅰ</span>
            <li><input type="text" name="jogo03"></li> <span>Ⅰ</span>
            <li><input type="text" name="jogo04"></li> <span>Ⅰ</span>
            <li><input type="text" name="jogo05"></li> <span>Ⅰ</span>
            <li><input type="text" name="jogo06"></li> <span>
          </ul>
        </div>
       
        <div class="areaJogo">
          <button id="btnCadastrarJogador" class="btnVerificar" name="btnEnviar" type="submit">Verificar</button>
        </div>

      </form>

      <div class="resultado">
        <p class="primeiroResultado">
          Quem acertou mais: <?php echo $ganhador; ?>
        </P>
        <p>
          Total de acertos: <?php echo $valor; ?>
        </P>
      </div>


    </div>

    <div class="cadastro">


      <form id="cadastrarJogador">

      <div class="fundoCadastro">

        

        <div class="nomeCadastro">
        <h2>Cadastro:</h2>
          <p>Nome: <input id="textJogadorName" type="text" name="nameCadastro"></p>
        </div>

        <div class="numerosCadastro">
          <p>Números:</p>
        </div>

        <div class="numerosGerais">
          <ul>
            <li><input type="text" name="numero1"></li> <span>Ⅰ</span>
            <li><input type="text" name="numero2"></li> <span>Ⅰ</span>
            <li><input type="text" name="numero3"></li> <span>Ⅰ</span>
            <li><input type="text" name="numero4"></li> <span>Ⅰ</span>
            <li><input type="text" name="numero5"></li> <span>Ⅰ</span>
            <li><input type="text" name="numero6"></li> <span>
          </ul>
        </div>

        <div class="areaCadastro">
          <button id="btnCadastrarJogador2" class="btnCadastro" type="submit">Cadastrar</button>
        </div>


      </div>

      </form>

    </div>

    <div class="dadosCadastrados">
      
      <div class="fundoDados">

        <h2>Lista:</h2>

        <section class="over">


        <?php foreach ($registros as $registro) : ?>

          <div class="tabelaRegistro">

            <div class="registro01">
              <ul>

                <li class="x">
                  
                  <a href="http://localhost/loteria/pagina_inicial.php?excluir=<?= $registro['id'] ?>">
                    <img src="./img/x.svg" alt="x">
                  </a>
                </li>
                <li class="nomeRegistro"><?= $registro['nome'] ?></li>

              </ul>
            </div>

            <div class="registro02">
              
                <h3 class="numberRegistro">Números: </h3>

                <div class="boxNumber">
                <ul class="boxNumeros">
                  <li class="nn"><?= $registro['number1'] ?> <span>Ⅰ</span>
                  <li><?= $registro['number2'] ?></li> <span>Ⅰ</span>
                  <li><?= $registro['number3'] ?></li> <span>Ⅰ</span>
                  <li><?= $registro['number4'] ?></li> <span>Ⅰ</span>
                  <li><?= $registro['number5'] ?></li> <span>Ⅰ</span>
                  <li><?= $registro['number6'] ?></li>
                </ul>
                </div>
              
            </div>

          </div>
    

        <?php endforeach ?>

        </section>

      </div>

    </div>

  </div>
 
 </div>

  <script src="./js/jquery-3.1.1.min.js"></script>
  <script src="./js/form.js"></script>
  <script src="./js/main.js"></script>

</body>

</html>