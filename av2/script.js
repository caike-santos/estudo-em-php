const loginBtn = document.getElementById('loginBtn');
const loginModal = document.getElementById('loginModal');
const closeBtn = document.querySelector('.close-btn');

loginBtn.addEventListener('click', function(event) {
    event.preventDefault();
    loginModal.style.display = 'flex';
});

closeBtn.addEventListener('click', function() {
    loginModal.style.display = 'none';
});

window.addEventListener('click', function(event) {
    if (event.target === loginModal) {
        loginModal.style.display = 'none';
    }
});

// --- LÓGICA DO BOTÃO "AGENDAR AGORA" ---

// Seleciona todos os botões de agendar que existem na página
const botoesAgendar = document.querySelectorAll('.btn-agendar');

// Adiciona o evento de clique a cada um deles
botoesAgendar.forEach(botao => {
    botao.addEventListener('click', function(event) {
        event.preventDefault(); // Evita que a página recarregue

        // Verifica se existe um usuário salvo no localStorage (se está logado)
        const usuarioLogado = localStorage.getItem('aura_usuario');

        if (usuarioLogado) {
            // Se estiver logado, redireciona para a página de agendamento
            window.location.href = 'agendamento.html'; 
        } else {
            // Se NÃO estiver logado, abre o modal de login
            alert('Por favor, faça login na sua conta para agendar um horário.');
            const loginModal = document.getElementById('loginModal');
            if (loginModal) {
                loginModal.style.display = 'flex';
            }
        }
    });
});

function verificarEstadoLogin() {
    const usuarioSalvo = localStorage.getItem('aura_usuario');

    const navLoggedOut = document.getElementById('nav-logged-out');
    const navLoggedIn = document.getElementById('nav-logged-in');

    if (usuarioSalvo) {
        const dadosUsuario = JSON.parse(usuarioSalvo);
        navLoggedOut.style.display = 'none';
        navLoggedIn.style.display = 'flex';
        document.getElementById('userNameDisplay').innerText = dadosUsuario.nome;
        document.getElementById('userPontos').innerText = dadosUsuario.pontos;
    } else {
        navLoggedOut.style.display = 'flex';
        navLoggedIn.style.display = 'none';
    }
}

verificarEstadoLogin();

const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', async function(event) {
    event.preventDefault();

    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    const formData = new FormData();
    formData.append('email', email);
    formData.append('senha', senha);

    const btnSubmit = document.querySelector('.btn-login-submit');
    const textoOriginal = btnSubmit.innerText;
    btnSubmit.innerText = 'Carregando...';
    btnSubmit.disabled = true;

    try {
        const response = await fetch('login.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.sucesso) {
            const dadosSessao = {
                nome: data.nome,
                pontos: data.pontos
            };
            localStorage.setItem('aura_usuario', JSON.stringify(dadosSessao));

            loginModal.style.display = 'none';
            loginForm.reset();

            verificarEstadoLogin();
        } else {
            alert('Erro: ' + data.mensagem);
        }
    } catch (error) {
        console.error(error);
        alert('Ocorreu um erro ao tentar fazer login.');
    } finally {
        btnSubmit.innerText = textoOriginal;
        btnSubmit.disabled = false;
    }
});

const logoutBtn = document.getElementById('logoutBtn');

logoutBtn.addEventListener('click', function(event) {
    event.preventDefault();
    localStorage.removeItem('aura_usuario');
    verificarEstadoLogin();
});