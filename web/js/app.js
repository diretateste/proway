jQuery(function(){
    jQuery('.switchesWidget').click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();

      //  if (e.target.tagName !== 'INPUT'){
       //     return;
      //  }

        let url = jQuery(this).attr('data-action');
        let id = jQuery(this).attr('data-id');
        let status = jQuery(this).find('input').val();
        let newStatus = (status == 1) ? 0 : 1;
        let element = jQuery(this).find('input');

        jQuery.ajax({
            'url' : url,
            'dataType' : 'json',
            'type' : 'POST',
            'data' : {
                id : id,
                status: newStatus
            },
            'success' : function(ret){
                if(ret.data.status == 'success'){
                    element.val(ret.data.value);
                    if(ret.data.value == 1){
                        element.attr('checked', 'checked');
                    }else{
                        element.removeAttr('checked');
                    }
                    element.parent().find('label').html(ret.data.label);
                }
            }
        })
    })
})