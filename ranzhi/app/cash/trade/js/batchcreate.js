$(document).ready(function()
{
    var dittoOption = "<option value='ditto'>" + v.dittoText  + "</option>";
    $('select').prepend(dittoOption);
    $('table tbody tr').not(':first').find('select').find('[value=ditto]').attr('selected', true);

    $(document).on('change', '.type', function()
    {
        var type = $(this).val();
        if(type == 'ditto')
        {
            var type = $(this).parents('tr').prevAll().find('.type[value!=ditto]:last').val();
        }
        $(this).parent().next().find('select').hide();
        $(this).parent().next().find('.' + type).show();
        $(this).parents('tr').nextAll().find('.type').change();
    })
});
