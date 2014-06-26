$(document).ready(function()
{
    $('.orderTH').not(':first').empty();

    $(document).on('click', '.plus', function()
    {
        $(this).parents('tr').after( $('#orderGroup tbody').html());
    });
  
    $(document).on('click', '.minus', function()
    {
        if($(this).parents('table').find('.order-real').size() == 1)
        {
            $(this).parents('td').find('select').val('').change();
            return false;
        }
        $(this).parents('tr').remove();
        $('.order-real').change();
    });
})
