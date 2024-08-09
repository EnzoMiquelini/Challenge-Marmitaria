<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <title>Sabores Do Bem</title>
    
</head>
<body>

    <div class="container">

        <div class="cadastro">
            <div class="d-flex justify-content-between">
                <div class="card bg-black text-white align-items-center justify-content-between mt-3 w-25 rounded" style=" height: 96vh;">
                    <div class="d-flex flex-column gap-3 mt-3" style="width: 85%;">
                        <a href="index.php" class="btn btn-secondary mt-3" tabindex="-1" role="button" aria-disabled="true">Voltar</a>
                        <button id="continuar_pedido" class="btn btn-secondary" style="width: 100%;" tabindex="-1" role="button" aria-disabled="true">Continuar</button>
                    </div>
                </div>
                <div class="container mt-5">
                    <h1 class="text-center">Cadastro</h1>
        
                    <form method="post" id="formClientes" class="d-flex justify-content-center">
                        <div class="formulario mt-5 w-75">
                            <div class="mb-3">
                                <label for="CPF" class="form-label">CPF</label>
                                <input type="numb" class="form-control" id="CPF_pedido" name="cpf" required>
                            </div>
                            <div class="resCadastro">
        
                            </div>
                            <div>
                                <button type="submit" id="cadastrar_cliente_pedido" class="btn btn-primary" data-bs-dismiss="modal">Cadastrar</button>
                            </div>
                        </div>
                    </form>
        
                </div>
            </div>
        </div>



        <div class="pedido">
            <div class="d-flex justify-content-between">
                <div class="card bg-black text-white align-items-center justify-content-between mt-3 w-25 rounded" style=" height: 96vh;">
                    <div class="d-flex flex-column gap-3 mt-3" style="width: 85%;">
                        <button id="cadastro_voltar" class="btn btn-secondary mt-3" tabindex="-1" role="button" aria-disabled="true">Voltar</button>
                        <button id="continuar_confirmacao" class="btn btn-secondary" style="width: 100%;" tabindex="-1" role="button" aria-disabled="true">Continuar</button>
                    </div>
                    <div style="width: 80%;" class="exlcuir_pedido">
                    </div>
                </div>
                <div class="container mt-5 ">
        
                    <h1 class="text-center">Pedido</h1>
                    <div class="text-center">
                        <button type="button" id="add_produto_pedido" class="btn btn-primary w-50 mt-5" data-bs-toggle="modal" data-bs-target="#adicionar_produto" >Adicionar Produto +</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <table class="table table-striped w-75 mt-5">
                            <thead>
                                <tr>
                                <th scope="col">Nome do Produto</th>
                                <th scope="col" class="text-center">Quantidade</th>
                                <th scope="col" class="text-center">Valor</th>
                                <th class="id_pedido_lista"></th>
                                </tr>
                            </thead>
                            <tbody class="lista_produtos">
                                <tr>
                                    <td colspan="3" class="text-center">Não há nenhum produto adicionado</td>
                                </tr>
                            </tbody>
                            <tfoot class="calc_Pedido">
                                <th colspan="2">Valor Total:</th>
                                <th class="text-center">R$: </th>
                                <th></th>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Modal Adicionar -->
                    <div class="modal fade w-15" id="adicionar_produto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Adicionar Produto</h1>
                                </div>
                                <form method="post" id="formClientes">
                                    <div class="modal-body">
                                        <div class="formulario mt-5">
                                            <div id="form_pedido">

                                            </div>
                                            <div id="listar_pedido_produtos">

                                            </div>
                                            <div class="mb-3">
                                                <label for="nome" class="form-label">Nome</label>
                                                <input type="text" class="form-control" id="nome_produto_pedido" required>
                                            </div>
                                            
                                            <div class="mb-3 content-center">
                                                <label for="qnt_add" class="form-label">Quantidade a ser adicionada</label>
                                                <div class="d-flex w-25 justify-content-between">
                                                    <input type="number" class="form-control w-50" id="qnt_add_pedido" value="1" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                                        <button type="submit" id="cadastrar_produto_pedido" class="btn btn-primary" data-bs-dismiss="modal">Adicionar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="confirm-pedido">
            <div class="d-flex justify-content-between">
                <div class="card bg-black text-white align-items-center justify-content-between mt-3 w-25 rounded" style=" height: 96vh;">
                    <div class="d-flex flex-column gap-3 mt-3" style="width: 85%;">
                        <button id="pedido_voltar" class="btn btn-secondary mt-3" tabindex="-1" role="button" aria-disabled="true">Voltar</button>
                        <button id="confirmar_pedido" class="btn btn-secondary" style="width: 100%;" tabindex="-1" role="button" aria-disabled="true">Finalizar Pedido</button>
                        <a href="index.php" id="ir_pagina_inicial" class="btn btn-secondary" style="width: 100%;" tabindex="-1" role="button" aria-disabled="true">Ir para a Página Inicial</a>
                    </div>
                    <div style="width: 80%;" class="exlcuir_pedido">
                    </div>
                </div>
                <div class="container mt-5 ">
                    <h1 class="text-center">Resumo do Pedido</h1>
                    <div class="d-flex justify-content-center">
                        <table class="table table-striped w-75 mt-5">
                            <thead>
                                <tr></tr>
                                <tr>
                                    <th scope="col">Nome do Produto</th>
                                    <th scope="col" class="text-center">Quantidade</th>
                                    <th scope="col" class="text-center">Valor</th>
                                    <th class="id_pedido_lista"></th>
                                </tr>
                            </thead>
                            <tbody class="lista_produtos">
                                <tr>
                                    
                                </tr>
                            </tbody>
                            <tfoot class="calc_Pedido">
                                <input type="hidden" id="valor_total" value="1">
                                <th colspan="2">Valor Total:</th>
                                <th class="text-center" id="valor_total">R$: </th>
                            </tfoot>
                        </table>
                    </div>
                    <div class="d-flex justify-content-around mt-5" style="height: 200px;">
                        <div class="card w-25 m-0 container">
                            <div class="card-body">
                                <h5 class="card-title">Forma de Entrega</h5>
                                <div class=" d-flex flex-column justify-content-around h-75" id="forma_de_entrega">
                                    <div>
                                        <input type="radio" name="entrega" id="retirada" value="retirada">
                                        <label for="retirada">Retirada no Local</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="entrega" id="entrega" value="entrega">
                                        <label for="entrega">Entrega</label>
                                    </div>
                                    <div class="endereco">
                                        <label for="endereco">Endereço</label>
                                        <input type="text" name="endereco" id="endereco">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card w-25 m-0 container">
                            <div class="card-body">
                                <h5 class="card-title">Forma de Pagamento</h5>
                                <div class="d-flex flex-column justify-content-around h-75">
                                    <div>
                                        <input type="radio" name="pagamento" id="pix" value="pix">
                                        <label for="pix">Pix</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="pagamento" id="cartao" value="cartao">
                                        <label for="cartao">Cartão</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="pagamento" id="dinheiro" value="dinheiro">
                                        <label for="dinheiro">Dinheiro</label>
                                    </div>
                                </div>
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
      $('#telefone').mask('(00)00000-0000');
      $('#CPF_pedido').mask('000.000.000-00');
    </script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script src="Assets/pedido.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>