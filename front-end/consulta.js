const pesquisa =
document.getElementById("pesquisa");

pesquisa.addEventListener("keyup", () => {

    const valor =
    pesquisa.value.toLowerCase();

    const cards =
    document.querySelectorAll(".card");

    cards.forEach(card => {

        const texto =
        card.innerText.toLowerCase();

        if(texto.includes(valor)){
            card.style.display = "block";
        }
        else{
            card.style.display = "none";
        }

    });

});

function agendar(nome){

    document.getElementById(
        "medicoSelecionado"
    ).value = nome;

}

document
.getElementById("btnPagamento")
.addEventListener("click", () => {

    alert(
        "Pagamento realizado com sucesso!"
    );

});

document
.getElementById("btnVerificar")
.addEventListener("click", () => {

    const codigo =
    document.getElementById(
        "codigoEmail"
    ).value;

    if(codigo === "123456"){

        document.getElementById(
            "resultado"
        ).style.display = "block";

    }else{

        alert(
            "Código inválido!"
        );

    }

});