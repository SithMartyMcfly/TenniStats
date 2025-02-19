

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
let enTieBreak = false;
let numeroSets = 2;

//función para colorear de verde cuando gana el jugador A
function ganadorSetA() {
    marcadorJuegosA.lastElementChild.style.background='green';
}
//función para colorear de verde cuando gana el jugador A
function ganadorSetB() {
    marcadorJuegosB.lastElementChild.style.background='green';
}
//función que activa la puntuación especial de tieBreak
function activarTieBreak() {
    enTieBreak = contadorJuegosA === 3 && contadorJuegosB === 3;
}

//función que dirime quien ha ganado el partido
 function ganadorPartido () {
        if(contadorSetsA===numeroSets){
            console.log('Gana jugador A')
            marcadorA.removeEventListener('click', resultadoA);
            marcadorB.removeEventListener('click', resultadoB);
            marcadorJuegosA.style.background='green';
            marcadorA.innerHTML = "0";
            marcadorB.innerHTML = "0";
            
        }

        if (contadorSetsB===numeroSets){
            console.log('Gana jugador B');
            marcadorA.removeEventListener('click', resultadoA);
            marcadorB.removeEventListener('click', resultadoB);
            marcadorA.innerHTML = "0";
            marcadorB.innerHTML = "0";
            marcadorJuegosB.style.background='green';
        }
    }

//RESULTADOS DE JUEGOS
//LLeva el resultado de los Juegos A
function resultadoA() {
    activarTieBreak();
    
    if (!enTieBreak) {
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
    } else {
        contadorA++;
        marcadorA.innerHTML = contadorA;
        resultadoJuegosA();
    }

}

marcadorA.addEventListener('click', resultadoA);



//LLeva el resultado de los Juegos B
function resultadoB() {
    activarTieBreak();
   
    if (!enTieBreak) {
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
    } else {
        contadorB++;
        marcadorB.innerHTML = contadorB;
        resultadoJuegosB();
    }


}

marcadorB.addEventListener('click', resultadoB);




//Lleva la puntuación, del jugador A, en el set actual
function resultadoJuegosA() {
    ganadorPartido();
    if (!enTieBreak) {
        if (contadorA >= 4 && contadorA > contadorB + 1) {
            contadorJuegosA++;
            contadorA = 0;
            contadorB = 0;
            marcadorA.innerHTML = "0";
            marcadorB.innerHTML = "0";
        }
        juegosA.innerHTML = contadorJuegosA;
        setsTotalesA();
    } else {
        if (contadorA >= 7 && contadorA > contadorB + 1) {
            contadorJuegosA++;
            contadorA = 0;
            contadorB = 0;
            marcadorA.innerHTML = "0";
            marcadorB.innerHTML = "0";
            juegosA.innerHTML = contadorJuegosA;
            setsTotalesA();
        }
    }
}

//Lleva la puntuación, del jugador B, en el set actual
function resultadoJuegosB() {
    ganadorPartido();
    if (!enTieBreak) {
        if (contadorB >= 4 && contadorB > contadorA + 1) {
            contadorJuegosB++;
            contadorB = 0;
            contadorA = 0;
            marcadorA.innerHTML = "0";
            marcadorB.innerHTML = "0";
        }
        juegosB.innerHTML = contadorJuegosB;
        setsTotalesB();
    } else {
        if (contadorB >= 7 && contadorB > contadorA + 1) {
            contadorJuegosB++;
            contadorB = 0;
            contadorA = 0;
            marcadorA.innerHTML = "0";
            marcadorB.innerHTML = "0";
            juegosB.innerHTML = contadorJuegosB;
            setsTotalesB();
        }
    }
}



//PUNTUACIÓN SETS
//puntuación set jugador A
function setsTotalesA() {
    
    if (!enTieBreak) {
        if (contadorJuegosA >= 3 && contadorJuegosA > contadorJuegosB + 1) {
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
            ganadorSetA();
            contadorJuegosA = 0;
            contadorJuegosB = 0;
            juegosA.innerHTML = "0";
            juegosB.innerHTML = "0";

        }
        setsA.innerHTML = contadorSetsA;
    } else {
        if (contadorJuegosA > contadorJuegosB) {
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
            ganadorSetA();
            contadorJuegosA = 0;
            contadorJuegosB = 0;
            juegosA.innerHTML = "0";
            juegosB.innerHTML = "0";
            enTieBreak = false;
        }
    }

}

//puntuación set jugador B
function setsTotalesB() {
    
    if (!enTieBreak) {
        if (contadorJuegosB >= 3 && contadorJuegosB > contadorJuegosA + 1) {
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
                ganadorSetB();
                contadorJuegosB = 0;
                contadorJuegosA = 0;
                juegosA.innerHTML = "0";
                juegosB.innerHTML = "0";
            }
        setsB.innerHTML = contadorSetsB;
    } else {
        if (contadorJuegosB > contadorJuegosA) {
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
            ganadorSetB();
            contadorJuegosB = 0;
            contadorJuegosA = 0;
            juegosA.innerHTML = "0";
            juegosB.innerHTML = "0";
            enTieBreak = false;
        }
    }

   
}