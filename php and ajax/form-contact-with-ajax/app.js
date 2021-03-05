$(function(){
    $('#btn-send').on('click',function (e) {
        var formData = $('#contact-form').serialize();
        //alert(formData);
        $.post('ajax.php', formData + '&type=contact' ,function (response) { // add type
            //console.log(response);
             if (response.err) {
                 //alert(response.err);
                 $('#successful').hide(); 
                 $('#err').html(response.err).show(); 
                 $('#'+response.target).focus();
             }else{
                 $('#err').hide(); 
                 $('#successful').html(response.successful).show(); 
                 $('#contact-form input, #contact-form textarea').val('');
                 
             }
        }, 'json');

        e.preventDefault();

    });
}); 