<?php
    session_start();
    include('config.php');

    $id = $_GET['id'];
    if(isset($_GET['id'])){
        $sql = "delete from cadastro where id=$id";
        $sql = $pdo->query($sql);
        echo "<script>location.href='index.php';</script>";
        $_SESSION["msgexcluir"] = 'Empresa excluida com sucesso';

    }
    

?>