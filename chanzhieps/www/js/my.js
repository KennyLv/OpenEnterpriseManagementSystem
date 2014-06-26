$(document).ready(function() 
{
    setRequiredFields();

    $.setAjaxModal();
    $.setAjaxForm('#ajaxForm');
    $.setAjaxDeleter('.deleter');
    $.setReloadDeleter('.reloadDeleter');
    $.setReload('.reload');

    /* Ping for keep login every six minute. */
    if(needPing) setInterval('ping()', 1000 * 360);
    
    /* Load message notify. */
    $('#headNav #msgBox').load(createLink('message', 'notify'), function()
    {
        if($('#headNav #msgBox').find('.label').length > 0) $('#msgBox').removeClass('hide').show();
    });

    /* Set 'go to top' button. */
    setGo2Top();

    /* Slide pictures start.   */
    if($('#slide').length)
    {
        $('#slide').carousel();
        $('#slide .item').first().addClass('active');
        $('#slide .item[data-url]').click(function(){var url = $(this).data('url'); if(url && url.length) window.location.href = url;});
    }

    /* Fixed submenu position for browser which doesn't suppport relative postion in a table cell, like firefox 29. */
    var ua = navigator.userAgent.toLowerCase();
    var ver = (ua.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/) || [0, '0'])[1];
    if(ua.indexOf('firefox') > -1 && parseFloat(ver) < 30)
    {
        $('#navbar .dropdown > .dropdown-menu').each(function(){$(this).css('left', $(this).closest('.dropdown').position().left - 2);});
    }

    /* Auto ajust block grid width */
    autoBlockGrid();

    /* Remove empty headNav */
    var headNav = $('#headNav');
    if(!headNav.find('nav a').length) headNav.addClass('hide');

    /* Mark the module and method with css class */
    $('body').addClass('m-' + config['currentModule'] + '-' + config['currentMethod']);

    /* set right docker */
    $('#rightDockerBtn').popover({container: 'body', html:true, trigger:'manual'}).mouseenter(function()
    {
        if($('#rightDockerBtn').hasClass('showed')) return;
        $(this).addClass('showed').popover('show');
        $("#rightDockerBtn:not('.showed')").popover('hide');
    });
    $(document).click(function(){$('#rightDockerBtn').popover('hide').removeClass('showed');}).on('click', '.popover', function(event){event.stopPropagation();});
});

