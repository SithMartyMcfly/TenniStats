export function enviarDatos (objetoA, objetoB, url) {

    const datos = new FormData ();
    datos.append('jugadorA', JSON.stringify(objetoA));
    datos.append('jugadorB', JSON.stringify(objetoB));
    return fetch (url, {
        method: 'POST',
        body: datos
    })
    //líneas de control de errores
    .then(response => response.text())
    .then(data=>console.log('Envio de datos correcto:', data))
    .catch(error => {
        console.error('Error:', error);
        throw error;
    });    
}

