
<?php
$sections = $this->crud_model->get_section('course', $course_id)->result_array();
?>
<!-- card-title -->


<div class="row">
                    <div class="col-md-6">
                        <h4 style ="//styleName: Med/32;font-family: Outfit;font-size: 32px;font-weight: 500;line-height: 48px;text-align: left;color:#515D72;"
                         class="header-title my-1"><?php echo get_phrase('Front end course'); ?></h4></div>
                    <div style = "left :30%" class="col-md-6">

             <a   
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
                        <!-- Study plan END style-->

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
                     <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.2313 1.89872L14.7557 0.452075C14.1409 -0.150692 13.1221 -0.150692 12.5072 0.452075L9.73176 3.17314H2.61739C1.17695 3.17314 0 4.32701 0 5.75643V13.7991C0 15.2113 1.17695 16.3824 2.61739 16.3824H10.8209C12.2613 16.3824 13.4383 15.2285 13.4383 13.7991V6.82419L16.2138 4.10312C16.8461 3.50036 16.8461 2.51871 16.2313 1.89872ZM4.95371 10.0964C5.05911 9.80358 5.18208 9.52803 5.34017 9.25248L7.25491 11.1297C6.97385 11.2847 6.69278 11.4052 6.39416 11.5085L4.26863 12.1974L4.95371 10.0964ZM8.44942 10.2686C8.36159 10.3547 8.25619 10.4408 8.15079 10.5269L5.955 8.39138C6.04283 8.28805 6.13066 8.18472 6.21849 8.09861L11.7695 2.65648L13.9828 4.82644L8.44942 10.2686ZM12.3843 13.7818C12.3843 14.6257 11.6816 15.3146 10.8209 15.3146H2.61739C1.75664 15.3146 1.05398 14.6257 1.05398 13.7818V5.75643C1.05398 4.91255 1.75664 4.22368 2.61739 4.22368H8.66022L5.46314 7.35807C4.77805 8.02972 4.25106 8.8736 3.93486 9.78636L3.12681 12.2146C3.02141 12.5246 3.10925 12.8519 3.33761 13.093C3.49571 13.248 3.72407 13.3513 3.95243 13.3513C4.04026 13.3513 4.12809 13.3341 4.23349 13.2996L6.71035 12.4902C7.64137 12.1974 8.50212 11.6808 9.18721 10.9919L12.3843 7.8575V13.7818ZM15.476 3.3798L14.7382 4.10312L12.5248 1.91594L13.2626 1.19262C13.368 1.08929 13.5085 1.03762 13.6315 1.03762C13.772 1.03762 13.895 1.08929 14.0004 1.19262L15.476 2.63926C15.6868 2.84592 15.6868 3.17314 15.476 3.3798Z" fill="#3E4B62"/>
                        </svg> Edit <span></span>   
                     </a>
                    <a href="#" class="btn btn-icon btn-outline-danger btn-sm" id="category-delete-btn-1" style="float: right;" onclick="confirm_modal('http://localhost/project1/lms-front-end/admin/categories/delete/1');">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_326_2770)">
