




<?php $bbb_meeting = $this->db->where('course_id', $course_details['id'])->get('bbb_meetings')->row_array(); ?>



<div style ="margin-bottom:48px; " class="row">
 <div class="col-md-6">
    <h4 style ="//styleName: Med/32;font-family: Outfit;
    font-size: 32px;font-weight: 500;line-height: 48px;text-align: left;"
        class="header-title my-1"><?php echo get_phrase('Create Bbb live class'); ?></h4></div>
       
</div>
<div style ="color:#868686" class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="bbb_meeting_id"><?php echo get_phrase('Meeting ID'); ?></label>
            <input value="<?php echo $bbb_meeting['meeting_id'] ?? '' ?>" type="text" class="form-control" id="bbb_meeting_id" placeholder="Lourem ipsum">
        </div>
        <div class="form-group">
            <label for="bbb_meeting_id"><?php echo get_phrase('Meeting date'); ?></label>
            <input value="<?php echo $bbb_meeting['meeting_id'] ?? '' ?>" type="text" class="form-control" id="bbb_meeting_id" placeholder="Lourem ipsum">
        </div>
        <div class="form-group">
            <label for="bbb_meeting_id"><?php echo get_phrase('Meeting time'); ?></label>
            <input value="<?php echo $bbb_meeting['meeting_'] ?? '' ?>" type="text" class="form-control" id="bbb_meeting_id" placeholder="xxxxxxxxxx">
        </div>

        <div class="form-group">
            <label for="bbb_moderator_pw"><?php echo get_phrase('Moderator Password'); ?></label>
            <input value="<?php echo $bbb_meeting['moderator_pw'] ?? '' ?>" type="text" class="form-control" id="bbb_moderator_pw" placeholder="xxxxxxxxxx">
        </div>

        <div class="form-group">
            <label for="bbb_viewer_pw"><?php echo get_phrase('Viewer Password'); ?></label>
            <input value="<?php echo $bbb_meeting['viewer_pw'] ?? '' ?>" type="text" class="form-control" id="bbb_viewer_pw" placeholder="xxxxxxxxxx">
        </div>

        <div class="form-group">
            <label for="bb_meeting_instruction"><?php echo get_phrase('Instructions for students'); ?></label>
            <textarea
             style ="color: #AEAEAE; width: 635.9px;height: 189px;padding: 10px 8px 10px 16px;gap: 0px;border-radius: 8px 0px 0px 0px;border: 1px 0px 0px 0px;justify: space-between;opacity: 0px;border: 1px solid #D6D6D6"
             id="bb_meeting_instruction"><?php echo $bbb_meeting['instructions'] ?? '' ?>Intro to front end</textarea>
            <div style ="display:flex ; ">
            <div style ="width: 21.97px;     border-radius:50%; border: 1px solid #868686;
height: 21.98px;top: 0.01px;left: 0.01px;gap: 0px;opacity: 0px; text-align :center; ">
             <i  style ="color:#868686 ; text-align :center;"class="fa-solid fa-exclamation"></i>
             
            </div><p style ="padding-left:5px;font-family: Outfit;
font-size: 19px;font-weight: 300;line-height: 30px;text-align: left; color:#868686;">
Give some instructions to keep your students informed about the meeting</p>
            
        </div>
</div>



    </div>
    <div class="col-md-12">
        <div style ="text-align:right;" class="form-group ">
            
            <button style="background:#FAF8F7 ;border-radius: 8px 0px 0px 0px;
            border: 1px solid #F7931E ; color:#F7931E; max-width: 188px;"
             type="button" onclick="save_bbb_meeting()" class="btn btn-info w-15 "><?php echo get_phrase('Save Meeting Info'); ?></button>
            <button style="background: #F7931E;border-radius: 8px 0px 0px 0px;
            border: 1px solid #FAF8F7; color:#FAF8F7; max-width: 188px;" type="button" onclick="start_bbb_meeting()" class="btn btn-success w-15"><?php echo get_phrase('Start Meeting'); ?></button>
        </div>
    </div>
</div>

<script>
    $(function() {
        initSummerNote(['#bb_meeting_instruction']);
    });

    function save_bbb_meeting(){
        var bbb_meeting_id = $('#bbb_meeting_id').val();
        var bbb_moderator_pw = $('#bbb_moderator_pw').val();
        var bbb_viewer_pw = $('#bbb_viewer_pw').val();
        var bbb_instructions = $('#bb_meeting_instruction').val();

        if (bbb_moderator_pw == '' || bbb_viewer_pw == '' || bbb_meeting_id == '') {
            error_notify('<?php echo get_phrase("Meeting ID and password can not be empty"); ?>');
        } else if (bbb_moderator_pw == bbb_viewer_pw) {
            error_notify('<?php echo get_phrase("Moderator and viewer password can not be same"); ?>');
        } else {
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('admin/save_bbb_meeting/' . $course_details['id']); ?>',
                data: {
                    'bbb_meeting_id': bbb_meeting_id,
                    'bbb_moderator_pw': bbb_moderator_pw,
                    'bbb_viewer_pw': bbb_viewer_pw,
                    'instructions': bbb_instructions
                },
                success: function(response) {
                    success_notify(response);
                }
            });
        }
    }

    function start_bbb_meeting() {
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url('admin/start_bbb_meeting/' . $course_details['id']); ?>',
            success: function(response) {
                console.log(response);
                window.open(response, '_blank');
            }
        });
    }
</script>