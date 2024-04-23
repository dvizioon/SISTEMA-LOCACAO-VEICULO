$(document).ready(function () {

    async function renderGetLink(links){
        return new Promise((resolver, reject) => {
            return resolver(links)
        })
    }


    const mountedLink = (name,url) => {
        // console.log(name,url)
        
        $('.nav-tabs').append(`
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#${name}" onclick="loadComponents('${url}','GET')">${name}</a>
            </li>
        `);

    }

    const renderLink = () => {
        $.ajax({
            method:"GET",
            url: "./Conf/Tabs.json",
            caches:false,
            success: async (response) => {
                await renderGetLink(response).then(items => {
                    
                    const links = items.map((currentValue) => {
                        mountedLink(
                            currentValue.name,
                            currentValue.link
                        )
                    });

                    
                })
            }
        }).fail((erro) => {
            throw new Error(`Não foi possivel se Conectar ao Arquivo ${erro.status}...`)
        })


    }

    const handleLink = (object,callback) =>{
        if (object.html() === "") {
            object.html(callback)

            const hash = window.location.hash
            const removHash = hash.replace("#","")
            
            return new Promise((resolver,reject) => {

                try {
                    resolver({
                        "id": object,
                        "call": callback,
                        "hash": removHash
                    })
                } catch (error) {
                    reject(error)
                    throw new Error("Erro ao Passar o Resolver...",error)
               }
               
            })
        }
        else {
            return
        }
    }
    const sender = handleLink($(".boxRender"), "")

    sender.then(elemento => {

        $.ajax({
            url: "./Conf/Tabs.json",
            caches: false,
            success: (resolver) => {

                const obj = (url) => {
                    // console.log(url)
                    $.ajax({
                        url: url,
                        method: "GET",
                        success: (response) => {
                            elemento.id.html(response)
                        }
                    })
                }
                
                resolver.map((item) => {
                    
                    if (item.name === elemento.hash) {
                        obj(item.link)
                    }
                    else {
                        return false
                    }
                })

            }
        }).fail((erro) => {
            console.log(erro)
        })

    }).catch((erro) => {
        console.log(erro)
    })

   // const content = element.innerHTML;
    renderLink()

})