<path d="M15.75 3H13.425C13.2509 2.15356 12.7904 1.39301 12.1209 0.846539C11.4515 0.300068 10.6142 0.00109089 9.75 0L8.25 0C7.38585 0.00109089 6.54849 0.300068 5.87906 0.846539C5.20964 1.39301 4.74907 2.15356 4.575 3H2.25C2.05109 3 1.86032 3.07902 1.71967 3.21967C1.57902 3.36032 1.5 3.55109 1.5 3.75C1.5 3.94891 1.57902 4.13968 1.71967 4.28033C1.86032 4.42098 2.05109 4.5 2.25 4.5H3V14.25C3.00119 15.2442 3.39666 16.1973 4.09966 16.9003C4.80267 17.6033 5.7558 17.9988 6.75 18H11.25C12.2442 17.9988 13.1973 17.6033 13.9003 16.9003C14.6033 16.1973 14.9988 15.2442 15 14.25V4.5H15.75C15.9489 4.5 16.1397 4.42098 16.2803 4.28033C16.421 4.13968 16.5 3.94891 16.5 3.75C16.5 3.55109 16.421 3.36032 16.2803 3.21967C16.1397 3.07902 15.9489 3 15.75 3ZM8.25 1.5H9.75C10.2152 1.50057 10.6688 1.64503 11.0487 1.91358C11.4286 2.18213 11.7161 2.56162 11.8717 3H6.12825C6.28394 2.56162 6.57143 2.18213 6.95129 1.91358C7.33115 1.64503 7.78479 1.50057 8.25 1.5ZM13.5 14.25C13.5 14.8467 13.2629 15.419 12.841 15.841C12.419 16.2629 11.8467 16.5 11.25 16.5H6.75C6.15326 16.5 5.58097 16.2629 5.15901 15.841C4.73705 15.419 4.5 14.8467 4.5 14.25V4.5H13.5V14.25Z" fill="#E81010"/>
<path d="M7.5 13.4995C7.69891 13.4995 7.88968 13.4205 8.03033 13.2799C8.17098 13.1392 8.25 12.9484 8.25 12.7495V8.24954C8.25 8.05063 8.17098 7.85986 8.03033 7.71921C7.88968 7.57856 7.69891 7.49954 7.5 7.49954C7.30109 7.49954 7.11032 7.57856 6.96967 7.71921C6.82902 7.85986 6.75 8.05063 6.75 8.24954V12.7495C6.75 12.9484 6.82902 13.1392 6.96967 13.2799C7.11032 13.4205 7.30109 13.4995 7.5 13.4995Z" fill="#E81010"/>
<path d="M10.5 13.4995C10.6989 13.4995 10.8897 13.4205 11.0303 13.2799C11.171 13.1392 11.25 12.9484 11.25 12.7495V8.24954C11.25 8.05063 11.171 7.85986 11.0303 7.71921C10.8897 7.57856 10.6989 7.49954 10.5 7.49954C10.3011 7.49954 10.1103 7.57856 9.96967 7.71921C9.82902 7.85986 9.75 8.05063 9.75 8.24954V12.7495C9.75 12.9484 9.82902 13.1392 9.96967 13.2799C10.1103 13.4205 10.3011 13.4995 10.5 13.4995Z" fill="#E81010"/>
</g>
<defs>
<clipPath id="clip0_326_2770">
<rect width="18" height="18" fill="white"/>
</clipPath>
</defs>
</svg>
 Delete                   
                     </a>

                                            
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
                            <div class="card text-secondary action mb-2 w-100" id = "<?php echo 'lesson-'.$lesson['id']; ?>">
                                <div class="card-body thinner-card-body">
                                    <div  style =" " class="card-widgets display-block" id = "widgets-of-lesson-<?php echo $lesson['id']; ?>">
                                        <?php if ($lesson['lesson_type'] == 'quiz'): ?>
                                            <a href="<?php echo site_url('home/lesson/'.slugify($course_details['title']).'/'.$course_details['id'].'/'.$lesson['id']); ?>" target="_blank" data-toggle="tooltip" title="<?php echo get_phrase('quiz_results'); ?>"><i class="mdi mdi-file-document-box-outline"></i></a>

                                            <a href="javascript:;" onclick="showLargeModal('<?php echo site_url('modal/popup/quiz_questions/'.$lesson['id']); ?>', '<?php echo get_phrase('manage_quiz_questions'); ?>')" data-toggle="tooltip" title="<?php echo get_phrase('quiz_questions'); ?>"><i class="mdi mdi-comment-question-outline"></i></a>

                                            <a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/quiz_edit/'.$lesson['id'].'/'.$course_id); ?>', '<?php echo get_phrase('update_quiz_information'); ?>')" data-toggle="tooltip" title="<?php echo get_phrase('edit'); ?>"><i class="mdi mdi-pencil-outline"></i></a>
                                        <?php else: ?>
                     <a href="http://localhost/project1/lms-front-end/admin/category_form/edit_category/1" class="btn btn-icon btn-outline-info btn-sm" id="category-edit-btn-1" style="">
                     <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.2313 1.89872L14.7557 0.452075C14.1409 -0.150692 13.1221 -0.150692 12.5072 0.452075L9.73176 3.17314H2.61739C1.17695 3.17314 0 4.32701 0 5.75643V13.7991C0 15.2113 1.17695 16.3824 2.61739 16.3824H10.8209C12.2613 16.3824 13.4383 15.2285 13.4383 13.7991V6.82419L16.2138 4.10312C16.8461 3.50036 16.8461 2.51871 16.2313 1.89872ZM4.95371 10.0964C5.05911 9.80358 5.18208 9.52803 5.34017 9.25248L7.25491 11.1297C6.97385 11.2847 6.69278 11.4052 6.39416 11.5085L4.26863 12.1974L4.95371 10.0964ZM8.44942 10.2686C8.36159 10.3547 8.25619 10.4408 8.15079 10.5269L5.955 8.39138C6.04283 8.28805 6.13066 8.18472 6.21849 8.09861L11.7695 2.65648L13.9828 4.82644L8.44942 10.2686ZM12.3843 13.7818C12.3843 14.6257 11.6816 15.3146 10.8209 15.3146H2.61739C1.75664 15.3146 1.05398 14.6257 1.05398 13.7818V5.75643C1.05398 4.91255 1.75664 4.22368 2.61739 4.22368H8.66022L5.46314 7.35807C4.77805 8.02972 4.25106 8.8736 3.93486 9.78636L3.12681 12.2146C3.02141 12.5246 3.10925 12.8519 3.33761 13.093C3.49571 13.248 3.72407 13.3513 3.95243 13.3513C4.04026 13.3513 4.12809 13.3341 4.23349 13.2996L6.71035 12.4902C7.64137 12.1974 8.50212 11.6808 9.18721 10.9919L12.3843 7.8575V13.7818ZM15.476 3.3798L14.7382 4.10312L12.5248 1.91594L13.2626 1.19262C13.368 1.08929 13.5085 1.03762 13.6315 1.03762C13.772 1.03762 13.895 1.08929 14.0004 1.19262L15.476 2.63926C15.6868 2.84592 15.6868 3.17314 15.476 3.3798Z" fill="#3E4B62"/>
                        </svg> Edit <span></span>   
                     </a>
                    <a href="#" class="btn btn-icon btn-outline-danger btn-sm" id="category-delete-btn-1" style="float: right;" onclick="confirm_modal('http://localhost/project1/lms-front-end/admin/categories/delete/1');">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_326_2770)">
