<!DOCTYPE html>
<html lang="pt-br">
<!--Inicio Referencias-->
<?php include '../template/referencias.factory.php'; include '..\Controller\controller.login.php';?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro ONG | +PETS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php nucleoReferencias(); ?>
    <script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
    <script> var wl = new WebLibras(); </script>
    <script>
        function verifica(){
            if(document.forms[0].email.value.length == 0) 
            {
                alert('Por favor, informe o seu EMAIL.');
                document.formCadastroINST.email.focus();
                return false;
            }
            return true;
        }
        
    </script>
</head>
<!--Fim Referencias -->

<!--Inicio Body -->
<body>
    <!--NavBar-->
    <?php navbar(); ?>
    <!--NavBar-->

    <!--Formulario Cadastro-->
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-sm-2"></div>
            <div class="col-md-10 col-sm-8 formulario">
                <div class="section">
                    <header class='text-center'>
                        <h2>Faça o Cadastro da ONG.</h2>
                        <span class="info">(<span style="color: red;">*</span>) Campos de preenchimento obrigatorio.</span>
                    </header>

                    <form name="formCadastroINST" class="form-horizontal" action="../controller/controller.cadastroONG.php" method="POST" onSubmit="return (verifica())"     enctype="multipart/form-data">
                        <br>
                        <p class="text-center font-weight-bold">Primeiro algumas informações do Responsavel.</p>
                        <div class="form-row">                   
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Nome do Responsavel<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="nomeRes" name="nomeRes" min="3" minlength="5" maxlength="80" required placeholder="Ex: Pedro Luis" autofocus>
                            </div>
                            <!---->
                            <div class="form-group col-md-6 col-sm-12">
                                <label>E-mail do Responsavel<span style="color: red;">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" maxlenght="80" onblur="checarEmail();" required placeholder="email@email.com">
                            </div>
                            <!---->
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Senha<span style="color: red;">*</span></label>
                                <input type="password" class="form-control" id="senha" name="senha" min="8" minlength="8" maxlength="20" required placeholder="Entre 8 a 20 caracteres">
                            </div>
                            <!---->
                            <div class="form-group col-md-6 col-sm-12">
                            <label>Confirmação da senha<span style="color: red;">*</span></label>
                            <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" min="8" minlength="8" maxlength="20" required placeholder="Entre 8 a 20 caracteres" onchange="javascript: validarSenha();">
                            </div>
                            <!---->
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Telefone com DDD<span style="color: red;">*</span></label>
                                <input type="tel" class="form-control" id="telefone" name="telefone" min="14" maxlength="14" onkeydown="javascript: fMasc( this, mTel );" required value="(13) " placeholder="(00)00000-0000">
                            </div>
                            <!---->
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Celular com DDD<span style="color: red;">*</span></label>
                                <input type="tel" class="form-control" id="celular" name="celular" minlength="15" maxlength="15" onkeydown="javascript: fMasc( this, mTel );" required value="(13) 9" placeholder="(00)00000-0000">
                            </div>
                        </div>
                        <p class="text-center font-weight-bold">Conte-nos sobre o seu projeto</p>
                        <div class="form-row">                          
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input success" type="radio" id="0" name="tipoinst" value="0" checked>
                                    <label class="custom-control-label" for="0">Sou uma organização sem fins lucrativos</label><br>
                                </div>
                                <div class="form-group custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" id="1" name="tipoinst" value="1">
                                    <label class="custom-control-label" for="1">Sou um negócio social</label><br>
                                </div>
                            </div>
                            <!---->
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Nome Fantasia<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="nomeFan" name="nomeFan" minlength="3" maxlength="100" required placeholder="Ex: ONG Amigos dos Animais">
                            </div>
                            <!---->
                            <div class="form-group col-md-6 col-sm-12">
                                <label>CNPJ<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" onblur="javascript: fMasc( this, mCNPJ ), validaCNPJ(this, mCNPJ);"  id="cnpj" name="cnpj" min="14" maxlength="14" required placeholder="00.000.000/0000-00">
                            </div>
                            <!---->
                            <div class="form-group col-md-12 col-sm-12">
                                <label>Escreva uma descição a respeito:</label><br>
                                <small>(Max. 500 caracteres)</small>
                                <textarea class="form-control" id="info" name="info" row="4" maxlength="500"> </textarea>
                            </div>
                            <!---->
                            <div class="form-group col-md-6 col-sm-12">
                                <header>Escolher uma foto</header>
                                <small>JPG, JPEG ou PNG</small>
                                <div class="custom-file">                                                                       
                                    <input type="file" class="custom-file-input" name="img_name" id="img_name" onchange="previewImage()"><br><br>
                                    <label class="custom-file-label">Selecionar Imagem</label>
                                    <img class='img-prev' style="vertical-align:unset;" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info bt-lg btn-block"> Concluir </button>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger bt-lg btn-block"> Cancelar </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Fim Formulario-->

    <!--Footer-->
    <br>
    <?php footer(); ?>
    <!--Footer-->
</body>
<!--Fim Body-->
</html>