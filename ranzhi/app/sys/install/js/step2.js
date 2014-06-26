$(document).ready(function()
{
    /* Compute request type. */
    $.get("pathinfo.php", function(result)
    {
        $('#requestType').val('PATH_INFO');
    });
});     
