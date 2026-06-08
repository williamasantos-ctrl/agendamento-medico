const btnConsulta =
document.getElementById("btnConsulta");

btnConsulta.addEventListener("click", () => {

    window.location.href =
    "consulta.html";

});

// Pesquisa simples

const pesquisa =
document.querySelector("input");

pesquisa.addEventListener("keyup", () => {

    console.log(
        "Pesquisando:",
        pesquisa.value
    );

});