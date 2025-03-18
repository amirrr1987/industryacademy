<?php
$account_link = get_permalink( get_option('woocommerce_myaccount_page_id') );
//do_action( 'woocommerce_before_customer_login_form' ); 


 //if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<?php 

$logo_img_width = '152';
$logo_img_height = '45';
$otp_situ = "0";
$custom_logo_image = get_theme_file_uri('assets/images/logo_default.svg');
if ( class_exists( 'Redux') ) {
	$logo_uploaded = codebean_option('custom_logo_image');
	if(isset($logo_uploaded['url']) && $logo_uploaded['url'] != '') {
		$custom_logo_image = $logo_uploaded['url'];
	}
	
	 $logo_img_width   = codebean_option('logo_img_width');
	 $logo_img_height  = codebean_option('logo_img_height');
	 //since v12.9 adding otp
	 $otp_situ = codebean_option('otp');
	 

}
$showLogo = codebean_option("show_logo_in_login");

//https://codepen.io/andytran/pen/RPBdgM
?>


<div class="container">
    <div class="row logintempthree">
        <div class="col-md-5 col-xs-12 studi_logregbg">
            <div class="studi_logregbg_holder">
                <?php if(!empty(codebean_option('login_image')['thumbnail'])){ 
                    $img_login_src = codebean_option('login_image')['url'];
                }else{
                    $img_login_src = get_template_directory_uri()."/assets/images/loginbgwithkey.jpg";
                }
                
               
                ?>
           <img   src="<?php echo $img_login_src;?>">
           
           <input type="checkbox" id="studi_switch">
              <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) { ?>
            <div class="studi_app">
              
                  <div class="studi_mini_studi_switcher">
                    <label class="studi_switch_label" for="studi_switch">
                      <div class="studi_mini_toggle"></div>
                      <div class="studi_names">
                        <p class="studi_light"><?php esc_attr_e( 'Sign In', 'studiare' ); ?></p>
                        <p class="studi_dark"><?php esc_attr_e( 'Register', 'studiare' ); ?></p>
                      </div>
                    </label>
                  </div>
            </div>
              <?php } ?>
           </div>
        </div>
        <div class="col-md-7 col-xs-12 studi_login_reg_t3">
            
            <?php if($showLogo==1){ 
            
            
            ?>
            <div class="studitoplogin site-logo">
                                <div class="studiare-logo-wrap">
                                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="studiare-logo studiare-main-logo" rel="home">
                                        <img style="max-width:<?php echo $logo_img_width; ?>px;max-height:<?php echo $logo_img_height; ?>px;"   src="<?php echo esc_url( $custom_logo_image ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                    </a>
                                </div>
            </div>
            <?php } ?>
            
            <div class="logint_form ">
            <b class="title"><?php esc_attr_e( 'Sign In', 'studiare' ); ?></b>
            <?php $redirect = true; ?>
            <?php 
            if($otp_situ == "1"){
                $lwe = __('With Email','studiare');
                $lwm = __('With Mobile','studiare');
                echo "<div class='sclogin_switch mb-30'><a data-divtoinactive='otp_login_frm' data-divtoactive='default_login_frm' class='scls_btn scls_active' href='#'><i class='fal fa-envelope'></i> $lwe</a><a data-divtoinactive='default_login_frm' data-divtoactive='otp_login_frm' class='scls_btn' href='#'><i class='fal fa-mobile'></i> $lwm</a></div>";
            }
            //adding otp to login page
            echo "<div id='otp_login_frm' style='display:none;'>";
            echo do_shortcode("[suncode_otp_login_form]");
            echo "</div>";
            ?>
            <form id="default_login_frm" class="woocommerce-form woocommerce-form-login slogin" method="post" action="<?php echo esc_url( $account_link ); ?>">
                
            <div class="input-container">
            	<?php do_action( 'woocommerce_login_form_start' ); ?>  
            <label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?> </label>
            <input type="text" id="username" name="username" required="required" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" >
           
            
            </div>
            <div class="input-container">
            <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?></label>
            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" id="password" name="password" required="required" autocomplete="current-password">
           
            
            </div>
            <div class="button-container">
            	<?php do_action( 'woocommerce_login_form' ); ?>
                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
            					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"  /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
            				</label>
                <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                <?php 
                
                if ( $redirect ): ?>
			        <input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
		        <?php endif ?>
            <button type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><span><?php esc_html_e( 'Log in', 'woocommerce' ); ?></span></button>
            </div>
            <div class="footer">	<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a></div>
            	<?php do_action( 'woocommerce_login_form_end' ); ?>
            </form>
            </div>
            
            <!-- registeration start -->
            <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) { ?>
             <div class="regt_form frmactive" >
                 <b class="title"><?php esc_attr_e( 'Register', 'studiare' ); ?></b>
            <?php
            if($otp_situ == "1"){
                $lwe = __('With Email','studiare');
                $lwm = __('With Mobile','studiare');
                echo "<div class='sclogin_switch mb-30'><a data-divtoinactive='otp_register_frm' data-divtoactive='default_register_frm' class='scls_btn scls_active' href='#'><i class='fal fa-envelope'></i> $lwe</a><a data-divtoinactive='default_register_frm' data-divtoactive='otp_register_frm' class='scls_btn' href='#'><i class='fal fa-mobile'></i> $lwm</a></div>";
            }
            //adding otp to registeration page
            echo "<div id='otp_register_frm' style='display:none;'>";
            echo do_shortcode("[suncode_otp_registration_form]");
            echo "</div>";
            ?>     
            <form id="default_register_frm" method="post" <?php do_action( 'woocommerce_register_form_tag' ); ?>>
            <?php do_action( 'woocommerce_register_form_start' ); ?>
            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>    	
            <div class="input-container">
            <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?></label>
            <input type="text" name="username" id="reg_username" required="required" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>">
           
            
            </div>
            <?php endif; ?>
            
            <div class="input-container">
            <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?></label>
            <input type="email" name="email" id="reg_email" required="required" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>">
            
            
            </div>
            
            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
            <div class="input-container">
            <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?></label>
            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="reg_password" required="required" autocomplete="new-password">


            
            
            </div>
            <?php else : ?>
            <p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>
            <?php endif; ?>
            <div class="input-container">
            <?php do_action( 'woocommerce_register_form' ); ?>
            </div>
            <div class="button-container">
                <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
            <button type="submit" style="width:100%;" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><span><?php esc_html_e( 'Register', 'woocommerce' ); ?></span></button>
            </div>
            	<?php do_action( 'woocommerce_register_form_end' ); ?>
            </form>
            </div>
            <?php } //endif; ?>
            <!-- registeration end -->
            
        </div>
        
    </div>
