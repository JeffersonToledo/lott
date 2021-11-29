<?php

require_once "./conexao.php";


$login = $_POST['nomeCadastro'];
$senha = $_POST['senhaCadastro'];

$query_select = "SELECT username FROM usuarios";
$query_senha = "SELECT senha FROM usuarios";
$select = $conexao->query($query_select);
$select_senha = $conexao->query($query_senha);
$array = $select->fetch_array(MYSQLI_NUM);
$arraySenha = $select_senha->fetch_array(MYSQLI_NUM);

// echo $arraySenha[0] . '<br>';
// echo $array[0] . '<br>';

$resultado =  $conexao->query("SELECT * from usuarios where username like '%$login%'");
$arrayComparacao = $resultado->fetch_array(MYSQLI_NUM);

$resultado2 =  $conexao->query("SELECT * from usuarios where senha like '%$senha%'");
$arraySenhaComparacao = $resultado2->fetch_array(MYSQLI_NUM);

// echo $arraySenhaComparacao[1] . '<br>';
// echo $arrayComparacao[1] . '<br>';


if (
  $login === '' || $login === null || $login === $arrayComparacao[1] ||
  $senha === '' || $senha === null || $senha === $arraySenhaComparacao[1]
) 
{
  echo "<script language='javascript' type='text/javascript'>
      alert('Login e/ou senha existente');window.location.href='index.html';</script>";
} 
else {

  if ($login != $arrayComparacao[1] || $senha != $arraySenhaComparacao[1]) {

    $dados = $_POST;


    require_once "./conexao.php";

    $sql = "INSERT INTO usuarios
      (username, senha)
      VALUES (?, ?)";

    $stmt = $conexao->prepare($sql);

    $params = [
        $dados['nomeCadastro'],
        $dados['senhaCadastro'],
    ];

    // foreach($params as $param) {
    //     echo $param;
    // }

    $stmt->bind_param("ss", ...$params); // s - string (nome, data, email, site), i - inteiro (filhos).

    if ($stmt->execute()) {

      unset($dados);

      echo "<script language='javascript' type='text/javascript'>
        alert('Cadastro feita com sucesso');window.location.href='index.html';</script>";
              
    }
  }
}