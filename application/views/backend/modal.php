<script type="text/javascript">
function showAjaxModal(url, header)
{
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#scrollable-modal .modal-body').html('<div style="width: 100px; height: 100px; line-height: 100px; padding: 0px; text-align: center; margin-left: auto; margin-right: auto;"><div class="spinner-border text-secondary" role="status"></div></div>');
    jQuery('#scrollable-modal .modal-title').html('loading...');
    // LOADING THE AJAX MODAL
    jQuery('#scrollable-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response)
        {
            jQuery('#scrollable-modal .modal-body').html(response);
            jQuery('#scrollable-modal .modal-title').html(header);
        }
    });
}
function showLargeModal(url, header)
{
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#large-modal .modal-body').html('<div style="width: 100px; height: 100px; line-height: 100px; padding: 0px; text-align: center; margin-left: auto; margin-right: auto;"><div class="spinner-border text-secondary" role="status"></div></div>');
    jQuery('#large-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#large-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response)
        {
            jQuery('#large-modal .modal-body').html(response);
            jQuery('#large-modal .modal-title').html(header);
        }
    });
}
</script>

<!-- (Large Modal)-->
<div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Scrollable modal -->
<div class="modal fade" id="scrollable-modal"  role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="scrollableModalTitle">Add section (No :4) </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body ml-2 mr-2">

        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal"><?php echo get_phrase("close"); ?></button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
    // function for delete 
function confirm_modal(delete_url)
{
    jQuery('#alert-modal').modal('show', {backdrop: 'static'});
    document.getElementById('update_link').setAttribute('href' , delete_url);
}
// for add coupon modal 
function add_coupon_modal(add_url)
{
    jQuery('#add-modal').modal('show', {backdrop: 'static'});
    document.getElementById('update_link').setAttribute('href' , delete_url);
}
// for edit coupon modal 
function edit_coupon_modal(edit_url)
{
    jQuery('#edit-modal').modal('show', {backdrop: 'static'});
    document.getElementById('update_link').setAttribute('href' , delete_url);
}
</script>

<!-- delete coupon modal  -->
<div id="alert-modal" class="modal fade delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <div class="error-icon">
                    <i class="fa-solid fa-exclamation"></i>
                    </div>
               
                    <h4 class=" header"><?php echo get_phrase("heads_up"); ?>!</h4>
                    <p class=""><?php echo get_phrase("are_you_sure"); ?>?</p>
                    <div class="action-btns d-flex">
                    <button type="button" class="cancel-btn" data-dismiss="modal"><?php echo get_phrase("cancel"); ?></button>
                    <a href="#" id="update_link" class="delete-btn"><?php echo get_phrase("continue"); ?></a>
                    </div>
               
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- add coupon modal ------------------------------------------------------- -->
<div id="add-modal" class="modal fade add-coupon " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-4">
            <h4 class=" header-title"><?php echo get_phrase('coupon_add_form'); ?></h4>
            <form class="required-form" action="<?php echo site_url('admin/coupons/add'); ?>" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="code"><?php echo get_phrase('coupon_code'); ?><span class="required">*</span></label>
    <div class="input-group">
        <input type="text" class="form-control" id="code" name="code" required>
        <div class="input-group-append">
            <button type="button" class="btn btn-sm " data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('generate_a_random_coupon_code'); ?>" onclick="generateARandomCouponCode()"><i class="mdi mdi-sync"></i> <?php echo get_phrase('generate_random'); ?></button>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="discount_percentage"><?php echo get_phrase('discount_percentage'); ?></label>
    <div class="input-group">
        <input type="number" name="discount_percentage" id="discount_percentage" class="form-control" value="0" min="1" max="100">
        <div class="input-group-append">
            <span class="input-group-text"><i class="mdi mdi-percent"></i></span>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="expiry_date"><?php echo get_phrase('expiry_date'); ?><span class="required">*</span></label>
    <input type="text" name="expiry_date" class="form-control date" id="expiry_date" data-toggle="date-picker" data-single-date-picker="true">
</div>
<div class="action-btns d-flex">
<button type="button" class="cancel-btn" data-dismiss="modal"><?php echo get_phrase("cancel"); ?></button>
<button type="submit" class="submit-btn"><?php echo get_phrase("submit"); ?></button>
</div>
</form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- edit coupon modal ------------------------------------------------------ -->
<div id="edit-modal" class="modal fade edit-coupon" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-4">
            <h4 class=" header-title"><?php echo get_phrase('coupon_edit_form'); ?></h4>
            <form class="required-form" action="<?php echo site_url('admin/coupons/edit/' . $coupon['id']); ?>" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="code"><?php echo get_phrase('coupon_code'); ?><span class="required">*</span></label>
    <input type="text" class="form-control" id="code" name="code" value="<?php echo $coupon['code']; ?>" required>
