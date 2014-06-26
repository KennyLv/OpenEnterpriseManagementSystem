$(document).ready(function()
{
   if(window.opener)
   {
       $.setAjaxForm('#customerForm', function(response)
       {
          if(response.result == 'success')
          {
               $('.select-customer', window.opener.document).load(createLink('customer', 'getoptionmenu', 'current=' + response.customerID), function(){ window.close(); });
          }
       });
   }
   else
   {
       $.setAjaxForm('#customerForm');
   }

})
