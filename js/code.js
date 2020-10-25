function validacionForm() {
    var email=document.getElementById('email').value;
    var passwd=document.getElementById('psswd').value;

    if (email=='' && passwd=='' ) {
        document.getElementById('email').style.borderColor = "red";
        document.getElementById('psswd').style.borderColor = "red";
        document.getElementsByTagName('label')[0].style.color="red";
        document.getElementsByTagName('label')[1].style.color="red";

    }else if (email=='') {
        document.getElementById('email').style.borderColor = "red";
        document.getElementsByTagName('label')[0].style.color="red";
        document.getElementsByTagName('label')[1].style.color="black";
        document.getElementById('psswd').style.borderColor = "#ccc";

    }else if (passwd=='') {
        document.getElementById('email').style.borderColor = "#ccc";
        document.getElementsByTagName('label')[1].style.color="red";
        document.getElementsByTagName('label')[0].style.color="black";
        document.getElementById('psswd').style.borderColor = "red";
    }
    else {
        return true;
    }
    // El false es para parar la ejecución del codigo
    return false;
}