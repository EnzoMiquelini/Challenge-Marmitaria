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
        <h1 class="text-center mt-5">Categoria de Alimentos</h1>
        <div class="d-flex botoes mb-5 mt-5 justify-content-between w-100">
            <a href="index.php" class="btn btn-primary w-25">Voltar</a>
            <a href="estoque.php" class="btn btn-outline-primary w-25">Estoque</a>
        </div>
        <table class="table table-striped table-hover col-sm-8 border">
            <thead>
                <tr>
                    <td colspan="3" class="text-center">
                        <button type="button" class="btn btn-outline-success w-25" data-bs-toggle="modal" data-bs-target="#criar_categoria">Criar Categoria +</button>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Nome Categoria</th>
                </tr>
            </thead>
            <tbody class="lista_categoria">

            </tbody>
        </table>

        

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
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                            <button type="button" id="cadastrar_categoria" class="btn btn-primary" data-bs-dismiss="modal">Criar</button>
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
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                            <button type="button" id="salvar_edicao_categoria" class="btn btn-primary" data-bs-dismiss="modal">Editar</button>
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
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
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

    
  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="Assets/jQuery.js"></script>
    <script src="Assets/categoria.js"></script>
</body>
</html>