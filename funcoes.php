<?php
session_start();
include_once("conexao.php");

$oper = '';
if (
    isset($_POST['operacao']) &&
    !empty($_POST['operacao'])
) {
    $oper = $_POST['operacao'];
}

switch ($oper) {
    case 'CadastrarUsuario':
        CadastrarUsuario();
        break;
    case 'Login':
        Login();
        break;
    case 'cadastrarNoticias':
        cadastrarNoticias();
        break;
    case 'deletarNoticia':
        deletarNoticia();
        break;
    case 'editarNoticia':
        editarNoticia();
        break;

}


function Login()
{
    global $conn;

    if (
        isset($_POST['email']) &&
        !empty($_POST['email']) &&
        !empty($_POST['senha'])
    ) {

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $query = "SELECT * FROM usuarios WHERE email ='$email' AND senha='$senha'";

        $res = mysqli_query($conn, $query);

        if ($res->num_rows > 0) {
            $_SESSION['Login'] = true;
            header("Location: cadastrarNoticia.php");
        } else {
            header("Location: Login.php");
        }
    }
}
function CadastrarUsuario()
{
    global $conn;

    if (
        isset($_POST['nome']) &&
        !empty($_POST['nome']) &&
        !empty($_POST['email']) &&
        !empty($_POST['senha'])
    ) {

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $query = "INSERT INTO usuarios (nome,email,senha) VALUES ('$nome','$email','$senha')";

        $result = mysqli_query($conn, $query);

        if ($result)
            header("Location: Login.php");
        else
            header("Location: cadastro.php");
    }
}
function cadastrarNoticias()
{
    global $conn;

    if (
        isset($_POST["titulo"]) &&
        !empty($_POST["titulo"]) &&
        !empty($_POST["subtitulo"]) &&
        !empty($_POST["descricao"]) &&
        !empty($_FILES["foto"])
    ) {

        $titulo = $_POST["titulo"];
        $subtitulo = $_POST["subtitulo"];
        $descricao = $_POST["descricao"];

        //A PARTIR È ARQUIVO...
        $upload = false;

        //Tamanho maximo de arquivo(FOTO)
        $tmax = 2 * 1024 * 1024; // 2MB em BYTES
        $tper = array('jpeg', 'png', 'gif', 'jpg');

        //Obtem informação do arquivo enviado
        $nomearquivo = $_FILES['foto']['name'];
        $tamanhodoarquivo = $_FILES['foto']['size'];
        $extensaodoarquivo = strtolower(pathinfo($nomearquivo, PATHINFO_EXTENSION));
        //Verificar se o tamanho está no limite
        if ($tamanhodoarquivo <= $tmax) {
            if (in_array($extensaodoarquivo, $tper)) {

                $diretorioDestino = 'uploads/';

                //move o arquivo para o diretório de destino
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $diretorioDestino . $nomearquivo)) {
                    $upload = true;
                } else {
                    echo 'ERRO AO MOVER O ARQUIVO PARA O DIRETORIO DE DESTINO, ERRO = 1!';
                }
            } else {
                echo 'APENAS ARQUIVOS JPG,JPEG E PNG SÂO PERMITIDOS, ERRO = 2!';
            }
        } else {
            echo 'O TAMANHO DO ARQUIVO È MUITO GRANDE. TAMANHO MAXIMO 2MB, ERRO = 3!';
        }

        //FIM DO ARQUIVO DE ENVIO(FOTO)

        if ($upload) {
            $query = "INSERT INTO noticias (titulo,subtitulo,descricao,foto) VALUES ('$titulo','$subtitulo','$descricao','$diretorioDestino" . "$nomearquivo')";
            echo $query;
            $result = mysqli_query($conn, $query);
        }

        if ($result) {
            header("Location: Painel.php");
        } else {
            header("Location: cadastrarNoticia.php?error=" + $query);
        }
    }
}
function deletarNoticia()
{
    global $conn;

    if (
        isset($_POST["idNoticia"]) &&
        !empty($_POST["idNoticia"])
    ) {

        $id = $_POST["idNoticia"];

        $query = "DELETE FROM noticias WHERE id= '$id'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: Painel.php");
        } else {
            header("Location: cadastrarNoticias.php");
        }
    }
}
function editarNoticia()
{
    global $conn;

    if (
        isset($_POST['titulo']) &&
        !empty($_POST['titulo']) &&

        isset($_POST['idnoticia']) &&
        !empty($_POST['idnoticia']) &&

        !empty($_POST['subtitulo']) &&
        !empty($_POST['descricao'])
    )

        $id = $_POST['idnoticia'];
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $descricao = $_POST['descricao'];


        $query = "UPDATE noticias SET titulo='$titulo',subtitulo='$subtitulo',descricao='$descricao' WHERE id='$id'";

        $res = mysqli_query($conn, $query);

        if ($res)
            header("Location: Painel.php");
        else
            header("Location: edit.php?id=$id");
}

