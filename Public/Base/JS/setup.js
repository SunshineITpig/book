
/**
 * 页面初始化
 */
$(function () {

    setupLeftMenu();
    setSidebarHeight();

});


function setupLeftMenu() {
    $("#section-menu")
        .accordion({
            "header": "a.menuitem"
        })
        .bind("accordionchangestart", function (e, data) {
            data.newHeader.next().andSelf().addClass("current");
            data.oldHeader.next().andSelf().removeClass("current");
        })
        .find("a.menuitem:first").addClass("current")
        .next().addClass("current");

    $('#section-menu .submenu').css('height', 'auto');
}

function setSidebarHeight() {
    setTimeout(function () {
        var height = $(document).height();
        $('.grid_12').each(function () {
            height -= $(this).outerHeight();
        });
        height -= $('#site_info').outerHeight();
        height -= 1;
        //salert(height);
        $('.sidemenu').css('height', height);
    }, 100);
}


