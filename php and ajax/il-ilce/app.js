$(function(){

    $(document.body).on('change', '#il', function(){
        var plaka_kodu = $(this).val();
        if (plaka_kodu) {
            $.post('ajax.php',{'plakaKodu':plaka_kodu}, function (response) {
                $('#ilce').html(response).removeAttr('disabled'); 
            })
        }else{
             $('#ilce').html('<option>--İlçe Seçin -- </option>').attr('disabled','disabled');
        }
    });


});