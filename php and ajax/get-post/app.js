$(function(){

    //$.ajax
    /**
     
     $.ajax({
         type: 'POST',
         url: 'ajax.php',
         data: {'name':'Erdem Bektaş'},
         success: function (response) {
             if(response){
                 alert(response.name)
                }
            },
            dataType: 'json' 
        })
        */

    //$.post
    /*
    $.post('ajax.php', {'name':'Erdem Bektaş'},function(response) {
        console.log(response);
    },'json' );
    */

    //#.get

        $.get('ajax.php', {'name':'Erdem Bektaş'}, function (response) {
            console.log(response);
        }, 'json')

});