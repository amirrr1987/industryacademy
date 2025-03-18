<?php
/**
 * studiare single product sidebar
 * created date 1399-06-06
 * author: Javad Pourshahabadi
 * @suncode
 **/
 ?>

    <?php wc_get_template_part('content-single-product-meta-side'); ?>
    
    <?php
        $product_meta_info_teacher_profile = codebean_option('product_meta_info_teacher_profile');
        if($product_meta_info_teacher_profile==1){
    		sc_adding_teachers_to_meta_sidebar($teacher_id);
    		sc_adding_teachers_to_meta_sidebar($teacher_id_2);
    		sc_adding_teachers_to_meta_sidebar($teacher_id_3);
    		sc_adding_teachers_to_meta_sidebar($teacher_id_4);
        }
    ?>
    