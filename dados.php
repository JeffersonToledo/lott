<?php

  require_once "./conexao.php";

  $name = "";
  $name1 = "";
  $name2 = "";
  $name3 = "";
  $name4 = "";
  $name5 = "";
  $name6 = "";
  $name7 = "";
  $name8 = "";
  $name9 = "";


  $num = 0;
  $num1 = 0;
  $num2 = 0;
  $num3 = 0;
  $num4 = 0;
  $num5 = 0;
  $num6 = 0;
  $num7 = 0;
  $num8 = 0;
  $num9 = 0;

  $n = 0;
  $n1 = 0;
  $n2 = 0;
  $n3 = 0;
  $n4 = 0;
  $n5 = 0;
  $n6 = 0;
  $n7 = 0;
  $n8 = 0;
  $n9 = 0;

  $sql = "SELECT id,nome,number1,number2,number3,number4,number5,number6 FROM numeros";
  $sql2 = "SELECT nome FROM numeros";
  $sql3 = "SELECT number1,number2,number3,number4,number5,number6 FROM numeros";
  $sqlNum = "SELECT numero1, numero2, numero3, numero4, numero5, numero6 FROM seisnumeros";

  $resultado = $conexao->query($sql);
  $resultado2 = $conexao->query($sql2);
  $resultado3 = $conexao->query($sql3);
  $NumerosDaSorte = $conexao->query($sqlNum);

  $arrayTeste = [];

  if ($NumerosDaSorte->num_rows > 0) {

    while($rowe = $NumerosDaSorte->fetch_assoc()) {

      $arrayTeste = $rowe;

    }
  }else if ($conexao->error) {
    echo "Erro: " . $conexao->error;
  }

  // echo $arrayTeste;

  // implode(",", $arrayTeste);

  $array = [];

  foreach($arrayTeste as $key => $val){
    $array[] = $val;
  }


  // for($aa = 0; $aa <= 0; $aa++){
  //   // for($ab = 0; $ab <= 2; $ab++){
  //   echo $arrayTeste["numero1"][$aa];
  //   // }
  // }

  $sqlId = "SELECT id FROM numeros";

  $id = $conexao->query($sqlId);

  $tamanho = $id->num_rows;



  $registros = [];

  if ($resultado->num_rows > 0) {

    while($row = $resultado->fetch_assoc()) {

      $registros[] = $row;

    }
    

  } else if ($conexao->error) {
    echo "Erro: " . $conexao->error;
  }

  $dadosPrincipal = [];

  if ($resultado2->num_rows > 0) {

    while ($row3 =  $resultado2->fetch_assoc()) {

      $dadosPrincipal[] = $row3;

    }

  } else if ($conexao->error) {
    echo "Erro: " . $conexao->error;
  }

  $numerosTotal = [];

  if ($resultado3->num_rows > 0) {

    while ($row4 =  $resultado3->fetch_assoc()) {

      $numerosTotal[] = $row4;

    }

  } else if ($conexao->error) {
    echo "Erro: " . $conexao->error;
  }


 

  $jogadores = [];
  

  foreach($dadosPrincipal as $dados){
    $jogadores[] =  $dados['nome'];
  }

  // print_r($jogadores);
  // echo $jogadores[0];

  // echo "<br><br>";

  $numeros = [];
  

  for($a = 0; $a < $tamanho; $a++){
    $numeros[] =  $numerosTotal[$a];
  }

  // print_r($numeros);


  // echo "<br><br>";

  // echo $numeros[1]["number1"];
  
  // $array = array(33,44,55,66,77,88);

  // print_r($array);

    
    $j1 = $numeros;


    if($tamanho > 0)
    {
      $jogador01 = [];

      for($e = 0; $e < 1; $e++){
        $jogador01[] = $j1[$e];
      }



      // print_r($jogador01);

      

      foreach($jogador01 as $key => $valores){
        $jog01[] = $valores['number1'];
        $jog01[] = $valores['number2'];
        $jog01[] = $valores['number3'];
        $jog01[] = $valores['number4'];
        $jog01[] = $valores['number5'];
        $jog01[] = $valores['number6'];
      }

      foreach($jog01 as $numeros){ 
        foreach($array as $certo){      
          if(intval($numeros) === intval($certo)){
            $num++;
            if($num >= 3){
            $name = $jogadores[0];
            $n = $num;       
            }
          }
        }    
      }
    }

  


  // print_r($jog01);

    

    if($tamanho >= 2)
    {
        $jogador02 = [];

      for($e = 1; $e < 2; $e++){
        $jogador02[] = $j1[$e];
      }


      foreach($jogador02 as $key => $valores){
        $jog02[] = $valores['number1'];
        $jog02[] = $valores['number2'];
        $jog02[] = $valores['number3'];
        $jog02[] = $valores['number4'];
        $jog02[] = $valores['number5'];
        $jog02[] = $valores['number6'];
      }

      foreach($jog02 as $numeros){ 
        foreach($array as $certo){      
          if(intval($numeros) === intval($certo)){
            $num1++;
            if($num1 >= 3){
              $name1 = $jogadores[1];
              $n1 = $num1;         
            }
          }
        }    
      }
    }



  // print_r($jogador02);

  if($tamanho >= 3)
    {
        $jogador03 = [];

      for($e = 2; $e < 3; $e++){
        $jogador03[] = $j1[$e];
      }


      foreach($jogador03 as $key => $valores){
        $jog03[] = $valores['number1'];
        $jog03[] = $valores['number2'];
        $jog03[] = $valores['number3'];
        $jog03[] = $valores['number4'];
        $jog03[] = $valores['number5'];
        $jog03[] = $valores['number6'];
      }

      foreach($jog03 as $numeros){ 
        foreach($array as $certo){      
          if(intval($numeros) === intval($certo)){
            $num2++;
            if($num2 >= 3){
              $name2 = $jogadores[2];
              $n2 = $num2;         
            }
          }
        }    
      }
    }



  // print_r($jogador04);

  
  
  if($tamanho >= 4)
    {
        $jogador04 = [];

      for($e = 3; $e < 4; $e++){
        $jogador04[] = $j1[$e];
      }


      foreach($jogador04 as $key => $valores){
        $jog04[] = $valores['number1'];
        $jog04[] = $valores['number2'];
        $jog04[] = $valores['number3'];
        $jog04[] = $valores['number4'];
        $jog04[] = $valores['number5'];
        $jog04[] = $valores['number6'];
      }

      foreach($jog04 as $numeros){ 
        foreach($array as $certo){      
          if(intval($numeros) === intval($certo)){
            $num3++;
            if($num3 >= 3){
              $name3 = $jogadores[3];
              $n3 = $num3;         
            }
          }
        }    
      }
    }



  // print_r($jogador04);

  if($tamanho >= 5)
    {
        $jogador05 = [];

      for($e = 4; $e < 5; $e++){
        $jogador05[] = $j1[$e];
      }


      foreach($jogador05 as $key => $valores){
        $jog05[] = $valores['number1'];
        $jog05[] = $valores['number2'];
        $jog05[] = $valores['number3'];
        $jog05[] = $valores['number4'];
        $jog05[] = $valores['number5'];
        $jog05[] = $valores['number6'];
      }

      foreach($jog05 as $numeros){ 
        foreach($array as $certo){      
          if(intval($numeros) === intval($certo)){
            $num4++;
            if($num4 >= 3){
              $name4 = $jogadores[4];
              $n4 = $num4;         
            }
          }
        }    
      }
    }



  // print_r($jogador05);

  if($tamanho >= 6)
    {
        $jogador06 = [];

      for($e = 5; $e < 6; $e++){
        $jogador06[] = $j1[$e];
      }



      // print_r($jogador06);

      

      foreach($jogador06 as $key => $valores){
        $jog06[] = $valores['number1'];
        $jog06[] = $valores['number2'];
        $jog06[] = $valores['number3'];
        $jog06[] = $valores['number4'];
        $jog06[] = $valores['number5'];
        $jog06[] = $valores['number6'];
      }

      foreach($jog06 as $numeros){ 
        foreach($array as $certo){      
          if(intval($numeros) === intval($certo)){
            $num5++;
            if($num5 >= 3){
            $name5 = $jogadores[5];
            $n5 = $num5;       
            }
          }
        }    
      }
    }

  


  // print_r($jog06);

    

    if($tamanho >= 7)
    {
        $jogador07 = [];

      for($e = 6; $e < 7; $e++){
        $jogador07[] = $j1[$e];
      }


      foreach($jogador07 as $key => $valores){
        $jog07[] = $valores['number1'];
        $jog07[] = $valores['number2'];
        $jog07[] = $valores['number3'];
        $jog07[] = $valores['number4'];
        $jog07[] = $valores['number5'];
        $jog07[] = $valores['number6'];
      }

      foreach($jog07 as $numeros){ 
        foreach($array as $certo){      
          if(intval($numeros) === intval($certo)){
            $num6++;
            if($num6 >= 3){
              $name6 = $jogadores[6];
              $n6 = $num6;         
            }
          }
        }    
      }
    }



  // print_r($jogador07);

  
  
  if($tamanho >= 8)
    {
        $jogador08 = [];

      for($e = 7; $e < 8; $e++){
        $jogador04[] = $j1[$e];
      }


      foreach($jogador08 as $key => $valores){
        $jog08[] = $valores['number1'];
        $jog08[] = $valores['number2'];
        $jog08[] = $valores['number3'];
        $jog08[] = $valores['number4'];
        $jog08[] = $valores['number5'];
        $jog08[] = $valores['number6'];
      }

      foreach($jog08 as $numeros){ 
        foreach($array as $certo){      
          if(intval($numeros) === intval($certo)){
            $num7++;
            if($num7 >= 3){
              $name7 = $jogadores[7];
              $n7 = $num7;         
            }
          }
        }    
      }
    }



  // print_r($jogador08);

  if($tamanho >= 9)
    {
        $jogador09 = [];

      for($e = 8; $e < 9; $e++){
        $jogador09[] = $j1[$e];
      }


      foreach($jogador09 as $key => $valores){
        $jog09[] = $valores['number1'];
        $jog09[] = $valores['number2'];
        $jog09[] = $valores['number3'];
        $jog09[] = $valores['number4'];
        $jog09[] = $valores['number5'];
        $jog09[] = $valores['number6'];
      }

      foreach($jog09 as $numeros){ 
        foreach($array as $certo){      
          if(intval($numeros) === intval($certo)){
            $num8++;
            if($num8 >= 3){
              $name8 = $jogadores[8];
              $n8 = $num8;         
            }
          }
        }    
      }
    }



  // print_r($jogador09);

  if($tamanho >= 10)
    {
        $jogador10 = [];

      for($e = 9; $e < 10; $e++){
        $jogador10[] = $j1[$e];
      }


      foreach($jogador10 as $key => $valores){
        $jog10[] = $valores['number1'];
        $jog10[] = $valores['number2'];
        $jog10[] = $valores['number3'];
        $jog10[] = $valores['number4'];
        $jog10[] = $valores['number5'];
        $jog10[] = $valores['number6'];
      }

      foreach($jog10 as $numeros){ 
        foreach($array as $certo){      
          if(intval($numeros) === intval($certo)){
            $num9++;
            if($num9 >= 3){
              $name9 = $jogadores[9];
              $n9 = $num9;         
            }
          }
        }    
      }
    }



  // print_r($jogador05);
 

  $total = array
  (
   
    $name => $n,
    $name1 => $n1,
    $name2 => $n2,
    $name3 => $n3,
    $name4 => $n4,
    $name5 => $n5,
    $name6 => $n6,
    $name7 => $n7,
    $name8 => $n8,
    $name9 => $n9,
  );
  

  $ganhador = array_search(max($total), $total);

  $valor = (max($total));

  if($valor > 0){
    $ganhador;
    $valor;
  }

?>