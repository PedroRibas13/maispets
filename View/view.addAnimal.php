<!DOCTYPE html>
<html lang="pt-br">
<!--Inicio Referencias-->
<?php include '..\model\connection.php'; include '..\model\animal.factory.php'; include '../template/referencias.factory.php'; ?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adicionar Animais | +Pets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php nucleoReferencias(); ?>
    <script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
    <script> var wl = new WebLibras(); </script>
   
</head>
<!--Fim Referencias-->
<!--Inicio Body-->
<?php
include '../controller/controller.login.php';

if ($_SESSION['nome'] == null) {
    header('Location: index.php');
} else {
    ?>
<body>
    <!--NavBar-->
    <?php navbar(); ?>
    <!--NavBar-->

    <!--Inicio Body-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <br>
                        <?php
                            }                        
                            if($_SESSION['tipo'] == 'Usuario')
                            {
                                menuU(); 
                            }
                            if($_SESSION['tipo'] == 'Instituicao')
                            {
                                menuI();
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-1"></div>
            
            <!--Formulario Animal-->
            <div class="col-md-6" id="cont-border">
                <div class="col-md-12">
                    <form class="cont-border" action="../controller/controller.cadastroANI.php" method="POST" enctype="multipart/form-data">
                        <header class='text-center'>
                        <h2>Faça o cadastro do animal a seguir:</h2>
                            <span class="info">(<span style="color: red;">*</span>) Campos de preenchimento obrigatorio</span>
                        </header>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <header class="font-weight-bold">Escolher uma foto<span style="color: red;">*</span></header>
                                <small>JPG, JPEG ou PNG</small>
                                <div class="custom-file">                                                                       
                                    <input type="file" class="custom-file-input" name="img_name" id="img_name"  required onchange="previewImage()"><br><br>
                                    <label class="custom-file-label">Selecionar Imagem</label>
                                    <img class='img-prev' style="vertical-align:unset;" />
                                </div>
                            </div>
                        
                            <div class="form-group col-md-12 col-sm-12">                        
                                <label class="font-weight-bold">Nome</label>
                                <input type="text" class="form-control" name="nome"  max="50">                        
                            </div>
                            <div class="form-group col-md-12 col-sm-12">                 
                                <label class="text-center font-weight-bold">Sexo<span style="color: red;">*</span></label><br>
                                <input type="radio" name="sexo" value="0"> Fêmea &nbsp; 
                                <input type="radio" name="sexo" value="1"> Macho 
                                <br><br>                        
                            </div>
                        
                            
                            <div class="form-group col-md-6 col-sm-12">                 
                                <label class="font-weight-bold">Ano de Nascimento (aproximadamente)<span style="color: red;">*</span></label>
                                <input type="number" id="nascimento" class="form-control"  name="nascimento" min="2000" max="2020"><br>
                                <input type="checkbox" onclick="desabilitar(this.checked)" name="nascimentocb">&nbspNão sei informar
                            </div>
            
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="font-weight-bold">Localização do animal<span style="color: red;">*</span></label>
                                <br><br>
                                <select class="form-control" name="cidade" required>
                                    <option value=''>Selecione</option>
                                    <option value="1">Santos</option>
                                    <option value="2">São Vicente</option>
                                </select>        
                            </div>

                        
                            <div class="form-group col-md-6 col-sm-12">   
                                <label class="font-weight-bold">Especie<span style="color: red;">*</span></label>
                                <select class="form-control" id="select" name="especie" required>
                                    <option value=''>Selecione</option>
                                    <option value="1">Cachorro</option>
                                    <option value="2">Gato</option>
                                    <option value="3">Ave</option>
                                    <option value="4">Roedor</option>
                                    <option value="5">Tartaruga</option>
                                </select>                        
                            </div>

                            <div class="form-group col-md-6 col-sm-12">                     
                                <label class="font-weight-bold">Porte<span style="color: red;">*</span></label>
                                <select class="form-control" name="porte">
                                    <option value=''>Selecione</option>
                                    <option value="1">Pequeno</option>
                                    <option value="2">Médio</option>
                                    <option value="3">Grande</option>
                                </select> 
                                <br>                       
                            </div>
                            <br>
                            </div>
                            <header class='text-center'>
                                <span class="text-center">Informações sobre a saúde do animal</span>
                                <hr>
                            </header>
                            <div id='pai' class="form-group col-md-12 col-sm-12">
                            
                                <label class="font-weight-bold">Vacinas<span style="color: red;">*</span></label>
                                <div id='1'>
                                    <input type="checkbox" name="vacina" id="vacina1" value="1">&nbspV8<br>
                                    <input type="checkbox" name="vacina" id="vacina2" value="2">&nbspV10<br>
                                    <input type="checkbox" name="vacina" id="vacina3" value="3">&nbspGripe<br>
                                    <input type="checkbox" onclick="desabVac(this.checked)" id="vacina" name="vacina" value="0" disable=true>&nbspNão sei informar<br>
                                </div>
                                <div id='2'>
                                    <input type="checkbox" name="vacina" id="vacina4" value="5">&nbspV3<br>
                                    <input type="checkbox" name="vacina" id="vacina5" value="6">&nbspV4<br>
                                    <input type="checkbox" name="vacina" id="vacina6" value="7">&nbspV5<br>
                                    <input type="checkbox" name="vacina" id="vacina7" value="4">&nbspAntirrábica<br>
                                    <input type="checkbox" onclick="desabVac(this.checked)" id="vacina" name="vacina" value="0" disable=true>&nbspNão sei informar<br>
                                </div>
                                <div id='3'>
                                    <input type="checkbox" onclick="desabVac(this.checked)" name="vacina" value="0" disable=true>&nbspNão sei informar<br>
                                </div>
                                <div id='4'>
                                    <input type="checkbox" name="vacina" id="vacina8" value="7">&nbspMixomatose<br>
                                    <input type="checkbox" name="vacina" id="vacina9" value="9">&nbspDoença Hemorrágica <br>    
                                    <input type="checkbox" onclick="desabVac(this.checked)" id="vacina" name="vacina" value="0" disable=true>&nbspNão sei informar<br>
                                </div>
                                <div id='5'>
                                    <input type="checkbox" onclick="desabVac(this.checked)" id="vacina" name="vacina" value="0" disable=true>&nbspNão sei informar<br>
                                </div>
                                
                            </div>
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div id="castracao" class="form-group col-md-6 col-sm-12">
                                        <label class="font-weight-bold">Castração<span style="color: red;">*</span></label><br>   
                                        <input type="radio" name="castracao" value="1">&nbsp; É castrado<br>
                                        <input type="radio" name="castracao" value="0">&nbsp; Não é castrado<br>                                    
                                        <input type="radio" name="castracao" value="2" checked>&nbsp; Não sei informar
                                    </div>

                                    <div id="especial" class="form-group col-md-6 col-sm-12">
                                        <label class="font-weight-bold">Especial<span style="color: red;">*</span></label><br>
                                        <input type="radio" name="especial" value="1">&nbsp; É especial<br>
                                        <input type="radio" name="especial" value="0">&nbsp; Não é especial <br>                                    
                                        <input type="radio" name="especial" value="2" checked>&nbsp; Não sei informar
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">      
                                <br>                  
                                <label class="font-weight-bold">Informações adicionais </label><br>
                                <small>(Max. 500 caracteres) </small>
                                <textarea class="form-control" name="info" rows="6" maxlength="500"></textarea>                        
                            </div>
                        
                        <br>
                        <div class="form-row">
                            <div class="col-md-6 col-sm-6">
                                <button type="submit" class="btn btn-info btn-block" > Concluir </button>&nbsp;
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <button type="reset" class="btn btn-danger btn-block" > Cancelar </button>
                            </div>
                        </div>
                        <hr>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>
    <!--Fim Formulario-->
    <!--Footer-->
    <?php footer(); ?>
    <!--Footer-->
</body>
<!--Fim Body-->
</html>