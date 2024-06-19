getCliente();



$('#cadastrar_cliente').click(function (e) { 
    e.preventDefault();

    var nome = $('#nome').val();
    var sobrenome = $('#sobrenome').val();
    var telefone = $('#telefone').val();
    var CPF = $('#CPF').val();
    
    if(nome != ('') && sobrenome != ('') && telefone != ('') && CPF != ('')){
        $.ajax({
            method: "post",
            url: "config/funcao_cliente.php",
            data: {
                action: 'inserir',
                nome: nome,
                sobrenome: sobrenome,
                telefone: telefone,
                CPF: CPF,
            },
            dataType: "json",
        }).done(function(result){
            $('#nome').val('');
            $('#sobrenome').val('');
            $('#telefone').val('');
            $('#CPF').val('');
            console.log(result);
            getCliente();
        })
    }if(nome == ('') || sobrenome == ('') || telefone == ('') || CPF == ('')){
        console.log("Error...")
    }
});



function getCliente(){

    $.ajax({
        method: "post",
        url: "config/funcao_cliente.php",
        data: {
            action: 'ler'
        },
        dataType: "json",
    }).done(function(result){
        const lerClientes = result.map(item =>  `
                                                    
                                                        <td>${item.nome}</td>
                                                        <td>${item.sobrenome}</td>
                                                        <td>${item.telefone}</td>
                                                        <td><button type="button" class="btn btn-primary edit_categoria" data-bs-toggle="modal" data-bs-target="#editar_cliente" onclick="editarCliente(${item.id_cliente})">Editar</button>
                                                        <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#excluir_cliente" onclick="excluirCliente(${item.id_cliente})">Excluir</button></td>
                                                    `)
        $('.lista_clientes').html(lerClientes.join(''))
    })
}



function editarCliente(id_cliente) {  


    $.ajax({
            method: "post",
            url: "config/funcao_cliente.php",
            data: {
                action: 'ler',
                id_cliente: id_cliente,
            },
            dataType: "json",
        }).done(function(result){
            const editarNomeCliente = result.map(item =>  `
                                                            <div class="mb-3">
                                                                <label for="nome" class="form-label">Nome</label>
                                                                <input type="text" class="form-control" id="nome_cliente" aria-describedby="emailHelp" value="${item.nome}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="sobrenome" class="form-label">Sobrenome</label>
                                                                <input type="text" class="form-control" id="sobrenome-cliente" value="${item.sobrenome}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="telefone" class="form-label">Telefone</label>
                                                                <input type="tel" class="form-control" id="telefone-cliente" value="${item.telefone}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">CPF</label>
                                                                <input type="numb" class="form-control" id="CPF-cliente" value="${item.CPF}" required>
                                                            </div>
                                                    `)
        $('.edit_values_categoria').html(editarNomeCliente.join(''))
    })


    $('#salvar_edicao_cliente').click(function (e) { 
        e.preventDefault();
        
        var nome = $('#nome_cliente').val();
        var sobrenome = $('#sobrenome-cliente').val();
        var telefone = $('#telefone-cliente').val();
        var CPF = $('#CPF-cliente').val();

        $.ajax({
                method: "post",
                url: "config/funcao_cliente.php",
                data: {
                    action: 'editar',
                    id_categoria: id_categoria,
                    nome: nome,
                    sobrenome: sobrenome,
                    telefone: telefone,
                    CPF: CPF,
                },
                dataType: "json",
        }).done(function(result){
            console.log(result[0]);
            getCliente();
        })
    });
}






function excluirCliente(id_cliente){
    $.ajax({
        method: "post",
        url: "config/funcao_categoria.php",
        data: {
            action: 'ler',
            id_cliente: id_cliente,
        },
        dataType: "json",
        
    }).done (function (result) {
        const excluirValuesCliente = result.map(item => `
                                                            <p>Você deseja realmente excluir ${item.nome} ?</p>
                                                        `);
        $('.excluir_values_cliente').html(excluirValuesCliente.join(''))
    })

    
    $('#excluir_cliente').click(function (e) { 
        e.preventDefault();
                    
        $.ajax({
            method: "post",
            url: "config/funcao_categoria.php",
            data: {
                action: 'excluir',
                id_cliente: id_cliente,
            },
            dataType: "json",  
        });
        getCliente();
    });
};
            

