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
        <h1 class="text-center mt-5">Estoque</h1>
        
        <div class="botoes mt-5">
            <a href="categoria_de_produtos.php" class="btn btn-primary w-25">Voltar</a>
        </div>
        <table class="table table-striped table-hover col-sm-8 border mt-5">
            <thead>
                <tr>
                    <td colspan="6" class="text-center">
                        <button type="button" class="btn btn-outline-primary w-25" data-bs-toggle="modal" data-bs-target="#adicionar_produto" onclick="adicionarProduto()">Adicionar Produto +</button>
                    </td>
                </tr>
                <tr>
                    <th>Nome Produto</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                    <th>Data da Compra</th>
                    <th colspan="2">Data de Validade</th>
                </tr>
            </thead>
            <tbody class="lista_estoque">

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
                                    <div class="mb-3">
                                        <label for="categoria" class="form-label">Categoria</label>
                                        <select class="form-select categoria_listar" id="categoria" required>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="qnt_Add" class="form-label">Quantidade a ser adicionada</label>
                                        <input type="number" class="form-control" id="qnt_add" required>
                                    </div> 
                                    <div class="mb-3 d-flex justify-content-around">
                                        <div class="w-25">
                                            <label for="validade" class="form-label date">Data de validade</label>
                                            <input type="text" id="validade" name="validade" placeholder="00/00/0000" class="form-control"/>
                                        </div>
                                        <div class="w-25 data_Compra_Produto">
                                            
                                            
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


        <!-- Modal Editar -->
        <div class="modal fade w-15" id="editar_produto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Produto</h1>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <div class="formulario mt-5 edit_values_produto">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                            <button type="submit" id="salvar_edicao_produto" class="btn btn-primary" data-bs-dismiss="modal">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal Excluir -->
        <div class="modal fade w-15" id="excluir_produto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="modalCliente">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div id="confirmar_exclusao">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Produto</h1>
                        </div>
                        <div class="modal-body">
                            <div class="formulario mt-5">
                                <div class="exluir_values_produto">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" id="excluir_produto" class="btn btn-danger" data-bs-dismiss="modal">Excluir</button>
                            </div>
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
      $('#validade').mask('99/99/9999');
      $('#compra').mask('99/99/9999');
    </script>
    <script src="Assets/estoque.js"></script>
</body>
</html>