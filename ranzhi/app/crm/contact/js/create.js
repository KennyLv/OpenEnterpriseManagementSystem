$(document).ready(function()
{
    /* Show notice when auto create customer. */
    $('#newCustomer').change(function()
    {
        if($(this).prop('checked'))
        {
            $('#customer').attr('disabled', true);
            $('#customer').trigger("chosen:updated");

            $('.customerInfo').removeClass('hidden');
        }
        else
        {
            $('#customer').attr('disabled', false);
            $('#customer').trigger("chosen:updated");

            $('.customerInfo').addClass('hidden');
        }
    })
})
