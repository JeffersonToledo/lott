<?php

require_once "./conexao.php";


$nameCadastro = $_POST['nameCadastro'];
$numero1 = $_POST['numero1'];
$numero2 = $_POST['numero2'];
$numero3 = $_POST['numero3'];
$numero4 = $_POST['numero4'];
$numero5 = $_POST['numero5'];
$numero6 = $_POST['numero6'];

if 
(
  $nameCadastro === '' || $nameCadastro === null ||
  $numero1 === '' || $numero1 === null ||
  $numero2 === '' || $numero2 === null || 
  $numero3 === '' || $numero3 === null || 
  $numero4 === '' || $numero4 === null || 
  $numero5 === '' || $numero5 === null || 
  $numero6 === '' || $numero6 === null   
) {
  echo "<script language='javascript' type='text/javascript'>
      alert('Preencha todos os dados');window.location.href='pagina_inicial.php';</script>";
}else {

  if 
  (
    $nameCadastro != '' || $nameCadastro != null ||
    $numero1 != '' || $numero1 != null ||
    $numero2 != '' || $numero2 != null || 
    $numero3 != '' || $numero3 != null || 
    $numero4 != '' || $numero4 != null || 
    $numero5 != '' || $numero5 != null || 
    $numero6 != '' || $numero6 != null 
  ) {

    $dados = $_POST;


    require_once "./conexao.php";

    $sql = "INSERT INTO numeros
      (nome,number1,number2,number3,number4,number5,number6)
      VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    $params = [
        $dados['nameCadastro'],
        $dados['numero1'],
        $dados['numero2'],
        $dados['numero3'],
        $dados['numero4'],
        $dados['numero5'],
        $dados['numero6'],
    ];

    // foreach($params as $param) {
    //     echo $param;
    // }

    $stmt->bind_param("siiiiii", ...$params); // s - string (nome, data, email, site), i - inteiro (filhos).

    if ($stmt->execute()) {

      unset($dados);

      echo "<script language='javascript' type='text/javascript'>
        alert('Cadastro feita com sucesso');window.location.href='pagina_inicial.php';</script>";
              
    }
  }
}