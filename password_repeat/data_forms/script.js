var phone = document.querySelector('.phone');

var password = document.querySelector('.password');
var password_r = document.querySelector('.password_r');
var key = document.querySelector('.key');


phone.addEventListener('input', changeBackground);

password.addEventListener('input', repeat);
password_r.addEventListener('input', repeat);
key.addEventListener('input', repeat);

function changeBackground(){
    if(phone.value !== ''){
        document.querySelector('button').style.background = '#600892';
        document.querySelector('button').style.boxShadow = "2px 2px 5px #000000";
    }
    else{
        document.querySelector('button').style.background = 'rgba(96,8,146, 0.5)';   
        document.querySelector('button').style.boxShadow = "none";   
    }
}



function repeat(){
    if(password.value !== password_r.value || key.value == '' || password.value == '' || password_r.value == ''){
        document.querySelector('.auto-btn').style.background = 'rgba(96,8,146, 0.5)';   
        document.querySelector('.auto-btn').style.boxShadow = "none";   
    }
    else{
        document.querySelector('.auto-btn').style.background = '#600892';
        document.querySelector('.auto-btn').style.boxShadow = "2px 2px 5px #000000";
    }
}