<?php
    include_once('conectarDB.php');

    // ACIONADO CASO O USUARIO CLIQUE EM SALVAR
    if(isset($_POST['submit'])){
        $codigo = $_POST['codigo'];
        $produto = $_POST['produto'];
        $Query = "INSERT INTO produtos(Codigo,Descrição) VALUES('$codigo','$produto')";
        $Result = mysqli_query($Conexao,$Query);
        header("location:index.php");
    }else{      
        $Query = "SELECT * FROM produtos";
        $Result = mysqli_query($Conexao,$Query);
    }
    // ACIONADO CASO O USUARIO CLIQUE EM EXCLUIR
    if(isset($_POST['excluir'])){
        $ID = $_POST['ID'];
        $Query = "DELETE FROM produtos where ID='$ID'";
        $Result = mysqli_query($Conexao,$Query);
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site para registrar seus produtos">
    <meta name="author" content="Jeferson Fagundes">
    <link rel="stylesheet" href="Style/style.css">
    <title>Registrar produtos</title>
</head>
<body>  
    <h1>Cadastrar Produtos</h1>
        <div class="container">
        <table align="center" border-collapse:collapse; style="width:100% ;line-height:25px;margin-top:20px;">

            <form action="" class="CadastrarProd" method="POST">
                <h2>Código do Produto</h2>
                <input class="registrar" type="number" name="codigo" required/> 
                <h2>Descrição do Produto</h2> 
                <input class="registrar" type="text" name="produto" required/> <br>
                <input id="SalvarProd" type="submit" value="Salvar" name="submit">       
            </form> 

        <tr>
            <th><u>Código do Produto</u></th>
            <th><u>Descrição do Produto</u></th>
        </tr>
        <?php
            while($Row=mysqli_fetch_assoc($Result))
            {
        ?>
        <tr>
            <td style="padding-top: 20px;" class="produtos"> <?php echo $Row['Codigo']; ?> </td>
            <td  style="padding-top: 20px;"class="produtos"> <?php echo $Row['Descrição']; ?> </td>
        <form action="" method="POST">
               <td><input type="hidden" name="ID" value="<?php echo $Row['ID']?>"></td> 
               <td><input id="Resetar" type="submit" value="Excluir" name="excluir"> </td>
        </form>

        </tr>
        <?php
            }
        ?>
        </div> 

    </table>
</body>
</html>