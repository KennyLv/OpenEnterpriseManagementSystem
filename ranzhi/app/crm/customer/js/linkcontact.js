$(function()
{
    $.setAjaxForm('#linkContactForm', function(data)
    {
        if(data.result == 'success') $.reloadAjaxModal(1500);
    })

    $('#newContact').change(function()
    {
        if($(this).prop('checked'))
        {
            $('#contact').attr('disabled', true);
            $('#contact').trigger("chosen:updated");
            $('#contactInfo').removeClass('hidden');
        }
        else
        {
            $('#contact').attr('disabled', false);
            $('#contact').trigger("chosen:updated");
            $('#contactInfo').addClass('hidden');
        }
    });
})
