const loadComponents = (link, tipo) => {

    $.ajax({
        url: link,
        method: tipo,
        caches: false,
        success: (resolver) => {
            $(".boxRender").html(resolver)
        }

    }).fail((erro) => {
        throw new Error(erro)
    })

}
