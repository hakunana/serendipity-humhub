/**
 * Created by stefa on 15.07.2017.
 * extended by hannana  on 20.07.2017
 */
function openNav() {
    document.getElementById("mySidenav").style.width = "15%";
    document.getElementById("layout-content").style.marginLeft = "15%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0%";
    document.getElementById("layout-content").style.marginLeft = "0%";
}
//@Stefano Start

//This function gets called whenever entering a space or entering a dashboard view (index.php / index_guest.php)
//This function:
// 1) Rearranges the mostactiveusers-panel (if any) to its correct position at the end of the dashboard specific activities
// 2) Removes any earlier space specific clones
// 3) Shows the hidden dashboard specific panels
function removeActivitiesDiv(){
    $("#dashboard_activities").after($("#mostactiveusers-panel"));
    $(".sidenav_content_hidden_cloned").remove();
    $("#dashboard_activities").show();
}

//This functions gets called whenever entering a space (call located at footer of _layout.php)
// This function:
//  1) Removes exiting entries cloned earlier (if any)
//  2) Clones the entries regarding recent activities of the current space (including all actions, manipulations, etc...)
//  3) Moves the clone into side nav
//  4) If most active users module activated: moves mostactiveusers-panel out of dashboard specific list to space specific list (attach at the end of clone)
//  5) Hides dashboard specific list
//  6) Shows the clone (unhidden)
function loadActivitiesDiv() {
    removeActivitiesDiv();

    var $clonedActivities = $(".sidenav_content_hidden").clone(true);
    $clonedActivities.addClass("sidenav_content_hidden_cloned");
    $("#recent_activities").prepend($clonedActivities);

    ($clonedActivities).after($("#mostactiveusers-panel"));
    $("#dashboard_activities").hide();

    $clonedActivities.show();
}

//TODO: Show only n elements, hide others?

// Reorder list of spaces in sidebar according to largest #of new entries since last visit
// Uses attribute update_count_value of spacechooser_parent DIV in spaceChooserItem.php for sorting
function reorder_spaces(){
    //get list of current spaces
    var $wrapper = $('#space-menu-spaces');

    $wrapper.find(".spacechooser_parent").sort(function(a, b) {
        return +b.getAttribute('update_count_value') - +a.getAttribute('update_count_value');
    }).appendTo($wrapper);

}
//@Stefano End

