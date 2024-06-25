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


    <!-- Lista -->
        <h1 class="text-center mt-5">Histórico de Clientes</h1>
        <div class="botoes">
            <a href="index.php" class="btn btn-primary w-25">Voltar</a>
        </div>
        <table class="table table-striped table-hover col border mt-5 rounded-3">
            <thead>
                <tr>
                    <td colspan="5" class="text-center">
                    <button type="button" class="btn btn-outline-primary w-25" data-bs-toggle="modal" data-bs-target="#adicionar_cliente">Adicionar Cliente +</button>
                    </td>
                </tr>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th colspan="2">telefone</th>
                </tr>
            </thead>
            <tbody class="lista_clientes">

            </tbody>
        </table>


        <!-- Modal Adicionar -->
        <div class="modal fade w-15" id="adicionar_cliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar Cliente</h1>
                    </div>
                    <form method="post" id="formClientes">
                        <div class="modal-body">
                            <div class="formulario mt-5">
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
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                            <button type="submit" id="cadastrar_cliente" class="btn btn-primary" data-bs-dismiss="modal">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal Editar -->
        <div class="modal fade w-15" id="editar_cliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Cliente</h1>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <div class="formulario mt-5 edit_values_cliente">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                            <button type="submit" id="salvar_edicao_cliente" class="btn btn-primary" data-bs-dismiss="modal">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal Excluir -->
        <div class="modal fade w-15" id="excluir_cliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div id="confirmar_exclusao">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir Cliente</h1>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="formulario mt-5">
                                    <div class="excluir_values_cliente">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="excluir_cliente" class="btn btn-danger" data-bs-dismiss="modal">Excluir</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="Assets/jQuery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
      $('#telefone').mask('(00) 00000-0000');
      $('#CPF').mask('000.000.000-00');
    </script>
    <script src="Assets/cliente.js"></script>
</body>
</html>