$(function()
{
    /* Set style of priority options in form */
    $('form .pri[data-value="' + $('form #pri').val() + '"]').addClass('active');
    $('form .pri').click(function()
    {
        $('form .pri.active').removeClass('active');
        $('form #pri').val($(this).addClass('active').data('value'));
    });
})