<path d="M15.75 3H13.425C13.2509 2.15356 12.7904 1.39301 12.1209 0.846539C11.4515 0.300068 10.6142 0.00109089 9.75 0L8.25 0C7.38585 0.00109089 6.54849 0.300068 5.87906 0.846539C5.20964 1.39301 4.74907 2.15356 4.575 3H2.25C2.05109 3 1.86032 3.07902 1.71967 3.21967C1.57902 3.36032 1.5 3.55109 1.5 3.75C1.5 3.94891 1.57902 4.13968 1.71967 4.28033C1.86032 4.42098 2.05109 4.5 2.25 4.5H3V14.25C3.00119 15.2442 3.39666 16.1973 4.09966 16.9003C4.80267 17.6033 5.7558 17.9988 6.75 18H11.25C12.2442 17.9988 13.1973 17.6033 13.9003 16.9003C14.6033 16.1973 14.9988 15.2442 15 14.25V4.5H15.75C15.9489 4.5 16.1397 4.42098 16.2803 4.28033C16.421 4.13968 16.5 3.94891 16.5 3.75C16.5 3.55109 16.421 3.36032 16.2803 3.21967C16.1397 3.07902 15.9489 3 15.75 3ZM8.25 1.5H9.75C10.2152 1.50057 10.6688 1.64503 11.0487 1.91358C11.4286 2.18213 11.7161 2.56162 11.8717 3H6.12825C6.28394 2.56162 6.57143 2.18213 6.95129 1.91358C7.33115 1.64503 7.78479 1.50057 8.25 1.5ZM13.5 14.25C13.5 14.8467 13.2629 15.419 12.841 15.841C12.419 16.2629 11.8467 16.5 11.25 16.5H6.75C6.15326 16.5 5.58097 16.2629 5.15901 15.841C4.73705 15.419 4.5 14.8467 4.5 14.25V4.5H13.5V14.25Z" fill="#E81010"/>
<path d="M7.5 13.4995C7.69891 13.4995 7.88968 13.4205 8.03033 13.2799C8.17098 13.1392 8.25 12.9484 8.25 12.7495V8.24954C8.25 8.05063 8.17098 7.85986 8.03033 7.71921C7.88968 7.57856 7.69891 7.49954 7.5 7.49954C7.30109 7.49954 7.11032 7.57856 6.96967 7.71921C6.82902 7.85986 6.75 8.05063 6.75 8.24954V12.7495C6.75 12.9484 6.82902 13.1392 6.96967 13.2799C7.11032 13.4205 7.30109 13.4995 7.5 13.4995Z" fill="#E81010"/>
<path d="M10.5 13.4995C10.6989 13.4995 10.8897 13.4205 11.0303 13.2799C11.171 13.1392 11.25 12.9484 11.25 12.7495V8.24954C11.25 8.05063 11.171 7.85986 11.0303 7.71921C10.8897 7.57856 10.6989 7.49954 10.5 7.49954C10.3011 7.49954 10.1103 7.57856 9.96967 7.71921C9.82902 7.85986 9.75 8.05063 9.75 8.24954V12.7495C9.75 12.9484 9.82902 13.1392 9.96967 13.2799C10.1103 13.4205 10.3011 13.4995 10.5 13.4995Z" fill="#E81010"/>
</g>
<defs>
<clipPath id="clip0_326_2770">
<rect width="18" height="18" fill="white"/>
</clipPath>
</defs>
</svg>
 Delete                   
                     </a>

                                            
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
