function lerHistoricoProdutos(){ 

    $.ajax({
        type: "post",
        url: "config/funcao_historico.php",
        data: {
            action: 'lerHistoricoPedidos'
        },
        dataType: "json",
    }).done (function(result){
        console.log(result);
        const lerHistoricoPedidos = result.map(item => `    <tr>
                                                                    <td>
                                                                        <p class="m-0">Nome:</p>
                                                                        <p class="m-0 fs-5">${item.nome}</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="m-0">Sobrenome:</p>
                                                                        <p class="m-0 fs-5">${item.sobrenome}</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="m-0">Data do Pedido:</p>
                                                                        <p class="m-0 fs-5">${item.data_pedido}</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="m-0">Valor:</p>
                                                                        <p class="m-0 fs-5">${item.valor_pedido}</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="m-0">Pagamento:</p>
                                                                        <p class="m-0 fs-5">${item.tipo_pgto}</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="m-0">Entrega:</p>
                                                                        <p class="m-0 fs-5">${item.entrega}</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="m-0">Status:</p>
                                                                        <p class="m-0 fs-5">${item.status}</p>
                                                                    </td>
                                                            </tr>

                                                        `);
        $('#historico_pedidos').html(lerHistoricoPedidos.join(''));
    })
}

lerHistoricoProdutos();