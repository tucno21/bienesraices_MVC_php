document.addEventListener("DOMContentLoaded", function(){

    eventListener();

    darkMode();
})

function eventListener() {
    const mobilMmenu = document.querySelector(".mobile-menu");
    mobilMmenu.addEventListener('click', navegacionResposive);

    //muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodoContacto));
}

function navegacionResposive(){
    const navegacion = document.querySelector(".navegacion");
    navegacion.classList.toggle('mostrar');
}

function mostrarMetodoContacto(e){
const contactoDiv = document.querySelector("#contacto");
if(e.target.value === 'telefono'){
    contactoDiv.innerHTML = `
    <label for="telefono">Numero Teléfono </label>
    <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]" required>
    <p>Elija la fecha y la hora Para la llamada</p>
    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="contacto[fecha]">
    <label for="hora">Hora:</label>
    <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
    `;

}else{
    contactoDiv.innerHTML =`
    <label for="email">E-mail</label>
    <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>
    `;
}
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