</div>

<div class="form-group">
    <label for="discount_percentage"><?php echo get_phrase('discount_percentage'); ?></label>
    <div class="input-group">
        <input type="number" name="discount_percentage" id="discount_percentage" class="form-control" value="<?php echo $coupon['discount_percentage']; ?>" min="1" max="100">
        <div class="input-group-append">
            <span class="input-group-text"><i class="mdi mdi-percent"></i></span>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="expiry_date"><?php echo get_phrase('expiry_date'); ?><span class="required">*</span></label>
    <input type="text" name="expiry_date" class="form-control date" id="expiry_date" data-toggle="date-picker" data-single-date-picker="true" value="<?php echo date('m/d/Y', $coupon['expiry_date']); ?>">
</div>

<div class="action-btns d-flex">
<button type="button" class="cancel-btn" data-dismiss="modal"><?php echo get_phrase("cancel"); ?></button>
<button type="submit" class="submit-btn"><?php echo get_phrase("submit"); ?></button>
</div>

</form>   </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Info Alert Modal -->
<div id="data-import-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-warning"></i>
                    <h4 class="mt-2"><?php echo get_phrase("heads_up"); ?>!</h4>
                    <p class="mt-3">I understand that existing website data will be replaced by new data. Current website data will be preserved as backup for further restoration.</p>
                    <button type="button" class="btn btn-danger my-2" data-dismiss="modal"><?php echo get_phrase("cancel"); ?></button>
                    <a href="javascript:;" onclick="$('#import_backup_data_form').submit();" class="btn btn-success my-2"><?php echo get_phrase("ok"); ?>, I understand</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

function ajax_confirm_modal(delete_url, elem_id)
{
    jQuery('#ajax-alert-modal').modal('show', {backdrop: 'static'});
    $("#appent_link_a").bind( "click", function() {
      delete_by_ajax_calling(delete_url, elem_id);
    });
}

function delete_by_ajax_calling(delete_url, elem_id){
    $.ajax({
        url: delete_url,
        success: function(response){
            var response = JSON.parse(response);
            if(response.status == 'success'){
                $('#'+elem_id).fadeOut(600);
                $.NotificationApp.send("<?php echo get_phrase('success'); ?>!", response.message ,"top-right","rgba(0,0,0,0.2)","success");
            }else{
                $.NotificationApp.send("<?php echo get_phrase('oh_snap'); ?>!", response.message ,"top-right","rgba(0,0,0,0.2)","error");
            }
        }
    });
}
</script>

<!-- Info Alert Modal -->
<div id="ajax-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center" id="appent_link">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2"><?php echo get_phrase("heads_up"); ?>!</h4>
                    <p class="mt-3"><?php echo get_phrase("are_you_sure"); ?>?</p>
                    <button type="button" class="btn btn-info my-2" data-dismiss="modal"><?php echo get_phrase("cancel"); ?></button>
                    <a id="appent_link_a" href="javascript:;" class="btn btn-danger my-2" data-dismiss="modal"><?php echo get_phrase("continue"); ?></a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- offcanvas right  new add -->

<script>
function showRightModal(url, header)
{
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#right-modal .modal-body').html('<div style="width: 100px; height: 100px; line-height: 100px; padding: 0px; text-align: center; margin-left: auto; margin-right: auto;"><div class="spinner-border text-secondary" role="status"></div></div>');
    jQuery('#right-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#right-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response)
        {
            jQuery('#right-modal .modal-title').html(header);
            jQuery('#right-modal .modal-body').html(response);
           
        }
    });
}

function AIModal(url, header)
{
    jQuery('#ai-modal .modal-title').html(header);
    // LOADING THE AJAX MODAL
    jQuery('#ai-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    if($('#ai-modal .modal-body').html() == ''){
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#ai-modal .modal-body').html(response);
            }
        });
    }
}
</script>
</script>



<div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-modal="true">
  <div class="modal-dialog modal-lg modal-right">
    <div class="modal-content h-100">
      <div class="modal-header border-1">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Create admin</h4>
      </div>
      <div class="modal-body" style="overflow-x:scroll;"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<div id="ai-modal" class="modal fade" tabindex="-1" role="dialog" aria-modal="true">
  <div class="modal-dialog modal-lg modal-right">
    <div class="modal-content h-100">
      <div class="modal-header border-1">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Create admin</h4>
      </div>
      <div class="modal-body" style="overflow-x:scroll;"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>