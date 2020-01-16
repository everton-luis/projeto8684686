<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Projeto cadastro empresas</title>
        <script src="jquery-3.3.1.min.js"></script>
        <style>
            

        </style>
    </head>

<?php 
    session_start();
    include('config.php');

    if(isset($_POST['razaosocial'])){
        $razaosocial = $_POST['razaosocial'];
        $nomefantasia = $_POST['nomefantasia'];
        $cnpj = $_POST['cnpj'];
        $cpf = $_POST['cpf'];
        $fundacao = $_POST['fundacao'];
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $numero = $_POST['numero'];

        $sql = "insert into cadastro (razaosocial,nomefantasia,cnpj,cpf,fundacao,cep,rua,bairro,cidade,estado,numero) values 
                ('$razaosocial','$nomefantasia','$cnpj','$cpf','$fundacao','$cep','$rua','$bairro','$cidade','$estado','$numero')";


        $sql = $pdo->query($sql);

        echo "<script>location.href='index.php';</script>";
        $_SESSION["msgcadastrar"] = 'Empresa cadastrada com sucesso';

    }

    
?>

    <body>

        <h1>Cadastro Empresa</h1>
        
        <form id="form" method="POST">
            <fieldset>
                <legend>
                    Dados Empresa
                </legend>
                <label>
                    Razao Social:
                    <input type="text" name="razaosocial" id="razaosocial" size="30" required="required" /><br/>
                </label>
                    <br/>
                <label>
                    Nome fantasia:
                    <input type="text" name="nomefantasia" id="nomefantasia" size="30" required="required" /><br/>
                </label>
                    <br/>

                <label>
                    Fundação:
                    <input type="date" name="fundacao" id="fundacao" required="required" /><br/>
                </label>
                <br/>

                Cpf ou Cnpj:<br/>
                <input type="radio" name="cadastro" value="cpf"  checked="checked" />CPF
                <input type="radio" name="cadastro" value="cnpj" />CNPJ

                <br/>
                
                <label>
                    <span id="nomecnpj">CNPJ (Ex:87.393.708/0001-38):</span>
                    <input type="text" name="cnpj" id="cnpj" pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}"  />
                </label>
                
                <label>
                    <span id="nomecpf">CPF (Ex:697.659.610-06):</span>
                    <input type="text" name="cpf" id="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" />
                </label>

            </fieldset>
            <fieldset>
                <legend>
                    Endereço Empresa
                </legend>
                
                <label for="cep">CEP (ex: 58000-100):</label>
                <input type="text" value="" name="cep" id="cep" maxlength="9" required="required"><span id="mensagem"></span><br/><br/>
                
                <label for="rua">Rua:</label>
                <input type="text" value="" name="rua" id="rua" size="30" required="required"><br/><br/>

                <label for="cidade">Cidade:</label>
                <input type="text" value="" name="cidade" id="cidade" size="30" required="required"><br/><br/>

                <label for="estado">Estado:</label>
                <input type="text" value="" name="estado" id="estado" size="30" required="required"><br/><br/>

                <label for="bairro">Bairro:</label>
                <input type="text" value="" name="bairro" id="bairro" size="30" required="required"><br/><br/>

                <label for="numero">Numero:</label>
                <input type="text" name="numero" id="numero" size="10" pattern="[0-9]+$" required="required" ><br/><br/>

                


            </fieldset>

            <br/><br/>

            <input type="submit" value="Cadastrar" />

        </form>



    </body>

    <script>

        $(document).ready(function(){

            $("#cnpj").hide();
            $("#nomecnpj").hide();

            

            $( "input[name=cadastro]" ).change(function() {
                //alert('teste');
                var cadastro = $("input[name=cadastro]:checked").val();
                //alert(cadastro);
                if(cadastro=='cpf'){
                    
                    $("#cnpj").hide();
                    $("#nomecnpj").hide();
                    $("#cpf").show();
                    $("#nomecpf").show();
                    $("#cpf").attr("required", "req");
                    $("#cnpj").removeAttr("required");
                    
                }

                if(cadastro=='cnpj'){
                    $("#cnpj").show();
                    $("#nomecnpj").show();
                    $("#cpf").hide();
                    $("#nomecpf").hide();
                    $("#cnpj").attr("required", "req");
                    $("#cpf").removeAttr("required");
                }

            });

            $("#cep").blur(function(e){
                //console.log("saiu");
                var cep = $("#cep").val();
                //console.log(cep);
                var url="https://viacep.com.br/ws/"+cep+"/json/";
                //console.log(url);
                var validacep = /^[0-9]{5}-?[0-9]{3}$/;
                //var retorno = pesquisarCEP(url);

                if(validacep.test(cep)){
                    //alert('teste');
                    $("#mensagem").hide();
                    pesquisarCEP(url);
                }else{
                    //alert('teste1');
                    $("#mensagem").show();
                    $("#mensagem").html("cep inválido");
                    $("#bairro").val("");
                }

            });

            function pesquisarCEP(endereco){
                $.ajax({
                    type:"GET",
                    url:endereco,
                    async:false

                }).done(function(data){
                    //console.log(data);
                    $("#bairro").val(data.bairro);
                    $("#rua").val(data.logradouro);
                    $("#cidade").val(data.localidade);
                    $("#estado").val(data.uf);
                }).fail(function(data){
                    console.log("erro");
                });
            }


            $("#form").submit(function(){


            });
    
        });


    </script>




</html>
