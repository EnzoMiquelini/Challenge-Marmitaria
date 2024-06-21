$('.pedido').show();
$('.cadastro').hide();


$('#continuar_cadastro').click(function (e) { 
    e.preventDefault();
    
    
    $('.pedido').hide();
    $('.cadastro').show();
});

$('#pedido_voltar').click(function (e) { 
    
    $('.pedido').show();
    $('.cadastro').hide();
});