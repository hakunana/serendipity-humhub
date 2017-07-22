/**
 * Created by stefa on 15.07.2017.
 * extended by hannana  on 20.07.2017
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

function removeActivitiesDiv(){
    $(".sidenav_content_hidden_cloned").remove();
}

function loadActivitiesDiv() {
    removeActivitiesDiv();
    var $clonedActivities = $(".sidenav_content_hidden").clone(true);
    $clonedActivities.addClass("sidenav_content_hidden_cloned");
    $("#recent_activities").prepend($clonedActivities);
    $clonedActivities.show();
}

function reorder_spaces(){
    //get list of current spaces
    var $wrapper = $('#space-menu-spaces');

    $wrapper.find(".spacechooser_parent").sort(function(a, b) {
        return +b.getAttribute('update_count_value') - +a.getAttribute('update_count_value');
    }).appendTo($wrapper);

    //$spacelist = this.jQuery.find(".spacechooser_parent");
    //this.console.log($spacelist);
}

function openSpacesInNav(){
    var $spaceMenu = $('#space-menu');
    $spaceMenu.attr("aria-expanded","true");
    
}

