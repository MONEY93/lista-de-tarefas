<?php
session_start();
require_once("conexao.php");

$sql = "SELECT * FROM tarefa";
$tarefas = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(110deg, black,indigo);
            min-height: 100vh; 
        }
    </style>
</head>
<body class="gradient-bg">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <?php include('mensagem.php'); ?>
                                <div class="mb-3">
                                    <h3>Tarefas
                                        <a href="tarefa-create.php" class="btn btn-dark float-end">Adicionar tarefa</a>
                                    </h3>
                                </div>
                            <table class="table table-hover mt-4">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Data</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tarefas as $tarefa):?>
                                            <tr>
                                                <td><?php echo $tarefa['id'];?></td>
                                                <td><?php echo $tarefa['nome'];?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Descrição
                                                        </button>
                                                            <ul class="dropdown-menu">
                                                            <li>
                                                                <textarea class="dropdown-item form-control" style="white-space: pre-wrap; width: 100%; height: auto; overflow-y: auto;" readonly><?php echo $tarefa['descricao']; ?></textarea>
                                                            </li>
                                                    </div>
                                                </td>
                                                <td><?php echo date('d/m/Y', strtotime($tarefa['data_limite']));?></td>
                                                <td>
                                                <?php 
                                                if ($tarefa['status_tarefa'] == 1) {
                                                    echo " Pendente...";
                                                } elseif ($tarefa['status_tarefa'] == 2) {
                                                    echo " Em execução...";
                                                } elseif ($tarefa['status_tarefa'] == 3) {
                                                    echo " Concluído";
                                                } else {
                                                    echo "Indefinido";
                                                }
                                                ?>
                                                </td>
                                                <td>
                                                    <form action="acoes.php" method="POST" class="d-inline">
                                                        <div class="btn-group">
                                                            <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Ações
                                                            </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="tarefa-edit.php?id=<?=$tarefa['id']?>">Editar</a></li>
                                                                    <li><button class="dropdown-item" onclick="return confirm('Tem certeza que deseja excluir?')" name="delete_tarefa" type="submit" value="<?=$tarefa['id']?>">
                                                                        Deletar
                                                                    </button></li>
                                                                </ul>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


