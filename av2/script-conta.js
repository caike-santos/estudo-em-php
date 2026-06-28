document.addEventListener('DOMContentLoaded', () => {
    const usuarioSalvo = localStorage.getItem('aura_usuario');
    const conteudoContainer = document.getElementById('conteudo-aba');
    const botoesAba = document.querySelectorAll('.btn-aba');

    // Se não estiver logado, expulsa para a home
    if (!usuarioSalvo) {
        window.location.href = 'index.html';
        return;
    }

    const usuario = JSON.parse(usuarioSalvo);

    // Função para buscar e renderizar os Agendamentos
    async function carregarAgendamentos() {
        conteudoContainer.innerHTML = '<p class="mensagem-carregando">Buscando seus agendamentos...</p>';

        try {
            const response = await fetch(`api_minha_conta.php?cliente=${encodeURIComponent(usuario.nome)}`);
            const data = await response.json();

            if (data.sucesso) {
                if (data.dados.length === 0) {
                    conteudoContainer.innerHTML = '<p style="text-align:center;">Você ainda não possui nenhum agendamento.</p>';
                    return;
                }

                let html = '';
                data.dados.forEach(agendamento => {
                    // Formata a data e hora
                    const dataFormatada = agendamento.data_agendamento.split('-').reverse().join('/');
                    const horaFormatada = agendamento.hora_agendamento.substring(0, 5); // Tira os segundos

                    html += `
                        <div class="card-agendamento">
                            <div class="linha-dado"><strong>Serviços:</strong> ${agendamento.servicos_nomes}</div>
                            <div class="linha-dado"><strong>Profissional:</strong> ${agendamento.profissional}</div>
                            <div class="linha-dado"><strong>Data:</strong> ${dataFormatada}</div>
                            <div class="linha-dado"><strong>Hora:</strong> ${horaFormatada}</div>
                            <div class="linha-dado"><strong>Preço:</strong> R$ ${parseFloat(agendamento.valor_total).toFixed(2).replace('.', ',')}</div>
                            
                            <div class="politicas-texto">
                                <strong>Política de Cancelamento</strong><br>
                                • Até 48hrs antes da data do agendamento: cancelamento gratuito.<br>
                                • Cancelamentos em prazo menor sofrerão multa referente a 50% do valor restante que será debitado em sua conta Aura para você usar na Studio.<br>
                                • Faltas: perda total.
                            </div>

                            <button class="btn-cancelar" onclick="alert('Funcionalidade de cancelamento em desenvolvimento!')">Cancelar Agendamento</button>
                        </div>
                    `;
                });

                conteudoContainer.innerHTML = html;

            } else {
                conteudoContainer.innerHTML = `<p>Erro: ${data.mensagem}</p>`;
            }
        } catch (error) {
            conteudoContainer.innerHTML = '<p>Erro de conexão ao buscar agendamentos.</p>';
        }
    }

    // Função para mudar de aba
    function ativarAba(abaId) {
        // Remove a classe ativo de todos os botões
        botoesAba.forEach(btn => btn.classList.remove('ativo'));
        
        // Adiciona a classe ativo no botão clicado
        const botaoClicado = document.querySelector(`.btn-aba[data-aba="${abaId}"]`);
        if (botaoClicado) botaoClicado.classList.add('ativo');

        // Carrega o conteúdo correspondente
        if (abaId === 'agendamentos') {
            carregarAgendamentos();
        } else if (abaId === 'pontos') {
            conteudoContainer.innerHTML = `
                <h3 style="text-align:center;">Pontos Aura</h3>
                <p style="text-align:center; font-size: 20px;">Você tem <strong>${usuario.pontos}</strong> pontos!</p>
                <p style="text-align:center;">Junte pontos e troque por descontos incríveis.</p>
            `;
        } else if (abaId === 'historico') {
            conteudoContainer.innerHTML = '<p style="text-align:center;">Aqui aparecerá o histórico de serviços já realizados.</p>';
        } else if (abaId === 'dados') {
            conteudoContainer.innerHTML = `
                <h3 style="text-align:center;">Meus Dados</h3>
                <p style="text-align:center;">Nome: ${usuario.nome}</p>
                <p style="text-align:center; color:#999;">(Edição de dados em breve)</p>
            `;
        }
    }

    // Adiciona evento de clique nas abas
    botoesAba.forEach(botao => {
        botao.addEventListener('click', (e) => {
            const abaSelecionada = e.target.getAttribute('data-aba');
            ativarAba(abaSelecionada);
        });
    });

    // Inicia carregando a aba de agendamentos
    ativarAba('agendamentos');
});