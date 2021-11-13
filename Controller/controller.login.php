    <?php 
    //Iniciando a sessão
    include "../model/connection.php";
    session_start(['cookie_lifetime' => 86400]);
    
    $_SESSION['logado'] = false;
    if(mysqli_connect_errno())
    {
        echo "A conexão MySQLI apresentou erro: " . mysqli_connect_error();
    }
    
    if(isset($_POST['login']))
    {        
        $login_usuario = mysqli_real_escape_string($con, $_POST['login']);
        $senha_usuario = mysqli_real_escape_string($con, $_POST['senha']);
        $login = "SELECT ds_email, ds_senha, nm_tipo from tb_login where ds_email = '$login_usuario' AND ds_senha = '$senha_usuario'";
        $procura = mysqli_query($con, $login);
        $checa_usuario = mysqli_num_rows($procura);
        if($checa_usuario > 0)
        {
            $_SESSION['logado'] = true;
            $tipo = mysqli_fetch_array($procura);
            $_SESSION['tipo'] = $tipo['nm_tipo'];
            $_SESSION['email'] = $tipo['ds_email'];
            $_SESSION['senha'] = $tipo['ds_senha'];

            if($_SESSION['tipo'] == 'Usuario')
            {
                $login = mysqli_real_escape_string($con, $_SESSION['email']);
                $senha = mysqli_real_escape_string($con, $_SESSION['senha']);
                $usuario = "SELECT * FROM tb_usuario where ds_email = '$login' AND ds_senha = '$senha'";
                $getData = mysqli_query($con, $usuario);
                $getRow = mysqli_num_rows($getData);
                    if($getRow > 0)
                    {
                        $id = mysqli_fetch_array($getData);
                        $_SESSION['situacao'] = $id['ic_ativo_inativo'];
                        if($_SESSION['situacao'] == 1){
                            $_SESSION['nome'] = $id['nm_usuario'];
                            $nome = explode(" ", $_SESSION['nome']);
                            $_SESSION['nome'] = $nome[0] . ' ' . $nome[1];
                            $_SESSION['id'] = $id['cd_usuario'];
                            $_SESSION['img_name'] = $id['img_name'];

                            if($_SESSION['img_name'] == ''){
                                $_SESSION['img_name'] = 'default.png';
                            }
                            
                            $_SESSION['celular'] = $id['ds_celular'];
                            $_SESSION['info'] = $id['ds_info_adicional'];
                            $_SESSION['senhaAntiga'] = $id['ds_senha'];
                            header("Location:../view/view.listaAnimal.php");
                            }
                        else{
                            echo "<script>alert('Esta conta foi desativada.');
                            window.location.href='../controller/controller.logout.php';
                            window.location.href='../view/view.login.php';</script>";
                        }
                    }
            }

            if($_SESSION['tipo'] == 'Instituicao')
            {
                $login = mysqli_real_escape_string($con, $_SESSION['email']);
                $senha = mysqli_real_escape_string($con, $_SESSION['senha']);
                $usuario = "SELECT * FROM tb_instituicao where ds_email = '$login' AND ds_senha = '$senha'";
                $getData = mysqli_query($con, $usuario);
                $getRow = mysqli_num_rows($getData);
                if($getRow > 0)
                {
                    $id = mysqli_fetch_array($getData);
                    $_SESSION['nome'] = $id['nm_responsavel'];
                    $nome = explode(" ", $_SESSION['nome']);
                    $_SESSION['nome'] = $nome[0] . ' ' . $nome[1];
                    $_SESSION['inst'] = $id['nm_fantasia'];
                    $_SESSION['id'] = $id['cd_instituicao'];
                    $_SESSION['img_name'] = $id['img_name'];
                        if($_SESSION['img_name'] == ''){
                            $_SESSION['img_name'] = 'default.png';
                        }
                    $_SESSION['celular'] = $id['ds_celular'];
                    $_SESSION['telefone'] = $id['ds_telefone'];
                    $_SESSION['info'] = $id['ds_info_adicional'];
                    $_SESSION['senhaAntiga'] = $id['ds_senha'];
                    header("Location:../view/view.listaAnimal.php");
                }
                else{
                    echo "<script>alert('Esta conta foi desativada.');
                    window.location.href='../controller/controller.logout.php';
                    window.location.href='../view/view.login.php';</script>";
                }
            }
        }
        else
        {
            echo "<script>alert('Usuario ou senha incorreto'); window.location.href='../view/view.login.php';</script>";
        }
    }
    ?>