$(document).ready(function()
{
    $('.leftmenu li.active').removeClass('active');
    $('.leftmenu a[href*=_' + v.type + ']').parent().addClass('active');
});
