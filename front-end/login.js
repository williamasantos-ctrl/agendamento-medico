const senha = document.getElementById("senha");
const mensagemErro = document.getElementById("mensagemErro");

//Senha (1)
senha.addEventListener("input", () => {

    if (senha.value.includes("1")) {
        mensagemErro.style.display = "block";
        mensagemErro.textContent = "Senha incorreta";
    }

    else {
        mensagemErro.style.display = "none";
    }

});