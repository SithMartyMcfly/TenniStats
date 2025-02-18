

//MANEJO DEL DOM
const marcadorA = document.getElementById('marcadorA');
const marcadorB = document.getElementById('marcadorB');
const juegosA = document.getElementById('juegosA');
const juegosB = document.getElementById('juegosB');
const setsA = document.getElementById('setsA');
const setsB = document.getElementById('setsB');
const marcadorJuegosA = document.getElementById('marcadorJuegosA');
const marcadorJuegosB = document.getElementById('marcadorJuegosB');
//VARIABLES GLOBALES
let contadorA = 0;
let contadorB = 0;
let contadorJuegosA = 0;
let contadorJuegosB = 0;
let contadorSetsA = 0;
let contadorSetsB = 0;


//RESULTADOS DE JUEGOS
    //LLeva el resultado de los Juegos A
    function resultadoA() {
        let resultado;
        contadorA++;
        if (contadorA > 3 && contadorA === contadorB) {
            resultado = "40";
            marcadorA.innerHTML = "40";
            marcadorB.innerHTML = "40";
        } else if (contadorA > 3 && contadorA > contadorB) {
            resultado = "A";
        } else {

            switch (contadorA) {

                case 0:
                    resultado = "0";
                    break;
                case 1:
                    resultado = "15";
                    break;
                case 2:
                    resultado = "30";
                    break;
                case 3:
                    resultado = "40";
                    break;
            }
        }

        marcadorA.innerHTML = resultado;
        resultadoJuegosA();

    }

    marcadorA.addEventListener('click', resultadoA);



    //LLeva el resultado de los Juegos B
    function resultadoB() {
        let resultado;
        contadorB++;
        if (contadorB > 3 && contadorB === contadorA) {
            resultado = "40";
            marcadorA.innerHTML = "40";
            marcadorB.innerHTML = "40";
        } else if (contadorB > 3 && contadorB > contadorA) {
            resultado = "A";
        } else {

            switch (contadorB) {
                case 0:
                    resultado = "0";
                    break;
                case 1:
                    resultado = "15";
                    break;
                case 2:
                    resultado = "30";
                    break;
                case 3:
                    resultado = "40";
                    break;
            }
        }
        marcadorB.innerHTML = resultado;
        resultadoJuegosB();
    }

    marcadorB.addEventListener('click', resultadoB);


    /*MARCADORES DE SET*/

    //Lleva la puntuación, del jugador A, en el set actual
    function resultadoJuegosA() {

        if (contadorA >= 4 && contadorA > contadorB + 1) {
            contadorJuegosA++;
            contadorA = 0;
            contadorB = 0;
            marcadorA.innerHTML = "0";
            marcadorB.innerHTML = "0";
        }
        juegosA.innerHTML = contadorJuegosA;
        setsTotalesA();
    }

    //Lleva la puntuación, del jugador B, en el set actual
    function resultadoJuegosB() {

        if (contadorB >= 4 && contadorB > contadorA + 1) {
            contadorJuegosB++;
            contadorB = 0;
            contadorA = 0;
            marcadorA.innerHTML = "0";
            marcadorB.innerHTML = "0";
        }
        juegosB.innerHTML = contadorJuegosB;
        setsTotalesB();
    }



    //PUNTUACIÓN SETS
    //puntuación set jugador A
    function setsTotalesA() {
        if (contadorJuegosA >= 6) {
            contadorSetsA++;
            marcadorJuegosA.insertAdjacentHTML("beforeend", 
           `
            <td>${contadorJuegosA}</td>
           `);
            marcadorJuegosB.insertAdjacentHTML("beforeend", 
            `
            <td>${contadorJuegosB}</td>
            `
           )
           
            contadorJuegosA = 0;
            contadorJuegosB = 0;
            juegosA.innerHTML = "0";
            juegosB.innerHTML = "0";
        
        }
        setsA.innerHTML = contadorSetsA;
    }

    //puntuación set jugador B
    function setsTotalesB() {
        if (contadorJuegosB >= 6) {
            contadorSetsB++;
                marcadorJuegosA.insertAdjacentHTML("beforeend", 
                `
                 <td>${contadorJuegosA}</td>
                `);
                marcadorJuegosB.insertAdjacentHTML("beforeend", 
                 `
                 <td>${contadorJuegosB}</td>
                 `
                )
            contadorJuegosB = 0;
            contadorJuegosA = 0;
            juegosA.innerHTML = "0";
            juegosB.innerHTML = "0";
        }
        setsB.innerHTML = contadorSetsB;
    }

    //TODO: TieBreak

