$(document).ready(function()
{
     /* Toggle one comment. */
     $('.toggle').click(function()
     {
          $(this).toggleClass('change-show').toggleClass('change-hide');
          if($(this).parent().next().find('.changes').size())
          {
              $(this).parent().next().find('.changes').toggle();
          }
          else
          {
              $(this).parent().next().toggle().find('.changes').show();
          }
     });

     /* Toggle all comment. */
     $('.toggle-all').click(function()
     {
          $(this).toggleClass('change-show').toggleClass('change-hide');
          $('.toggle').click();
     });
    
     /* Sort records. */
     $('.sorter').click(function()
     {
          var orderClass = $(this).find('span').attr('class');

          if(orderClass == 'log-asc')
          {
              $(this).find('span').attr('class', 'log-desc');
          }
          else
          {
              $(this).find('span').attr('class', 'log-asc');
          }

          $(this).parents('.panel').find('.panel-body li').reverseOrder();
     });
});
