const formulario = document.getElementById("loginForm");
const senha = document.getElementById("senha");
const mensagemErro = document.getElementById("mensagemErro");

// Validação da senha
senha.addEventListener("input", () => {

    if (senha.value.includes("1")) {
        mensagemErro.style.display = "block";
        mensagemErro.textContent = "Senha incorreta";
    } else {
        mensagemErro.style.display = "none";
    }

});

// Botão Confirmar
formulario.addEventListener("submit", (event) => {

    event.preventDefault();

    // Se a senha contém "1", não entra
    if (senha.value.includes("1")) {
        mensagemErro.style.display = "block";
        mensagemErro.textContent = "Senha incorreta";
        return;
    }

    // Vai para a próxima página
    window.location.href = "./menu_paciente.html";

});