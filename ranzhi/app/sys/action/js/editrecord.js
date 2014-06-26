$(document).ready(function()
{
    if(v.from == 'modal')
    {
        $.setAjaxForm('#editRecord',function() { $.reloadAjaxModal(0); });
    }
    else
    {
        $.setAjaxForm('#editRecord');
    }
});
