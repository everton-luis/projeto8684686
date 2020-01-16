<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Projeto cadastro empresas</title>
        <script src="jquery-3.3.1.min.js"></script>
        <style>

        .botao01{
            background: -webkit-linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
            background: -moz-linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
            background: -o-linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
            background: -ms-linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
            background: linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
            border: 1px solid #CCCCCE;
            border-radius: 3px;
            box-shadow: 0 3px 0 rgba(0, 0, 0, .3),
                        0 2px 7px rgba(0, 0, 0, 0.2);
            color: #616165;
            display: block;
            font-family: "Trebuchet MS";
            font-size: 14px;
            font-weight: bold;
            line-height: 25px;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            text-shadow:1px 1px 0 #FFF;
            padding: 5px 15px;
            position: relative;
            width: 80px;
        }


        </style>

        <?php 
            session_start();
            include('config.php');

            $sql = "select * from cadastro";
        
        
        ?>

    </head>

    <body>

        <h1>Projeto Cadastro de Empresas</h1>

        <br/><br/>

        <a href="cadastrar.php" class="botao01">Cadastrar empresa</a>
        <br/>

        <?php
            if(isset($_SESSION["msgcadastrar"])){
                echo 'Empresa cadastrada com sucesso';
                unset($_SESSION["msgcadastrar"]);
            }

            if(isset($_SESSION["msgeditar"])){
                echo 'Empresa editada com sucesso';
                unset($_SESSION["msgeditar"]);
            }

            if(isset($_SESSION["msgexcluir"])){
                echo 'Empresa excluída com sucesso';
                unset($_SESSION["msgexcluir"]);
            }

        ?>

        <br/><br/>

        <table id="mytable">
            <thead>
                <tr>
                    <th>Razão Social</th>
                    <th>Nome Fantasia</th>
                    <th>CNPJ</th>
                    <th>CPF</th>
                    <th>Fundação</th>
                    <th>CEP</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Numero</th>
                    <th>Editar</th>
                    <th>Excluir</th>

                </tr>

            </thead>
            <tbody>
                <?php
                    $sql = "select * from cadastro";
                    $sql = $pdo->query($sql);

                        if($sql->rowCount() > 0){
                            $usuarios = $sql->fetchAll();
                            foreach($usuarios as $usuario){ ?>
                                <tr>
                                    <td>
                                        <?php echo $usuario['razaosocial']; ?>
                                    </td>

                                    <td>
                                        <?php echo $usuario['nomefantasia']; ?>
                                    </td>

                                    <td>
                                        <?php echo $usuario['cnpj']; ?>
                                    </td>

                                    <td>
                                        <?php echo $usuario['cpf']; ?>
                                    </td>

                                    <td>
                                        <?php echo $usuario['fundacao']; ?>
                                    </td>

                                    <td>
                                        <?php echo $usuario['cep']; ?>
                                    </td>

                                    <td>
                                        <?php echo $usuario['rua']; ?>
                                    </td>

                                    <td>
                                        <?php echo $usuario['bairro']; ?>
                                    </td>

                                    <td>
                                        <?php echo $usuario['cidade']; ?>
                                    </td>

                                    <td>
                                        <?php echo $usuario['estado']; ?>
                                    </td>

                                    <td>
                                        <?php echo $usuario['numero']; ?>
                                    </td>

                                    <td>
                                        <a href="editar.php?id=<?php echo $usuario['id'] ?>"><img src="editar.png" width="40" height="40" /></a>
                                    </td>

                                    <td>
                                        <a href="excluir.php?id=<?php echo $usuario['id'] ?>" 
                                        onclick="return confirm('Você tem certeza que deseja deletar a empresa <?php echo $usuario['razaosocial'] ?> ?')">
                                        <img src="excluir.png" width="40" height="40" /></a>
                                    </td>
                        
                            
                                </tr>
                            
                            <?php } ?>
                        
                        
                    <?php } ?>
                

            </tbody>

        </table>
        
        <script src="jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="datatables.min.css"/>
        <script type="text/javascript" src="datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
      $('#mytable').DataTable( {
        
      } );
    } );
    </script>

    </body>


</html>