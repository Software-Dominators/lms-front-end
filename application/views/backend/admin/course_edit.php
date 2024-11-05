<?php
$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div style = "" class="card-body">
            <i style = " color: #232F43;font-size: 27px" class="dripicons-view-apps"></i> 
            <h4  style ="color: #8B93A1; margin-left: 16px;font-family: Outfit;font-size: 24px;
            font-weight: 400;line-height: 36px;text-align: left;display : inline-block;" 
                 class="page-title">  <?php echo get_phrase('Courses') ; ?></h4> 
                 <i style = "color:#27344B ;  font-size:24px; padding:16px "  class="mdi mdi-arrow-right"></i>
                 <h4 style ="  display: inline-block;color:#232F43;font-family: Outfit;
                font-size: 24px;font-weight: 400;  " 
                class="header-title my-1"><?php echo get_phrase('Educational Content (curriculum)'); ?> </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <!--ajax page loader-->
            <div class="ajax_loader w-100">
                <div class="ajax_loaderBar"></div>
            </div>
            <!--end ajax page loader-->
            <div class="card-body">
             
 <div class="row">
     <div class="col-xl-12">
         <form class="required-form" action="<?php echo site_url('admin/course_actions/edit/' . $course_id); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="scrollable-tab-section" id="basicwizard">

  <button style = "border: 1px solid #F5F1EF ;top:4%;background-color:#F5F1EF " 
   type="button" class="scrollable-tab-btn-left">
    <i style = "color: #A5938A" class="mdi mdi-arrow-left"></i></button>

             <div  style = "padding:8px;"  class="scrollable-tab">
                                    <ul  style = " height: 56px"class="nav nav-pills nav-justified form-wizard-header">
                                        <li class="nav-item">
                                            <a style ="     min-width: 250px;
                                             background : #A5938A; color : #F5F1EF;"
                                            href="#curriculum" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                <!-- <i class="mdi mdi-account-circle"></i> -->
                                                <span class=""><?php echo get_phrase('Eductional Content(curriculum)'); ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a   style ="  background: #F5F1EF;; color :#A5938A ;"href="#academic_progress" onclick="student_academic_progress('<?php echo $course_details['id']; ?>')" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                <!-- <i class="mdi mdi-chart-bar-stacked"></i> -->
                                                <span class=""><?php echo get_phrase('Academic progress'); ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a  style ="  background: #F5F1EF;; color :#A5938A ;"href="#bbb-live-class" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                <!-- <i class="mdi mdi-video-account"></i> -->
                                                <span class=""><?php echo get_phrase('BBB live class'); ?></span>
                                            </a>
                                        </li>
                                        <?php if (addon_status('live-class')) : ?>
                                            <li class="nav-item">
                                                <a  style ="  background: #F5F1EF;; color :#A5938A ;"href="#live-class" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                    <!-- <i class="mdi mdi-video-account"></i> -->
                                                    <span class=""><?php echo get_phrase('zoom_live_class'); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if (addon_status('jitsi-live-class')) : ?>
                                            <li class="nav-item jitsiLiveClassNavItem">
                                                <a style ="  background: #F5F1EF;; color :#A5938A ;" href="#jitsi-live-class" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                    <!-- <i class="mdi mdi-video-account"></i> -->
                                                    <span class=""><?php echo get_phrase('jitsi_live_class'); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if (addon_status('assignment')) : ?>
                                            <li class="nav-item">
                                                <a  style ="  background: #F5F1EF;; color :#A5938A ;"href="#assignment" onclick="load_assignment_list()" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                    <!-- <i class="dripicons-document"></i> -->
                                                    <span class=""><?php echo get_phrase('assignment'); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if (addon_status('noticeboard')) : ?>
                                            <li class="nav-item">
                                                <a style ="  background: #F5F1EF;; color :#A5938A ;" href="#noticeboard" onclick="load_notic_list()" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                    <!-- <i class="mdi mdi-clipboard-text-outline"></i> -->
                                                    <span class=""><?php echo get_phrase('noticeboard'); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if (addon_status('course_analytics')) : ?>
                                            <li class="nav-item">
                                                <a  style ="  background: #F5F1EF;; color :#A5938A ;"href="#course_analytics" onclick="load_analytics_chart()" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                    <!-- <i class="mdi mdi-chart-bar"></i> -->
                                                    <span class=""><?php echo get_phrase('analytics'); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <li class="nav-item">
                                            <a  style ="  background: #F5F1EF;; color :#A5938A ;"href="#basic" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                <!-- <i class="mdi mdi-fountain-pen-tip"></i> -->
                                                <span class=""><?php echo get_phrase('basic'); ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a style ="  background: #F5F1EF;; color :#A5938A ;"href="#info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                <!-- <i class="mdi mdi-information-outline"></i> -->
                                                <span class=""><?php echo get_phrase('info'); ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a style ="  background: #F5F1EF;; color :#A5938A ;"href="#pricing" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                <!-- <i class="mdi mdi-currency-cny"></i> -->
                                                <span class=""><?php echo get_phrase('pricing'); ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a style ="  background: #F5F1EF;; color :#A5938A ;"href="#media" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                <!-- <i class="mdi mdi-library-video"></i> -->
                                                <span class=""><?php echo get_phrase('media'); ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a style ="  background: #F5F1EF;; color :#A5938A ;"href="#seo" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                <!-- <i class="mdi mdi-tag-multiple"></i> -->
                                                <span class=""><?php echo get_phrase('seo'); ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a style ="  background: #F5F1EF;; color :#A5938A ;" href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                <!-- <i class="mdi mdi-checkbox-marked-circle-outline"></i> -->
                                                <span class=""><?php echo get_phrase('finish'); ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <button  style = "border: 1px solid  #A5938A; top:4%;background-color:#A5938A"  type="button" class="scrollable-tab-btn-right">
              <i   style = " color:#F5F1EF; "class="mdi mdi-arrow-right"></i></button>
  
                               
                           <div class="tab-content b-0 mb-0">
                                    <div class="tab-pane" id="curriculum">
                                        <?php
                                        if ($course_details['course_type'] == 'general') :
                                            include 'curriculum.php';
                                        elseif ($course_details['course_type'] == 'scorm' && addon_status('scorm_course') == true) :
                                            include 'scorm_curriculum.php';
                                        elseif ($course_details['course_type'] == 'h5p' && addon_status('h5p') == true) :
                                            include 'h5p_curriculum.php';
                                        else : ?>
                                            <?php if ($course_details['course_type'] == 'scorm_course') : ?>
                                                <div class="row justify-content-center">
                                                    <div class="col-md-6">
                                                        <div class="alert alert-warning" role="alert">
                                                            <h4 class="alert-heading"><?= get_phrase('heads_up'); ?>!</h4>
                                                            <p><?= get_phrase('currently_the_scorm_course_addon_is_deactivate'); ?>. <?= get_phrase('please_activate_the_scorm_course_addon_to_use_it'); ?>.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($course_details['course_type'] == 'h5p') : ?>
                                                <div class="row justify-content-center">
                                                    <div class="col-md-6">
                                                        <div class="alert alert-warning" role="alert">
                                                            <h4 class="alert-heading"><?= get_phrase('heads_up'); ?>!</h4>
                                                            <p><?= get_phrase('currently_the_h5p_course_addon_is_deactivate'); ?>. <?= get_phrase('please_activate_the_h5p_course_addon_to_use_it'); ?>.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>

                                    <div class="tab-pane" id="academic_progress"></div>

                                    <div class="tab-pane" id="bbb-live-class">
                                        <?php include "bbb_live_class.php"; ?>
                                    </div>

                                    <!-- LIVE CLASS CODE BASE -->
                                    <?php if (addon_status('live-class')) : ?>
                                        <?php include 'live_class.php'; ?>
                                    <?php endif; ?>

                                    <!-- Jitsi live class CODE BASE -->
                                    <?php if (addon_status('jitsi-live-class')) : ?>
                                        <div class="tab-pane" id="jitsi-live-class">
                                            <?php include 'jitsi_live_class.php'; ?>
                                        </div>
                                    <?php endif; ?>
                                    <!-- LIVE CLASS CODE BASE -->

                                    <!-- ASSIGNMENT CODE BASE -->
                                    <?php if (addon_status('assignment')) : ?>
                                        <div class="tab-pane" id="assignment">
                                            <?php include 'assignment.php'; ?>
                                        </div>
                                    <?php endif; ?>

                                    <!-- NOTICEBOARD CODE BASE -->
                                    <?php if (addon_status('noticeboard')) : ?>
                                        <div class="tab-pane" id="noticeboard">
                                            <?php include 'noticeboard.php'; ?>
                                        </div>
                                    <?php endif; ?>
                                    <!-- NOTICEBOARD CODE BASE -->

                                    <!-- COURSE ANALYTICS CODE BASE -->
                                    <?php if (addon_status('course_analytics')) : ?>
                                        <div class="tab-pane" id="course_analytics">
                                            <?php include 'course_analytics.php'; ?>
                                        </div>
                                    <?php endif; ?>
                                    <!-- COURSE ANALYTICS CODE BASE -->

                                    <div class="tab-pane" id="basic">
                                        <div class="row ">
                                            <div class="col-xl-8">
            <label style ="//styleName: Reg/18;
