<meta charset="UTF-8">
<html lang="pt-br">

<?php 
date_default_timezone_set('America/Sao_Paulo');
    class evento{

        function __construct(){
			$this->con = $GLOBALS["con"];
        }
        
        public $idEvento;
        public $titulo;
        public $descricao;
        public $data;
        public $hrinicio;
        public $hrtermino;
        public $instituicao;
        public $idTipo;

        function edit_bd($idEvento){
            $sql = "SELECT e.cd_divulgacao, e.nm_titulo, e.ds_divulgacao, e.cd_instituicao, 
                    e.dt_evento, e.hr_inicio, e.hr_termino, e.ic_ativo_inativo, t.nm_tipo
            FROM tb_divulgacao AS e JOIN tb_evento AS t
            WHERE e.cd_tipo = t.cd_tipo AND e.ic_ativo_inativo = 1
            AND e.cd_instituicao = ".$_SESSION['id']." AND e.cd_divulgacao = '$idEvento'" ;
            $query = $this->con->query($sql);
            $res=$query->fetch_object();
            if($res != null){                
                $this->idEvento=$res->cd_divulgacao;
                $this->titulo=$res->nm_titulo;
                $this->descricao=$res->ds_divulgacao;
                $this->data=$res->dt_evento;
                $this->hrinicio=$res->hr_inicio;
                $this->hrtermino=$res->hr_termino;
                $this->instituicao=$res->cd_instituicao;
                $this->tipo=$res->nm_tipo;
            }
            else{
                header("Location: ../view/view.listaEvento.php");
            }
        }

        function add($titulo, $descricao, $data, $hrinicio, $hrtermino, $idTipo, $id, $img)
        {
            if($titulo == "" && $idTipo == "")
            {
                $titulo = "Não tem titulo.";
                $idTipo = "Não selecionado tipo de evento.";
            }

            $sql = "INSERT INTO tb_divulgacao (nm_titulo, ds_divulgacao, dt_evento, hr_inicio, hr_termino, cd_instituicao, cd_tipo, ic_ativo_inativo, img_name)" . 
            "VALUES ('$titulo', '$descricao', '$data', '$hrinicio', '$hrtermino', '$id', '$idTipo', 1, '$img')";
            return $this->con->query($sql);
        }
        function edit($id, $titulo, $tipo, $data, $hrinicio, $hrtermino, $descricao)
        {
            if($nome == ""){
                $nome = "Não tem nome.";
            }
            $sql = "UPDATE tb_divulgacao SET nm_titulo = '$titulo', ds_divulgacao = '$descricao', cd_tipo = '$tipo', dt_evento = '$data', hr_inicio = '$hrinicio', hr_termino = '$hrtermino' WHERE cd_divulgacao = '$id'";
            return $this->con->query($sql);
        }
        function delete($id){
            $sql = "UPDATE tb_divulgacao SET ic_ativo_inativo = 0 WHERE cd_divulgacao = '$id'";
            return $this->con->query($sql);
        }
    }
        function evento()
        {
            $con = $GLOBALS["con"];
            $sql = 
            "SELECT a.nm_titulo, a.cd_divulgacao,a.ds_divulgacao, b.nm_tipo, a.dt_evento, a.hr_inicio, a.hr_termino, a.img_name
            FROM tb_divulgacao as a, tb_evento as b
            WHERE a.cd_instituicao = ".$_SESSION['id']." AND a.cd_tipo = b.cd_tipo AND a.ic_ativo_inativo = 1 ORDER BY a.dt_evento ASC";
            $hoje = getdate();
            $query = $con->query($sql);
            
            while($sql=$query->fetch_array())
            {
                $id = $sql['cd_divulgacao'];
                $titulo = $sql["nm_titulo"];
                $descricao = $sql["ds_divulgacao"];
                $tipo = $sql["nm_tipo"];
                $data = $sql["dt_evento"];
                $time = strtotime($data);
                $data = date("d/m/Y", $time);
                $hrinicio = $sql["hr_inicio"];
                $hrtermino = $sql["hr_termino"];
                $img = $sql["img_name"];
    
                echo "
                    <div class='card' data-parent='listaEvento'>
                        <img class='card-img-top' src='../template/img/evento_img/".$img."' alt='".$titulo."'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $titulo. "</h5>
                            <p class='card-text'><span class='ti-bookmark'></span> Tipo: " . $tipo . "</p>
                            <p class='card-text'><span class='ti-calendar'></span> Data: " .$data . " às " . $hrinicio. " até " . $hrtermino. "</p>
                            <p class='card-text'><span class='ti-info-alt'></span> Descrição: " . $descricao . "<br></p>
                            <div class='form-row'>
                                <div class='col-md-6'>
                                <a href='../view/view.updateEvento.php?cd_divulgacao=".$id."'>
                                    <button class='btn bg-button'>Editar evento &nbsp <span class='ti-pencil'></span></button>
                                </a>                                    
                                </div>
                            </div>
                        </div>
                    </div><br>
                </div>";
            }
        }

        function eventoUsu()
        {
            $con = $GLOBALS["con"];
            $sql = 
            "SELECT a.nm_titulo, a.cd_divulgacao,a.ds_divulgacao, b.nm_tipo, a.dt_evento, a.hr_inicio, a.hr_termino, a.img_name
            FROM tb_divulgacao as a, tb_evento as b
            WHERE a.cd_tipo = b.cd_tipo AND a.ic_ativo_inativo = 1 ORDER BY a.dt_evento ASC";
            $hoje = getdate();
            $query = $con->query($sql);
            
            while($sql=$query->fetch_array())
            {
                $id = $sql['cd_divulgacao'];
                $titulo = $sql["nm_titulo"];
                $descricao = $sql["ds_divulgacao"];
                $tipo = $sql["nm_tipo"];
                $data = $sql["dt_evento"];
                $time = strtotime($data);
                $data = date("d/m/Y", $time);
                $hrinicio = $sql["hr_inicio"];
                $hrtermino = $sql["hr_termino"];
                $img = $sql["img_name"];
            
                echo"

                <div class='col-md-6 col-sm-12'>   
                    <div class='card' data-parent='listaEvento'>
                        <div class='card-body' >
                            <img class='card-img-top img-fluid' style='height: auto' src='../template/img/evento_img/".$img."' alt='".$titulo."'>
                            <h5 class='card-title'>" . utf8_encode($titulo). "</h5>
                            <p class='card-text'><span class='ti-bookmark'></span> Tipo: " . $tipo . "</p>
                            <p class='card-text'><span class='ti-calendar'></span> Data: " .$data . " às " . $hrinicio. " até " . $hrtermino. "</p>
                            <p class='card-text'><span class='ti-info-alt'></span> Descrição: " . utf8_encode($descricao) . "<br></p>
                            <div class='form-row'>
                                <div class='col-md-6'>
                                    <button class='btn bg-button'>Tenho interesse &nbsp <span class='ti-star'></span></button></a>         
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <br>";
            }
        }
?>