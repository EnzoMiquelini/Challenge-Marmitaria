const buttonEdit = (botao = '#editar_categoria', texto = 'Editar') => `<button type="button" class="btn btn-primary" id="edit_categoria" data-bs-toggle="modal" value="id_categoria" data-bs-target="${botao}">${texto}</button>`
const buttonExcluir = (botao = '#excluir_categoria', texto = 'Excluir') => `<button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="${botao}">${texto}</button>`


getCategoria();

$('#cadastrar_categoria').click(function (e) { 
    e.preventDefault();

    var nome = $('#nome').val();
    var descricao = $('#descricao').val();
    
    if(nome != ('') && descricao != ('')){
        $.ajax({
            method: "post",
            url: "funcao_categoria.php",
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


function getCategoria(){

    $.ajax({
        method: "post",
        url: "funcao_categoria.php",
        data: {
            action: 'ler'
        },
        dataType: "json",
    }).done(function(result){
        const lerCategorias = result.map(item =>  `
                                                    <tr>
                                                        <td class="w-75"><p>${item.nome}</p></td>
                                                        <td>${buttonEdit()} ${buttonExcluir()}</td>
                                                    </tr> 
                                                    `)
        $('.lista_categoria').html(lerCategorias.join(''))
    })
}


$('#edit_categoria').click(function (e) { 
    e.preventDefault();

    var id = $('id_categoria').val()

    $.ajax({
        method: "post",
        url: "funcao_categoria.php",
        data: {
            action: 'editar',
            id: id,
        },
        dataType: "json",
    }).done(function(result){
        console.log(result)
    })
});

$('#excluir_categoria').click(function (e) { 
    e.preventDefault();

    $id = $_POST['id_categoria']

    $.ajax({
        method: "post",
        url: "funcao_categoria",
        data: {
            action: 'excluir',
        },
        dataType: "json",
        success: function (response) {
            console.log(response)
        }
    });
});

