
<?php
$sections = $this->crud_model->get_section('course', $course_id)->result_array();
?>


<div class="row">
                    <div class="col-md-6">
                        <h4 style ="//styleName: Med/32;font-family: Outfit;font-size: 32px;font-weight: 500;line-height: 48px;text-align: left;color:#515D72;"
                         class="header-title my-1"><?php echo get_phrase('Front end course'); ?></h4></div>
                    <div style = "left :30%" class="col-md-6">

             <a style ="padding: 10px 20px ;border-radius: 8px 0px 0px 0px;
                    border: 1px  solid;border-color:#F79C32;color :#F79C32;
                     a:hofer{background-color:#F79C32};"   
                    href="javascript:void(0)" class="btn btn-outline-primary btn-rounded btn-sm ml-1" 
                    onclick="showAjaxModal('http://localhost/project1/lms-front-end/modal/popup/section_add/1', 'Add new section')">
                    <i class="mdi mdi-plus"></i> Add section</a> <i style = "color :#F79C32; background-color:#EEF6FD; position :relative; left:40px;" class="mdi mdi-apple-keyboard-command title_icon"></i>

                        <!-- <a href="<?php echo site_url('admin/preview/' . $course_id); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm ml-1 my-1" target="_blank"><?php echo get_phrase('view_on_frontend'); ?> <i class="mdi mdi-arrow-right"></i> </a>

                        <a href="<?php echo site_url('admin/courses'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm my-1"> <i class=" mdi mdi-keyboard-backspace"></i> <?php echo get_phrase('back_to_course_list'); ?></a> -->
                    </div>
                    
                    <div style ="//styleName: Light/20;font-family: Outfit;font-size: 20px;font-weight: 300;
line-height: 30px;text-align: left;color:#5FB0ED;padding-left:16px;
"><p>Instructor :Mahmoud Galal</p> </div></div>



<div class="row ">
    <!-- <div class="col-xl-12 mb-4 text-center mt-3">
        <a href="javascript:void(0)" class="btn btn-outline-primary btn-rounded btn-sm ml-1" onclick="showAjaxModal('<?php echo site_url('modal/popup/section_add/'.$course_id); ?>', '<?php echo get_phrase('add_new_section'); ?>')"><i class="mdi mdi-plus"></i> <?php echo get_phrase('add_section'); ?></a>
        <a href="javascript:void(0)" class="btn btn-outline-primary btn-rounded btn-sm ml-1" onclick="showAjaxModal('<?php echo site_url('modal/popup/lesson_types/'.$course_id); ?>', '<?php echo get_phrase('add_new_lesson'); ?>')"><i class="mdi mdi-plus"></i> <?php echo get_phrase('add_lesson'); ?></a>
        <?php if (count($sections) > 0): ?>
            <a href="javascript:void(0)" class="btn btn-outline-primary btn-rounded btn-sm ml-1" onclick="showAjaxModal('<?php echo site_url('modal/popup/quiz_add/'.$course_id); ?>', '<?php echo get_phrase('add_new_quiz'); ?>')"><i class="mdi mdi-plus"></i> <?php echo get_phrase('add_quiz'); ?></a>
            <a href="javascript:void(0)" class="btn btn-outline-primary btn-rounded btn-sm ml-1" onclick="showLargeModal('<?php echo site_url('modal/popup/sort_section/'.$course_id); ?>', '<?php echo get_phrase('sort_sections'); ?>')"><i class="mdi mdi-sort-variant"></i> <?php echo get_phrase('sort_sections'); ?></a>
        <?php endif; ?>
    </div> -->

    <div class="col-xl-12">
        <div class="row">
            <?php
            $lesson_counter = 0;
            $quiz_counter   = 0;
            foreach ($sections as $key => $section):?>
            <div class="col-xl-12">
                <div class="card bg-light text-seconday on-hover-action mb-5" id = "section-<?php echo $section['id']; ?>">
                    <div style = "background-color:#E8F4FD;" class="card-body">

                        <!-- Study plan -->
                        <?php if(date('d-M-Y-H-i-s', $section['start_date']) != date('d-M-Y-H-i-s', $section['end_date'])): ?>
                            <p class="bg-dark text-center" style="padding: 8px 9px; border-radius: 6px 6px 0px 0px !important; font-weight: 700; margin: -25px -25px 15px -25px;">
                                <?php echo get_phrase('Study plan'); ?>

                                <?php if(date('d-M-Y', $section['start_date']) == date('d-M-Y', $section['end_date'])): ?>
                                     - <?php echo date('d M Y', $section['start_date']); ?>
                                     <br>
                                     <?php echo date('h:i A', $section['start_date']).' '.get_phrase('To').' '.date('h:i A', $section['end_date']); ?>
                                <?php else: ?>
                                    <br>
                                    <?php echo date('d M Y h:i A', $section['start_date']).' - '.date('d M Y h:i A', $section['end_date']); ?>
                                <?php endif ?>
                            </p>
                        <?php endif; ?>
                        <!-- Study plan END-->

                        <h5 class="card-title" class="mb-3" style="min-height: 45px;"><span class="font-weight-light"><?php echo get_phrase('section').' '.++$key; ?></span>: <?php echo $section['title']; ?>
                            <!-- <div class="row justify-content-center alignToTitle display-none" id = "widgets-of-section-<?php echo $section['id']; ?>">
                                <button type="button" class="btn btn-outline-secondary btn-rounded btn-sm" name="button" onclick="showLargeModal('<?php echo site_url('modal/popup/sort_lesson/'.$section['id']); ?>', '<?php echo get_phrase('sort_lessons'); ?>')" ><i class="mdi mdi-sort-variant"></i> <?php echo get_phrase('sort_lesson'); ?></button>
                                <button type="button" class="btn btn-outline-secondary btn-rounded btn-sm ml-1" name="button" onclick="showAjaxModal('<?php echo site_url('modal/popup/section_edit/'.$section['id'].'/'.$course_id); ?>', '<?php echo get_phrase('update_section'); ?>')" ><i class="mdi mdi-pencil-outline"></i> <?php echo get_phrase('edit_section'); ?></button>
                                <button type="button" class="btn btn-outline-secondary btn-rounded btn-sm ml-1" name="button" onclick="confirm_modal('<?php echo site_url('admin/sections/'.$course_id.'/delete'.'/'.$section['id']); ?>');"><i class="mdi mdi-window-close"></i> <?php echo get_phrase('delete_section'); ?></button>
                            </div> -->
                        </h5>
                        <div class="clearfix"></div>
                        <?php
                        $lessons = $this->crud_model->get_lessons('section', $section['id'])->result_array();
                        foreach ($lessons as $index => $lesson):?>
                        <div class="col-md-12">
                            <!-- Portlet card -->
                            <div class="card text-secondary action mb-2 w-100" id = "<?php echo 'lesson-'.$lesson['id']; ?>">
                                <div class="card-body thinner-card-body">
                                    <div  style =" " class="card-widgets display-block" id = "widgets-of-lesson-<?php echo $lesson['id']; ?>">
                                        <?php if ($lesson['lesson_type'] == 'quiz'): ?>
                                            <a href="<?php echo site_url('home/lesson/'.slugify($course_details['title']).'/'.$course_details['id'].'/'.$lesson['id']); ?>" target="_blank" data-toggle="tooltip" title="<?php echo get_phrase('quiz_results'); ?>"><i class="mdi mdi-file-document-box-outline"></i></a>

                                            <a href="javascript:;" onclick="showLargeModal('<?php echo site_url('modal/popup/quiz_questions/'.$lesson['id']); ?>', '<?php echo get_phrase('manage_quiz_questions'); ?>')" data-toggle="tooltip" title="<?php echo get_phrase('quiz_questions'); ?>"><i class="mdi mdi-comment-question-outline"></i></a>

                                            <a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/quiz_edit/'.$lesson['id'].'/'.$course_id); ?>', '<?php echo get_phrase('update_quiz_information'); ?>')" data-toggle="tooltip" title="<?php echo get_phrase('edit'); ?>"><i class="mdi mdi-pencil-outline"></i></a>
                                        <?php else: ?>
                     <a href="http://localhost/project1/lms-front-end/admin/category_form/edit_category/1" class="btn btn-icon btn-outline-info btn-sm" id="category-edit-btn-1" style="">
                        <i class="mdi mdi-wrench"></i> Edit <span></span>                    </a>
                        <a href="#" class="btn btn-icon btn-outline-danger btn-sm" id="category-delete-btn-1" style="float: right;" onclick="confirm_modal('http://localhost/project1/lms-front-end/admin/categories/delete/1');">
                        <i class="mdi mdi-delete"></i> Delete                    </a>

                                            
                <?php endif; ?>
                                        
                                    </div>
                                    <h5 class="card-title mb-0">
                                        <span class="font-weight-light">
                                            <?php
                                            if ($lesson['lesson_type'] == 'quiz') {
                                                $quiz_counter++; // Keeps track of number of quiz
                                                $lesson_type = $lesson['lesson_type'];
                                            }else {
                                                $lesson_counter++; // Keeps track of number of lesson
                                                if ($lesson['attachment_type'] == 'txt' || $lesson['attachment_type'] == 'pdf' || $lesson['attachment_type'] == 'doc' || $lesson['attachment_type'] == 'img') {
                                                    $lesson_type = $lesson['attachment_type'];
                                                }else {
                                                    $lesson_type = 'video';
                                                }
                                            }
                                            ?>
                                            <img src="<?php echo base_url('assets/backend/lesson_icon/'.$lesson_type.'.png'); ?>" alt="" height = "16">
                                            <?php echo $lesson['lesson_type'] == 'quiz' ? get_phrase('quiz').' '.$quiz_counter : get_phrase('lesson').' '.$lesson_counter; ?>
                                        </span>: <?php echo $lesson['title']; ?>
                                    </h5>
                                </div>
                            </div> <!-- end card-->
                        </div>
                    <?php endforeach; ?>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    <?php endforeach; ?>
</div>
</div>
</div>
