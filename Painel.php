<?php
session_start();
include_once('conexao.php');

if (!(isset($_SESSION['Login']) && $_SESSION['Login'] == true)) {
    header("Location: Login.php");
}

$sql = "SELECT * From noticias ORDER BY id ASC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="refresh" content="10000">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/table.css">
    <title>Projeto CS2</title>
</head>

<body>
    <?php if (isset($_GET['id']) && !empty($_GET['id'])) {
        header('Location: edit.php');
    } ?>

    <main class="table">
        <section class="table_header">
            <h1>Lista de Notícia</h1>
        </section>
        <section class="table_body">
            <table>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Subtitulo</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Deletar</th>

                    </tr>
                </thead>


                <?php while ($user_data = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <td><?php echo $user_data['id'] ?></td>
                        <td><img src="<?php echo $user_data['foto'] ?>" alt="" class="ft"></td>
                        <td><?php echo $user_data['titulo'] ?></td>
                        <td><?php echo $user_data['subtitulo'] ?></td>
                        <td><?php echo $user_data['descricao'] ?></td>

                        <td>
                            <a href="edit.php?id=<?php echo $user_data['id']; ?>" style="display: flex; justify-content: center; align-items: center;"><svg xmlns="http://www.w3.org/2000/svg" height="25" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                </svg></a>
                        </td>

                        <td>

                            <form action="funcoes.php" method="post">
                                <input type="hidden" name="operacao" value="deletarNoticia">
                                <input type="hidden" name="idNoticia" value=<?php echo $user_data['id'] ?>>
                                <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; margin: 0 auto; display: flex; justify-content: center; align-items: center;"><svg xmlns="http://www.w3.org/2000/svg" height="25" width="20" viewBox="0 0 448 512">
                                        <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                    </svg>
                                </button>
                            </form>

                        </td>

                    </tr>

                <?php } ?>

            </table>
        </section>
        <div class="botaos"></div>
        <input type="button" value="Voltar" id="btvoltar" style="
        display: block;
        margin: 20px auto 0; /* Adiciona margem superior, centraliza horizontalmente, sem margem inferior */
        width: 50%;
        height: 40px;
        border-radius: 40px;
        background-color: #fff;
        border: none;
        outline: none;
        font-size: 1em;
        font-weight: 600;
        cursor: pointer;" onclick="window.location.href='cadastrarNoticia.php'">

        <input type="button" value="Sair" id="btvoltar" style="
        display: block;
        margin: 20px auto 0; /* Adiciona margem superior, centraliza horizontalmente, sem margem inferior */
        width: 50%;
        height: 40px;
        border-radius: 40px;
        background-color: #fff;
        border: none;
        outline: none;
        font-size: 1em;
        font-weight: 600;
        cursor: pointer;" onclick="window.location.href='logout.php'">
        </div>
        </section>



    </main>



</body>

</html>