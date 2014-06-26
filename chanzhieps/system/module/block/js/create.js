$(document).ready(function()
{
    $('#type').change(function()
    {
        location.href = createLink('block', 'create', 'type=' + $(this).val());
    })
})
