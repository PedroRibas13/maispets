<!DOCTYPE html>
<html lang="pt-br">
<!--Inicio Referencias-->
<?php include '../template/referencias.factory.php'; include '..\Controller\controller.login.php';?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro | +PETS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php nucleoReferencias(); ?>
    <script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
    <script> var wl = new WebLibras();</script>
    <script>
        function verifica(){
            if(document.forms[0].email.value.length == 0) 
            {
                alert('Por favor, informe o seu EMAIL.');
                document.formCadastro.email.focus();
                return false;
            }
            return true;
        }
        function checarEmail(){
            if(document.forms[0].email.value == "" || document.forms[0].email.value.indexOf('@') == -1 || document.forms[0].email.value.indexOf('.') == -1)
            {
                alert("Por favor, informe um EMAIL válido!");
                document.getElementById('email').value='';
                return false;
            }
        }
    </script>
</head>
<!--Fim Referencias-->
<!--Inicio Body-->
<body>
    <!--NavBar-->
    <?php navbar(); ?>
    <!--NavBar-->

    <!--Formulario Cadastro-->
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 formulario">
                <div class="section">
                    <header class='text-center'>
                        <h2>Faça seu Cadastro</h2>
                        <span class="info">(<span style="color: red;">*</span>) Campos de preenchimento obrigatorio</span>
                    </header>
                    <br>
                    <form name="formCadastro" class="form-horizontal" action="../controller/controller.cadastroUSU.php" method="POST" enctype="multipart/form-data" onSubmit="return (verifica())">
                        <div class="form-row">
                            <br>
                            <!---->                                                      
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Nome completo<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="nome" required autofocus min="3" minlength="5" maxlength="80" placeholder="Ex: Pedro Luis">
                            </div>
                            <!---->                            
                            <div class="form-group col-md-6 col-sm-12">
                                <label>E-mail<span style="color: red;">*</span></label>
                                <input type="email" class="form-control" name="email" maxlength="80" id="email" onblur="checarEmail();" required placeholder="email@email.com">
                            </div>
                            <!---->
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Senha<span style="color: red;">*</span></label>
                                <input type="password" class="form-control" id="senha" name="senha" required min="8" minlength="8" maxlength="20" placeholder="Entre 8 a 20 caracteres">
                            </div>
                            <!---->                            
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Confirmar senha<span style="color: red;">*</span></label>
                                <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" required min="8" maxlength="20" placeholder="Igual a anterior" onchange="javascript: validarSenha();">
                            </div>
                            <!---->
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Data de Nascimento<span style="color: red;">*</span></label>
                                <input type="date" class="form-control" name="nascimento" required min="<?php getNascimentoMin(); ?>" max="<?php getNascimentoMax();?>">
                            </div>
                            <!---->                            
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Nº de Celular:<span style="color: red;">*</span></label>
                                <input type="tel" class="form-control" name="celular" onkeydown="javascript: fMasc( this, mTel );" min="15" maxlength="15" value="(13) 9" required placeholder="(00)00000-0000">
                            </div>
                            <!---->
                            
                            <div class="form-group col-md-12 col-sm-12">
                                <label>Informações Adicionais:</label><br>
                                <small>(Max. 500 caracteres)</small>
                                <textarea class="form-control" name="info" row="4" maxlength="500"></textarea>
                            </div>
                            
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
                            <div class="form-group col-md-6 col-sm-12">
                                <button type="submit" class="btn btn-info bt-lg btn-block"> Concluir </button>
                            </div>
                           
                            <div class="form-group col-md-6 col-sm-12">
                                <button type="reset" class="btn btn-danger bt-lg btn-block" onclick=previewImage()> Cancelar </button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Fim do Formulario-->

    <!--Footer-->
    <br>
    <?php footer(); ?>
    <!--Footer-->
</body>
<!--Fim Body-->
</html>