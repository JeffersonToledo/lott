<?php

require_once "./conexao.php";

$login = $_POST['nomeLogin'];
$senha = $_POST['senha'];

    if(!(empty($login) || empty($senha)))
    {
        require_once "./conexao.php";
        // $resultado =  $conexaoLogin->query("SELECT * FROM login WHERE login= '$login' AND senha='$senha'");

        $resultado =  $conexao->query("SELECT * from usuarios where username like '%$login%'");
        $array = $resultado->fetch_array(MYSQLI_NUM);

        $resultado2 =  $conexao->query("SELECT * from usuarios where senha like '%$senha%'");
        $arraySenha = $resultado2->fetch_array(MYSQLI_NUM);

        // echo $array[1] . '<br>';
        // echo $arraySenha[0] . '<br>';

        if($array[1] === $login and $arraySenha[1] === $senha)
        {
            session_start();

            $usuarios = [
                [
                    "nome" => $login
                ]
            ];

            foreach ($usuarios as $usuario) {
                $nomeValido = $login === $usuario['nome'];

                if ($nomeValido) {
                    $_SESSION['erros'] = null;
                    $_SESSION['usuario'] = $usuario['nome'];
                    $exp = time() + 60 * 60 * 24 * 30;
                    setcookie('usuario', $usuario['nome'], $exp);
                    echo "<script language='javascript' type='text/javascript'>
                        alert('Login e senha corretos');window.location.href='pagina_inicial.php';</script>";
                }
            }
        }else
        {
            echo "<script language='javascript' type='text/javascript'>
             alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
        }
    }else
    {
        echo "<script language='javascript' type='text/javascript'>
         alert('Preencha os dados');window.location.href='index.html';</script>";
    }