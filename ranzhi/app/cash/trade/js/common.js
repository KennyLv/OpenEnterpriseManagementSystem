$(document).ready(function()
{
    $('[name*=objectType]').change(function()
    {
        if($(this).prop('checked'))$('[name*=objectType]').not(this).prop('checked', false).change();
        $('#' + $(this).val()).parents('tr').toggle($(this).prop('checked'))
    })
    $('[name*=objectType]').change();

    $('[name*=createTrader]').change(function()
    {
        if($(this).prop('checked')) 
        {
            $(this).parents('.input-group').find('select').hide();
            $(this).parents('.input-group').find('input[type=text]').show().focus();
        }
        else
        {
            $(this).parents('.input-group').find('select').show();
            $(this).parents('.input-group').find('input[type=text]').hide();
        }
    })
})
