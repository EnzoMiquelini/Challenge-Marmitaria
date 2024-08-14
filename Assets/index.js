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
                                                    <li class="list-group-item">
                                                        <p class="m-1 d-flex justify-content-between align-items-center fs-5">${item.nome} <strong class="text-danger">${item.qnt_Estoque}</strong></p>
                                                    </li>
                                                `);
        $('#produtos_acabando').html(verAcabando.join(''));
    })
        
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
                                                    <li class="list-group-item ">
                                                        <p class="m-1 d-flex justify-content-between align-items-center fs-5">${item.nome}<strong class="text-danger">${item.data_validade}</strong></p>
                                                    </li>
                                                `);
        $('#validade').html(lerValidade.join(''));
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
        if(result == 'Nao Em Aberto'){
            $('#emAberto').html('<li class="list-group-item text-center fs-5">Não há Pedidos</li>');
        }
        const lerEmAberto = result.map(item=>   `
                                                    <li class="list-group-item d-flex justify-content-between align-items-center fs-5">${item.nome}
                                                        <button type="button" class="btn btn-outline-success" onclick="AlterarStatus(${item.id_pedido})">Entregue</button>
                                                        <input type="hidden" value="${item.status}">
                                                    </li>
                                                `);
        $('#emAberto').html(lerEmAberto.join(''));
        
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
        console.log(result)
        if(result == 'status'){
            console.log('aqui');
            return;
        }
        const lerClientesIndex = result.map(item => `
                                                        <tr>
                                                            <td>
                                                                <p class="m-0">Nome:</p>
                                                                <p class="m-0 fs-5">${item.nome}</p>
                                                            </td>
                                                            <td>
                                                                <p class="m-0">Data / Hora:</p>
                                                                <p class="m-0 fs-5">${item.data_pedido}</p>
                                                            </td>
                                                            <td>
                                                                <p class="m-0">Status:</p>
                                                                <p class="m-0 fs-5">${item.status}</p>
                                                            </td>
                                                        </tr>
                                                    `);
        $('#listar_pedidos').html(lerClientesIndex.join(''));
    });

}    

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
                                                            <li class="list-group-item"><p class="m-1 fs-5">${item.nome_categoria}</p></li>
                                                        `);
        $('#listar_categorias').html(lerCategoriaIndex.join(''));
    });

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