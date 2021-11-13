<meta charset="UTF-8">

<?php
    function nucleoReferencias(){
        date_default_timezone_set('America/Sao_Paulo');
        echo"
        <link rel='icon' href='../template/img/logoC.png'/>
        <link rel='stylesheet' type='text/css' media='screen' href='../template/css/bootstrap.css' />
        <link rel='stylesheet' type='text/css' media=screen href='../template/css/stylo.css' />
        <link rel='stylesheet' href='../template/css/swiper.min.css'>
        <link rel='stylesheet' href='../template/css/themify-icons/themify-icons.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='../template/js/swiper.min.js'></script>
        <script src='../template/js/bootstrap.js'></script>
        <script type='text/javascript' src='../template/js/main.js'></script>";
    }          

    function navbar(){
        if(date('H') >= 00 && date('H') < 6){
            $msg = "Boa madrugada, ";
        }
        elseif(date('H') >= 6 && date('H') < 13){
            $msg = "Bom dia, ";
        }
        elseif(date('H') >= 13 && date('H') < 19){
            $msg = "Boa tarde, ";   
        }
        else{
            $msg = "Boa noite, ";
        }

        if(isset($_SESSION['tipo'])){
            if($_SESSION['tipo'] == 'Usuario'){
                echo"
                <nav class='navbar navbar-expand-lg sticky-top navbar-dark bg-custom'>
                    <a class='navbar-brand exemple' href='index.php'>
                        <img src='../template/img/logoC.png'>
                    </a>
                    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
                    <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                        <ul class='navbar-nav mr-auto'>
                            <li class='nav-item active'>
                                <a class='nav-link' href='../view/index.php'>Home</a>
                            </li>
                            <li class='nav-item active'>
                                <a class='nav-link' href='../view/view.exebEventos.php'>Eventos</a>
                            </li>
                            <li class='nav-item active'>
                                <a class='nav-link' href='../view/view.denuncia.php'>Denúncia</a>
                            </li>
                        </ul>
                        <ul class='navbar-nav navbar-right'>
                            <li class='nav-item dropdown '>
                                <a class='nav-link dropdown-toggle active' href='#' id='navbardrop' data-toggle='dropdown'>
                                    ". $msg . $_SESSION['nome'] ."
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                    
                                    <a class='dropdown-item text-wrap' desactived>
                                        <img class='rounded-cicle user-avatar' src='../template/img/user_img/". $_SESSION['img_name'] ."' height='40px' width='40px'>". $_SESSION['nome']."
                                    </a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='../view/view.addAnimal.php'><span class='ti-plus'></span>&nbspCadastrar Animal</a>
                                    <a class='dropdown-item' href='../view/view.listaAnimal.php'><span class='ti-align-justify'></span>&nbsp Lista de Cadastrados</a>                                    
                                    <a class='dropdown-item' href='../view/view.listaFavorito.php'><span class='ti-heart'></span>&nbspLista de Favoritos</a>
                                    <a class='dropdown-item' href='../view/view.updateUSU.php'><span class='ti-settings'></span>&nbspMinha conta</a>
                                    <a class='dropdown-item' href='../controller/controller.logout.php'><span class='ti-close'></span>&nbspLogout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>";
            }
            if($_SESSION['tipo'] == 'Instituicao'){
              echo"
                <nav class='navbar navbar-expand-lg sticky-top navbar-dark bg-custom'>
                    <a class='navbar-brand exemple' href='index.php'>
                        <img src='../template/img/logoC.png'>
                    </a>
                    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
                    <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                        <ul class='navbar-nav mr-auto'>
                            <li class='nav-item active'>
                                <a class='nav-link' href='../view/index.php'>Home</a>
                            </li>
                            <li class='nav-item active'>
                                <a class='nav-link' href='../view/view.exebEventos.php'>Eventos</a>
                            </li>
                            <li class='nav-item active'>
                                <a class='nav-link' href='../view/view.denuncia.php'>Denúncia</a>
                            </li>
                            <li class='nav-item active'>
                        </ul>
                        <ul class='navbar-nav navbar-right'>
                            <li class='nav-item dropdown ' >                            
                                <a class='nav-link dropdown-toggle active' href='#' id='navbardrop' data-toggle='dropdown'>                                    
                                    ". $msg . $_SESSION['nome'] ."
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                    <a class='dropdown-item text-wrap' desactived>
                                        <img class='rounded-cicle user-avatar' src='../template/img/inst_img/". $_SESSION['img_name'] ."' height='40px' width='40px'>
                                        ". $_SESSION['nome'] .'<br>'.$_SESSION['inst']."
                                    </a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='../view/view.listaAnimal.php'><span class='ti-align-justify'></span>&nbsp Lista de Animais</a>
                                    <a class='dropdown-item' href='../view/view.listaEvento.php'><span class='ti-list'></span>&nbsp Lista de Eventos</a>
                                    <a class='dropdown-item' href='../view/view.addAnimal.php'><span class='ti-plus'></span>&nbspCadastrar Animal</a>
                                    <a class='dropdown-item' href='../view/view.addEvento.php'><span class='ti-plus'></span>&nbspCriar Evento</a>
                                    <a class='dropdown-item' href='../view/view.updateONG.php'><span class='ti-settings'></span>&nbspMinha conta</a>
                                    <a class='dropdown-item' href='../controller/controller.logout.php'><span class='ti-close'></span>&nbspLogout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>";
            }
        } else {
            echo"
                <nav class='navbar navbar-expand-lg sticky-top navbar-dark bg-custom'>
                    <a class='navbar-brand exemple' href='index.php'>
                        <img src='../template/img/logoC.png'>
                    </a>
                    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
                    <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                        <ul class='navbar-nav mr-auto'>
                        <li class='nav-item active'>
                        <a class='nav-link' href='../view/index.php'>Home</a>
                        </li>
                        <li class='nav-item active'>
                            <a class='nav-link' href='../view/view.exebEventos.php'>Eventos</a>
                        </li>
                        <li class='nav-item active'>
                            <a class='nav-link' href='../view/view.denuncia.php'>Denúncia</a>
                        </li>
                            <ul class='navbar-nav navbar-left'>
                            <li class='nav-item dropdown '>
                                <a class='nav-link dropdown-toggle active' href='#' id='navbardrop' data-toggle='dropdown'>Cadastre-se</a>
                                <div class='dropdown-menu dropdown-menu-left'>
                                    <a class='dropdown-item' href='../view/view.addOng.php'>&nbspInstituição/ONG</a>                                    
                                    <a class='dropdown-item'href='../view/view.addUSU.php'>&nbspUsuário</a> 
                                </div>
                            </li>
                            <li class='nav-item active'>
                                <a class='nav-link' href=../view/view.login.php>Login</a>
                            </li>
                            </ul>
                        </ul>
                    </div>
                </nav>";
        }
    }

    function footer(){
        echo '
        <footer class="page-footer font-small pt-4 bg-custom">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <h5 class="text-uppercase">Sobre nós:</h5>
                    <p>O +Pets é uma plataforma digital, onde é possível divulgar os animais 
                    para adoção ou adotá-los, visando ajudar a diminuir o número de abandonados e incentivando a prática da adoção.
                    Para saber mais, entre em contato: <span class="font-weight-bold">maispets013@gmail.com</span></p>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Parcerias</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">ONG Defesa da Vida Animal de Santos</a>
                        </li>
                    </ul>

                </div>

                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Redes Sociais</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Social 1</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3" style="font-size: 9pt">
            © 2019 +Pets Corporation. Todos os direitos reservados.
            <br> Powered by Spiritual Fox
        </div>
        </footer>';
    }

    function menuI(){
        
            echo
            '
            <div class="img-location mx-auto d-block" >
            <img class="img-fluid img_user" src="../template/img/inst_img/' . $_SESSION['img_name'] .'">
            </div>
            <li>
            <br>
            <p class="nav-link"> Olá, ' . $_SESSION['nome'] . '<br>
            Da ' . $_SESSION['inst'] . '</p><hr class="new1">
            </li>
            <li class="nav-item" >
                <a class="nav-link "  href="../view/view.listaAnimal.php"><span class="ti-align-justify"> </span>Lista de animais</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../View\view.listaEvento.php"><span class="ti-list"> </span>Lista de eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../view/view.addAnimal.php"><span class="ti-plus"> </span>Adicionar animal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../View/view.addEvento.php"><span class="ti-plus"> </span>Adicionar evento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../view/view.updateONG.php"><span class="ti-settings"> </span>Configurações de conta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../controller/controller.logout.php"><span class="ti-close"> </span>Sair</a><hr class="new1">
            </li>';
    }

    function menuU(){
            echo
            '
            <div class="img-location mx-auto d-block">
            <img src="../template/img/user_img/' . $_SESSION['img_name'] .'" class="img-fluid img_user">
            </div>
            <li>
            <br>
            <p class="nav-link"> Olá, ' . $_SESSION['nome'] . '</p><hr class="new1"> 
            <li class="nav-item">
            <a class="nav-link " href="../view/view.addAnimal.php"><span class="ti-plus"> </span>Adicionar animal</a>
            </li>
            <li class="nav-item">
            <a class="nav-link  " href="../view/view.listaAnimal.php"><span class="ti-align-justify"> </span>Lista de animais</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../View/view.listaFavorito.php"><span class="ti-heart"> </span>Lista de Favoritos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../view/view.updateUSU.php"><span class="ti-settings"> </span>Configurações de conta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../controller/controller.logout.php"><span class="ti-close"> </span>Sair</a><hr class="new1">
            </li>';
    }

    function vacCachorro(){
        echo 
        '<div class="form-group">
            <input type="checkbox" onclick="desabilitarVac(this.checked)" name="vacina" value="0" disable=true>&nbspNão sei informar
            <input type="checkbox" name="vacina" value="1">V8
            <input type="checkbox" name="vacina" value="2">V10
            <input type="checkbox" name="vacina" value="3">Gripe        
        </div>';
    }

    function vacGato(){
        echo
        '<div class="input-group">
            <input type="checkbox" onclick="desabilitar("sim")" name="nascimento" value="0" disable=true>&nbspNão sei informar
            <input type="checkbox" name="vacina" value="5">V3
            <input type="checkbox" name="vacina" value="6">V4
            <input type="checkbox" name="vacina" value="7">V5
            <input type="checkbox" name="vacina" value="4">Antirrábica        
        </div>';
    }

    function vacCoelho(){
        echo
        '<div class="input-group">
            <input type="checkbox" onclick="desabilitar("sim")" name="nascimento" value="0" disable=true>&nbspNão sei informar
            <input type="checkbox" name="vacina" value="7">Mixomatose
            <input type="checkbox" name="vacina" value="9">Doença Hemorrágica
        </div>';
    }

    function VacOutro(){
        echo
        '<div class="input-group">
            <input type="checkbox" onclick="desabilitar("sim")" name="nascimento" value="0" disable=true>&nbspNão sei informar
        </div>';
    }

    //Functions para Valores de validação para o Evento
    function getDataMin(){
        $hoje = getdate();
        
        $dia = $hoje['mday'];
        $mes = $hoje['mon'];
        $ano = $hoje['year'];

        if($hoje['mday'] <= 9)
        {
            $dia = '0' . $hoje['mday'];
        }
        else{
            $dia = $dia;
        }

        if($hoje['mon']<= 9)
        { 
            $mes = '0'. $hoje['mon'];
        }
        else{
            $mes = $mes;
        }
        echo $ano."-" . $mes . "-" . $dia;
    }

    function getDataMax(){
        $hoje = getdate();
        $ano = ($hoje['year'] + 1) . '-12-31';
        echo $ano;
    }

    function getHoraMin(){
        $hoje = getdate();
        $hora= $hoje['hours'];
        $minuto = $hoje['minutes'];
        if($hora <= 9){
            $hora= '0'.$hoje['hours'];
        }
        if($minuto <= 9){
            $minuto = '0'.$hoje['minutes'];
        }
        echo $hora.':'.$minuto;
    }
    function getHoraMinA(){
        $hoje = getdate();
        $hora= $hoje['hours'];
        $minuto = $hoje['minutes'] + 1;
        if($hora <= 9){
            $hora= '0'.$hoje['hours'];
        }
        if($minuto <= 9){
            $minuto = '0'.$hoje['minutes'];
        }
        echo $hora.':'.$minuto;
    }

    //Functions para validação de valores do Usuario
    function getNascimentoMin(){
        $hoje = getdate();
        $ano = ($hoje['year'] - 80) . '-01-31'; 
        echo $ano;
    }

    function getNascimentoMax(){
        $hoje = getdate();
        $ano = ($hoje['year'] - 21) . '-12-31'; 
        echo $ano;
    }
    
?>