//mi contenedor de todos los datos
var biblioteca = new Array();

function guardar_persona(){
    //creacion objeto
    var libro = new Object();
    //propiedades
    libro.isbn = document.getElementById('txtnombre').value;
    libro.titulo=document.getElementById('txtDUI').value;
    libro.autor=document.getElementById('txtcargo').value;
    libro.genero=document.getElementById('txtgenero').value;
    libro.precio=document.getElementById('txtsalario').value;
    biblioteca.push(libro);   
    mostrardatos();
}

function mostrardatos(){
    fila ="";
    for (var libro in biblioteca) {
        fila+="<tr>"
        fila+="<td>"+biblioteca[libro].isbn+"</td>";
        fila+="<td>"+biblioteca[libro].titulo+"</td>";
        fila+="<td>"+biblioteca[libro].autor+"</td>";
        fila+="<td>"+biblioteca[libro].genero+"</td>";
        fila+="<td>"+biblioteca[libro].precio+"</td>";
        fila+="</tr>"
    }
    document.getElementById('datos').innerHTML=fila;
    console.log(biblioteca);
}

var bibliotecaproducto = new Array();

function guardar_producto(){
    //creacion objeto
    var producto = new Object();
    //propiedades
    producto.id = document.getElementById('txtID').value;
    producto.produc=document.getElementById('txtproduc').value;
    producto.encar=document.getElementById('txtencargo').value;
    producto.precio=document.getElementById('txtprecio').value;
    bibliotecaproducto.push(producto);   
    mostrardatospro();
}

function mostrardatospro(){
    fila ="";
    for (var producto in bibliotecaproducto) {
        fila+="<tr>"
        fila+="<td>"+bibliotecaproducto[producto].id+"</td>";
        fila+="<td>"+bibliotecaproducto[producto].produc+"</td>";
        fila+="<td>"+bibliotecaproducto[producto].encar+"</td>";
        fila+="<td>"+bibliotecaproducto[producto].precio+"</td>";
        fila+="</tr>"
    }
    document.getElementById('datospro').innerHTML=fila;
    console.log(biblioteca);
}