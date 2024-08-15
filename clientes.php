<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- Required meta tags -->
    <!-- <meta charset="utf-8"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/food.png" type="image/x-icon">
    <link rel="stylesheet" href="css/sidebar.css">
    <title>Sabores Do Bem</title>
    
</head>
<body>

    <aside class="aside bg-black text-white align-items-center rounded-4 mx-4 my-4 position-fixed">
        <div class="text-aside d-flex justify-content-center align-items-center gap-2 fs-5">
            <ion-icon name="grid-outline"></ion-icon> Menu
        </div>
        <div class="hrAside d-flex justify-content-center">
            <hr class="mt-0 w-75 border border-white border-2 opacity-50">
        </div>
        <div>
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <a href="index.php" class="bnt_aside btn btn-nav d-flex align-items-center gap-2 fs-5" id="novo_pedido"><ion-icon class="icon-Nav" name="arrow-back-outline"></ion-icon>Voltar</a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="d-flex justify-content-end w-100">

        <div class="p-0 mx-5 w-75">
        <!-- Lista -->
            <h1 class="text-center mt-5">Histórico de Clientes</h1>
            <div class="shadow p-3 mb-5 bg-white rounded-4 mt-5 d-flex justify-content-center flex-column mt-5">
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-success w-25" data-bs-toggle="modal" data-bs-target="#adicionar_cliente">Cadastrar Cliente +</button>
                </div>
                <hr class="mb-0">
                <table class="table table-striped table-hover col mt-3 rounded-3">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>telefone</th>
                            <th colspan="2">CPF</th>
                        </tr>
                    </thead>
                    <tbody class="lista_clientes">
                    </tbody>
                </table>
            </div>
            <!-- Modal Adicionar -->
            <div class="modal fade w-15" id="adicionar_cliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar Cliente</h1>
                        </div>
                        <form method="post" id="formClientes">
                            <div class="modal-body">
                                <div class="formulario mt-5">
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome</label>
                                            <input type="text" class="form-control" id="nome" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="sobrenome" class="form-label">Sobrenome</label>
                                            <input type="text" class="form-control" id="sobrenome" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="telefone" class="form-label">Telefone</label>
                                            <input type="tel" class="form-control" id="telefone_cliente_adicionar" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="CPF" class="form-label">CPF</label>
                                            <input type="numb" class="form-control" id="CPF" required>
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
            <!-- Modal Ver Mais -->
            <div class="modal fade" id="VerMais_cliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-between">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Mais Sobre</h1>
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                        </div>
                        <div class="modal-body">
                            <div class="verMais_cliente">
                                <ul class="list-group list-group-flush" id="verCliente">
                                </ul>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Data</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Pagamento</th>
                                        <th scope="col">Entrega</th>
                                        <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="verMais_pedidoCliente">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
        
                        </div>
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
      $('#telefone_cliente_adicionar').mask('(00) 00000-0000');
    //   $('#telefone_cliente_editar').mask('(00) 00000-0000');
      $('#CPF').mask('000.000.000-00');
      $('.CPF').mask('000.000.000-00');
    </script>
    <script src="Assets/cliente.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>