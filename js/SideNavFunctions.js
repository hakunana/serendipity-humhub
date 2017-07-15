/**
 * Created by stefa on 15.07.2017.
 */
function openNav() {
    document.getElementById("mySidenav").style.width = "15%";
    // document.getElementByID("layout-content").style.width="85%";
    document.getElementById("layout-content").style.marginLeft = "15%";
    // document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0%";
    document.getElementById("layout-content").style.marginLeft = "0%";
    // document.getElementById("mySidenav").style.width = "0";
    // document.getElementById("main").style.marginLeft= "0";
    //document.body.style.backgroundColor = "white";
}