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
                                                            <li class="list-group-item">${item.nome_categoria}</li>
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

    var entregue = 'Não Entregue';

    $.ajax({
        type: "post",
        url: "config/funcao_index.php",
        data: {
            action: 'lerEmAberto',
            entregue: entregue
        },
        dataType: "json",
    }).done (function(result){
        const lerEmAberto = result.map(item=>   `
                                                    <li class="list-group-item d-flex justify-content-between">${item.nome}
                                                        <button type="button" class="btn btn-outline-success h-50" onclick="AlterarStatus(${item.id_pedido})">Entregue</button>
                                                        <input type="hidden" value="${item.status}">
                                                    </li>
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
        const lerValidade = result.map(item=>   `
                                                    <li class="list-group-item"><p>${item.nome} - ${item.data_validade}</p></li>
                                                `);
        $('#validade').html(lerValidade.join(''));
    });

}

function acabando(){  

    $.ajax({
        type: "post",
        url: "config/funcao_index.php",
        data: {
            action: 'acabando'
        },
        dataType: "json",
    }).done(function(result){
        const verAcabando = result.map(item=>   `
                                                    <li class="list-group-item"><p>${item.nome} - ${item.qnt_Estoque}</p></li>
                                                `);
        $('#produtos_acabando').html(verAcabando.join(''));
    })

}   
 
categoria();
pedido();
EmAberto();
validade();
acabando();

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
        pedido();
        EmAberto()
    });
    
}