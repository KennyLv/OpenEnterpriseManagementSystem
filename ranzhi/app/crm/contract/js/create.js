/**
 * Get orders of a customer. 
 * 
 * @param  int $customerID 
 * @access public
 * @return void
 */
function getOrder(customerID)
{
    $('#orderTD').empty();

    if(customerID == '') return false;
    if(customerID == 'create') return true;

    $('.contactTD select').load(createLink('contact', 'getOptionMenu', 'customerID=' + customerID));

    $('#orderTD').load(createLink('contract', 'getOrder', 'customerID=' + customerID + '&status=normal'), function()
    {
        $('#orderTR').removeClass('hide');
        if($('.select-order').length > 1) $('.select-order').parents('tr').not('#orderTR').remove();
    })
}

$(document).ready(function()
{
    if(v.customer)
    {
        $('.contactTD select').load(createLink('contact', 'getOptionMenu', 'customerID=' + v.customer));
        $('#orderTD').load(createLink('contract', 'getOrder', 'customerID=' + v.customer));
    }

    $(document).on('click', '.plus', function()
    {
        $(this).parents('tr').after("<tr><th></th><td>" + $('#orderTD').html() + "</td></tr>");
    });
  
    $(document).on('click', '.minus', function()
    {
        if($(this).parents('table').find('.order-real').not('tr.hide .order-real').size() == 1)
        {
            $(this).parents('td').find('select').val('').change();
            return false;
        }
        $(this).parents('tr').remove();
        $('.order-real').change();
    });
})
