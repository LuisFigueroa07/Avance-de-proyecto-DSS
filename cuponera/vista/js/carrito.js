var boton = document.getElementById('datosboton')
var checks = document.querySelectorAll('.form-check-input');
var producto=0;
var contador=0; 
boton.addEventListener('click', function(){
    checks.forEach((e)=>{
        if(e.checked == true){
            producto = parseFloat(e.value);
            producto=producto+producto;
            carrito[contador]=e.value;
            document.getElementById('productos').innerHTML+="<br>"+carrito[contador]+"<br>";
            contador=contador+1;
        }
    });
console.log(e);
    producto=producto*parseInt(num);

    producto=producto.toFixed(2);
    document.getElementById("total").innerHTML+="<br> Total: "+producto+"<br>";
    document.getElementById("Precioto").value = producto;
    produclist.pop();
});

    

