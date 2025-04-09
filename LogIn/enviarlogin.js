function enviarFormulario () {


var datos = {'nickname': $('#nickname').val(), 
            'pass': $('#pass').val()
            };

$.ajax({
    data: datos,
    url: 'login.php',
    type: 'post',
    success: function (response){
        console.log(response);
        if (response == 1){
            document.location = '../index.php';
        } else {
            $('#error').show();
            $('#error').text(response);
        }
    }
});}