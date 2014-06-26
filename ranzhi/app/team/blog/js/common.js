$(document).ready(function()
{
   if(typeof(v.categoryID) != 'undefined') $('[href*=' + v.categoryID + ']').parent().addClass('active');
});
