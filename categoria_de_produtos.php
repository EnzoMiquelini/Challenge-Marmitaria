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
                <li class="nav-item">
                    <a href="estoque.php" class="bnt_aside btn btn-nav d-flex align-items-center gap-2 fs-5"><ion-icon></ion-icon> Lista de Produtos</a>
                </li>
            </ul>
        </div>
    </aside>
    <div class="d-flex justify-content-end w-100">
        <div class="p-0 mx-5 w-75">
            <!-- Lista -->
            <h1 class="text-center mt-5">Categoria de Alimentos</h1>
            <div class="shadow p-3 mb-5 bg-white rounded-4 mt-5">
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-success w-25" data-bs-toggle="modal" data-bs-target="#criar_categoria">Criar Categoria +</button>
                </div>
                <hr class="mb-0">
                <table class="table table-striped table-hover col-sm-8 mt-3">
                    <thead>
                        <tr>
                            <th colspan="3">Nome Categoria</th>
                        </tr>
                    </thead>
                    <tbody class="lista_categoria">
                    </tbody>
                </table>
            </div>
        
            <!-- Modal Cadastrar -->
            <div class="modal fade" id="criar_categoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Criar Categoria</h1>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="Nome" class="form-label">Nome</label>
                                    <input type="text" id="nome" class="form-control" name="nome" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Descrição" class="form-label">Descrição</label>
                                    <textarea class="form-control" id="descricao" style="height: 100px" name="descricao" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                                <button type="button" id="cadastrar_categoria" class="btn btn-success" data-bs-dismiss="modal">Criar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
            <!-- Modal Editar -->
            <div class="modal fade editar" id="editar_categoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Categoria</h1>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="edit_values_categoria">
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <a class="btn btn-secondary" data-bs-dismiss="modal">Voltar</a>
                                <button type="button" id="salvar_edicao_categoria" class="btn btn-success" data-bs-dismiss="modal">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Excluir -->
            <div class="modal fade" id="excluir_categoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Categoria</h1>
                        </div>
                        <div class="modal-body">
                            <div class="exluir_values_categoria">
            
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <a class="btn btn-secondary" data-bs-dismiss="modal">Voltar</a>
                            <button id="excluir_categoria" class="btn btn-danger" data-bs-dismiss="modal">Excluir</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Ver Mais -->
            <div class="modal fade" id="VerMais_categoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Mais Sobre</h1>
                    </div>
                    <div class="modal-body">
                        <div class="verMais_categoria">
        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
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
    <script src="Assets/categoria.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>