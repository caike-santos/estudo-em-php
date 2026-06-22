const toggleSenha = document.getElementById('toggleSenha');
const inputSenha = document.getElementById('senha');

toggleSenha.addEventListener('click', function () {
    const type = inputSenha.getAttribute('type') === 'password' ? 'text' : 'password';
    inputSenha.setAttribute('type', type);
});

const cadastroForm = document.getElementById('cadastroForm');

cadastroForm.addEventListener('submit', async function(event) {
    event.preventDefault();

    const btnCadastrar = document.getElementById('btnCadastrar');
    btnCadastrar.innerText = 'A aguardar...';
    btnCadastrar.disabled = true;

    const formData = new FormData(cadastroForm);

    try {
        const response = await fetch('cadastro.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.sucesso) {
            alert(data.mensagem);
            window.location.href = 'index.html';
        } else {
            alert('Erro: ' + data.mensagem);
        }
    } catch (error) {
        console.error('Erro:', error);
        alert('Ocorreu um erro ao comunicar com o servidor.');
    } finally {
        btnCadastrar.innerText = 'Cadastrar';
        btnCadastrar.disabled = false;
    }
});