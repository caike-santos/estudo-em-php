// Variáveis de estado
let profissionalSelecionado = null; // ID do profissional ou "qualquer"
let dataSelecionada = null;
let horaSelecionada = null;

// Elementos da tela
const btnQualquer = document.getElementById('btnQualquer');
const btnEscolher = document.getElementById('btnEscolher');
const listaProfissionais = document.getElementById('lista-profissionais');
const secaoDataHora = document.getElementById('secao-data-hora');
const btnContinuarProf = document.getElementById('btnContinuarProf');
const inputData = document.getElementById('dataAgendamento');
const inputHora = document.getElementById('horaAgendamento');

// 1. Verifica se tem serviços no carrinho (se não tiver, manda de volta)
const agendamentoSalvo = localStorage.getItem('aura_agendamento_servicos');
if (!agendamentoSalvo) {
    alert("Nenhum serviço selecionado. Redirecionando...");
    window.location.href = 'agendamento.html';
}

// 2. Ação: "Qualquer profissional"
btnQualquer.addEventListener('click', () => {
    btnQualquer.classList.add('ativo');
    btnEscolher.classList.remove('ativo');
    
    listaProfissionais.style.display = 'none'; // Esconde a grid
    secaoDataHora.style.display = 'flex';      // Mostra data/hora
    
    profissionalSelecionado = { id: 0, nome: "Qualquer profissional" };
    verificarPreenchimento();
});

// 3. Ação: "Quero escolher"
btnEscolher.addEventListener('click', async () => {
    btnEscolher.classList.add('ativo');
    btnQualquer.classList.remove('ativo');
    
    listaProfissionais.style.display = 'grid'; 
    secaoDataHora.style.display = 'none';
    profissionalSelecionado = null; 
    btnContinuarProf.disabled = true;

    // NOVO: Pega os IDs dos serviços escolhidos
    const agendamentoAtual = JSON.parse(localStorage.getItem('aura_agendamento_servicos'));
    const idsServicos = agendamentoAtual.servicos.map(s => s.id).join(',');

    try {
        // Envia os IDs pela URL para o PHP filtrar
        const response = await fetch(`api_profissionais.php?servicos=${idsServicos}`);
        const data = await response.json();
        
        if (data.sucesso) {
            if (data.dados.length > 0) {
                renderizarProfissionais(data.dados);
            } else {
                listaProfissionais.innerHTML = '<p style="grid-column: 1 / -1; text-align: center; color: var(--cor-texto);">Nenhum profissional disponível para fazer TODOS os serviços escolhidos juntos. Tente agendá-los separadamente ou escolha a opção "Qualquer profissional".</p>';
            }
        }
    } catch (error) {
        console.error("Erro ao carregar profissionais", error);
    }
});

// 4. Renderiza os profissionais na tela
function renderizarProfissionais(profissionais) {
    listaProfissionais.innerHTML = ''; 

    profissionais.forEach(prof => {
        const card = document.createElement('div');
        card.className = 'prof-card';
        card.innerHTML = `
            <h4>${prof.nome}</h4>
            <p>${prof.especialidade}</p>
        `;

        card.addEventListener('click', () => {
            // Remove a classe 'selecionado' de todos
            document.querySelectorAll('.prof-card').forEach(c => c.classList.remove('selecionado'));
            // Adiciona no clicado
            card.classList.add('selecionado');
            
            profissionalSelecionado = prof;
            
            // Agora que escolheu o profissional, mostra a data e hora
            secaoDataHora.style.display = 'flex';
            verificarPreenchimento();
        });

        listaProfissionais.appendChild(card);
    });
}

// 5. Verifica se Data e Hora foram preenchidos
inputData.addEventListener('change', verificarPreenchimento);
inputHora.addEventListener('change', verificarPreenchimento);

function verificarPreenchimento() {
    dataSelecionada = inputData.value;
    horaSelecionada = inputHora.value;

    // Se tem profissional, data e hora, libera o botão continuar
    if (profissionalSelecionado && dataSelecionada && horaSelecionada) {
        btnContinuarProf.disabled = false;
    } else {
        btnContinuarProf.disabled = true;
    }
}

// 6. Ao clicar em Continuar
btnContinuarProf.addEventListener('click', () => {
    // Pega os dados dos serviços (da tela anterior)
    const dadosAgendamento = JSON.parse(localStorage.getItem('aura_agendamento_servicos'));
    
    // Adiciona as novas informações
    dadosAgendamento.profissional = profissionalSelecionado;
    dadosAgendamento.data = dataSelecionada;
    dadosAgendamento.hora = horaSelecionada;

    // Salva tudo atualizado no localStorage
    localStorage.setItem('aura_agendamento_completo', JSON.stringify(dadosAgendamento));

    // Redireciona para a tela final (Resumo/Confirmação)
    window.location.href = 'resumo.html'; // Próxima tela a ser criada!
});