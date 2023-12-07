<?php
session_start();
include_once("conexao.php");

//Verificação do ID na URL:
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    //Consulta no BD
    $sqlSELECT = "SELECT * FROM noticias WHERE id='$id'";
    $result = $conn->query($sqlSELECT);

    //Verificação dos resultados
    if ($result->num_rows > 0) {
        $dados_noticias = $result->fetch_assoc();
    } else {
        header('Location: Painel.php');
    }
    
}
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/styledonot.css">
    <title>SISTEMA ||GAGO</title>
</head>

<body>
    <section>

        <div class="form-box">
            <div class="form-value">
                <form action="funcoes.php" method="post" enctype="multipart/form-data">
                    <h2>Editar Noticias</h2>

                    <input type="hidden" name="operacao" value="editarNoticia">
                    <input type="hidden" name="idnoticia" value="<?php echo isset($dados_noticias['id']) ? $dados_noticias['id'] : ''; ?>">

                    <div class="inputbox">
                        <!--<ion-icon name="person-outline"></ion-icon>-->
                        <input type="text" name="titulo" id="idtitulo" value="<?php echo isset($dados_noticias['titulo']) ? $dados_noticias['titulo'] : ''; ?>">
                        <label for="">Titulo</label>
                    </div>

                    <div class="inputbox">
                        <!--<ion-icon name="mail-outline"></ion-icon>-->
                        <input type="text" name="subtitulo" id="idsubtitulo" value="<?php echo isset($dados_noticias['subtitulo']) ? $dados_noticias['subtitulo'] : ''; ?>">
                        <label for="">Subtitulo</label>
                    </div>
                    <div class="inputbox">
                        <br>
                        <input type="file" name="foto" id="foto" value="<?php echo isset($dados_noticias['foto']) ? $dados_noticias['foto'] : ''; ?>">
                        <label for="">Foto</label>
                    </div>
                    <div class="b">
                        <label for="descricao" style="color: #fff;">Descricao</label><br>
                        <textarea name="descricao" id="desc" cols="30" rows="3"><?php echo isset($dados_noticias['descricao']) ? $dados_noticias['descricao'] : ''; ?></textarea>
                    </div>

                    <input type="submit" name="submit" id="submit" value="Editar">

                    <div class="register">
                        <p><a href="Painel.php">Listar Noticias</a></p>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>