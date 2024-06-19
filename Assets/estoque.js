getEstoque();



$('#cadastrar_produto').click(function (e) { 
    e.preventDefault();

    var nome = $('#nome').val();
    var categoria = $('#categoria').val();
    var qnt_add = $('#qnt_Add').val();
    var validade = $('#validade').val();
    var compra = $('#compra').val();
    
    if(nome != ('') && categoria != ('') && qnt_add != ('') && validade != ('') && compra != ('')){
        $.ajax({
            method: "post",
            url: "config/funcao_estoque.php",
            data: {
                action: 'inserir',
                nome: nome,
                categoria: categoria,
                qnt_Add: qnt_add,
                validade: validade,
                compra: compra,
            },
            dataType: "json",
        }).done(function(result){
            $('#nome').val('');
            $('#categoria').val('');
            $('#qnt_Add').val();
            $('#validade').val();
            $('#compra').val();
            console.log(result);
            getEstoque();
        })
    }if(nome == ('') || categoria == ('') || qnt_add == ('') || validade == ('') || compra == ('')){
        console.log("Error...")
    }
});



function getEstoque(){

    $.ajax({
        method: "post",
        url: "config/funcao_estoque.php",
        data: {
            action: 'ler'
        },
        dataType: "json",
    }).done(function(result){
        const lerCategorias = result.map(item =>  `
                                                    <tr>
                                                        <td><p>${item.nome}</p></td>
                                                        <td><p>${item.categoria}</p></td>
                                                        <td><p>${item.qnt_Estoque}</p></td>
                                                        <td><p>${item.data_validade}</p></td>
                                                        <td><p>${item.data_compra}</p></td>
                                                        <td><button type="button" class="btn btn-primary edit_produto" data-bs-toggle="modal" data-bs-target="#editar_produto" onclick="editarProduto(${item.id_produto})">Editar</button>
                                                            <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#excluir_produto" onclick="excluirProduto(${item.id_produto})">Excluir</button></td>
                                                    </tr>
                                                    `)
        $('.lista_estoque').html(lerCategorias.join(''))
    })
}



function editarProduto(id_produto) {  


    $.ajax({
            method: "post",
            url: "config/funcao_estoque.php",
            data: {
                action: 'ler',
                id_produto: id_produto,
            },
            dataType: "json",
        }).done(function(result){
            console.log(result);
            result; 
            const editarNomeProduto = result.map(item =>  `
                                                            <div class="mb-3">
                                                                <label for="nome" class="form-label">Nome</label>
                                                                <input type="text" class="form-control" id="nome_produto" value="${item.nome}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="categoria" class="form-label">Categoria</label>
                                                                <input type="text" class="form-control" id="sobrenome" value="${item.categoria}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="qnt_Add" class="form-label">Quantidade a ser adicionada</label>
                                                                <input type="tel" class="form-control" id="qnt_Add" value="${item.qnt_Estoque}" required>
                                                            </div>
                                                            <div class="mb-3 d-flex justify-content-around">
                                                                <div class="w-25">
                                                                    <label for="validade" class="form-label">Data de validade</label>
                                                                    <input type="date" class="form-control" id="validade" value="${item.data_validade}" required>
                                                                </div>
                                                                <div class="w-25">
                                                                    <label for="compra" class="form-label">Data de compra</label>
                                                                <input type="date" class="form-control" id="compra" value="${item.data_compra}" required>
                                                                </div>
                                                            </div>
                                                    `)
            $('.edit_values_produto').html(editarNomeProduto.join(''))
        })


        $('#salvar_edicao_produto').click(function (e) { 
            e.preventDefault();
            
            var nome = $('#nome_produto').val();
            var descricao = $('#descricao_produto').val();
        
            $.ajax({
                    method: "post",
                    url: "config/funcao_estoque.php",
                    data: {
                        action: 'editar',
                        id_categoria: id_categoria,
                        nome: nome,
                        descicao: descricao,
                    },
                    dataType: "json",
            }).done(function(result){
                console.log(result[0]);
                getEstoque();
            })
        });
}






function excluirProduto(id_produto){

    
    $.ajax({
        method: "post",
        url: "config/funcao_estoque.php",
        data: {
            action: 'ler',
            id_produto: id_produto,
        },
        dataType: "json",
        
    }).done (function (result) {
        const excluirValuesProduto = result.map(item => `
                                                            <p>Deseja realmente excluir o produto ${item.nome}?</p>
                                                        `);
        $('.exluir_values_produto').html(excluirValuesProduto.join(''))
    })
    $('#excluir_produto').click(function (e) { 
        e.preventDefault();
                    
        $.ajax({
            method: "post",
            url: "config/funcao_estoque.php",
            data: {
                action: 'excluir',
                id_produto: id_produto,
            },
            dataType: "json",
        }).done (function () { 
            getEstoque();
        });

        getEstoque();
       
    });
};
            

