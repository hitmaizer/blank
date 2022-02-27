/* eslint-disable space-in-parens */
/* eslint-disable no-unused-vars */
/* eslint-disable linebreak-style */
/* eslint-disable indent */

function statusHandler() {
    const statusToggle = document.getElementById('status_toggle');
    const statusDiv = document.getElementById('status');
    const groupElements = document.querySelectorAll('.show');
    const actualBtn = document.getElementById('processo_btn');
    const previousBtn = document.querySelectorAll('.selected');

    actualBtn.classList.add('selected');
    previousBtn.forEach((e) => {
        if (e.classList.contains('selected')) {
            e.classList.remove('selected');
        }
    });
    if ( statusToggle.classList.contains('show')) {
        statusToggle.classList.remove('show');
    } else {
        groupElements.forEach((e) => {
            if (e.classList.contains('show')) {
                e.classList.remove('show');
        }
    });
    statusDiv.classList.add('show');
    }
}

function investimentoHandler() {
    const propostaToggle = document.getElementById('investimento_toggle');
    const propostaDiv = document.getElementById('investimento');
    const groupElements = document.querySelectorAll('.show');
    const actualBtn = document.getElementById('investimento_btn');
    const previousBtn = document.querySelectorAll('.selected');

    actualBtn.classList.add('selected');
    previousBtn.forEach((e) => {
        if (e.classList.contains('selected')) {
            e.classList.remove('selected');
        }
    });

    if (propostaToggle.classList.contains('show')) {
        propostaToggle.classList.remove('show');
    } else {
        groupElements.forEach((e) => {
            if (e.classList.contains('show')) {
                e.classList.remove('show');
        }
    });
    propostaDiv.classList.add('show');
    propostaToggle.classList.add('selected');
    }
}

function propostaHandler() {
    const orcamentoToggle = document.getElementById('proposta_toggle');
    const orcamentoDiv = document.getElementById('proposta');
    const groupElements = document.querySelectorAll('.show');
    const actualBtn = document.getElementById('proposta_btn');
    const previousBtn = document.querySelectorAll('.selected');

    actualBtn.classList.add('selected');
    previousBtn.forEach((e) => {
        if (e.classList.contains('selected')) {
            e.classList.remove('selected');
        }
    });

    if (orcamentoToggle.classList.contains('show')) {
        orcamentoToggle.classList.remove('show');
    } else {
        groupElements.forEach((e) => {
            if (e.classList.contains('show')) {
                e.classList.remove('show');
        }
    });
    orcamentoDiv.classList.add('show');
    }
}

function ficheirosHandler() {
    const fase1Toggle = document.getElementById('ficheiros_toggle');
    const fase1Div = document.getElementById('ficheiros');
    const groupElements = document.querySelectorAll('.show');
    const actualBtn = document.getElementById('ficheiros_btn');
    const previousBtn = document.querySelectorAll('.selected');

    actualBtn.classList.add('selected');
    previousBtn.forEach((e) => {
        if (e.classList.contains('selected')) {
            e.classList.remove('selected');
        }
    });

    if (fase1Toggle.classList.contains('show')) {
        fase1Toggle.classList.remove('show');
    } else {
        groupElements.forEach((e) => {
            if (e.classList.contains('show')) {
                e.classList.remove('show');
        }
    });
    fase1Div.classList.add('show');
    }
}

function documentosHandler() {
    const fase2Toggle = document.getElementById('documentos_toggle');
    const fase2Div = document.getElementById('documentos');
    const groupElements = document.querySelectorAll('.show');
    const actualBtn = document.getElementById('documentos_btn');
    const previousBtn = document.querySelectorAll('.selected');

    actualBtn.classList.add('selected');
    previousBtn.forEach((e) => {
        if (e.classList.contains('selected')) {
            e.classList.remove('selected');
        }
    });

    if (fase2Toggle.classList.contains('show')) {
        fase2Toggle.classList.remove('show');
    } else {
        groupElements.forEach((e) => {
            if (e.classList.contains('show')) {
                e.classList.remove('show');
        }
    });
    fase2Div.classList.add('show');
    }
}

function financeiroHandler() {
    const fase3Toggle = document.getElementById('financeiro_toggle');
    const fase3Div = document.getElementById('financeiro');
    const groupElements = document.querySelectorAll('.show');
    const actualBtn = document.getElementById('financeiro_btn');
    const previousBtn = document.querySelectorAll('.selected');

    actualBtn.classList.add('selected');
    previousBtn.forEach((e) => {
        if (e.classList.contains('selected')) {
            e.classList.remove('selected');
        }
    });

    if (fase3Toggle.classList.contains('show')) {
        fase3Toggle.classList.remove('show');
    } else {
        groupElements.forEach((e) => {
            if (e.classList.contains('show')) {
                e.classList.remove('show');
        }
    });
    fase3Div.classList.add('show');
    }
}

function dadosHandler() {
    const finalToggle = document.getElementById('dados_toggle');
    const finalDiv = document.getElementById('dados');
    const groupElements = document.querySelectorAll('.show');
    const actualBtn = document.getElementById('dados_btn');
    const previousBtn = document.querySelectorAll('.selected');

    actualBtn.classList.add('selected');
    previousBtn.forEach((e) => {
        if (e.classList.contains('selected')) {
            e.classList.remove('selected');
        }
    });

    if (finalToggle.classList.contains('show')) {
        finalToggle.classList.remove('show');
    } else {
        groupElements.forEach((e) => {
            if (e.classList.contains('show')) {
                e.classList.remove('show');
        }
    });
    finalDiv.classList.add('show');
    }
}

function downloadsHandler() {
    const finalToggle = document.getElementById('downloads_toggle');
    const finalDiv = document.getElementById('downloads');
    const groupElements = document.querySelectorAll('.show');
    const actualBtn = document.getElementById('all_btn');
    const previousBtn = document.querySelectorAll('.selected');

    actualBtn.classList.add('selected');
    previousBtn.forEach((e) => {
        if (e.classList.contains('selected')) {
            e.classList.remove('selected');
        }
    });

    if (finalToggle.classList.contains('show')) {
        finalToggle.classList.remove('show');
    } else {
        groupElements.forEach((e) => {
            if (e.classList.contains('show')) {
                e.classList.remove('show');
        }
    });
    finalDiv.classList.add('show');
    }
}

