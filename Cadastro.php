<?php include_once("conexao.php") ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="Css/style.css">
</head>

<body>
    <section>

        <div class="form-box">
            <div class="form-value">
                <form action="funcoes.php" method="post">
                    <h2>Cadastro</h2>
                    <input type="hidden" name="operacao" value="CadastrarUsuario">

                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nome" required>
                        <label for="">Nome</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="">Email</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="senha" required>
                        <label for="">Senha</label>
                    </div>

                    <input type="submit" name="submit" id="submit" value="Cadrastar">

                    <div class="register">
                        <p>Já tem conta? <a href="Login.php">Faça Login aqui.</a></p>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>