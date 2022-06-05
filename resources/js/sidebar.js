$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });
    
    $('#sidebarCollapseClose').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        var elem  = document.getElementById("sidebarCollapse");
        elem.style.display = 'block';
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        var elem  = document.getElementById("sidebarCollapse");
        elem.style.display = 'none';

        $('#sidebarCollapse').toggleClass("hidden");
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        
    });
});