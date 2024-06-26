function getEstoque(){

    $.ajax({
        method: "post",
        url: "config/funcao_estoque.php",
        data: {
            action: 'lerProdutoCategoria'
        },
        dataType: "json",
    }).done(function(result){
        const lerProduto = result.map(item =>  `
                                                    <tr>
                                                        <td><p>${item.nome}</p></td>
                                                        <td><p>${item.nome_categoria}<p></td>
                                                        <td><p>${item.qnt_Estoque}</p></td>
                                                        <td><p>${item.data_validade}</p></td>
                                                        <td><p>${item.data_compra}</p></td>
                                                        <td><button type="button" class="btn btn-primary edit_produto" data-bs-toggle="modal" data-bs-target="#editar_produto" onclick="editarProduto(${item.id_produto})">Editar</button>
                                                        <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#excluir_produto" onclick="excluirProduto(${item.id_produto})">Excluir</button></td>
                                                    </tr>
                                                    `);
        $('.lista_estoque').html(lerProduto.join(''));
    })

}

getEstoque();



function adicionarProduto(){

    $.ajax({
        method: "post",
        url: "config/funcao_categoria.php",
        data: {
            action: 'ler'
        },
        dataType: "json",
    }).done (function (result){
        const lerCategoria = result.map(item => `
                                                    <option value="${item.id_categoria}">${item.nome_categoria}</option>
                                                `);
        $('.categoria_listar').append(lerCategoria);
    })

    const data = new Date();
    const dia = data.getDate();
    const mes = data.getMonth();
    const ano = data.getFullYear();
    $('.data_Compra_Produto').html('<label for="compra" class="form-label">Data de compra</label> <input type="text" id="compra" nome="data" class="form-control" value="' + dia + '/' + mes + '/' + ano + '" required>');

}

$('#cadastrar_produto').click(function (e) { 
    e.preventDefault();

    var nome = $('#nome').val();
    var categoria = $('#categoria').val();
    var qnt_add = $('#qnt_add').val();
    var validade = $('#validade').val();
    var compra = $('#compra').val();

    $.ajax({
        method: "post",
        url: "config/funcao_estoque.php",
        data: {
            action: 'inserir',
            nome: nome,
            categoria: categoria,
            qnt_add: qnt_add,
            validade: validade,
            compra: compra
        },
        dataType: "json",
    }).done(function(result){
        $('#nome').val('');
        $('#categoria').val('');
        $('#qnt_add').val('');
        $('#validade').val('');
        $('#compra').val('');
        if(result == ('Nao Cadastrado')){
            Swal.fire({
                icon: "error",
                title: "Falha ao Adicionar",
                showConfirmButton: false,
                timer: 1500
            })
            return;
        }
        Swal.fire({
            icon: "success",
            title: "Adicionado Com Sucesso",
            showConfirmButton: false,
            timer: 1500
        })
        getEstoque();
    })

})



function editarProduto(id_produto) {  

    // $.ajax({
    //     method: "post",
    //     url: "config/funcao_categoria.php",
    //     data: {
    //         action: 'ler'
    //     },
    //     dataType: "json",
    // }).done (function (result){
    //     console.log(result);
    //     const lerCategoriaEditar = result.map(item => `
    //                                                 <option value="${item.id_categoria}">${item.nome_categoria}</option>
    //                                             `);
    //     $('.test').html(lerCategoriaEditar.join(''));
    // })

    $.ajax({
        method: "post",
        url: "config/funcao_estoque.php",
        data: {
            action: 'lerProdutoCategoria',
            id_produto: id_produto
        },
        dataType: "json",
    }).done (function(result){
        console.log(result)
        const editarNomeProduto = result.map(item =>    `
                                                            <input id="produto_editar" type="hidden" value="${item.id_produto}"></input>
                                                            <div class="mb-3">
                                                                <label for="nome" class="form-label">Nome</label>
                                                                <input type="text" class="form-control" id="nome_produto" value="${item.nome}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="categoria" class="form-label">Categoria</label>
                                                                <select class="form-select" class="categoria_lista" id="categoria_editar_produto" value="${item.id_categoria}" required>
                                                                    <option selected></option>
                                                                    <option>${item.nome_categoria}</option>
                                                                </select>
                                                                <div class="teste"></div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="qnt_Add" class="form-label">Quantidade a ser adicionada</label>
                                                                <input type="tel" class="form-control" id="qnt_add_edit" value="${item.qnt_Estoque}" required>
                                                            </div>
                                                            <div class="mb-3 d-flex justify-content-around">
                                                                <div class="w-25">
                                                                    <label for="validade" class="form-label">Data de validade</label>
                                                                    <input type="date" class="form-control" id="validade_editar" value="${item.data_validade}" required>
                                                                </div>
                                                                <div class="w-25">
                                                                    <label for="compra" class="form-label">Data de compra</label>
                                                                <input type="date" class="form-control" id="compra_editar" value="${item.data_compra}" required>
                                                                </div>
                                                            </div>
                                                        `);
        $('.edit_values_produto').html(editarNomeProduto.join(''));
    })

}
      
$('#salvar_edicao_produto').click(function (e) { 
    e.preventDefault();
    
    var id_produto = $('#produto_editar').val();
    var id_categoria = $('#categoria_editar_produto').val();
    var nome = $('#nome_produto').val();
    var qnt_add = $('#qnt_add_edit').val();
    var validade = $('#validade_editar').val();
    var compra = $('#compra_editar').val();

    $.ajax({
            method: "post",
            url: "config/funcao_estoque.php",
            data: {
                action: 'editar',
                id_produto: id_produto,
                id_categoria: id_categoria,
                nome: nome,
                qnt_add: qnt_add,
                validade: validade,
                compra: compra
            },
            dataType: "json",
    }).done (function(result){
        if(result == ('Nao Editado')){
            Swal.fire({
                icon: "error",
                title: "Falha ao Editar",
                showConfirmButton: false,
                timer: 1500
            })
            return;
        }
        Swal.fire({
            icon: "success",
            title: "Editado Com Sucesso",
            showConfirmButton: false,
            timer: 1500
        })
        getEstoque();
    })

})



function excluirProduto(id_produto){

    
    $.ajax({
        method: "post",
        url: "config/funcao_estoque.php",
        data: {
            action: 'lerProdutoCategoria',
            id_produto: id_produto
        },
        dataType: "json",
        
    }).done (function (result) {
        const excluirValuesProduto = result.map(item => `
                                                            <input type="hidden" id="id_cliente" value="${item.id_produto}"></input>
                                                            <p>Deseja realmente excluir o produto ${item.nome}?</p>
                                                        `);
        $('.exluir_values_produto').html(excluirValuesProduto.join(''))
    })
    
}

$('#excluir_produto').click(function (e) { 
    e.preventDefault();

    var id_produto = $('#id_produto').val();
                
    $.ajax({
        method: "post",
        url: "config/funcao_estoque.php",
        data: {
            action: 'excluir',
            id_produto: id_produto
        },
        dataType: "json",
    }).done (function ( result ) { 

        getEstoque();
    });
    getEstoque();
   
});