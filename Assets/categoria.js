$('#cadastrar_categoria').click(function (e) { 
    e.preventDefault();

    
    var nome = $('#nome').val();
    var descricao = $('#descricao').val();
    
   
    $.ajax({
        method: "post",
        url: "cadastrar_categoria.php",
        data: {
            nome: nome,
            descricao: descricao,
        },
        dataType: "json",
        success: function () {
            $("#resposta").html("Enviando...")
        }
    }).done(function(e){
        $("#resposta").html(
            Swal.fire({
                title: "Criado com Sucesso!",
                icon: "success",
            })
        )
    })
});
