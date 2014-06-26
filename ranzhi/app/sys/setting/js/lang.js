$(function()
{
    /* Highlight current nav. */
    /* eg set the role of user. */
    var menu =  $('.leftmenu .nav li').size() == 0 ? '.nav li' : '.leftmenu .nav li';
    $(menu).removeClass('active');
    $(menu + " a[href*='" + v.module + "'][href*='" + v.field + "']").parent().addClass('active');

    /* Add an item. */
    $(document).on('click', '.add', function()
    {
        $(this).parent().parent().after(v.itemRow);
    })

    /* Remove an item. */
    $(document).on('click', '.remove', function()
    {
        $(this).parent().parent().remove();
    })
})
