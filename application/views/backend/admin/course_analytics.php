<div class="row">
    <div class="col-md-12" id="load_analytics_body"></div>
</div>
<div class="col-md-12">
        <div style ="text-align:right;" class="form-group ">
            
            <button style="background:#FAF8F7 ;border-radius: 8px 0px 0px 0px;
            border: 1px solid #F7931E ; color:#F7931E; max-width: 188px;"
             type="button" onclick="save_bbb_meeting()" class="btn btn-info w-15 "><?php echo get_phrase('Save Meeting Info'); ?></button>
            <button style="background: #F7931E;border-radius: 8px 0px 0px 0px;
            border: 1px solid #FAF8F7; color:#FAF8F7; max-width: 188px;" type="button" onclick="start_bbb_meeting()" class="btn btn-success w-15"><?php echo get_phrase('Start Meeting'); ?></button>
        </div>

<?php include "course_analytic_scripts.php"; ?>