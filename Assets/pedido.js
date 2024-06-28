$('.pedido').hide();
$('#continuar_pedido').hide();
$('#cadastrar_cliente_pedido').hide();
$('.cadastro').show();
$('.confirm-pedido').hide();

$('#cadastro_voltar').click(function (e) {
    
    $('.pedido').hide();
    $('.cadastro').show();
    $('.confirm-pedido').hide();

})

$('#continuar_confirmacao').click(function (e) { 
    
    $('.pedido').hide();
    $('.cadastro').hide();
    $('.confirm-pedido').show();

})

$('#pedido_voltar').click(function (e) { 
    
    $('.pedido').show();
    $('.cadastro').hide();
    $('.confirm-pedido').hide();

})



$('#CPF_pedido').blur(function (e) { 
    e.preventDefault();

    var cpf_pedido = $('#CPF_pedido').val();

    $.ajax({
        method: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'lerClientePedido',
            cpf_pedido: cpf_pedido
        },
        dataType: "json",
    }).done (function(result){
        if(result == ('Sem CPF')){
            $('#cadastrar_cliente_pedido').show();
            var cadClientePedido =      `
                                            <div class="mb-3">
                                                <label for="nome" class="form-label">Nome</label>
                                                <input type="text" class="form-control nome_produto_pedido" name="nome" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="sobrenome" class="form-label">Sobrenome</label>
                                                <input type="text" class="form-control" id="sobrenome_pedido" name="sobrenome" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="telefone" class="form-label">Telefone</label>
                                                <input type="tel" class="form-control" id="telefone_pedido" name="tel" >
                                            </div>
                                        `;
            $('.resCadastro').html(cadClientePedido.join(''));
            return;
        }
        const lerClientePedido = result.map(item=>  `       
                                                            <div class="mb-3">
                                                                <label for="nome" class="form-label">Nome</label>
                                                                <input type="text" class="form-control nome_produto_pedido" value="${item.nome}" name="nome" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="sobrenome" class="form-label">Sobrenome</label>
                                                                <input type="text" class="form-control" id="sobrenome_pedido" value="${item.sobrenome}" name="sobrenome" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="telefone" class="form-label">Telefone</label>
                                                                <input type="tel" class="form-control" id="telefone_pedido" value="${item.telefone}" name="tel" required>
                                                            </div>
                                                        `);
        $('.resCadastro').html(lerClientePedido.join(''));
        lerCliente(cpf_pedido);
        $('#continuar_pedido').show();
    })
    
})



$('#cadastrar_cliente_pedido').click(function (e) { 
    e.preventDefault();

    var cpf_pedido = $('#CPF_pedido').val();
    var nome_pedido = $('.nome_produto_pedido').val();
    var sobrenome_pedido = $('#sobrenome_pedido').val();
    var tel_pedido = $('#telefone_pedido').val();

    $.ajax({
        method: "post",
        url: "config/funcao_cliente.php",
        data: {
            action: 'inserir',
            nome: nome_pedido,
            sobrenome: sobrenome_pedido,
            telefone: tel_pedido,
            CPF: cpf_pedido
        },
        dataType: "json",
    }).done (function(result) {
        console.log(result)
        if(result == ('Nao Cadastrou')){
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
        $('#continuar_pedido').show();
        lerCliente(cpf_pedido);
    })
    
})



$('#continuar_pedido').click(function (e) { 
    e.preventDefault();

    $('.pedido').show();
    $('.cadastro').hide();
    $('.confirm-pedido').hide();

})
        

function lerCliente(cpf_pedido){

    $.ajax({
        method: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'lerClientePedido',
            cpf_pedido: cpf_pedido
        },
        dataType: "json",
    }).done (function (result) {
        if(result == ('Sem CPF')){
            alert ('ERROR...');
            return;
        }
        const id_cliente_ped = result.map(item=> item.id_cliente);
        criarPedido(id_cliente_ped)
    })

}



function criarPedido(id_cliente_ped){

    $.ajax({
        method: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'criarPedido',
            id_cliente: id_cliente_ped
        },
        dataType: "json",
    }).done (function (result) {
        lerIdPedido(id_cliente_ped)
    })
    
}

function lerIdPedido(id_cliente_ped){

    $.ajax({
        method: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'lerPedido',
            id_cliente: id_cliente_ped
        },
        dataType: "json",
    }). done (function (result) {
        const lerPedidoId = result.map(item=>   `
                                                    <input type="hidden" value="${item.id_pedido}" id="id_pedido">
                                                `);
        $('#form_pedido').html(lerPedidoId.join(''));
    })

}

$('#add_produto_pedido').click(function (e) { 
    e.preventDefault();

    $('#nome_peoduto_pedido').val('');
    $('#qnt_add_pedido').val('1');
    
});

// $('#nome_produto_pedido').focus(function (e) { 
//     e.preventDefault();

//     $.ajax({
//         method: "post",
//         url: "config/funcao_estoque.php",
//         data: {
//             action: 'ler',
//         },
//         dataType: "json",
//     }).done (function(result){
//         console.log(result);
//         const lerProdutoPedido = result.map(item=>  `   
//                                                         <select>
//                                                             <option value="${item.id_produto}">${item.nome}</option>
//                                                         </select>
//                                                     `);
//         $('#').html(lerProdutoPedido.join(''));
//     })
    
// })



$('#nome_produto_pedido').blur(function (e) { 
    e.preventDefault();
    
    var nome_produto = $('#nome_produto_pedido').val();

    $.ajax({
        method: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'lerProduto',
            nome_produto: nome_produto
        },
        dataType: "json",
    }).done (function (result) {
        const lerIdProdutoPedido = result.map(item=>    `  
                                                            <input type="hidden" value="${item.id_produto}" id="id_pedido_produto">
                                                            <input type="hidden" value="${item.valor}" id="valor_pedido_produto">
                                                        `);
        $('#listar_pedido_produtos').html(lerIdProdutoPedido.join(''));
    })

})



$('#cadastrar_produto_pedido').click(function (e) { 
    e.preventDefault();
    
    var id_pedido = $('#id_pedido').val();
    var id_produto = $('#id_pedido_produto').val();
    var qnt_produto = $('#qnt_add_pedido').val();
    var valor_produto = $('#valor_pedido_produto').val();

    $.ajax({
        method: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'inserirProdutoPedido',
            id_pedido: id_pedido,
            id_produto: id_produto,
            qnt_produto: qnt_produto,
            valor_produto: valor_produto
        },
        dataType: "json",
    }).done (function(result){
        lerPedidoProduto(id_pedido);
    })

})



function lerPedidoProduto(id_pedido){

    $.ajax({
        type: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'lerPedidoProduto',
            id_pedido: id_pedido
        },
        dataType: "json",
    }).done (function (result) {
       console.log(result)
       const lerPedidoProduto = result.map(item =>  `
                                                        <tr>
                                                            <td>${item.nome}</td>
                                                            <td class="text-center">${item.qnt_produto}</td>
                                                            <td class="text-center">${item.valor_produto * item.qnt_produto}</td>
                                                        </tr>
                                                    `);
        $('.lista_produtos').html(lerPedidoProduto.join(''));
        // const calcProdutosPedido = result.map(item =>   `
        //                                                     <td>${(item.valor_produto * item.qnt_produto) + }</td>
        //                                                 `);
        // $('#calc_Pedido').html(calcProdutosPedido.join(''));
        
    })

}