</div>

<?php //do_action( 'woocommerce_after_customer_login_form' ); ?>





<script>
jQuery(document).ready(function($){
 
            
    $("#studi_switch").change(function() {
            $(".logint_form").toggleClass("frmactive");
            $(".regt_form").toggleClass("frmactive");
    });        
    
$('.toggle').on('click', function() {
  $('.container').stop().addClass('active');
});

$('.close').on('click', function() {
  $('.container').stop().removeClass('active');
});





});

<?php
    if($otp_situ == "1"){
?>

jQuery(document).ready(function($){
    
    $('.scls_btn').on('click',function(a){
        a.preventDefault();
        //$('.scls_btn').removeClass("scls_active");
        $(this).siblings('.scls_btn').removeClass("scls_active");
        $(this).addClass("scls_active");
        var sdiv = $(this).data('divtoactive');
        var idiv = $(this).data('divtoinactive');
        $("#"+idiv).hide();
        $("#"+sdiv).show();
    });
    
});

<?php
    }
?>
</script>

<!-- new template by suncode -->
<style>
a.scls_btn {position: relative; display: inline-block;background: #f3f3f3; padding: 5px 10px; border-radius: 3px; margin: 0 5px; color: #919191;border: 1px solid transparent; min-width: 120px; text-align: center;}
a.scls_btn.scls_active { border: 1px solid var(--primary_color); color: var(--primary_color); background: transparent; }
.sclogin_switch { text-align: center; }
a.scls_btn.scls_active:after  { content: ""; position: absolute; background: var(--primary_color); width: 10px; height: 10px; border-radius: 20px; right: -5px; top: 14px; border: 2px solid #fff; }
a.scls_btn.scls_active:before { content: ""; position: absolute; background: var(--primary_color); width: 10px; height: 25px; border-radius: 20px; left: -6px; top: 7px; border: 2px solid #fff; }

@media screen and (min-width:768px){
    .logintempthree { display: flex;  margin: 0 auto; }
   .studi_logregbg_holder {transform:translateY(40px);}

}
.logintempthree { max-width: 800px; background: #fff; border-radius: 10px; box-shadow: 0 0 40px #d4d4d485;padding: 0; overflow: hidden; }
.studi_login_reg_t3 { padding: 25px; }
.logint_form { transform: translateX(0%); transition: .4s;height:auto; }
.regt_form { transform: translateX(0%); transition: .4s;height:auto; }
.logint_form.frmactive { transform: translateX(140%); transition: .4s; height:0;}
body.rtl .logint_form.frmactive { transform: translateX(-140%)}
.regt_form.frmactive { transform: translateX(140%); transition: .4s;height:0; }
body.rtl .regt_form.frmactive { transform: translateX(-140%)}
.logintempthree .woocommerce-form-login__rememberme { margin: 10px 0 5px; }
.logintempthree .footer { margin: 10px 0; }
.logintempthree input[type="email"], .logintempthree input[type="text"], .logintempthree input[type="password"], .logintempthree input[type="username"] {direction: ltr; border: 0; box-shadow: 0 0 0; border-bottom: 1px dashed gainsboro; border-radius: 0; margin-bottom: 10px; }

input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px #ffffff inset !important;
    z-index: 0 !important;
    text-align: left;
}



/* Middle */
.studi_mini_studi_switcher {
  display: flex;
  flex-direction: column;
  margin: auto;
  text-align: center;
  width: 70%;
  transform: translateY(5%);
}


.studi_switch_label, .studi_mini_toggle {
  height: 2.8rem;
  border-radius: 100px;
}
.studi_switch_label {
  width: 100%;
  background-color: rgba(0,0,0,.1);
  border-radius: 100px;
  position: relative;
  margin: 1rem 0 4rem 0; 
  cursor: pointer;
}
.studi_mini_toggle {
  position: absolute;
  width: 50%;
  background-color: #fff;
  box-shadow: 0 2px 15px rgba(0,0,0,.15);
  transition: transform .3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}
.studi_names {
    font-size: 90%;
    font-weight: bolder;
    width: 65%;
    margin-left: 17.5%;
    margin-top: 3.5%;
    position: absolute;
    display: flex;
    justify-content: space-between;
    user-select: none;
}
body.rtl .studi_names {
    margin-right: 17.5%;
    margin-left: 0;
}
.studi_dark {
  opacity: .5;
}
@media screen and (max-width: 480px) { 
    .studi_switch_label{
    margin: 0;
}
}



/* -------- Switch Styles ------------*/
#studi_switch {
  display: none;
}
/* Toggle */
[type="checkbox"]:checked + .studi_app .studi_mini_toggle{
  transform: translateX(100%);
}
body.rtl [type="checkbox"]:checked + .studi_app .studi_mini_toggle{
  transform: translateX(-100%);
}

</style>