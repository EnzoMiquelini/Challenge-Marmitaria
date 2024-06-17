
const buttonEdit = (botao = '#editar_categoria', texto = 'Editar') => `<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="${botao}">${texto}</button>`
const buttonExcluir = (botao = '#excluir_categoria', texto = 'Excluir') => `<button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="${botao}">${texto}</button>`

$('#cadastrar_categoria').click(function (e) { 
    e.preventDefault();

    var nome = $('#nome').val();
    var descricao = $('#descricao').val();
    
    if(nome != ('') && descricao != ('')){
        $.ajax({
            method: "post",
            url: "cadastrar_categoria.php",
            data: {
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
        method: "GET",
        url: "selecionar_categoria.php",
        dataType: "json",
    }).done(function(result){
        const categorias = result.map(item =>  `<tr>
                                                    <td class="w-75"><p>${item.nome}</p></td>
                                                    <td>${buttonEdit()} ${buttonExcluir()}</td>
                                                </tr> `)
        $('.lista_categoria').html(categorias.join(''))
    })
}

getCategoria();

$('#editar_categoria').click(function (e) { 
    e.preventDefault();

    
    
});

