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
                                                        <td class="w-75"><p>${item.nome}</p></td>
                                                        <td><button type="button" class="btn btn-primary edit_categoria" data-bs-toggle="modal" data-bs-target="#editar_categoria" onclick="editarCategoria(${item.id_categoria})">Editar</button>
                                                        <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#excluir_categoria" onclick="excluirCategoria(${item.id_categoria})">Excluir</button></td>
                                                    </tr>
                                                    `)
        $('.lista_categoria').html(lerCategorias.join(''))
    })
}



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
            const editarNomeCategorias = result.map(item =>  `
                                                        <div class="mb-3">
                                                            <label for="Nome" class="form-label">Nome</label>
                                                            <input type="text" id="nome_categoria" class="form-control" name="nome" value="${item.nome}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="Descrição" class="form-label">Descrição</label>
                                                            <textarea class="form-control" id="descricao-categoria" style="height: 100px" name="descricao" placeholder="${item.descricao}" value="${item.descicao}" required></textarea>
                                                        </div>
                                                    `)
            $('.edit_values_categoria').html(editarNomeCategorias.join(''))
        })


        $('#salvar_edicao_categoria').click(function (e) { 
            e.preventDefault();
            
            var nome = $('#nome_categoria').val();
            var descricao = $('#descricao-categoria').val();
        
            $.ajax({
                    method: "post",
                    url: "config/funcao_categoria.php",
                    data: {
                        action: 'editar',
                        id_categoria: id_categoria,
                        nome: nome,
                        descicao: descricao,
                    },
                    dataType: "json",
            }).done(function(result){
                console.log(result[0]);
                getCategoria();
            })
        });
}






function excluirCategoria(id_categoria){
    $.ajax({
        method: "post",
        url: "config/funcao_categoria.php",
        data: {
            action: 'ler',
            id_categoria: id_categoria,
        },
        dataType: "json",
        
    }).done (function (result) {
        const excluirValuesCategoria = result.map(item => `
                                                            <p class="id_values_categoria">Deseja realmente excluir a categoria ${item.nome}?</p>
                                                        `);
        $('.exluir_values_categoria').html(excluirValuesCategoria.join(''))
    })
    $('#excluir_categoria').click(function (e) { 
        e.preventDefault();
                    
        $.ajax({
            method: "post",
            url: "config/funcao_categoria.php",
            data: {
                action: 'excluir',
                id_categoria: id_categoria,
            },
            dataType: "json",  
        });
        getCategoria();
    });
};
            

