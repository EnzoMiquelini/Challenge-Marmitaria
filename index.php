<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="img/food.png" type="image/x-icon">
    <title>Sabores Do Bem</title>
    
</head>
<body>
    <div class="background d-flex">

        <aside class="aside bg-black text-white align-items-center rounded-4 mx-4 my-4">
            <div class="text-aside d-flex justify-content-center align-items-center gap-2 fs-5">
                <ion-icon name="grid-outline"></ion-icon> Menu
            </div>
            <div class="hrAside d-flex justify-content-center">
                <hr class="mt-0 w-75 border border-white border-2 opacity-50">
            </div>
            <div>
                <ul class="navbar-nav gap-3">
                    <li class="nav-item">
                        <a href="pedido.php" class="btn btn-nav w-75 d-flex align-items-center gap-2 fs-5" id="novo_pedido"><ion-icon class="icon-Nav" name="add-outline"></ion-icon>Novo Pedido</a>
                    </li>
                    <li class="nav-item">
                        <a href="Categoria_de_produtos.php" class="btn btn-nav w-75 d-flex align-items-center gap-2 fs-5"><ion-icon class="icon-Nav" name="bag-outline"></ion-icon> Produtos</a>
                    </li>
                    <!-- <a href="" class="btn btn-secondary w-100 ">Histórico Pedidos</a> -->
                    <li class="nav-item">
                        <a href="clientes.php" class="btn btn-nav w-75 d-flex align-items-center gap-2 fs-5"><ion-icon class="icon-Nav" name="people-outline"></ion-icon> Clientes</a>
                    </li>
                </ul>
            </div>
        </aside>
        
        <div class="p-0 mx-5 justify-content-center w-75" >
            <div class="row text-center mt-5" >
                <div class="mb-5">
                    <h1>Sabores do Bem</h1>
                </div>
            </div>
            <div class="mt-5">
                <div class="row">
                    <div class="col-sm">
                        <div class="shadow p-3 mb-5 bg-white rounded-4">
                            <div class="text-center mb-3">
                                <h4><strong>Produtos Acabando</strong></h4>
                            </div>
                            <hr class="mb-0">
                            <ul class="list-group list-group-flush p-0" id="produtos_acabando">
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="shadow p-3 mb-5 bg-white rounded-4">
                            <div class="text-center mb-3">
                                <h4><strong>Produtos Próximos a Validade</strong></h4>
                            </div>
                            <hr class="mb-0">
                            <ul class="list-group list-group-flush p-0" id="validade">
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="shadow p-3 mb-5 bg-white rounded-4">
                            <div class="text-center mb-3">
                                <h4><strong>Pedidos em Aberto</strong></h4>
                            </div>
                            <hr class="mb-0">
                            <ul class="list-group list-group-flush p-0" id="emAberto">
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 mt-4 shadow p-3 mb-5 bg-white rounded-4">
                        <table class="table table-striped table-hover">
                            <thead>
                            <div class="text-center mb-3">
                                <h4><strong>Pedidos</strong></h4>
                            </div>
                                <hr class="mb-0">
                            </thead>
                            <tbody id="listar_pedidos">

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <div class="shadow p-3 mb-5 bg-white rounded-4" >
                            <div class="text-center mb-3">
                                <h4><strong>Categorias</strong></h4>
                            </div>
                            <hr class="mb-0">
                            <ul class="list-group list-group-flush text-center overflow-y-auto p-0" id="listar_categorias">
                               
                            </ul>
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

    <script src="Assets/jquery.js"></script>
    <script src="Assets/index.js"></script>
    <script src="Assets/jQuery.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>