font-family: Outfit;font-size: 18px;font-weight: 400;line-height: 27px;text-align: left; color:#868686;" class="col-md-2 col-form-label" for="course_type"><?php echo get_phrase('course_type'); ?></label>

                                                <div class="form-group row mb-3">
                                                   
                                                    <div  class="col-md-10">
            <div style ="background-color:#EEF6FD"; class="alert alert-light" role="alert">
                                                            
          <p class="mb-0"><?= get_phrase('Course type can not be changed'); ?>.</p>
                                                        </div>
                                                    </div>
                                                </div>
<label class="col-md-5 col-form-label" for="existing_instructors"><?php echo get_phrase('instructor_of_this_course'); ?></label>

                              <div class="form-group row mb-3">

                             
                                                 <div class="col-md-10">
                                                        <?php if ($course_details['multi_instructor']) :
                                                            $instructor_ids = explode(',', $course_details['user_id']);
                                                        ?>
                                                            <?php foreach ($instructor_ids as $instructor_id) :
                                                            ?>
                                                                <?php $instructor_details = $this->user_model->get_instructor($instructor_id)->row_array(); ?>
                                                                <div class="m-2">
                                                                    <img class="rounded-circle" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']);; ?>" height="30px" alt="">
                                                                    <span style="font-weight: 700; font-size: 15px; vertical-align: sub; margin-left: 6px;">
                                                                    id="bbb_meeting_id"              <?php echo html_escape($instructor_details['first_name'] . ' ' . $instructor_details['last_name']); ?>
                                                                    </span>
                                                                    <?php if (count($instructor_ids) > 1 && $course_details['creator'] != $instructor_id) : ?>
                                                                        <a class="btn text-danger mt-1" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('admin/remove_an_instructor/' . $course_details['id'] . '/' . $instructor_details['id']); ?>');"> <i class="mdi mdi-delete"></i> <?php echo get_phrase('Remove'); ?></a>
                                                                    <?php else : ?>
                                                                        <a class="btn text-danger mt-1" href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('admin/change_course_author/' . $course_details['id']); ?>', '<?php echo get_phrase('Change Course Author') ?>')"> <i class="mdi mdi-pencil"></i> <?php echo get_phrase('Change Course author'); ?></a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php else : ?>
                                                            <?php $instructor_details = $this->user_model->get_instructor($course_details['user_id'])->row_array(); ?>
                                                            <div>
                                                                <img class="rounded-circle" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']);; ?>" height="30px" alt="">
                                                                <span style="font-weight: 700; font-size: 15px; vertical-align: sub; margin-left: 6px;">
                                                                    <?php echo html_escape($instructor_details['first_name'] . ' ' . $instructor_details['last_name']); ?>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <label class="col-md-5 col-form-label" for="new_instructor"><?php echo get_phrase('add_new_instructor'); ?></label>
                                                
                                                <div class="form-group row mb-3">








                                        
                                                    <div class="col-md-10">
                                                        <select class="select2 form-control select2-multiple"
                                                         data-toggle="select2"  
                                                         data-placeholder="choose instructor" name="new_instructors[]" >
                                                            <?php $instructors = $this->user_model->get_instructor()->result_array(); ?>
                                                            <?php foreach ($instructors as $key => $instructor) : ?>
                                                                <option value="<?php echo html_escape($instructor['id']); ?>"><?php echo html_escape($instructor['first_name'] . ' ' . $instructor['last_name']); ?> ( <?php echo html_escape($instructor['email']); ?> )</option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <label class="col-md-2 col-form-label" for="course_title"><?php echo get_phrase('course_title'); ?><span class="required">*</span></label>
                                                <div class="form-group row mb-3">
                                                   
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" id="course_title" name="title" placeholder="<?php echo get_phrase('Intro to front end'); ?>" value="<?php echo $course_details['title']; ?>" required>
                                                    </div>
                                                </div>
                                                <label class="col-md-2 col-form-label" for="short_description"><?php echo get_phrase('short_description'); ?></label>
                                                <div class="form-group row mb-3">
                                                    
                                                    <div class="col-md-10">
                                                        <textarea name="short_description" id="short_description" class="form-control"><?php echo $course_details['short_description']; ?>Intro to front end</textarea>
                                                    </div>
                                                </div>
                                                <label class="col-md-2 col-form-label" for="description"><?php echo get_phrase('description'); ?></label>
                                                <div class="form-group row mb-3">

                                                    <div class="col-md-10">



                                                    
                                                        <textarea style="color: #AEAEAE; width: 709.8px;height: 189px;padding: 10px 8px 10px 16px;gap: 0px;border-radius: 8px 0px 0px 0px;border: 1px 0px 0px 0px;justify: space-between;opacity: 0px;border: 1px solid #D6D6D6"  name="description" id="description" class="form-control"><?php echo $course_details['description']; ?>Intro to front end</textarea>
                                                    </div>
                                                </div>
                                                 <label class="col-md-2 col-form-label" for="sub_category_id"><?php echo get_phrase('category'); ?><span class="required">*</span></label>
                                                <div class="form-group row mb-3">
                                                   
                                                    <div class="col-md-10">
                                                        <select class="form-control select2" data-toggle="select2" name="sub_category_id" id="sub_category_id" required>
                                                            <option value=""><?php echo get_phrase('select_a_category'); ?></option>
                                                            <?php foreach ($categories->result_array() as $category) : ?>
                                                                <optgroup label="<?php echo $category['name']; ?>">
                                                                    <?php $sub_categories = $this->crud_model->get_sub_categories($category['id']);
                                                                    foreach ($sub_categories as $sub_category) : ?>
                                                                        <option value="<?php echo $sub_category['id']; ?>" <?php if ($sub_category['id'] == $course_details['sub_category_id']) echo 'selected'; ?>><?php echo $sub_category['name']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </optgroup>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <small class="text-muted"><?php echo get_phrase('select_sub_category'); ?></small>
                                                    </div>
                                                </div>
                                                <label class="col-md-5 col-form-label" for="level"><?php echo get_phrase('Level'); ?></label>
                                                
                                                <div class="form-group row mb-3">
                                                    
                                                    <div class="col-md-10">
                                                        <select class="form-control select2" data-toggle="select2" name="level" id="level">
                                                            <option value="beginner" <?php if ($course_details['level'] == "beginner") echo 'selected'; ?>><?php echo get_phrase('beginner'); ?></option>
                                                            <option value="advanced" <?php if ($course_details['level'] == "advanced") echo 'selected'; ?>><?php echo get_phrase('advanced'); ?></option>
                                                            <option value="intermediate" <?php if ($course_details['level'] == "intermediate") echo 'selected'; ?>><?php echo get_phrase('intermediate'); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <label class="col-md-5 col-form-label" for="language_made_in"><?php echo get_phrase('Course language'); ?></label>
                                                <div class="form-group row mb-3">
                                                   
                                                    <div class="col-md-10">
                                                        <select class="form-control select2" data-toggle="select2" name="language_made_in" id="language_made_in">
                                                            <?php foreach ($languages as $language) : ?>
                                                                <option value="<?php echo $language; ?>" <?php if ($course_details['language'] == $language) echo 'selected'; ?>><?php echo ucfirst($language); ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="enable_drip_content"><?php echo get_phrase('enable_drip_content'); ?></label>
                                                    <div class="col-md-9 pt-2">
                                                        <input type="checkbox" name="enable_drip_content" value="1" id="enable_drip_content" data-switch="primary" <?php if ($course_details['enable_drip_content'] == 1) echo 'checked'; ?>>
                                                        <label for="enable_drip_content" data-on-label="On" data-off-label=""></label>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label pt-1" for="enable_drip_content"><?php echo get_phrase('Updated as a'); ?></label>
                                                    <div class="col-md-10 pt-1">
                                                        <div class="custom-control custom-radio mb-1">
                                                            <input type="radio" id="status_active" name="status" class="custom-control-input" value="active" <?php echo $course_details['status'] == 'active' ? 'checked' : ''; ?>>
                                                            <label class="custom-control-label" for="status_active"><?php echo get_phrase('Active course'); ?></label>
                                                        </div>
                                                        <div id="upcoming" class="custom-control custom-radio mb-1">
                                                            <input type="radio" id="status_upcoming" name="status" class="custom-control-input" value="upcoming" <?php echo $course_details['status'] == 'upcoming' ? 'checked' : ''; ?>>
                                                            <label class="custom-control-label" for="status_upcoming"><?php echo get_phrase('Upcoming course'); ?></label>
                                                        </div>

                                                        <div class="custom-control custom-radio mb-1">
                                                            <input type="radio" id="status_private" name="status" class="custom-control-input" value="private" <?php echo $course_details['status'] == 'private' ? 'checked' : ''; ?>>
                                                            <label class="custom-control-label" for="status_private"><?php echo get_phrase('Private course'); ?></label>
                                                        </div>

                                                        <div id="upcoming" class="custom-control custom-radio mb-1">
                                                            <input type="radio" id="status_upcoming" name="status" class="custom-control-input" value="upcoming" <?php echo $course_details['status'] == 'upcoming' ? 'checked' : ''; ?>>
                                                            <label class="custom-control-label" for="status_upcoming"><?php echo get_phrase('Pending course'); ?></label>
                                                        </div>

                                                         <!-- New Upcoming Image -->
                                                        <div class="form-group mt-3" id = "thumbnail-picker-area">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="upcoming_image_thumbnail" name="upcoming_image_thumbnail" value="<?php echo $course_details['upcoming_image_thumbnail']; ?>" >
                                                                    <input type="hidden"  name="old_upcoming_image_thumbnail" value="<?php echo $course_details['upcoming_image_thumbnail']; ?>" >
                                                                    <label class="custom-file-label" for="upcoming_image_thumbnail"><?php echo get_phrase('upcoming_image_thumbnail'); ?></label>
                                                                </div>
                                                            </div>
                                                            <small>(<?php echo get_phrase('the_image_size_should_be'); ?>: 365 X 460)</small>
                                                        </div>
                                                    <!-- New Upcoming Image -->
                                                    <div class="form-group mb-3" id="publish_date">
                                                        <label class="col-form-label" for="input_publish_date"><?php echo get_phrase('publish_date'); ?> <span class="required">*</span> </label>
                                                            <input type="datetime-local" class="form-control" id="input_publish_date" name = "publish_date" placeholder="<?php echo get_phrase('enter_publish_date'); ?>" value="<?php echo $course_details['publish_date'];?>">
                                                    </div>

                                                    </div>
                                                </div>

                                               
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div> <!-- end tab pane -->
                                    

                                    <div class="tab-pane" id="info">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-8">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label" for="faq"><?php echo get_phrase('course_faq'); ?></label>
                                                    <div class="col-md-10">
                                                        <div id="faq_area">
                                                            <?php $faq_counter = 0; ?>
                                                            <?php $course_faqs_arr = !empty($course_details['faqs']) ? json_decode($course_details['faqs'], true) : []; ?>
                                                            <?php $course_faqs_arr = is_array($course_faqs_arr) ? $course_faqs_arr : array(); ?>
                                                            <?php foreach ($course_faqs_arr as $faq_title => $faq_description) : ?>
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" value="<?php echo $faq_title; ?>" name="faqs[]" id="faqs" placeholder="<?php echo get_phrase('faq_question'); ?>">
                                                                            <textarea name="faq_descriptions[]" class="form-control mt-2" placeholder="<?php echo get_phrase('answer'); ?>"><?php echo $faq_description; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <?php if ($faq_counter == 0) : ?>
                                                                            <button type="button" class="btn btn-success btn-sm" style="" name="button" onclick="appendFaq()"> <i class="fa fa-plus"></i> </button>
                                                                        <?php else : ?>
                                                                            <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeFaq(this)"> <i class="fa fa-minus"></i> </button>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <?php $faq_counter++; ?>
                                                            <?php endforeach; ?>

                                                            <?php if ($faq_counter == 0) : ?>
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="faqs[]" id="faqs" placeholder="<?php echo get_phrase('faq_question'); ?>">
                                                                            <textarea name="faq_descriptions[]" class="form-control mt-2" placeholder="<?php echo get_phrase('answer'); ?>"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-success btn-sm" style="" name="button" onclick="appendFaq()"> <i class="fa fa-plus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <div id="blank_faq_field">
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="faqs[]" id="faqs" placeholder="<?php echo get_phrase('faq_question'); ?>">
                                                                            <textarea name="faq_descriptions[]" class="form-control mt-2" placeholder="<?php echo get_phrase('answer'); ?>"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeFaq(this)"> <i class="fa fa-minus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3 pt-2">
                                                    <label class="col-md-2 col-form-label" for="requirements"><?php echo get_phrase('requirements'); ?></label>
                                                    <div class="col-md-10">
                                                        <div id="requirement_area">
                                                            <?php if (count(json_decode($course_details['requirements'])) > 0) : ?>
                                                                <?php
                                                                $counter = 0;
                                                                foreach (json_decode($course_details['requirements']) as $requirement) : ?>
                                                                    <?php if ($counter == 0) :
                                                                        $counter++; ?>
                                                                        <div class="d-flex mt-2">
                                                                            <div class="flex-grow-1 px-3">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" name="requirements[]" id="requirements" placeholder="<?php echo get_phrase('provide_requirements'); ?>" value="<?php echo $requirement; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <button type="button" class="btn btn-success btn-sm" style="" name="button" onclick="appendRequirement()"> <i class="fa fa-plus"></i> </button>
                                                                            </div>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <div class="d-flex mt-2">
                                                                            <div class="flex-grow-1 px-3">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" name="requirements[]" id="requirements" placeholder="<?php echo get_phrase('provide_requirements'); ?>" value="<?php echo $requirement; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeRequirement(this)"> <i class="fa fa-minus"></i> </button>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            <?php else : ?>
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="requirements[]" id="requirements" placeholder="<?php echo get_phrase('provide_requirements'); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-success btn-sm" style="" name="button" onclick="appendRequirement()"> <i class="fa fa-plus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <div id="blank_requirement_field">
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="requirements[]" id="requirements" placeholder="<?php echo get_phrase('provide_requirements'); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeRequirement(this)"> <i class="fa fa-minus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3 pt-2">
                                                    <label class="col-md-2 col-form-label" for="outcomes"><?php echo get_phrase('outcomes'); ?></label>
                                                    <div class="col-md-10">
                                                        <div id="outcomes_area">
                                                            <?php if (count(json_decode($course_details['outcomes'])) > 0) : ?>
                                                                <?php
                                                                $counter = 0;
                                                                foreach (json_decode($course_details['outcomes']) as $outcome) : ?>
                                                                    <?php if ($counter == 0) :
                                                                        $counter++; ?>
                                                                        <div class="d-flex mt-2">
                                                                            <div class="flex-grow-1 px-3">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" name="outcomes[]" placeholder="<?php echo get_phrase('provide_outcomes'); ?>" value="<?php echo $outcome; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <button type="button" class="btn btn-success btn-sm" name="button" onclick="appendOutcome()"> <i class="fa fa-plus"></i> </button>
                                                                            </div>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <div class="d-flex mt-2">
                                                                            <div class="flex-grow-1 px-3">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" name="outcomes[]" placeholder="<?php echo get_phrase('provide_outcomes'); ?>" value="<?php echo $outcome; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeOutcome(this)"> <i class="fa fa-minus"></i> </button>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            <?php else : ?>
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="outcomes[]" placeholder="<?php echo get_phrase('provide_outcomes'); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-success btn-sm" name="button" onclick="appendOutcome()"> <i class="fa fa-plus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div id="blank_outcome_field">
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="outcomes[]" id="outcomes" placeholder="<?php echo get_phrase('provide_outcomes'); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeOutcome(this)"> <i class="fa fa-minus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="pricing">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-8">
                                                <div class="form-group row mb-3">
                                                    <div class="offset-md-2 col-md-10">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="is_free_course" id="is_free_course" value="1" <?php if ($course_details['is_free_course'] == 1) echo 'checked'; ?> onclick="togglePriceFields(this.id)">
                                                            <label class="custom-control-label" for="is_free_course"><?php echo get_phrase('check_if_this_is_a_free_course'); ?></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="paid-course-stuffs">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label" for="price"><?php echo get_phrase('course_price') . ' (' . currency_code_and_symbol() . ')'; ?></label>
                                                        <div class="col-md-10">
                                                            <input type="number" class="form-control" id="price" name="price" min="0" placeholder="<?php echo get_phrase('enter_course_course_price'); ?>" value="<?php echo $course_details['price']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <div class="offset-md-2 col-md-10">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="discount_flag" id="discount_flag" value="1" <?php if ($course_details['discount_flag'] == 1) echo 'checked'; ?>>
                                                                <label class="custom-control-label" for="discount_flag"><?php echo get_phrase('check_if_this_course_has_discount'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label" for="discounted_price"><?php echo get_phrase('discounted_price') . ' (' . currency_code_and_symbol() . ')'; ?></label>
                                                        <div class="col-md-10">
                                                            <input type="number" class="form-control" name="discounted_price" id="discounted_price" onkeyup="calculateDiscountPercentage(this.value)" value="<?php echo $course_details['discounted_price']; ?>" min="0">
                                                            <small class="text-muted"><?php echo get_phrase('this_course_has'); ?> <span id="discounted_percentage" class="text-danger">0%</span> <?php echo get_phrase('discount'); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"><?php echo get_phrase('Expiry period'); ?></label>
                                                    <div class="col-md-10 pt-2 d-flex">
                                                        <div class="custom-control custom-radio mr-2">
                                                            <input type="radio" id="lifetime_expiry_period" name="expiry_period" class="custom-control-input" value="lifetime" onchange="checkExpiryPeriod(this)" <?php if ($course_details['expiry_period'] == 0) echo 'checked'; ?>>
                                                            <label class="custom-control-label" for="lifetime_expiry_period"><?php echo get_phrase('Lifetime'); ?></label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="limited_expiry_period" name="expiry_period" class="custom-control-input" value="limited_time" onchange="checkExpiryPeriod(this)" <?php if ($course_details['expiry_period'] > 0) echo 'checked'; ?>>
                                                            <label class="custom-control-label" for="limited_expiry_period"><?php echo get_phrase('Limited time'); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3" id="number_of_month" style="<?php if ($course_details['expiry_period'] == '') echo 'display: none'; ?>">
                                                    <label class="col-md-2 col-form-label"><?php echo get_phrase('Number of month'); ?></label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="number" name="number_of_month" min="1" value="<?php echo $course_details['expiry_period']; ?>">
                                                        <small class="badge badge-light"><?php echo get_phrase('After purchase, students can access the course until your selected time.'); ?></small>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div> <!-- end tab-pane -->
                                    <div class="tab-pane" id="media">
                                        <div class="row ">

                                            <div class="col-xl-8">
                                            <label class="col-md-5 col-form-label" for="course_overview_provider"><?php echo get_phrase('course_overview_provider'); ?></label>
                                                <div class="form-group row mb-3">
                                                   
                                                    <div class="col-md-10">
                                                        <select class="form-control select2" data-toggle="select2" name="course_overview_provider" id="course_overview_provider">
                                                            <option value="youtube" <?php if ($course_details['course_overview_provider'] == 'youtube') echo 'selected'; ?>><?php echo get_phrase('youtube'); ?></option>
                                                            <option value="vimeo" <?php if ($course_details['course_overview_provider'] == 'vimeo') echo 'selected'; ?>><?php echo get_phrase('vimeo'); ?></option>
                                                            <option value="html5" <?php if ($course_details['course_overview_provider'] == 'html5') echo 'selected'; ?>><?php echo get_phrase('HTML5'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->

                                            <div class="col-xl-8">
                                            <label class="col-md-5 col-form-label" for="course_overview_url"><?php echo get_phrase('course_overview_url'); ?></label>
                                                <div class="form-group row mb-3">
                                                   
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="course_overview_url" id="course_overview_url" placeholder="E.g: https://www.youtube.com/watch?v=oBtf8Yglw2w" value="<?php echo $course_details['video_url'] ?>">
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->

                                            <!-- Course media content edit file starts -->
                                            <?php include 'course_media_edit.php'; ?>
                                            <!-- Course media content edit file ends -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div class="tab-pane" id="seo">
                                        <div class="row ">
                                            <div class="col-xl-8">
                                            <label class="col-md-2 col-form-label" for="website_keywords"><?php echo get_phrase('meta_keywords'); ?></label>
                                                <div class="form-group row mb-3">
                                                   
                                                <div class="col-md-10">
                                                        <input type="text" class="form-control" name="course_overview_url" id="course_overview_url" placeholder="Youtube" value="<?php echo $course_details['video_url'] ?>">
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-xl-8">
                                            <label class="col-md-2 col-form-label" for="meta_description"><?php echo get_phrase('meta_description'); ?></label>
                                                <div class="form-group row mb-3">
                                                   
                                                    <div class="col-md-10">
                                                        <textarea 
                                                        style ="color: #AEAEAE; width: 709.9px;height: 94px;padding: 10px 8px 10px 16px;gap: 0px;border-radius: 8px 0px 0px 0px;border: 1px 0px 0px 0px;justify: space-between;opacity: 0px;border: 1px solid #D6D6D6"
                                                        name="meta_description" class="form-control"><?php echo $course_details['meta_description']; ?>Youtube</textarea>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    
                                    <div class="tab-pane" id="finish"><!--     -->

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                    <h3 class="mt-0"><?php echo get_phrase('thank_you'); ?> !</h3>

                                                    <p class="w-75 mb-2 mx-auto"><?php echo get_phrase('you_are_just_one_click_away'); ?></p>

                                                    <div class="mb-3 mt-3">
                                                        <button type="button" class="btn btn-primary text-center" onclick="checkRequiredFields()"><?php echo get_phrase('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>

                                    <ul class="list-inline mb-0 wizard text-center">
                                        <li class="previous list-inline-item">
                                            <a href="javascript:;" class="btn btn-info"> <i class="mdi mdi-arrow-left-bold"></i> </a>
                                        </li>
                                        <li class="next list-inline-item">
                                            <a href="javascript:;" class="btn btn-info"> <i class="mdi mdi-arrow-right-bold"></i> </a>
                                        </li>
                                    </ul>

                                </div> <!-- tab-content -->
                            </div> <!-- end #progressbarwizard-->
                        </form>
                    </div>
                </div><!-- end row-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        initSummerNote(['#description']);
        togglePriceFields('is_free_course');
    });
</script>

<script type="text/javascript">
    var blank_faq = jQuery('#blank_faq_field').html();
    var blank_outcome = jQuery('#blank_outcome_field').html();
    var blank_requirement = jQuery('#blank_requirement_field').html();
    jQuery(document).ready(function() {
        jQuery('#blank_faq_field').hide();
        jQuery('#blank_outcome_field').hide();
        jQuery('#blank_requirement_field').hide();
        calculateDiscountPercentage($('#discounted_price').val());
    });

    function appendFaq() {
        jQuery('#faq_area').append(blank_faq);
    }

    function removeFaq(faqElem) {
        jQuery(faqElem).parent().parent().remove();
    }

    function appendOutcome() {
        jQuery('#outcomes_area').append(blank_outcome);
    }

    function removeOutcome(outcomeElem) {
        jQuery(outcomeElem).parent().parent().remove();
    }

    function appendRequirement() {
        jQuery('#requirement_area').append(blank_requirement);
    }

    function removeRequirement(requirementElem) {
        jQuery(requirementElem).parent().parent().remove();
    }

    function ajax_get_sub_category(category_id) {
        $.ajax({
            url: '<?php echo site_url('admin/ajax_get_sub_category/'); ?>' + category_id,
            success: function(response) {
                jQuery('#sub_category_id').html(response);
            }
        });
    }

    function priceChecked(elem) {
        if (jQuery('#discountCheckbox').is(':checked')) {

            jQuery('#discountCheckbox').prop("checked", false);
        } else {

            jQuery('#discountCheckbox').prop("checked", true);
        }
    }

    function topCourseChecked(elem) {
        if (jQuery('#isTopCourseCheckbox').is(':checked')) {

            jQuery('#isTopCourseCheckbox').prop("checked", false);
        } else {

            jQuery('#isTopCourseCheckbox').prop("checked", true);
        }
    }

    function isFreeCourseChecked(elem) {

        if (jQuery('#' + elem.id).is(':checked')) {
            $('#price').prop('required', false);
        } else {
            $('#price').prop('required', true);
        }
    }

    function calculateDiscountPercentage(discounted_price) {
        if (discounted_price > 0) {
            var actualPrice = jQuery('#price').val();
            if (actualPrice > 0) {
                var reducedPrice = actualPrice - discounted_price;
                var discountedPercentage = (reducedPrice / actualPrice) * 100;
                if (discountedPercentage > 0) {
                    jQuery('#discounted_percentage').text(discountedPercentage.toFixed(2) + "%");

                } else {
                    jQuery('#discounted_percentage').text('<?php echo '0%'; ?>');
                }
            }
        }
    }

    $('.on-hover-action').mouseenter(function() {
        var id = this.id;
        $('#widgets-of-' + id).show();
    });
    $('.on-hover-action').mouseleave(function() {
        var id = this.id;
        $('#widgets-of-' + id).hide();
    });


    function student_academic_progress(course_id) {
        var academicProgressContent = $('#academic_progress').html();
        if (academicProgressContent == '') {
            $('.ajax_loader').addClass('start_ajax_loading');
            $.ajax({
                url: '<?php echo site_url('admin/student_academic_progress/'); ?>' + course_id,
                success: function(response) {
                    $('#academic_progress').html(response);
                    $('.ajax_loader').removeClass('start_ajax_loading');
                }
            });
        }
    }


    //Show specific tab by passing the tab id when reload browser
    <?php if (isset($_GET['tab'])) : ?>
        $('.ajax_loader').addClass('start_ajax_loading');
        const tabClickInterval = setInterval(function() {
            if (!$("a[href$=<?= $_GET['tab']; ?>]").hasClass('active')) {
                $("a[href$=<?= $_GET['tab']; ?>]").click();
            } else {
                $('.ajax_loader').removeClass('start_ajax_loading');
                clearInterval(tabClickInterval);
            }
        }, 1000);
    <?php endif; ?>
</script>


<script type="text/javascript">
  
    $(document).ready(function() {
        $('#thumbnail-picker-area').hide();
        $('#publish_date').hide();
        $('#upcoming').click(function() {
            $('#thumbnail-picker-area').show();
            $('#publish_date').show();
        });

        $('input[type="radio"]').not('#status_upcoming').click(function() {
            $('#thumbnail-picker-area').hide();
            $('#publish_date').hide();
        });
        <?php if($course_details['status'] == 'upcoming'):?>
        $('#thumbnail-picker-area').show();
        $('#publish_date').show();
    <?php endif; ?>
    });
</script>