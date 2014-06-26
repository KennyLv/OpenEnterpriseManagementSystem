$(document).ready(function()
{
    $('.btn-vcard').click(function()
    {
        $(this).parents('td').find('.contact-info, p.vcard').toggle();
        $(this).toggleClass('icon-qrcode');
        $(this).toggleClass('icon-list');
    });
    $('p.vcard').hide();
    return false;
});
