$('.pedido').show();
$('.cadastro').hide();
$('.confirm-pedido').hide();


$('#continuar_cadastro').click(function (e) { 
    
    $('.pedido').hide();
    $('.cadastro').show();
    $('.confirm-pedido').hide();
});

$('#pedido_voltar').click(function (e) { 
    
    $('.pedido').show();
    $('.cadastro').hide();
    $('.confirm-pedido').hide();
});

$('#confirmar_cadastro').click(function (e) { 
    e.preventDefault();
    
    $('.pedido').hide();
    $('.cadastro').hide();
    $('.confirm-pedido').show();
});

$('#cadastro_voltar').click(function (e) { 
    
    $('.pedido').hide();
    $('.cadastro').show();
    $('.confirm-pedido').hide();
});