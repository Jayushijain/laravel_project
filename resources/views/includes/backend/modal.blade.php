<script type="text/javascript">
function showAjaxModal(url)
{
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" /></div>');

    jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php //echo base_url();?>assets/images/preloader.gif" /></div>');
    // LOADING THE AJAX MODAL
    jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
    // Scroll to top
    window.scrollTo(0, 0);
    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response)
        {
            jQuery('#modal_ajax .modal-body').html(response);
        }
    });
}
</script>

<!-- (Ajax Modal)-->
<div class="modal fade" id="modal_ajax">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php //echo $website_title;?></h4>
            </div>

            <div class="modal-body" style="overflow:auto;">



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 

<script type="text/javascript">
function confirm_modal(path,id, modal_type,field)
{
    // Scroll to top
    window.scrollTo(0, 0);
    if (modal_type === 'generic_confirmation') {
        jQuery('#modal-generic_confirmation').modal('show', {backdrop: 'static'});
        url = '/admin/'+path+'/'+id;
        document.getElementById('update_column').setAttribute('value' , field);
        document.getElementById('update_form').setAttribute('action' , url);
    }
    else{
        
        jQuery('#modal-4').modal('show', {backdrop: 'static'});
        url = '/admin/'+path+'/'+id;
        document.getElementById('delete_form').setAttribute('action' , url);
    }
}
</script>

<!-- (Normal Modal)-->
<div class="modal fade" id="modal-4">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Are yo sure to delete this information ?</h4>
            </div>

            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                 <form action="" method="post" id ='delete_form' >
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" id="delete_link">Delete</button>
                </form> 
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- (generic_confirmation Modal)-->
 <div class="modal fade" id="modal-generic_confirmation">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Are You Sure To Update This Information ?</h4>
            </div>
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <form action="" method="post" id ='update_form' >
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="column" value="" id="update_column">
                <button type="submit" class="btn btn-danger" id="update_link">Yes</button>
                </form>
                <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
