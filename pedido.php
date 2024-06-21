<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- Required meta tags -->
    <!-- <meta charset="utf-8"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <title>Sabores Do Bem</title>
    
</head>
<body>

    <div class="container">
        <div class="pedido">
            <div class="d-flex justify-content-between">
                <div class="card bg-black text-white align-items-center justify-content-between mt-3 w-25 rounded" style=" height: 96vh;">
                    <div class="d-flex flex-column gap-3 mt-3" style="width: 85%;">
                        <button onclick="window.history.back()" class="btn btn-secondary mt-3" tabindex="-1" role="button" aria-disabled="true">Voltar</button>
                        <button id="continuar_cadastro" class="btn btn-secondary" style="width: 100%;" tabindex="-1" role="button" aria-disabled="true">Continuar</button>
                    </div>
                    <div style="width: 80%;">
                        <a href="index.php" class="btn btn-secondary mb-3" style="width: 100%;" tabindex="-1" role="button" aria-disabled="true">Cancelar Pedido</a>
                    </div>
                </div>
                <div class="container mt-5  justify-content-center">
        
                    <h1 class="text-center">Pedido</h1>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary w-50 mt-5" data-bs-toggle="modal" data-bs-target="#adicionar_produto">Adicionar Produto +</button>
                    </div>
                    <table class="table table-striped w-75 mt-5">
                        <thead>
                            <tr>
                            <th scope="col">Nome do Produto</th>
                            <th scope="col">Quantidade</th>
                            </tr>
                        </thead>
                        <tbody class="lista_produtos">
            
                        </tbody>
                    </table>
                    <!-- Modal Adicionar -->
                    <div class="modal fade w-15" id="adicionar_produto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar Produto</h1>
                                </div>
                                <form method="post" id="formClientes">
                                    <div class="modal-body">
                                        <div class="formulario mt-5">
                                            <div class="mb-3">
                                                <label for="nome" class="form-label">Nome</label>
                                                <input type="text" class="form-control" id="nome" required>
                                            </div>
                                            <div class="mb-3 content-center">
                                                <label for="qnt_add" class="form-label">Quantidade a ser adicionada</label>
                                                <div class="d-flex w-25 justify-content-between">
                                                    <button type="button" class="btn btn-primary">+</button>
                                                    <input type="numb" class="form-control w-50" id="qnt_add" value="1" required>
                                                    <button type="button" class="btn btn-danger">-</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                                        <button type="submit" id="cadastrar_produto" class="btn btn-primary" data-bs-dismiss="modal">Adicionar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="cadastro">
            <div class="d-flex justify-content-between">
                <div class="card bg-black text-white align-items-center justify-content-between mt-3 w-25 rounded" style=" height: 96vh;">
                    <div class="d-flex flex-column gap-3 mt-3" style="width: 85%;">
                        <button id="pedido_voltar" class="btn btn-secondary mt-3" tabindex="-1" role="button" aria-disabled="true">Voltar</button>
                        <button id="continuar_cadastro" class="btn btn-secondary" style="width: 100%;" tabindex="-1" role="button" aria-disabled="true">Continuar</button>
                    </div>
                    <div style="width: 80%;">
                        <a href="index.php" class="btn btn-secondary mb-3" style="width: 100%;" tabindex="-1" role="button" aria-disabled="true">Cancelar Pedido</a>
                    </div>
                </div>
                <div class="container mt-5">
                    <h1 class="text-center">Cadastro</h1>

                    <form method="post" id="formClientes" class="d-flex justify-content-center">
                            <div class="formulario mt-5 w-75">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                                <div class="mb-3">
                                    <label for="sobrenome" class="form-label">Sobrenome</label>
                                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telefone" class="form-label">Telefone</label>
                                    <input type="tel" class="form-control" id="telefone" name="tel" required>
                                </div>
                                <div class="mb-3">
                                    <label for="CPF" class="form-label">CPF</label>
                                    <input type="numb" class="form-control" id="CPF" name="cpf" required>
                                </div>
                            </div>
                    </form>

                </div>
            </div>

        </div>

    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    <script src="Assets/jQuery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
      $('#telefone').mask('(00)00000-0000');
      $('#CPF').mask('000.000.000-00');
    </script>
    <script src="Assets/pedido.js"></script>
</body>
</html>