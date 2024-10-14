$(document).ready(function(){
    $('#mail_key').hide();

    $('#rep_pass').submit(function (e)
    {
        e.preventDefault();
        var formId = $(this).attr('id');
        var formNm = $('#' + formId);
        $.ajax({
            type: "POST",
            url: 'repeatDB.php',
            data: formNm.serialize(),
            beforeSend: function (){
                $(formNm).html('<p style = "text-align: center">Отправка...</p>');
            },
            success: function (data){
                $('#rep_pass').hide();
                $('#mail_key').show();
            }, 
            error: function(jqXHR, text, error){
                $(formNm).innerHTML('<p class="message">Ошибка отправки!</p>');
            }
        });
        return false;
    });

    $('#mail_key').submit(function ()
    {
        var formId_two = $(this).attr('id');
        var formNm_two = $('#' + formId_two);
        $.ajax({
            type: "POST",
            url: 'update_data.php',
            data: formNm_two.serialize(),
            beforeSend: function (){
                $(formNm_two).html('<p style = "text-align: center">Отправка...</p>');
            },
            success: function (data){
                $(formNm_two).innerHTML('<p class="accept">Пароль успешно изменен!</p>');
            }, 
            error: function(jqXHR, text, error){
                $(formNm_two).innerHTML('<p class="message">Ошибка отправки!</p>');

            }
        });
        return false;
    });
});