$(document).ready(function()
{
    $.each(v.parents, function(index,value)
    {
        $('#targetBoard').find("[value=" + value + ']').prop('disabled', true);
    });
});
