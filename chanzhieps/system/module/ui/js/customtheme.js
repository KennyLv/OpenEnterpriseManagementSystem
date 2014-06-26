$(function()
{
    $('.color').each(function()
    {
        var $this = $(this);
        var c = $this.attr('data');

        ($this.hasClass('input-group') ? $this.find('.input-group-addon') : $this).css({'background': c, 'color': (new color(c)).contrast().hexStr()});
    }).click(function()
    {
        var $this = $(this);
        var $plate = $this.closest('.colorplate');
        $plate.find('.color.active').removeClass('active');
        if($this.hasClass('color-tile')) $plate.find('.input-color').val($this.attr('data')).change();
        $this.addClass('active');
    });

    $('.input-color').on('keyup change', function()
    {
        var $this = $(this);
        var val = $this.val();

        if(isHexColor(val))
        {
            var ic = (new color(val)).contrast();
            $this.attr('placeholder', val).closest('.color').removeClass('error').find('.input-group-addon').css({'background': val, 'color': ic.hexStr()});
        }
        else
        {
            $this.closest('.color').addClass('error');
        }
    });

    $.setAjaxForm('#customThemeForm', function(response)
    {
        $('.modal-theme .close[data-dismiss="modal"]').click();
        messager.success(response.message);
    });

    $('#customThemeForm').submit(function(event)
    {
        var options = 
        {
            templateUrl: config['webRoot'] + 'theme/' + $('#theme').val() + '/template.less',
            colorPrimary: $('#primaryColor').val(),
            colorBackgroud: $('#backColor').val(),
            fontSize: $('#fontSize').val(),
            borderRadius: $('#borderRadius').val()
        };

        var style = new theme(options);
        $('#css').val(style.toCss());
    });
});
