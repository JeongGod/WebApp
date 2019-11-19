


function pageLoad() {
    document.getElementById("bigger").onclick = () => { setInterval("bigger()", 500) };
}

function bigger(){
    var x = document.getElementById("text");
    if(!x.style.fontSize){
        x.style.fontSize = "12pt";
    }
    else {
        console.log("aaaa");
        x.style.fontSize = parseInt(x.style.fontSize) + 2 + "pt";
    }
}

function chkbox(box){
    var x = document.getElementById("text");
    if(box.checked == true){
        x.style.fontWeight = "bold";
        x.style.color = "green";
        x.style.textDecoration = "underline";
    }
    else {
        x.style.fontWeight = "";
        x.style.color = "";
        x.style.textDecoration = "";
    }
}

function upper(){
    var x = document.getElementById("text");
    x.value = x.value.toUpperCase();
    x.value = x.value.replace(/\./, "-izzle.");
}


window.onload = pageLoad;
