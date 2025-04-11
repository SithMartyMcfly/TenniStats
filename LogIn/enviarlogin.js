function enviarFormulario () {

/*enviamos los datos recogidos en nickname y en pass
los pasamos como nickname y pass respectivamente*/
var datos = {'nickname': $('#nickname').val(), 
            'pass': $('#pass').val()
            };

/*hacemos el envio con ajax para que se comprueben
que los datos que hemos recogido existen en la bbdd
en caso de no existir nos mandará un error y nos mostrará
un mensaje de error*/
$.ajax({
    data: datos,
    url: 'login.php',
    type: 'post',
    success: function (response){
        console.log(response);
        if (response === "ok"){
            document.location = '../index.php';
        } else {
            $('#error').show();
            $('#registro').show();
            $('#error').text(response);
        }
    }
});
}