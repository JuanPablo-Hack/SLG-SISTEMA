function myFunction() {
    var x = document.getElementById("carretera").value;
   
   
    if (x == '1'){
        document.getElementById("contenedor_lleno").style.display = "inherit";
        document.getElementById("vacio").style.display = "none";
        document.getElementById("mercancia").style.display = "none";
        document.getElementById("granel").style.display = "none";
        document.getElementById("dimensionada").style.display = "none";
        document.getElementById("isotanque").style.display = "none";
    }
    if(x == '2'){
        document.getElementById("contenedor_lleno").style.display = "none";
        document.getElementById("vacio").style.display = "inherit";
        document.getElementById("mercancia").style.display = "none";
        document.getElementById("granel").style.display = "none";
        document.getElementById("dimensionada").style.display = "none";
        document.getElementById("isotanque").style.display = "none";
    }
    if(x == '3'){
        document.getElementById("contenedor_lleno").style.display = "none";
        document.getElementById("vacio").style.display = "none";
        document.getElementById("mercancia").style.display = "inherit";
        document.getElementById("granel").style.display = "none";
        document.getElementById("dimensionada").style.display = "none";
        document.getElementById("isotanque").style.display = "none";
    }
    if(x == '4'){
        document.getElementById("contenedor_lleno").style.display = "none";
        document.getElementById("vacio").style.display = "none";
        document.getElementById("mercancia").style.display = "none";
        document.getElementById("granel").style.display = "inherit";
        document.getElementById("dimensionada").style.display = "none";
        document.getElementById("isotanque").style.display = "none";
    }
    if(x == '5'){
        
        document.getElementById("contenedor_lleno").style.display = "none";
        document.getElementById("vacio").style.display = "none";
        document.getElementById("mercancia").style.display = "none";
        document.getElementById("granel").style.display = "none";
        document.getElementById("dimensionada").style.display = "inherit";
        document.getElementById("isotanque").style.display = "none";
    }
    if(x == '6'){
        
        document.getElementById("contenedor_lleno").style.display = "none";
        document.getElementById("vacio").style.display = "none";
        document.getElementById("mercancia").style.display = "none";
        document.getElementById("granel").style.display = "none";
        document.getElementById("dimensionada").style.display = "none";
        document.getElementById("isotanque").style.display = "inherit";
    }

    
}
function myFunction2() {
    var y = document.getElementById("imo_id").value;
    if (y == '1') {
        document.getElementById("imo").style.display = "inherit";
    }else{
        document.getElementById("imo").style.display = "none";
    }

}
function myFunction3() {
    var y = document.getElementById("imo_id").value;
    if (y == '1') {
        document.getElementById("imo").style.display = "inherit";
    }else{
        document.getElementById("imo").style.display = "none";
    }

}

// Queda pendiente de hacer para el uso correcto
function cambio() {
    var w = document.getElementById("encuentra").value;
    console.log(w);
    if (w == '1') {
        document.getElementById("lleno").style.display = "inherit";
    }else{
        document.getElementById("vacio").style.display = "none";
    }

}