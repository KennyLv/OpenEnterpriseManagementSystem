$(document).ready(function()
{
    $('#type').change(function()
    {
        location.href = createLink('block', 'edit', 'id=' + v.id + '&type=' + $(this).val() );
    })
})
