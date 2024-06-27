$('.pedido').hide();
$('.cadastro').show();
$('.confirm-pedido').hide();

$('#continuar_pedido').click(function (e) { 
    e.preventDefault();
    
    $('.pedido').show();
    $('.cadastro').hide();
    $('.confirm-pedido').hide();

})

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
        url: "config/funcao_cliente.php",
        data: {
            action: 'ler',
            cpf_pedido: cpf_pedido
        },
        dataType: "json",
    }).done (function(result){
        const lerProdutoPedido = result.map(item=>  ` 
                                                        <div class="mb-3">
                                                            <label for="nome" class="form-label">Nome</label>
                                                            <input type="text" class="form-control" id="nome" value="${item.nome}" name="nome" >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="sobrenome" class="form-label">Sobrenome</label>
                                                            <input type="text" class="form-control" id="sobrenome" value="${item.sobrenome}" name="sobrenome" >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="telefone" class="form-label">Telefone</label>
                                                            <input type="tel" class="form-control" id="telefone" value="${item.telefone}" name="tel" >
                                                        </div>
                                                    `);
        $('#nome_produto_pedido').html(lerProdutoPedido.join(''));
    })
    
})



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
    }).done (function(result){
        const lerProdutoPedido = result.map(item=>  `   
                                                        ${item.id_produto}
                                                        ${item.nome}
                                                        ${item.valor}
                                                    `);
        $('#nome_produto_pedido').html(lerProdutoPedido.join(''));
    })
    
})



$('#lista_produtos').click(function (e) { 
    e.preventDefault();
    
    var nome_produto = $('#nome_produto_pedido').val();
    var qnt_produto = $('#nome_produto_pedido').val();
    var valor_produto = $('#nome_produto_pedido').val()

    $.ajax({
        method: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'inserirProduto',
            nome_produto: nome_produto,
            qnt_produto: qnt_produto,
            valor_produto: valor_produto
        },
        dataType: "json",
    }).done (function(result){
            console.log(result)
    })

})
































$('#CPF_pedido').blur(function (e) { 
    e.preventDefault();

    var cpf = $('#CPF_pedido').var()
    
    $.ajax({
        method: "post",
        url: "config/funcao_cliente",
        data: {
            cpf: cpf
        },
        dataType: "json",
        success: function(result){
            const lerClientePedido = result.map(item => `
                                                            
            
            `);
            $('')
        }
    })

})