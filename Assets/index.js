function getIndex(){
    
    $.ajax({
        method: "post",
        url: "config/funcao_categoria.php",
        data: {
            action: 'ler',
        },
        dataType: "json",
    }).done (function (result){
        const lerCategoriaIndex = result.map(item => `<li>${item.nome_categoria}</li>`);
        $('#listar_categorias').html(lerCategoriaIndex.join(''));
    })
    
    $.ajax({
        method: "post",
        url: "config/funcao_index.php",
        data: {
            action: 'lerPedido',
        },
        dataType: "json",
    }).done (function (result){
    
        const lerClientesIndex = result.map(item => `
                                                        <tr>
                                                        <td>${item.nome}</td>
                                                        <td>${item.data_pedido}</td>
                                                        <td>${item.status}</td>
                                                    `);
        $('#listar_pedidos').html(lerClientesIndex.join(''));
    })
    
    $.ajax({
        type: "post",
        url: "config/funcao_index.php",
        data: {
            action: 'lerEmAberto'
        },
        dataType: "json",
    }).done (function(result){
        console.log(result);
        const lerEmAberto = result.map(item=>   `
                                                    <li class="list-group-item d-flex justify-content-between">${item.nome}<button type="button" class="btn btn-outline-success h-50">Ok</button></li>
                                                `);
        $('#emAberto').html(lerEmAberto.join(''));
    });

    $.ajax({
        type: "post",
        url: "config/funcao_index.php",
        data: {
            action: 'validade'
        },
        dataType: "json",
    }).done(function(result){  
        console.log(result);
        const lerValidade = result.map(item=>   `
                                                    <li class="list-group-item"><p>${item.nome}</p><p>${item.data_validade}</p></li>
                                                `);
        $('#validade').html(lerValidade.join(''));
    });


    
    $.ajax({
        type: "method",
        url: "url",
        data: "data",
        dataType: "dataType",
        success: function (response) {
            
        }
    });
}   

getIndex();