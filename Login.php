<?php
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Css/style.css">
</head>

<body>
    <section>

        <div class="form-box">
            <div class="form-value">
                <form action="funcoes.php" method="post">
                    <h2>Login</h2>
                    <input type="hidden" name="operacao" value="Login">
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
                    <div class="forget">
                        <label for=""><input type="checkbox" name="" id="">Lembre-se de mim</label>

                    </div>
                    <input type="submit" name="submit" id="submit" value="Login">
                        <div class="register">
                            <p>Não existe esta conta <a href="Cadastro.php">Registre-se aqui</a></p>
                        </div>
                </form>
            </div>
        </div>

    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>