// 1. Recupera os dados salvos
const agendamento = JSON.parse(localStorage.getItem('aura_agendamento_completo'));
const usuario = JSON.parse(localStorage.getItem('aura_usuario'));

if (!agendamento || !usuario) {
    alert("Dados incompletos. Retornando ao início.");
    window.location.href = 'index.html';
}

// 2. Preenche o Resumo no HTML
const nomesServicos = agendamento.servicos.map(s => s.nome).join(', ');

document.getElementById('resumoServicos').innerText = nomesServicos;
document.getElementById('resumoProfissional').innerText = agendamento.profissional.nome;

// Formata a data de YYYY-MM-DD para DD/MM/YYYY
const dataFormatada = agendamento.data.split('-').reverse().join('/');
document.getElementById('resumoData').innerText = dataFormatada;
document.getElementById('resumoHora').innerText = agendamento.hora;

document.getElementById('resumoDuracao').innerText = agendamento.totalTempo;

// Aplica um desconto visual (opcional, como no seu print)
let precoComDesconto = agendamento.totalPreco * 0.85; // 15% de desconto
document.getElementById('resumoPreco').innerText = precoComDesconto.toFixed(2).replace('.', ',');

// 3. Lógica dos Radio Buttons (Cartão x Pix)
const radiosPagamento = document.querySelectorAll('input[name="pagamento"]');
const formCartao = document.getElementById('form-cartao');
const secaoPix = document.getElementById('secao-pix'); // Captura a nova div do Pix

radiosPagamento.forEach(radio => {
    radio.addEventListener('change', (e) => {
        if (e.target.value === 'cartao') {
            // Se escolheu Cartão: mostra cartão, esconde pix
            formCartao.style.display = 'flex';
            secaoPix.style.display = 'none';
        } else {
            // Se escolheu Pix: esconde cartão, mostra pix
            formCartao.style.display = 'none';
            secaoPix.style.display = 'flex';
        }
    });
});

// 4. Lógica do Checkbox de Termos (Libera o botão final)
const checkTermos = document.getElementById('checkTermos');
const btnConfirmar = document.getElementById('btnConfirmarPagar');

checkTermos.addEventListener('change', () => {
    btnConfirmar.disabled = !checkTermos.checked;
});

// --- Lógica para o Agendamento de Outra Pessoa ---
const checkPresente = document.getElementById('checkPresente');
const campoPresenteado = document.getElementById('campo-presenteado');
const inputNomePresenteado = document.getElementById('nomePresenteado');

checkPresente.addEventListener('change', () => {
    if (checkPresente.checked) {
        campoPresenteado.style.display = 'flex'; // Mostra o campo
    } else {
        campoPresenteado.style.display = 'none'; // Esconde o campo
        inputNomePresenteado.value = ''; // Limpa o que foi digitado se ele desmarcar
    }
});

// 5. Enviar para o Banco de Dados (PHP)
btnConfirmar.addEventListener('click', async () => {
    const textoOriginal = btnConfirmar.innerText;
    btnConfirmar.innerText = 'Processando...';
    btnConfirmar.disabled = true;

    // Descobre qual método de pagamento foi escolhido
    const formaPagamento = document.querySelector('input[name="pagamento"]:checked').value;

    // Verifica se a opção de presente está marcada e pega o nome
    let nomePresente = null;
    if (checkPresente.checked && inputNomePresenteado.value.trim() !== '') {
        nomePresente = inputNomePresenteado.value.trim();
    }

    // Monta o pacote de dados para enviar
    const dadosParaSalvar = {
        cliente_nome: usuario.nome,
        presenteado_nome: nomePresente, // Envia o nome do presenteado (ou null)
        servicos_nomes: nomesServicos,
        profissional: agendamento.profissional.nome,
        data: agendamento.data,
        hora: agendamento.hora,
        valor_total: precoComDesconto,
        duracao_total: agendamento.totalTempo,
        forma_pagamento: formaPagamento
    };

    try {
        const response = await fetch('salvar_agendamento.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(dadosParaSalvar)
        });

        const resultado = await response.json();

        if (resultado.sucesso) {
            // Salva apenas os dados básicos para mostrar na tela de sucesso
            localStorage.setItem('aura_ultimo_agendamento', JSON.stringify({
                servicos: nomesServicos,
                data: agendamento.data,
                hora: agendamento.hora
            }));
            
            // Limpa o carrinho de agendamento principal
            localStorage.removeItem('aura_agendamento_servicos');
            localStorage.removeItem('aura_agendamento_completo');
            
            // Redireciona para a nova tela
            window.location.href = 'confirmacao.html';
        }

    } catch (error) {
        console.error('Erro:', error);
        alert('Erro de conexão com o servidor.');
        btnConfirmar.innerText = textoOriginal;
        btnConfirmar.disabled = false;
    }
});