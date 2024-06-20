// $('.pedido').show();
// $('.cadastro').hide();


$('#continuar_cadastro').click(function (e) { 
    e.preventDefault();
    
    
    $('.pedido').load('cadastro.php')
});

$('#pedido_voltar').click(function (e) { 
    
    $('.cadastro').load('pedido.php')
});


// $('#')
//     $.ajax({
//         method: "post",
//         url: "config/funcao_produtos.php",
//         data: {
//             action: 'ler',
//         },
//         dataType: "json",
//     }).done (function (result){
//         console.log(result);
//         result;
//     })