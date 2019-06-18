<?php
session_start();
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Visitas</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>

	 <?php

    require 'navegacao.php';

      ?>



<center>
<div class="table-responsive">
<h1>Visitas</h1><br><br>
<table border = "1" class="table" style="border: groove 2px; padding: 0.75em; margin: 2px;">
<tr>
 <th class="text-center">Data das Visitas</th><th class="text-center">Local</th><th class="text-center">Endereço</th><th class="text-center">Horários</th>
<?php if ($_SESSION['login']){

            ?>
 <th class="text-center">Doação de Tempo</th>
 <?php
              }
            ?>
            <?php if (isset($_SESSION["administrador"])){

            ?>
 <th class="text-center">Participantes da Visita</th>
 <?php
              }
            ?>
</tr>

<?php
  require('conexao.php');

  $query = 'select * from VISITAS order by DATA_VIS asc';
  $resultado = mysqli_query($conexao, $query);
  while ($registro = mysqli_fetch_array($resultado)){

  ?>


<tr>
       <td> <?= $data = $registro["DATA_VIS"] ?></td>
       <td> <?= $registro["LOCAL"] ?></td>
       <td> <?= $registro["ENDERECO"] ?></td>
       <td> <?= $registro["HORARIO_VISITA"] ?></td>
      <?php if ($_SESSION['login']){

            ?>
       <td align="center">
        <form action="adctempo.php" method="POST">
          <input type="hidden" name="id" value="<?= $registro["CODIGO"]?>">
          <input type="submit" name="" value="Doar">
        </form>
       </td>
       <?php
              }
            ?>

            <?php
               if (isset($_SESSION["administrador"])){
            ?>
        <td align="center">
        <form action="participantes.php" method="POST">
          <input type="hidden" name="id" value="<?= $registro["CODIGO"]?>">
          <input type="submit" name="" value="Participantes">
        </form>
       </td>
       <?php
          }
       ?>

</tr>

<?php
  }
?>

</table>
</div>
</center>

     <footer = class=" container-fluid" style="background-color: #458B74; color: #fff; position: fixed; bottom:0px; width:100%;">
      <center>
      <span><a href="https://www.facebook.com/Herois-Solid%C3%A1rios-154532011421669/" ><img src="images/fac.png" width="35px" style=" position: relative;  right: 0px" alt="Responsive image"></a></span>
      <span><a href="https://www.instagram.com/?hl=pt-br" ><img src="images/ins.png" width="35px" style=" position: relative;  right: 0px" alt="Responsive image"></a></span>
      <span><a href="https://twitter.com/login?lang=pt" ><img src="images/twt.png" width="35px" style=" position: relative;  right: 0px" alt="Responsive image"></a></span>

      <br>

      Rua João Benedito de Lima, Jaboatão do Guararapes - PE <br> <b>CEP:</b> 00000-000 <br>
      <b>Telefone para contato:</b> (81)98619-7555<br>
      <b>Gmail:</b> heroissolidarios@gmail.com
    </center>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>