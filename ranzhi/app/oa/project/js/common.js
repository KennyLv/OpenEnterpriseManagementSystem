$(document).ready(function()
{
    if(typeof(v.projectID) != undefined && v.projectID != 0)
    {
        $('.menu .nav li').removeClass('active');
        if(typeof(v.projectID) != undefined) $(".nav li a[href*='" + v.projectID + "']").parent().addClass('active');
    }
});
