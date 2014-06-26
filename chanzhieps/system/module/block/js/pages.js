$(document).ready(function()
{
    $(document).on('click', 'a.plus', function()
    {
        v.key ++;
        $(this).parents('tr').after($('#entry').html().replace(/key/g, v.key));
    });

    /* Set border and title show. */
    $(document).on('change', 'input[type=checkbox]', function()
    { 
        $('input[type=checkbox]').next('input[type=hidden]').val('0');
        $('input:checked').next('input[type=hidden]').val('1');
    });
    
    $('input[type=checkbox]').change();

    /* Fix edit link. */
    $(document).on('change', 'select', function()
    {
        $(this).parents('td').next().find('.edit').attr('href', createLink('block', 'edit', 'id=' + $(this).val()));
    });

    /* Delete options. */
    $(document).on('click', '.delete', function(){$(this).parents('tr').remove();});

   /* Sort up. */
    $(document).on('click', '.icon-arrow-up', function()
    {
        $(this).parents('tr').prev().before($(this).parents('tr')); 
    });

    /* Sort down. */
    $(document).on('click', '.icon-arrow-down', function()
    { 
        var hasNext = $(this).parents('tr').next().find('.plus').size() > 0;
        if(hasNext) $(this).parents('tr').next().after($(this).parents('tr')); 
    });

})
