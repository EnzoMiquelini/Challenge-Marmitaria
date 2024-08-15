$('.voltar_comeco_pedido').hide();
$('.voltar_lista_pedido').hide();
$('.continuar_pedido').hide();
$('.finalizar_pedido').hide();
$('.finaizar_voltar_inicio').hide();
$('.cancelar_pedido').hide();
$('.pedido').hide();
$('#cadastrar_cliente_pedido').hide();
$('.confirm-pedido').hide();
$('.endereco').hide();


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
            const cadClientePedido =    `
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
            $('.resCadastro').append(cadClientePedido);
            return;
        }
        const lerClientePedido = result.map(item=>      `
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
        $('.continuar_pedido').show();
    })
    
})


$('.continuar_pedido').click(function (e) { 
    e.preventDefault();

    $('.voltar_comeco_pedido').show();
    $('.voltar_inicio').hide();
    $('.cadastro').hide();
    $('.pedido').show();
    $('.confirm-pedido').hide();

})



$('.voltar_comeco_pedido').click(function (e) {
    
    $('.voltar_comeco_pedido').hide();
    $('.voltar_inicio').show();
    $('.cadastro').show();
    $('.pedido').hide();
    $('.confirm-pedido').hide();

})


$('.continuar_pedido').click(function (e) { 

    var valorContinuar = $('#valorTotal').val();

    if(valorContinuar <= 0){

        return;
    }

    $('.voltar_comeco_pedido').hide();
    $('.voltar_lista_pedido').show();
    $('.continuar_pedido').hide();
    $('.finalizar_pedido').show();
    $('.pedido').hide();
    $('.cadastro').hide();
    $('.confirm-pedido').show();

})

$('.voltar_lista_pedido').click(function (e) { 
    
    $('.voltar_comeco_pedido').show();
    $('.voltar_lista_pedido').hide();
    $('.finalizar_pedido').hide();
    $('.continuar_pedido').show();
    $('.pedido').show();
    $('.cadastro').hide();
    $('.confirm-pedido').hide();

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
        const lerPedidoListaId = result.map(item=>  `   
                                                        <input type="hidden" value="${item.id_pedido}" id="id_pedido_confirmar">
                                                    `);
        $('.id_pedido_lista').html(lerPedidoListaId.join(''));
        const lerPedidoExlcuir = result.map(item=>  `
                                                        <input type="hidden" value="${item.id_pedido}" id="id_pedido_excluir">
                                                        <a href="index.php" class="btn btn-secondary mb-3 cancelar_pedido" style="width: 100%;" tabindex="-1" role="button" aria-disabled="true" onclick="exlcuirPedido(${item.id_pedido})">Cancelar Pedido</a>
                                                    `);
        $('.exlcuir_pedido').append(lerPedidoExlcuir);
        
    })

}



$('#nome_produto_pedido').blur(function (e) { 
    e.preventDefault();
    
    var nome_produto = $('#nome_produto_pedido').val();

    if(nome_produto == ''){
        return;
    }

    $.ajax({
        method: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'lerProduto',
            nome_produto: nome_produto
        },
        dataType: "json",
    }).done (function (result) {
        if(result == ('Nao Encontrado')){
            Swal.fire({
                icon: "error",
                title: "Produto Nao Encontrado",
                showConfirmButton: false,
                timer: 1500
            })
            var nome_produto = $('#nome_produto_pedido').val('');
            return;
        };
        const lerIdProdutoPedido = result.map(item=>    `  
                                                            <input type="hidden" value="${item.id_produto}" id="id_pedido_produto">
                                                            <input type="hidden" value="${item.valor}" id="valor_pedido_produto">
                                                        `);
        $('#listar_pedido_produtos').html(lerIdProdutoPedido.join(''));
    })

})



$('#cadastrar_produto_pedido').click(function (e) { 
    e.preventDefault();

    var valorTotal = parseFloat($('#valorTotal').val())
    
    var id_pedido = $('#id_pedido').val();
    var id_produto = $('#id_pedido_produto').val();
    var qnt_produto = $('#qnt_add_pedido').val();
    var valor_produto = $('#valor_pedido_produto').val();
    var valor_produto_total = valor_produto * qnt_produto;

    $.ajax({
        method: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'inserirProdutoPedido',
            id_pedido: id_pedido,
            id_produto: id_produto,
            qnt_produto: qnt_produto,
            valor_produto: valor_produto,
            valor_produto_total: valor_produto_total
        },
        dataType: "json",
    }).done (function(result){
        $('#nome_produto_pedido').val('');
        $('#id_pedido_produto').val('');
        $('#qnt_add_pedido').val(1);
        $('#valor_pedido_produto').val('');
        lerPedidoProduto(id_pedido, id_produto);
    })

    valorTotal = valorTotal + parseFloat(valor_produto_total)
    
    console.log(valorTotal)
    var valorTot = `<tr>
                    <th colspan="2">Valor Total</th>
                    <th colspan="2">R$:`+Number(valorTotal).toFixed(2)+`</th>
[                    <input type="hidden" id="valorTotal" value="${valorTotal}">]
                </tr>`
    $('.calc_Pedido').html(valorTot)
})



