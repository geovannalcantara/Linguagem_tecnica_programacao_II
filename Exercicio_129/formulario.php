<?php
    include_once("sequencia.class.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>

<body>

    <h2> Sequência de Números </h2>
    
    <form action="formulario.php" id="" method="post">

        <label for="inicio">Selecione o valor inicial:</label>
        <select id="inicio" name="inicio">
        <option value="" selected disabled>selecione</option>
            <?php 
            
                for ($i=1; $i <= 100 ; $i++) {
                    ?> 
                    <option value="<?php echo $i?>"><?php echo $i?></option><br>
                    <?php
                }
            ?>
        </select><br>

        <label for="fim">Selecione o valor final:</label>
        <select id="fim" name="fim">
        <option value="" selected disabled>selecione</option>

            <?php 
                
                for ($i=1; $i <= 100 ; $i++) {
                    ?> 
                    <option value="<?php echo $i?>"><?php echo $i?></option><br>
                    <?php
                }
            ?>
        </select><br><br>

        <label for="mostrar">Mostrar:</label><br>

        <input type="radio" value="todas" name="mostrar">
        <label for="todas">Todas</label><br>

        <input type="radio" value="pares" name="mostrar">
        <label for="pares">Apenas os pares</label><br>

        <input type="radio" value="impares" name="mostrar">
        <label for="impares">Apenas os ímpares</label><br><br>

        <input type="submit" value="Mostrar a sequência">

        <?php
          
          if (isset($_POST["mostrar"])){

            $valorinicial = $_POST["inicio"];
            $valorfinal = $_POST["fim"];
            $opcoes = $_POST["mostrar"];

            $sequencia = new sequencia();

            $sequencia->setInicio($valorinicial);
            $sequencia->setFim($valorfinal);

            switch ($opcoes) {
                case "todas":
                    $saida = $sequencia->exibirTodos();
                break;
                case "pares":
                    $saida = $sequencia->exibirPares();
                break;
                case "impares":
                    $saida = $sequencia->exibirImpares();
                break;
            }             
        ?>
     </form>

     <h3> Resultado: </h3>

     <?php
            foreach ($saida as $key => $value) {
                echo $value . "<br>";
            }
        }
     ?>
        
</body>
</html>