$(document).ready(function()
{
   	$('.little-image').mouseover(function()
    {
        $('.product-image.media-wrapper img').attr('src', $(this).find('img').attr('src').replace('s_', 'm_'));
        return false;
    });

    $('#commentBox').load( createLink('message', 'comment', 'objectType=article&objectID=' + v.productID) );  
})
