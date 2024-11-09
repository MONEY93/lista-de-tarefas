<?php
session_start();
require_once('conexao.php');

$tarefa = [];

if (!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    $tarefaId = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM tarefa WHERE id = '{$tarefaId}'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) >0) {
        $tarefa = mysqli_fetch_array($query);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(110deg, black, indigo);
            min-height: 100vh; 
        }
    </style>
</head>
<body class="gradient-bg">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-header">
                    <div class="card-body">
                        <?php
                        if ($tarefa) : 
                        ?>
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="tarefa_id" value="<?=$tarefa['id']?>">
                            <div  class="mb-3">
                                <h4>
                                    Editar tarefa
                                    <a href="index.php" class="btn btn-dark float-end">Voltar</a>
                                </h4>
                            </div>
                            <div class=" mb-3 mt-4">
                                <label for="txtNome">Nome</label>
                                <input type="text" name="txtNome" id="txtNome" value="<?=$tarefa['nome']?>" class="form-control">
                            </div>
                            <div class=" mb-3">
                                <label for="txtDescricao">Descrição</label>
                                <textarea type="text" name="txtDescricao" id="txtDescricao" value="<?=$tarefa['descricao']?>" class="form-control"><?=$tarefa['descricao']?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="txtData">Data</label>
                                <input type="date" name="txtData" id="txtData" value="<?=$tarefa['data_limite']?>" class="form-control">
                            </div>
                            <div>
                                <select class="form-select" aria-label="Default select example" name="txtStatus" id="txtStatus">
                                    <option selected>Status</option>
                                    <option value="1" <?=$tarefa['status_tarefa'] == 1 ? 'selected' : '' ?>>Pendente</option>
                                    <option value="2"  <?=$tarefa['status_tarefa'] == 2 ? 'selected' : '' ?>>Execução</option>
                                    <option value="3"  <?=$tarefa['status_tarefa'] == 3 ? 'selected' : '' ?>>Concluido</option>
                                </select>
                            </div>
                            <div class=" mt-4 mb-3">
                                <button type="submit" name="edit_tarefa" class="btn btn-dark float-end">Salvar</button>
                            </div>
                        </form>
                        <?php
                        else:
                        ?>
                        <div class="alert alert-warning alert-dimissible fade show" role="alert">
                            Tarefa não encontrada
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>