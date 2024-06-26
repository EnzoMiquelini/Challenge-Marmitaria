function getCategoria(){

    $.ajax({
        method: "post",
        url: "config/funcao_categoria.php",
        data: {
            action: 'ler'
        },
        dataType: "json",
    }).done(function(result){
        const lerCategorias = result.map(item =>    `
                                                        <tr>
                                                            <td class="w-75"><p>${item.nome_categoria}</p></td>
                                                            <td><button type="button" class="btn btn-primary edit_categoria" data-bs-toggle="modal" data-bs-target="#editar_categoria" onclick="editarCategoria(${item.id_categoria})">Editar</button>
                                                            <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#excluir_categoria" onclick="excluirCategoria(${item.id_categoria})">Excluir</button></td>
                                                        </tr>
                                                    `)
        $('.lista_categoria').html(lerCategorias.join(''));
    })

}

getCategoria();



$('#cadastrar_categoria').click(function (e) { 
    e.preventDefault();

    var nome = $('#nome').val();
    var descricao = $('#descricao').val();
    
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
        if(result == ('Nao Cadastrou')){
            Swal.fire({
                icon: "error",
                title: "Falha ao Criar",
                showConfirmButton: false,
                timer: 1500
            })
            return;
        }
        Swal.fire({
            icon: "success",
            title: "Criada Com Sucesso",
            showConfirmButton: false,
            timer: 1500
        })
        getCategoria();
    })

})



function editarCategoria(id_categoria) {  

    $.ajax({
        method: "post",
        url: "config/funcao_categoria.php",
        data: {
            action: 'ler',
            id_categoria: id_categoria
        },
        dataType: "json",
    }).done(function(result){
        const editarNomeCategorias = result.map(item => `
                                                            <input type="hidden" id="id_categoria" value="${item.id_categoria}"></input>
                                                            <div class="mb-3">
                                                                <label for="Nome" class="form-label">Nome</label>
                                                                <input type="text" id="nome_categoria" class="form-control" name="nome" value="${item.nome_categoria}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="Descrição" class="form-label">Descrição</label>
                                                                <textarea class="form-control" id="descricao_categoria" style="height: 100px" name="descricao" required>${item.descricao}</textarea>
                                                            </div>
                                                        `)
        $('.edit_values_categoria').html(editarNomeCategorias.join(''));
    })

}
    
    
$('#salvar_edicao_categoria').click(function (e) { 
    e.preventDefault();
    
    var id_categoria = $('#id_categoria').val();
    var nome = $('#nome_categoria').val();
    var descricao = $('#descricao_categoria').val();

    $.ajax({
            method: "post",
            url: "config/funcao_categoria.php",
            data: {
                action: 'editar',
                id_categoria: id_categoria,
                nome: nome,
                descricao: descricao
            },
            dataType: "json",
    }).done(function(result){
        if(result == ('Nao Editado')){
            Swal.fire({
                icon: "error",
                title: "Falha ao Editar",
                showConfirmButton: false,
                timer: 1500
            })
            return;
        }
        Swal.fire({
            icon: "success",
            title: "Editado Com Sucesso",
            showConfirmButton: false,
            timer: 1500
        })
        getCategoria();
    })

})




function excluirCategoria(id_categoria){
    $.ajax({
        method: "post",
        url: "config/funcao_categoria.php",
        data: {
            action: 'ler',
            id_categoria: id_categoria
        },
        dataType: "json",
    }).done (function(result){
        const excluirValuesCategoria = result.map(item =>   `
                                                                <input type="hidden" id="id_categoria" value="${item.id_categoria}"></input>
                                                                <p class="id_values_categoria">Deseja realmente excluir a categoria ${item.nome_categoria}?</p>
                                                            `);
        $('.exluir_values_categoria').html(excluirValuesCategoria.join(''));
    })
}



$('#excluir_categoria').click(function (e) { 
    e.preventDefault();

    var id_categoria = $('#id_categoria').val();
  
    $.ajax({
        method: "post",
        url: "config/funcao_categoria.php",
        data: {
            action: 'excluir',
            id_categoria: id_categoria
        },
        dataType: "json",  
    }).done (function(result){
        console.log(result)
        Swal.fire({
            icon: "success",
            title: "Excluido Com Sucesso",
            showConfirmButton: false,
            timer: 1500
        })
        getCategoria();
    })
})