<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <title>Sabores Do Bem</title>
    
</head>
<body>
    <div class="container d-flex">
        <aside class="row bg-black text-white align-items-center w-25 rounded-3 mt-3" style=" height: 96vh; ">
            <div class="col d-flex flex-column gap-3" >
                <a href="pedido.php" class="btn btn-secondary w-100 ">Novo Pedido</a>
                <a href="Categoria_de_produtos.php" class="btn btn-secondary w-100 ">Categoria de Produtos</a>
                <!-- <a href="" class="btn btn-secondary w-100 ">Histórico Pedidos</a> -->
                <a href="clientes.php" class="btn btn-secondary w-100 ">Histórico Clientes</a>
            </div>
            <div>
            </div>
        </aside>
        
        <div class="container px-5" >
            <div class="row text-center mt-5 gap-3" >
                <div class="h1">Sabores do Bem</div>
                    <form class="col gap-3" role="search">
                        <!-- <div class="d-flex gap-3 justify-content-center"> -->
                            <!-- <input class="form-control w-50" type="search" placeholder="Pesquisar" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Enviar</button> -->
                        <!-- </div> -->
                    </form>
                </div>
            <div class="mt-5">
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-header text-center">
                                Produtos Acabando
                            </div>
                            <ul class="list-group list-group-flush" style="padding: 0;">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                                <li class="list-group-item">A third item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-header text-center">
                                Produtos a Vencer
                            </div>
                            <ul class="list-group list-group-flush" style="padding: 0;">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                                <li class="list-group-item">A third item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-header text-center">
                                Pedidos em Aberto
                            </div>
                            <ul class="list-group list-group-flush" style="padding: 0;">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                                <li class="list-group-item">A third item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 mt-4">
                        <table class="table table-striped table-hover col-sm-8 border">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="3">Pedidos</th>
                                </tr>
                                <tr>
                                    <th>Nome Cliente</th>
                                    <th>Data</th>
                                    <th>Hora</th>
                                </tr>
                            </thead>
                            <tbody id="listar_clientes">

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <div class="card" >
                            <div class="card-header text-center">
                                Categorias
                            </div>
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
  </body>
</html>