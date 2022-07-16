function show(model){
    var price ;
    if(model == "aventador"){
        document.getElementById('img1').src = "../images/aventador.jpg";
        document.getElementById('price').innerHTML = "Starting at 425 000$";
    }
    
    else if(model == "huracan"){
        document.getElementById('img1').src = "../images/huracan.jpg";
        document.getElementById('price').innerHTML = "Starting at 215 000$";
    }
    else if(model == "urus"){
        document.getElementById('img1').src = "../images/urus.jpg";
        document.getElementById('price').innerHTML = "Starting at 225 000$";
    }
    document.getElementById('price').style.visibility = "visible";
    document.getElementById('main').style.visibility = "visible";

}
