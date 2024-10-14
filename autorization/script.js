var phone = document.querySelector('.phone');
var password = document.querySelector('.password');

phone.addEventListener('input', changeBackground);
password.addEventListener('input', changeBackground);

function changeBackground(){
    if(phone.value !== '' && password.value !== ''){
        document.querySelector('button').style.background = '#600892';
        document.querySelector('button').style.boxShadow = "2px 2px 5px #000000";
    }
    else{
        document.querySelector('button').style.background = 'rgba(96,8,146, 0.5)';   
        document.querySelector('button').style.boxShadow = "none";   
    }
}