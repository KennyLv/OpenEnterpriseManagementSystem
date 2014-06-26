$(document).ready(function()
{
    /* Set current active moduleMenu. */
    if(typeof(v.path) != 'undefined')
    {
        $('.leftmenu li.active').removeClass('active');
        $.each(eval(v.path), function(index, bookID) 
        { 
            $(".leftmenu a[href$='book=" + bookID + "']").parent().addClass('active');
        })
    }
});
