let navToggle = () => {
    $('.side-nav').animate({
        width: "toggle"
    });
}
function read() {
    var i=0;
    if(!i){
        document.getElementById("more").style.display="inline";
        document.getElementById("dots").style.display="none";
        document.getElementById("read").innerHTML="Read less";
        i=1;
    }
    else{
        document.getElementById("more").style.display="none";
        document.getElementById("dots").style.display="inline";
        document.getElementById("read").innerHTML="Read more";
        i=0;
    }
}