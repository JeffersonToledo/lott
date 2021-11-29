<?php

if(isset($_POST['btnEnviar'])) {

    // print_r($array);

    $dadosNumeros = $_POST;

    $numerosSorte = array();

   

    foreach($dadosNumeros as $valores){
        array_push($numerosSorte, $valores);
    }
      


    require_once "./conexao.php";

    $sqlN = "UPDATE seisnumeros 
    SET 
        numero1 = $numerosSorte[0], 
        numero2 = $numerosSorte[1], 
        numero3 = $numerosSorte[2], 
        numero4 = $numerosSorte[3], 
        numero5 = $numerosSorte[4], 
        numero6 = $numerosSorte[5]
    WHERE
        id = 1";

    $stmt = $conexao->prepare($sqlN);
    $stmt->execute();

    if($stmt->execute()) {
        unset($dados);

        echo "<script language='javascript' type='text/javascript'>
            alert('Verificação enviada');window.location.href='pagina_inicial.php';</script>";

    }

}

?>