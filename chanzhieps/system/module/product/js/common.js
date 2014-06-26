$(document).ready(function()
{
    /* Set current active topNav. */
    if(v.path && v.path.length)
    {
        var hasActive = false;
        $.each(v.path, function(index, category)
        {
            if(!hasActive)
            {
                if($('.nav-product-' + category).length >= 1) hasActive = true;
                $('.nav-product-' + category).addClass('active');
            }
        });
        if(!hasActive) $('.nav-product-0').addClass('active');
    }
    
    key = v.key;
    $(document).on('click', '.icon-plus', function()
    {
        $(this).parents('.row').after($('.row-custom').html().replace(/key/g, key));
        key ++;
    })

    $(document).on('click', '.icon-minus', function()
    {
        if($(this).parents('td').find('.row').size() > 1)
        {
            $(this).parents('.row').remove();
        }
        else
        {
            $(this).parents('.row').find('input').val('');
        }
        key ++;
    })

    if(v.categoryID !== 0) $('.tree #category' + v.categoryID).addClass('active');
})
