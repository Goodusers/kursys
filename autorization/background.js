// function accept_data(){
//     var form = getElementById('rep_pass');
    
// }

// function cube_two( event ){
//     var show = document.getElementById('mail_key');
//     var hide = document.getElementById('rep_pass');
//     hide.style.display = 'none';
//     show.style.display = 'flex';
//     event.preventDefault();
// }
// var def_t = document.getElementById('mail_key');
// def_t.style.display = 'none';


$(document).ready(function(){
    $('.message').hide();

    $('.auto-btn').submit(function (event)
    {
        event.preventDefault();
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
                $('.message').show();
            }, 
            error: function(jqXHR, text, error){
                $('.message').show();

            }
        });
        return false;
    });

    // $('#mail_key').submit(function ()
    // {
    //     var formId_two = $(this).attr('id');
    //     var formNm_two = $('#' + formId_two);
    //     $.ajax({
    //         type: "POST",
    //         url: 'update_data.php',
    //         data: formNm_two.serialize(),
    //         beforeSend: function (){
    //             $(formNm_two).html('<p style = "text-align: center">Отправка...</p>');
    //         },
    //         success: function (data){
    //             window.location.href = ' ../../autorization/autorization.php';
    //         }, 
    //         error: function(jqXHR, text, error){
    //             $(formNm_two).html(error);

    //         }
    //     });
    //     return false;
    // });
});