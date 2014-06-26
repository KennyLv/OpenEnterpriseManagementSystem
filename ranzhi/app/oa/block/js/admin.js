$(function()
{
    $('#blocks').change(function()
    {
        $('#ajaxModal').load(createLink('block', 'admin', "index=" + v.index + "&blockID=" + $(this).val()));
    });
})

