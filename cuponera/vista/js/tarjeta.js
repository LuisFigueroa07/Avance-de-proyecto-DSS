window.onload = function (){
    const submit = document.getElementById("submit");
    submit.addEventListener('click', validate);
}

function validate(){
    const cardnumber = document.getElementById("carnumber");
    const errorcard= document.getElementById("errorcardnumber");
    const mes = document.getElementById("Month");
    const errormes = document.getElementById("errormes");
    const año = document.getElementById("Year");
    const erroraño = document.getElementById("erroraño");
    const ccv = document.getElementById("ccv");
    const errorccv = document.getElementById("errorccv");
    const nombre = document.getElementById("name");
    const errornomnbre = document.getElementById("errornombre");
    

    expcard=/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|3[47][0-9]{13}|6(?:011|5[0-9][0-9])[0-9]{12})$/im;
    expaño=/^20[23][0-9]$/im;
    expmes=/^0[123456789]{1,2}$|10|11|12$/im;
    expccv=/[0-9]{3}$/;
    expnombre=/^(?:[-A-Z]+\.? )+[-A-Z]+$/im;

    if (expcard === "" || expaño === "" || expmes === "" || expccv === "" || expnombre === "" ) {
		alert("Todos los campos son obligatorios");
		return false;}  


    if(!cardnumber.value){
        errorcard.classList.add("visible");
        cardnumber.classList.add("invalid");
        msj="Ingrese numero de tarjeta"
        errorcard.innerHTML=msj;
    }else if(!expcard.test(cardnumber.value)){
        errorcard.classList.add("visible");
        cardnumber.classList.add("invalid");
        msj="Numero de tarjeta tiene formato invalido"
        errorcard.innerHTML=msj;
    }
    else{
        errorcard.classList.remove("visible");
        cardnumber.classList.remove("invalid");
    }
        
    if(!mes.value){
        errormes.classList.add("visible");
        mes.classList.add("invalid");
        msj="ingrese correctamente el mes"
        errormes.innerHTML=msj;
    }else if(!expmes.test(mes.value)){
        errormes.classList.add("visible");
        mes.classList.add("invalid");
        msj="Solo ingrese numeros"
        mes.innerHTML=msj;
    }
    else{
        errormes.classList.remove("visible");
        mes.classList.remove("invalid");
    }
    if(!año.value){
        erroraño.classList.add("visible");
        año.classList.add("invalid");
        msj="ingrese bien el año, son 4 numeros"
        erroraño.innerHTML=msj;
    }else if(!expaño.test(año.value)){
        erroraño.classList.add("visible");
        año.classList.add("invalid");
        msj="Solo ingrese numeros"
        año.innerHTML=msj;
    }
    else{
        erroraño.classList.remove("visible");
        año.classList.remove("invalid");
    }
    if(!ccv.value){
        errorccv.classList.add("visible");
        ccv.classList.add("invalid");
        msj="ingrese bien lo que se le solicita"
        errorccv.innerHTML=msj;
    }else if(!expccv.test(ccv.value)){
        errorccv.classList.add("visible");
        ccv.classList.add("invalid");
        msj="Solo ingrese numeros"
        ccv.innerHTML=msj;
    }
    else{
        errorccv.classList.remove("visible");
        ccv.classList.remove("invalid");
    }

    if(!nombre.value){
        errornomnbre.classList.add("visible");
        nombre.classList.add("invalid");
        msj="ingrese bien lo que se le solicita"
        errornomnbre.innerHTML=msj;
    }else{
        errornomnbre.classList.remove("visible");
        nombre.classList.remove("invalid");
    }
}