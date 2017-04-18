function onDelete(link){
    console.log('test');
    var href = jQuery(link).attr('href');
    var message = jQuery(link).attr('data-content');
    var title = jQuery(link).attr('data-title');
    console.log(href);
    console.log(message);
    console.log(title);


    if (!jQuery('#dataConfirmModal').length) {
        jQuery('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">' +
        '<div class="modal-dialog btn-warning">' +
        '<div class="modal-header">' +
        '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>' +
        '<h3 id="no-margin" style="color: #ffffff">'+title+'</h3>' +
        '</div>' +
        '<div class="modal-body" style="color: #ffffff">'+message+'</div>' +
        '<div class="modal-footer">' +
        '<button class="btn btn-success" data-dismiss="modal" aria-hidden="true">No</button>' +
        '<a class="btn btn-danger" id="dataConfirmOK">Yes</a>' +
        '</div></div></div>');
    }

    jQuery('#dataConfirmModal').find('.modal-body').text(message);
    jQuery('#dataConfirmOK').attr('href', href);
    jQuery('#dataConfirmModal').modal({show:true});
}