function lerPedidoProduto(id_pedido, id_produto){

    $.ajax({
        type: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'lerPedidoProduto',
            id_pedido: id_pedido
        },
        dataType: "json",
    }).done (function (result) {
        if(result == ('Nao Encontrado!')){
            $('.lista_produtos').html('<tr> <td colspan="3" class="text-center">Não há nenhum produto adicionado</td> </tr>');
            return;
        }

        const lerPedido_Produto = result.map(item =>  `
                                                        <tr>
                                                            <input type="hidden" id="idPedido_produto" value="${item.idPedido_produto}">
                                                            <input type="hidden" value="${item.qnt_produto}" id="qnt_pedido_produto">
                                                            <td>${item.nome}</td>
                                                            <td class="text-center">${item.qnt_produto}</td>
                                                            <td class="text-center">`+ Number(item.valor_produto_total).toFixed(2) +`</td>
                                                            <td><button class="btn btn btn-link d-flex" onclick="excluir_produto_pedido(${item.idPedido_produto},${item.id_pedido}, ${item.qnt_produto},` + id_produto + `)"><ion-icon name="trash-outline" style="color:red;"></ion-icon></button></td>
                                                        </tr>
                                                    `);
        $('.lista_produtos').html(lerPedido_Produto.join(''));
        retirarProdutoBanco(id_produto);
        
    })


}



function retirarProdutoBanco(id_produto){

    var qnt_produto = $('#qnt_pedido_produto').val();

    $.ajax({
        type: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'lerProdutoBanco',
            id_produto: id_produto,
            qnt_produto: qnt_produto
        },
        dataType: "json",
    }).done(function(result){
        const produtoBanco = result.map(item => `${item.qnt_Estoque}`);
        var produtoCerto = parseInt(produtoBanco) - parseInt(qnt_produto);

        $.ajax({
            type: "post",
            url: "config/funcao_pedido.php",
            data: {
                action: 'editarProdutoBanco',
                id_produto: id_produto,
                qnt_produto: produtoCerto
            },
            dataType: "json",
        }).done(function(result){
            // console.log(result);
        });
    });
    
}



function excluir_produto_pedido(idPedido_produto, id_pedido, qnt_produto, id_produto){
    
    $.ajax({
        type: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'excluir_pedido_produto',
            id_pedido_produto: idPedido_produto
        },
        dataType: "json",
    }).done (function(result){
        if(result == ('Nao excluido')){
            Swal.fire({
                icon: "error",
                title: "Produto Nao encontrado",
                showConfirmButton: false,
                timer: 1500
            })
            return;
        }
        lerPedidoProduto(id_pedido);
        adicionarProdutoBanco(id_produto, qnt_produto);
    })      
        
}

function adicionarProdutoBanco(id_produto, qnt_produto){

    $.ajax({
        type: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'lerProdutoBanco',
            id_produto: id_produto,
            qnt_produto: qnt_produto
        },
        dataType: "json",
    }).done(function(result){
        const produtoBancoAdd = result.map(item => `${item.qnt_Estoque}`);
        var produtoCerto = parseInt(produtoBancoAdd[0]) + parseInt(qnt_produto);

        $.ajax({
            type: "post",
            url: "config/funcao_pedido.php",
            data: {
                action: 'editarProdutoBanco',
                id_produto: id_produto,
                qnt_produto: produtoCerto
            },
            dataType: "json",
        }).done(function(result){
            // console.log(result);
        });
    });

}



$('#entrega').click(function (e) { 
    
    $('.endereco').show();

});
$('#retirada').click(function (e) { 
    
    $('.endereco').hide();

});


$('.finalizar_pedido').click(function (e) { 
    e.preventDefault();

    
    var id_pedido = $('#id_pedido_confirmar').val();
    var valor = $('#valorTotal').val();
    var entrega = $('input[name="entrega"]:checked').val();
    var pagamento = $('input[name="pagamento"]:checked').val();
    var endereco = $('#endereco').val();
    
    
    if(id_pedido == ('') || valor == ('') || entrega == ('') || pagamento== ('')){
        Swal.fire({
            icon: "error",
            title: "Pedido Não Finalizado",
            showConfirmButton: false,
            timer: 1500
        })
        return;
    }
    
    if(entrega == ('entrega')){
        if(endereco == ('')){
            Swal.fire({
                icon: "error",
                title: "Pedido Não Finalizado",
                showConfirmButton: false,
                timer: 1500
            })
            return;
        }
    }

    $.ajax({
        type: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'confirmarPedido',
            id_pedido: id_pedido,
            valor: valor,
            entrega: entrega,
            pagamento: pagamento,
            endereco: endereco
        },
        dataType: "json",
    }).done (function (result){
        console.log(result)
        if(result == ('Nao Adicionado')){
            Swal.fire({
                icon: "error",
                title: "Pedido Não Finalizado",
                showConfirmButton: false,
                timer: 1500
            })
            return;
        }
        Swal.fire({
            icon: "success",
            title: "Pedido Finalizado",
            showConfirmButton: false,
            timer: 1500
        })
        $('.voltar_lista_pedido').hide();
        $('.finalizar_pedido').hide();
        $('.finaizar_voltar_inicio').show();
    });

});


function exlcuirPedido(id_pedido){

    $.ajax({
        type: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'excluirPedido',
            id_pedido: id_pedido
        },
        dataType: "json",
    }).done(function(result){
        console.log(result);
    });
}