// const buttonEdit = (texto = 'Editar') => `<button type="button" class="btn btn-primary edit_categoria" id="${id_categoria}">${texto}</button>`
// const buttonExcluir = (botao = '#excluir_categoria', texto = 'Excluir') => `<button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="${botao}">${texto}</button>`


getCategoria();

$('#cadastrar_categoria').click(function (e) { 
    e.preventDefault();

    var nome = $('#nome').val();
    var descricao = $('#descricao').val();
    
    if(nome != ('') && descricao != ('')){
        $.ajax({
            method: "post",
            url: "config/funcao_categoria.php",
            data: {
                action: 'inserir',
                nome: nome,
                descricao: descricao,
            },
            dataType: "json",
        }).done(function(result){
            $('#nome').val('');
            $('#descricao').val('');
            console.log(result);
            getCategoria();
        })
    }if(nome == ('') || descricao == ('')){
        console.log("Error...")
    }
});

function editarCategoria(id_categoria) {  


    $.ajax({
            method: "post",
            url: "config/funcao_categoria.php",
            data: {
                action: 'ler',
                id_categoria: id_categoria,
            },
            dataType: "json",
        }).done(function(result){
            console.log(result[0])
            const editarCategorias = result.map(item =>  `
                                                        <input type="text" id="nome" class="form-control" name="nome" value="${item.nome}" required>
                                                    `)
        $('#edit_nome_categoria').html(editarCategorias.join(''))
        })
    

}

function getCategoria(){

    $.ajax({
        method: "post",
        url: "config/funcao_categoria.php",
        data: {
            action: 'ler'
        },
        dataType: "json",
    }).done(function(result){
        const lerCategorias = result.map(item =>  `
                                                    <tr>
                                                        <td>${id_categoria = item.id_categoria}</td>
                                                        <td class="w-75"><p>${item.nome}</p></td>
                                                        <td><button type="button" class="btn btn-primary edit_categoria" data-bs-toggle="modal" data-bs-target="#editar_categoria" onclick="editarCategoria(${item.id_categoria})">Editar</button></td>
                                                    </tr>
                                                    `)
        $('.lista_categoria').html(lerCategorias.join(''))
    })
}
// function getCategoria(){

//     $.ajax({
//         method: "post",
//         url: "config/funcao_categoria.php",
//         data: {
//             action: 'ler'
//         },
//         dataType: "json",
//     }).done(function(result){
//         const lerCategorias = result.map(item =>  `
//                                                     <tr>
//                                                     <td>${id_categoria = item.id_categoria}</td>
//                                                         <td class="w-75"><p>${item.nome}</p></td>
//                                                         <td>${buttonEdit(item.id_categoria)} ${buttonExcluir()}</td>
//                                                     </tr>
//                                                     `)
//         $('.lista_categoria').html(lerCategorias.join(''))
//     })
// }



$('.edit_categoria').click(function (e) { 
    e.preventDefault();
    
    var id = $('id').val();

    $.ajax({
            method: "post",
            url: "config/funcao_categoria.php",
            data: {
                action: 'editar',
                id_categoria: id,
            },
            dataType: "json",
        }).success(function(result){
            console.log(result)
    })
});


            
$('#excluir_categoria').click(function (e) { 
    e.preventDefault();
                
    $id = $_POST['id_categoria'];

    $.ajax({
        method: "post",
        url: "config/funcao_categoria.php",
        data: {
            action: 'excluir',
        },
        dataType: "json",
        success: function (response) {
            console.log(response)
        }
    });
});

