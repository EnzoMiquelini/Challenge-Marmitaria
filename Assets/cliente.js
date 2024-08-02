function getCliente(){

    $.ajax({
        method: "post",
        url: "config/funcao_cliente.php",
        data: {
            action: 'ler'
        },
        dataType: "json",
    }).done(function(result){
        console.log(result)
        const lerClientes = result.map(item =>  `
                                                    <tr>
                                                        <td>${item.nome}</td>
                                                        <td>${item.sobrenome}</td>
                                                        <td>${item.telefone}</td>
                                                        <td class="CPF">${item.CPF}</td>
                                                        <td><button type="button" class="btn btn-primary edit_categoria" data-bs-toggle="modal" data-bs-target="#editar_cliente" onclick="editarCliente(${item.id_cliente})">Editar</button>
                                                        <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#excluir_cliente" onclick="excluirCliente(${item.id_cliente})">Excluir</button></td>
                                                    </tr>
                                                `);
        $('.lista_clientes').html(lerClientes.join(''));
    })

}

getCliente();



$('#cadastrar_cliente').click(function (e) { 
    e.preventDefault();

    var nome = $('#nome').val();
    var sobrenome = $('#sobrenome').val();
    var telefone = $('#telefone_cliente_adicionar').val();
    var CPF = $('#CPF').val();
    
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
        $('#telefone_cliente_adicionar').val('');
        $('#CPF').val('');
        if(result == ('Nao Cadastrou')){
            Swal.fire({
                icon: "error",
                title: "Falha ao Cadastrar",
                showConfirmButton: false,
                timer: 1500
            })
            return;
        }
        Swal.fire({
            icon: "success",
            title: "Cadastrado Com Sucesso",
            showConfirmButton: false,
            timer: 1500
        })
        getCliente();
    })

})



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
            const editarNomeCliente = result.map(item =>    `
                                                                <input type="hidden" id="id_cliente" value="${item.id_cliente}"></input>
                                                                <div class="mb-3">
                                                                    <label for="nome" class="form-label">Nome</label>
                                                                    <input type="text" class="form-control" id="nome_cliente" value="${item.nome}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="sobrenome" class="form-label">Sobrenome</label>
                                                                    <input type="text" class="form-control" class="telefone_cliente" id="sobrenome_cliente" value="${item.sobrenome}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="telefone" class="form-label">Telefone</label>
                                                                    <input type="tel" class="form-control" id="telefone_cliente_editar" value="${item.telefone}" required>
                                                                </div>
                                                            `);
        $('.edit_values_cliente').html(editarNomeCliente.join(''));
    })

}

$('#salvar_edicao_cliente').click(function (e) { 
    e.preventDefault();
    
    var id_cliente = $('#id_cliente').val();
    var nome = $('#nome_cliente').val();
    var sobrenome = $('#sobrenome_cliente').val();
    var telefone = $('#telefone_cliente_editar').val();

    $.ajax({
            method: "post",
            url: "config/funcao_cliente.php",
            data: {
                action: 'editar',
                id_cliente: id_cliente,
                nome: nome,
                sobrenome: sobrenome,
                telefone: telefone,
            },
            dataType: "json",
    }).done(function(result){
        console.log(result);
        if(result == ('Nao Editou')){
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
        getCliente();
    })

})



function excluirCliente(id_cliente){

    $.ajax({
        method: "post",
        url: "config/funcao_cliente.php",
        data: {
            action: 'ler',
            id_cliente: id_cliente,
        },
        dataType: "json",
        
    }).done (function (result) {
        const excluirValuesCliente = result.map(item => `   
                                                            <input type="hidden" id="id_cliente" value="${item.id_cliente}"></input>
                                                            <p>Você deseja realmente excluir ${item.nome} ?</p>
                                                        `);
        $('.excluir_values_cliente').html(excluirValuesCliente.join(''));
    })

}

$('#excluir_cliente').click(function (e) { 
    e.preventDefault();

    var id_cliente = $('#id_cliente').val();

    $.ajax({
        method: "post",
        url: "config/funcao_cliente.php",
        data: {
            action: 'excluir',
            id_cliente: id_cliente,
        },
        dataType: "json",  
    }).done (function(result){
        console.log(result)
        if(result == ('Nao Excluido')){
            Swal.fire({
                icon: "error",
                title: "Falha ao Excluir",
                showConfirmButton: false,
                timer: 1500
            })
            return;
        }
        Swal.fire({
            icon: "success",
            title: "Excluido Com Sucesso",
            showConfirmButton: false,
            timer: 1500
        })
        getCliente();
    })

})