$(function()
{
    /* start ips */
    $.ipsStart(entries, $.extend({onBlocksOrdered: sortBlocks, onDeleteBlock: deleteBlock}, config, ipsLang));
    $('.entries-count').text(entries.length - 1);
})

/**
 * Delete block.
 * 
 * @param  int    $index 
 * @access public
 * @return void
 */
function deleteBlock(index)
{
    $.getJSON(createLink('block', 'delete', 'index=' + index), function(data)
    {
        if(data.result != 'success')
        {
            alert(data.message);
            return false;
        }
        messager.info(ipsLang["removedBlock"]);
    })
}

/**
 * Sort blocks.
 * 
 * @param  object $orders  format is {'block2' : 1, 'block1' : 2, oldOrder : newOrder} 
 * @access public
 * @return void
 */
function sortBlocks(orders)
{
    var oldOrder = new Array();
    var newOrder = new Array();
    for(i in orders)
    {
       oldOrder.push(i.replace('block', ''));
       newOrder.push(orders[i]);
    }

    $.getJSON(createLink('block', 'sort', 'oldOrder=' + oldOrder.join(',') + '&newOrder=' + newOrder.join(',')), function(data)
    {
        if(data.result != 'success') return false;

        $('.panels-container .panel').each(function()
        {
            var index = $(this).data('order');
            /* Update new index for block id edit and delete. */
            $(this).attr('id', 'block' + index).attr('data-id', index).data('url', createLink('block', 'printBlock', 'index=' + index));
            $(this).find('.panel-actions .edit-block').attr('href', createLink('block', 'admin', 'index=' + index));
        })
        messager.success(ipsLang["orderdBlocksSaved"]);
    });
}
