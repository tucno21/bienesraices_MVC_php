document.addEventListener("DOMContentLoaded", function(){

    eventListener();

    darkMode();
})

function eventListener() {
    const mobilMmenu = document.querySelector(".mobile-menu");
    mobilMmenu.addEventListener('click', navegacionResposive);
}

function navegacionResposive(){
    const navegacion = document.querySelector(".navegacion");
    

    navegacion.classList.toggle('mostrar');
}

function  darkMode(){
//conocer las preferencias del usuario


    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(preferencia.matches);
    if(prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });

    // const darkBtn = document.querySelector(".dark-mode-boton");

    // darkBtn.addEventListener("click",(e)=>{
    //     if( document.body.classList.contains('dark-mode')){
    //         e.target.src = "build/img/dark-luna.svg";
    //         document.body.classList.remove('dark-mode');
    //     }else{
    //         document.body.classList.add('dark-mode');
    //         e.target.src = "build/img/dark-sol.svg";
    //     }
    // });
}