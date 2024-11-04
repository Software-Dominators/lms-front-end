<div class="row coupons">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
            
                <h4 class="title">   <img src="../assets/backend/images/grip-dots-icon.svg" class="title-icon" alt=""> <?php echo $page_title; ?>
                    <a href="<?php echo site_url('admin/coupon_form/add_coupon_form'); ?>" class="add-btn alignToTitle"><?php echo get_phrase('add_new_coupon'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="mb-3 header-title bg-danger"><?php echo get_phrase('coupons'); ?></h4> -->
                <div class="table-responsive-sm mt-4 ">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0 table-style">
                        <thead class = "th">
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('coupon_code'); ?></th>
                                <th><?php echo get_phrase('discount_percentage'); ?></th>
                                <th><?php echo get_phrase('validity_till'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($coupons as $key => $coupon) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td class="coupon-code"><strong><?php echo $coupon['code']; ?></strong></td>
                                    <td><?php echo $coupon['discount_percentage']; ?>%</td>
                                    <td><?php echo date('D, d-M-Y', $coupon['expiry_date']); ?></td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm  btn-rounded btn-icon action-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <ul class="dropdown-menu ">
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/coupon_form/edit_coupon_form/' . $coupon['id']) ?>"><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/coupons/delete/' . $coupon['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>