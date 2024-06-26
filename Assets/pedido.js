$('.pedido').show();
$('.cadastro').hide();
$('.confirm-pedido').hide();

$('#continuar_cadastro').click(function (e) { 
    
    $('.pedido').hide();
    $('.cadastro').show();
    $('.confirm-pedido').hide();

})

$('#pedido_voltar').click(function (e) { 
    
    $('.pedido').show();
    $('.cadastro').hide();
    $('.confirm-pedido').hide();

})

$('#confirmar_cadastro').click(function (e) { 
    e.preventDefault();
    
    $('.pedido').hide();
    $('.cadastro').hide();
    $('.confirm-pedido').show();

})

$('#cadastro_voltar').click(function (e) { 
    
    $('.pedido').hide();
    $('.cadastro').show();
    $('.confirm-pedido').hide();

})



function getPedido (){ 
    
    $.ajax({
        method: "post",
        url: "config/funcao_estoque",
        data: {
            
        },
        dataType: "dataType",
        success: function (response) {
            
        }
    });
}
    
$('#nome_produto_pedido').blur(function (e) { 
    e.preventDefault();
    
    $.ajax({
        method: "post",
        url: "config/funcao_estoque",
        data: {
            
        },
        dataType: "json",
        success: function(result){
            
        }
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
    });
});