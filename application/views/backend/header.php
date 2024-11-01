<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark bg-transparent shadow-none fixed-top d-flex justify-content-end">
    <div class="container-fluid d-flex justify-content-end align-items-center">
        <!-- LOGO -->
        <a class="logo" href="<?php echo site_url($this->session->userdata('role')); ?>" class="topnav-logo" style="min-width: unset;">
            <span class="topnav-logo-lg">
                <img src="<?php echo base_url('uploads/system/' . get_frontend_settings('small_logo')); ?>" alt="" height="40">
            </span>
            
        </a>

        <ul class="list-unstyled topbar-right-menu  mb-0 d-flex justify-content-center align-items-center">

            <li class="dropdown notification-list topbar-dropdown ">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="align-middle text-18"><i class="fas fa-language"></i></span> <i class="mdi mdi-chevron-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-59px, 72px, 0px);">

                <?php $languages = $this->crud_model->get_all_languages();
                foreach ($languages as $language) : ?>
                    <?php if (trim($language) != "" && $this->session->userdata('language') != strtolower($language)) : ?>
                        <a href="javascript:void(0);" onclick="switch_language('<?php echo strtolower($language); ?>')" class="dropdown-item notify-item">
                            <span class="align-middle"><?php echo ucwords($language); ?></span>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
                <!-- item-->

                </div>
            </li>
            
            <li class="dropdown">
                <a class="nav-link" href=""><i class="dripicons-view-apps fa-2x"></i></a>
            </li>

            <?php if ($this->session->userdata('admin_login')) : ?>
                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" style="padding: 2px;">
                        <i class="mdi mdi-help-circle-outline" style="font-size: 23px;"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-59px, 72px, 0px);">

                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0"><?php echo get_phrase('help_center'); ?></h6>
                        </div>

                        <a href="https://creativeitem.com/docs/academy-lms" target="_blank" class="dropdown-item notify-item">
                            <i class="mdi mdi-file-document-box-outline"></i>
                            <span><?php echo get_phrase('read_documentation'); ?></span>
                        </a>

                        <a href="https://www.youtube.com/watch?v=-HHhJUGQPeU&list=PLR1GrQCi5Zqvhh7wgtt-ShMAM1RROYJgE" target="_blank" class="dropdown-item notify-item">
                            <i class="mdi mdi-youtube"></i>
                            <span><?php echo get_phrase('watch_video_tutorial'); ?></span>
                        </a>

                        <a href="https://support.creativeitem.com" target="_blank" class="dropdown-item notify-item">
                            <i class="far fa-life-ring"></i>
                            <span><?php echo get_phrase('get_customer_support'); ?></span>
                        </a>

                        <a href="https://support.creativeitem.com" target="_blank" class="dropdown-item notify-item">
                            <i class="mdi mdi-arrow-right-bold-circle-outline"></i>
                            <span><?php echo get_phrase('order_customization'); ?></span>
                        </a>

                        <a href="https://support.creativeitem.com" target="_blank" class="dropdown-item notify-item">
                            <i class="mdi mdi-tooltip-plus-outline"></i>
                            <span><?php echo get_phrase('request_a_new_feature'); ?></span>
                        </a>

                        <a href="https://codecanyon.net/collections/shared/9236f1b2a5de784f383c9ecd37b2f7b43dbfc225a5f96bc3ef32ac7ab397d392" target="_blank" class="dropdown-item notify-item">
                            <i class=" mdi mdi-open-in-new"></i>
                            <span><?php echo get_phrase('browse_addons'); ?></span>
                        </a>

                        <a href="https://creativeitem.com/services" target="_blank" class="dropdown-item notify-item text-warning d-flex items-align-center">
                            <i class="text-11 dripicons-toggles mr-1"></i>
                            <span><?php echo get_phrase('Get Services'); ?></span>
                            <i class="mdi mdi-crown ml-auto"></i>
                        </a>
                    </div>
                </li>


                <!-- Notification section -->
                <li class="dropdown notification-list">
                    <?php
                    $logged_user_id = $this->session->userdata('user_id');
                    $notifications = $this->db->order_by('status ASC, id desc')->limit(50)->where('to_user', $logged_user_id)->get('notifications');
                    $number_of_unread_notification = $this->db->order_by('status ASC, id desc')->limit(50)->where('status', 0)->where('to_user', $logged_user_id)->get('notifications')->num_rows();
                    ?>
                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" id="topbar-notifydrop" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="dripicons-bell noti-icon"></i>
                        <span id="newNotificationIcon" class="<?php if ($number_of_unread_notification > 0) echo 'noti-icon-badge'; ?>"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg" aria-labelledby="topbar-notifydrop">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-right">
                                    <a href="javascript: void(0);" onclick="handleNotification('remove_all')" class="text-secondary">
                                        <small><?php echo get_phrase('Remove all'); ?></small>
                                    </a>
                                </span>
                                <?php echo get_phrase('Notification'); ?>
                            </h5>
                        </div>

                        <div id="headerNotification" class="slimscroll" style="max-height: 280px;">
                            <?php include "header_notification.php"; ?>

                        </div>

                        <a onclick="handleNotification('mark_all_as_read')" href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all text-muted">
                            <?php echo get_phrase('Mark all as read'); ?>
                        </a>

                    </div>
                </li>
            <?php endif; ?>

            <li class="dropdown notification-list">
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0"><?php echo get_phrase('welcome'); ?> !</h6>
                    </div>

                    <!-- Account -->
                    <?php if ($this->session->userdata('admin_login') == 1) : ?>
                        <a href="<?php echo site_url(strtolower($this->session->userdata('role')) . '/manage_profile'); ?>" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle mr-1"></i>
                            <span><?php echo get_phrase('my_account'); ?></span>
                        </a>
                    <?php else : ?>
                        <a href="<?php echo site_url('home/profile/user_profile'); ?>" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle mr-1"></i>
                            <span><?php echo get_phrase('my_account'); ?></span>
                        </a>
                    <?php endif; ?>

                    <?php if (strtolower($this->session->userdata('role')) == 'admin') : ?>
                        <!-- settings-->
                        <a href="<?php echo site_url('admin/system_settings'); ?>" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings mr-1"></i>
                            <span><?php echo get_phrase('settings'); ?></span>
                        </a>

                    <?php endif; ?>

                    <!-- Logout-->
                    <a href="<?php echo site_url('login/logout'); ?>" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout mr-1"></i>
                        <span><?php echo get_phrase('logout'); ?></span>
                    </a>

                </div>
            </li>
        </ul>
        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
        <div class="visit_website">
            <a href="<?php echo site_url('home'); ?>" target="" class="btn btn-outline-light ml-3 d-none d-md-inline-block"><?php echo get_phrase('visit_website'); ?></a>
        </div>
    </div>
</div>
<!-- end Topbar -->



<script type="text/javascript">
    // setInterval(function(){
    //     handleNotification();
    // }, 10000);

    function handleNotification(type) {
        $.ajax({
            url: '<?php echo site_url('admin/get_my_notification/'); ?>' + type,
            success: function(response) {
                var responseVal = JSON.parse(response);
                $('#headerNotification').html(responseVal.rendered_view);
                $('#newNotificationIcon').removeClass('noti-icon-badge');
                $('#newNotificationIcon').addClass(responseVal.notification_icon_class);
            }
        });
    }
</script>