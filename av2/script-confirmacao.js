document.addEventListener('DOMContentLoaded', () => {
    // 1. Recupera os dados que salvamos antes de redirecionar
    const agendamento = JSON.parse(localStorage.getItem('aura_ultimo_agendamento'));

    // Se por algum motivo o cliente acessar a tela sem ter agendado, volta pra home
    if (!agendamento) {
        window.location.href = 'index.html';
        return;
    }

    // 2. Formata a data (de AAAA-MM-DD para DD/MM/AAAA)
    const dataFormatada = agendamento.data.split('-').reverse().join('/');

    // 3. Monta o texto exatamente igual ao protótipo
    const texto = `Seu agendamento para ${agendamento.servicos} no dia ${dataFormatada} às ${agendamento.hora} foi realizado com sucesso. Enviamos um e-mail com todos os detalhes.`;
    
    document.getElementById('texto-confirmacao').innerText = texto;

    // 4. Ações dos botões
    document.getElementById('btnVerAgendamentos').addEventListener('click', () => {
        window.location.href = 'minha_conta.html'; // Agora ele vai para a tela certa!
    });

    document.getElementById('btnNovoAgendamento').addEventListener('click', () => {
        // Limpa a memória e volta para escolher serviços
        localStorage.removeItem('aura_ultimo_agendamento');
        window.location.href = 'agendamento.html'; // Substitua pelo nome correto da sua tela de serviços
    });
});