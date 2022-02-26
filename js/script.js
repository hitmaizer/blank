
function statusHandler() {
    const statusToggle = document.getElementById('status_toggle')
    const statusDiv = document.getElementById('status')
    const groupElements = document.querySelectorAll('.show')

    if (statusToggle.classList.contains('show')) {
        statusToggle.classList.remove('show')
    } else {
        groupElements.forEach(e => {
            if(e.classList.contains('show')) {
                e.classList.remove('show')
        }
    })
    statusDiv.classList.add('show')
    }
}

function propostaHandler() {
    const propostaToggle = document.getElementById('proposta_toggle')
    const propostaDiv = document.getElementById('proposta')
    const groupElements = document.querySelectorAll('.show')
    const selectedElements = document.querySelectorAll('.selected')

    if (propostaToggle.classList.contains('show', 'selected')) {
        propostaToggle.classList.remove('show', 'selected')
    } else {
        groupElements.forEach(e => {
            if(e.classList.contains('show', 'selected')) {
                e.classList.remove('show', 'selected')
        }
    })
    propostaDiv.classList.add('show')
    propostaToggle.classList.add('selected')
    }
}

function orcamentoHandler() {
    const orcamentoToggle = document.getElementById('orcamento_toggle')
    const orcamentoDiv = document.getElementById('orcamento')
    const groupElements = document.querySelectorAll('.show')

    if (orcamentoToggle.classList.contains('show')) {
        orcamentoToggle.classList.remove('show')
    } else {
        groupElements.forEach(e => {
            if(e.classList.contains('show')) {
                e.classList.remove('show')
        }
    })
    orcamentoDiv.classList.add('show')
    }
}

function fase1Handler() {
    const fase1Toggle = document.getElementById('fase1_toggle')
    const fase1Div = document.getElementById('fase1')
    const groupElements = document.querySelectorAll('.show')

    if (fase1Toggle.classList.contains('show')) {
        fase1Toggle.classList.remove('show')
    } else {
        groupElements.forEach(e => {
            if(e.classList.contains('show')) {
                e.classList.remove('show')
        }
    })
    fase1Div.classList.add('show')
    }
}

function fase2Handler() {
    const fase2Toggle = document.getElementById('fase2_toggle')
    const fase2Div = document.getElementById('fase2')
    const groupElements = document.querySelectorAll('.show')

    if (fase2Toggle.classList.contains('show')) {
        fase2Toggle.classList.remove('show')
    } else {
        groupElements.forEach(e => {
            if(e.classList.contains('show')) {
                e.classList.remove('show')
        }
    })
    fase2Div.classList.add('show')
    }
}

function fase3Handler() {
    const fase3Toggle = document.getElementById('fase3_toggle')
    const fase3Div = document.getElementById('fase3')
    const groupElements = document.querySelectorAll('.show')

    if (fase3Toggle.classList.contains('show')) {
        fase3Toggle.classList.remove('show')
    } else {
        groupElements.forEach(e => {
            if(e.classList.contains('show')) {
                e.classList.remove('show')
        }
    })
    fase3Div.classList.add('show')
    }
}

function finalHandler() {
    const finalToggle = document.getElementById('final_toggle')
    const finalDiv = document.getElementById('final')
    const groupElements = document.querySelectorAll('.show')

    if (finalToggle.classList.contains('show')) {
        finalToggle.classList.remove('show')
    } else {
        groupElements.forEach(e => {
            if(e.classList.contains('show')) {
                e.classList.remove('show')
        }
    })
    finalDiv.classList.add('show')
    }
}

