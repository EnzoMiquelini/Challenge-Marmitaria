function categoria(){
    
    $.ajax({
        method: "post",
        url: "config/funcao_categoria.php",
        data: {
            action: 'ler',
        },
        dataType: "json",
    }).done (function (result){
        const lerCategoriaIndex = result.map(item =>    `
                                                            <li><p>${item.nome_categoria}</p></li>
                                                        `);
        $('#listar_categorias').html(lerCategoriaIndex.join(''));
    });

}


function pedido(){

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
    });

}    

function EmAberto(){

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
                                                    <li class="list-group-item d-flex justify-content-between">${item.nome}<button type="button" class="btn btn-outline-success onclick="AlterarStatus(${item.id_pedido})" h-50">Entregue</button></li>
                                                `);
        $('#emAberto').html(lerEmAberto.join(''));
    });

}


function validade(){

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

}

function acabendo(){  

    // $.ajax({
    //     type: "post",
    //     url: "url",
    //     data: "data",
    //     dataType: "dataType",
    //     success: function (response) {
            
    //     }
    // });

}   
 
categoria();
pedido();
EmAberto();
validade();

function AlterarStatus(id_pedido){

    var status = 'Entregue';

    $.ajax({
        type: "post",
        url: "config/funcao_index.php",
        data: {
            action: 'editarStatus',
            id_pedido: id_pedido,
            status: status
        },
        dataType: "json",
    }).done(function(result){
        console.log(result);
    });
    
}