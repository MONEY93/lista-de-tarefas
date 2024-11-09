<?php
session_start();
require_once('conexao.php');

// var_dump($_REQUEST);

if (isset($_POST['create_tarefa'])) {
    $nome = trim($_POST['txtNome']);
    $descricao = trim($_POST['txtDescricao']);
    $status = intval($_POST['txtStatus']);
    $data = trim($_POST['txtData']);

    $sql = "INSERT INTO tarefa (nome, descricao, status_tarefa, data_limite) VALUES('$nome', '$descricao', '$status', '$data')";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit();
}

if (isset($_POST['delete_tarefa'])){
    $tarefaId = mysqli_real_escape_string($conn, $_POST['delete_tarefa']);
    $sql = "DELETE FROM tarefa WHERE id = '$tarefaId'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Tarefa com ID {$tarefaId} excluido com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Ops! Não foi possível excluir a tarefa";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit;
}

if (isset($_POST['edit_tarefa'])) {
    $tarefaId = mysqli_real_escape_string($conn, $_POST['tarefa_id']);
    $nome = mysqli_real_escape_string($conn, $_POST['txtNome']);
    $descricao = mysqli_real_escape_string($conn, $_POST['txtDescricao']);
    $status = intval($_POST['txtStatus']);
    $data = mysqli_real_escape_string($conn, $_POST['txtData']);

    $sql = "UPDATE tarefa SET nome = '{$nome}', descricao = '{$descricao}', status_tarefa = '{$status}', data_limite = '{$data}'";

    $sql .= "WHERE id = '{$tarefaId}'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Tarefa {$tarefaId}atualizada com sucesso!";
        $_SESSION['type'] = 'success'; 
    } else {
        $_SESSION['message'] = "Não foi possível atualizar a tarefa {$tarefaId}.";
        $_SESSION['type'] = 'error';
    }

    header("Location: index.php");   
    exit;
}
?>