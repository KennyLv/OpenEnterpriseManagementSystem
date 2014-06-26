$(function()
{
  responsiveNavbar();
});

/**
 * make the navbar responsivable
 * 
 * @access public
 * @return void
 */
function responsiveNavbar()
{
    var lis = $('#mainNavbar .navbar-nav').first().addClass('mainNavbarNav').find('li');
    var lisSize = lis.length;
    if(lisSize>5)
    {
      var i = 0;
      lis.each(function()
      {
          if(i++>10) $(this).addClass('simple-mode-b'); else $(this).addClass('simple-mode-a');
      });
    }

    $('#navbarSwitcher').click(function()
    {
        var navbar = $(this).closest('.navbar');
        if(navbar.hasClass('navbar-simple')) navbar.removeClass('navbar-simple');
        else  navbar.addClass('navbar-simple');
    });
}
