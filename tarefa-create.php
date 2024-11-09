<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tarefa</title>
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
                            <form action="acoes.php" method="POST">
                                <div class="mb-3">
                                <h4>
                                    Criar Tarefa
                                    <a href="index.php" class="btn btn-dark float-end">Voltar</a>
                                </h4>
                                </div>
                                <div class="mb-3 mt-4">
                                    <label for="txtNome">Nome</label>
                                    <input type="text" name="txtNome" id="txtNome" class="form-control">
                                </div>
                                <div class=" mb-3">
                                    <label for="txtDescricao">Descrição</label>
                                    <textarea type="text" name="txtDescricao" id="txtDescricao" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="txtData">Data</label>
                                    <input type="date" name="txtData" id="txtData" class="form-control">
                                </div>
                                <div>
                                    <select class="form-select" aria-label="Default select example" name="txtStatus" id="txtStaus">
                                        <option selected>Status</option>
                                        <option value="1">Pendente</option>
                                        <option value="2">Execução</option>
                                        <option value="3">Concluido</option>
                                    </select>
                                </div>
                                <div class="mt-4 mb-3">
                                    <button type="submit" name="create_tarefa" class="btn btn-dark float-end">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>