export function enviarDatos(objetoA, objetoB, url) {

    const datos = new FormData();
    datos.append('jugadorA', JSON.stringify(objetoA));
    datos.append('jugadorB', JSON.stringify(objetoB));

    return fetch(url, {
        method: 'POST',
        body: datos
    })
        //líneas de control de errores
        .then(response => response.text())
        .then(data => console.log('Envio de datos correcto:', data))
        /*una vez los datos se han enviado al servidor, hemos redirigido al
        usuario a la página donde se consultan los datos de los jugadores*/
        .then(window.location.href = "../CRUDJugador/cliente/verJugadores.php")
        .catch(error => {
            console.error('Error:', error);
            throw error;
        });
}

