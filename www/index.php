<?php 
   require_once 'function.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositorio</title>

    <style>
      *{
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }
      .fundo{
         background-color: #120230;
         height: 100vh;
      }
      .cabecalho{
        width: 100%;
         
      }
      .cabecalho img{
        width: 100%;
      }
      .box{
         width: 100%;
         height: 100%;
         display: flex;
         justify-content: center;
         align-items: center;
         
      }
      .conteudo{
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         width: 50%;
         height: 50%;
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
         background-color: #fff;
         border-radius: 10px;
         box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
      }
      .saida{
         text-decoration: none;
         color: #120230;
         font-size: 20px;
         font-weight: bold;
         margin-top: 10px;
         margin-bottom: 10px;
         font-family: Arial;
      }
      .saida:hover{
         color: #fff;
         background-color: #120230;
      }
    </style>
</head>
<body>

   <div class="fundo">
      <div class="cabecalho">
      <img src="fundo.png" alt="fundo">
      
      <div class="box">
         <div class="conteudo">
         <?php
            $temporario = $_SERVER['REQUEST_URI'];
            $temporario = explode("/?caminhoEscolhido=",$temporario);
            $temporario = implode($temporario);

            //substr_replace($var, '', 10, -1)
            $path = dirname(__FILE__);
            // /?caminhoEscolhido=teste1
            if(isset($caminhoEscolhido)){
            $caminhoEscolhido=$_GET['caminhoEscolhido'];
            listaPasta("$path/$temporario/$caminhoEscolhido");
            } else {
               listaPasta("$path/$temporario");
            }
            
            
            
         ?>
         </div>
         </div>
      </div>
   </div>

</body>
</html>

