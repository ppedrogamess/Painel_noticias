<?php include_once("conexao.php") ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="Css/styledonot.css">
</head>

<body>
    <section>

        <div class="form-box">
            <div class="form-value">
                <form action="funcoes.php" method="post" enctype="multipart/form-data">
                    <h2>Cadastro De Noticias</h2>
                    <input type="hidden" name="operacao" value="cadastrarNoticias">

                    <div class="inputbox">
                        <!--<ion-icon name="person-outline"></ion-icon>-->
                        <input type="text" name="titulo" id="idtitulo" required>
                        <label for="">Titulo</label>
                    </div>

                    <div class="inputbox">
                        <!--<ion-icon name="mail-outline"></ion-icon>-->
                        <input type="text" name="subtitulo" id="idsubtitulo">
                        <label for="">Subtitulo</label>
                    </div>
                    <div class="inputbox">
                        <br>
                        <input type="file" name="foto" id="foto">
                        <label for="">Foto</label>
                    </div>
                    <div class="b">
                        <label for="descricao" style="color: #fff;">Descricao</label><br>
                        <textarea name="descricao" id="desc" cols="30" rows="3"></textarea>
                    </div>

                    <input type="submit" name="submit" id="submit" value="Cadrastar">

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