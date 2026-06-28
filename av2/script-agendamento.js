// Variáveis de estado (o nosso "carrinho")
let servicosSelecionados = [];
let totalPreco = 0;
let totalTempo = 0;

// Elementos da tela
const elTotalPreco = document.getElementById('totalPreco');
const elTotalTempo = document.getElementById('totalTempo');
const elResumoServicos = document.getElementById('resumoServicos');
const btnContinuar = document.getElementById('btnContinuar');
const listaServicos = document.getElementById('lista-servicos');

// 1. Função para carregar os serviços do PHP
async function carregarServicos() {
    try {
        const response = await fetch('api_servicos.php');
        const data = await response.json();

        if (data.sucesso) {
            renderizarServicos(data.dados);
        } else {
            console.error('Erro:', data.mensagem);
        }
    } catch (error) {
        console.error('Erro de conexão:', error);
    }
}

// 2. Cria o HTML de cada serviço na tela
function renderizarServicos(servicos) {
    listaServicos.innerHTML = ''; // Limpa antes de colocar

    servicos.forEach(servico => {
        // Cria a caixinha (card)
        const card = document.createElement('div');
        card.className = 'servico-card';
        card.innerHTML = `
    <div class="servico-info">
        <h4>${servico.nome}</h4>
        <p>${servico.duracao_minutos} min</p>
    </div>
    <div class="servico-acao">
        <button class="btn-adicionar" data-id="${servico.id}">Adicionar</button>
        <p class="preco">R$ ${parseFloat(servico.preco).toFixed(2).replace('.', ',')}</p>
    </div>
`;

        // Lógica de clique do botão "Adicionar / Remover"
        const btnAdicionar = card.querySelector('.btn-adicionar');
        btnAdicionar.addEventListener('click', () => toggleServico(servico, btnAdicionar));

        listaServicos.appendChild(card);
    });
}

// 3. Adiciona ou remove do carrinho e atualiza o resumo
function toggleServico(servico, botao) {
    const index = servicosSelecionados.findIndex(s => s.id === servico.id);

    if (index === -1) {
        // Não está no carrinho -> ADICIONAR
        servicosSelecionados.push(servico);
        botao.innerText = 'Remover';
        botao.classList.add('selecionado');
        botao.style.backgroundColor = '#4A3333'; // Cor de quando está selecionado
    } else {
        // Já está no carrinho -> REMOVER
        servicosSelecionados.splice(index, 1);
        botao.innerText = 'Adicionar';
        botao.classList.remove('selecionado');
        botao.style.backgroundColor = '#A97575'; // Cor padrão do botão adicionar
    }

    atualizarResumo();
}

// 4. Faz a matemática e atualiza os textos do topo
function atualizarResumo() {
    totalPreco = 0;
    totalTempo = 0;
    let nomes = [];

    servicosSelecionados.forEach(s => {
        totalPreco += parseFloat(s.preco);
        totalTempo += parseInt(s.duracao_minutos);
        nomes.push(s.nome);
    });

    // Atualiza HTML
    elTotalPreco.innerText = totalPreco.toFixed(2).replace('.', ',');
    elTotalTempo.innerText = totalTempo;

    if (nomes.length === 0) {
        elResumoServicos.innerText = 'Nenhum serviço selecionado';
        btnContinuar.disabled = true; // Impede de continuar sem nada
    } else {
        elResumoServicos.innerText = nomes.join(', ');
        btnContinuar.disabled = false; // Libera o botão
    }
}

// 5. Salva os dados e vai para a próxima página ao clicar em "Continuar"
btnContinuar.addEventListener('click', () => {
    if (servicosSelecionados.length > 0) {
        // Salva o carrinho no navegador
        localStorage.setItem('aura_agendamento_servicos', JSON.stringify({
            servicos: servicosSelecionados,
            totalPreco: totalPreco,
            totalTempo: totalTempo
        }));

        // Manda para a tela onde ele vai escolher o profissional/horário
        window.location.href = 'escolher_profissional.html'; // Mude para o nome do seu próximo arquivo HTML
    }
});

// Inicializa a página carregando os serviços
carregarServicos();