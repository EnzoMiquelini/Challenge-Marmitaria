function getIndex(){
    
    $.ajax({
        method: "post",
        url: "config/funcao_categoria.php",
        data: {
            action: 'ler',
        },
        dataType: "json",
    }).done (function (result){
        const lerCategoriaIndex = result.map(item => `
        <li>${item.nome_categoria}</li>
        `);
        $('#listar_categorias').html(lerCategoriaIndex.join(''));
    })
    
    $.ajax({
        method: "post",
        url: "config/funcao_pedido.php",
        data: {
            action: 'ler',
        },
        dataType: "json",
    }).done (function (result){
        const lerClientesIndex = result.map(item => `
        <tr>
        <td>${item.nome}</td>
        <td>${item.data}</td>
        <td>${item.hora}</td>
        `);
        $('#listar_pedidos').html(lerClientesIndex.join(''));
    })
    
}

getIndex();



// $('#novo_pedido').click(function (e) { 

//     $.ajax({
//         method: "post",
//         url: "config/funcao_pedido.php",
//         data: {
//             action: 'inserirNovo',
//         },
//         dataType: "json",
//     })

// })