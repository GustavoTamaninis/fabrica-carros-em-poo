document.addEventListener("DOMContentLoaded", function(){

    btnAlternarTema = document.getElementById('alternar-modo');
    menuContainer = document.getElementById('menu');
    btn1 = document.getElementById('btn1');
    btn2 = document.getElementById('btn2');
    btn3 = document.getElementById('btn3');

    btnAlternarTema.addEventListener('click', function(e){
        alternarTema();
    });

    const form = document.getElementById("menuForm");

    if(form){
        form.addEventListener("submit", function(e){
            const button = e.submitter || document.activeElement;
            const acao = button ? button.value : "desconhecida";

            const confirmar = window.confirm("Confirma a ação: " + acao + "?");

            if(!confirmar){
                e.preventDefault();
                console.log("Envio cancelado.");
            }else{
                console.log("Envio confirmado para o PHP.");
            }
        });
    }
})

function alternarTema(){
    document.body.classList.toggle('tema-escuro');
    menuContainer.classList.toggle('tema-escuro');
    btnAlternarTema.classList.toggle('tema-escuro');
    btn1.classList.toggle('tema-escuro');
    btn2.classList.toggle('tema-escuro');
    btn3.classList.toggle('tema-escuro');
}