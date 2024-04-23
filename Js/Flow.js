
// Adcionar Container Grapichs
/*
    Criar um Onload para o Body
*/
// Criar um Contrutor para Contruir os Elmento Pai na Page
const constructorElemento = (name, props) => {
    let propString = '';
    for (let key in props) {
        propString += `${key}="${props[key]}" `;
    }
    const elemento = `<${name} ${propString}></${name}>`;
    // console.log(elemento);
    return elemento
}

function objetModel(name, props) {
    let data = {
        name: name,
        prpos: () => {
            return props
        },
        Location: {
            // Não Ultilizar Por Enquanto
        }
    }
    return constructorElemento(data.name, data.prpos())
}


const div = objetModel("div", {
    id: "graphContainer",
    class: "graphContainer",
})

// Criar nosso Flow

function Main(container) {
    // Criar um Fluxo de Flow
    var flow = new mxGraph(container)
    var parent = flow.getDefaultParent();
    new mxRubberband(flow);
    flow.getModel().beginUpdate();

    try {
        var v1 = flow.insertVertex(parent, null, 'Hello,', 20, 20, 80, 30);
        var v2 = flow.insertVertex(parent, null, 'World!', 200, 150, 80, 30);
        var e1 = flow.insertEdge(parent, null, '', v1, v2);

    } finally {
        flow.getModel().endUpdate();
    }
}

async function flow(elemento) {
    let idMatch = elemento.match(/id="([^"]*)"/); 
    let id = idMatch ? idMatch[1] : null;
    
    const elementoMouth = document.querySelector(`#${id}`)
    Main(elementoMouth)
    
}

let body = document.body
body.onload = async (event) => {
    body.innerHTML += div
    await flow(div)
}