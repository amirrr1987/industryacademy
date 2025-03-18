<?php
$otp_situ = "0";
if ( class_exists( 'Redux') ) {
	 //since v12.9 adding otp
	 $otp_situ = codebean_option('otp');
}
//do_action( 'woocommerce_before_customer_login_form' ); 

 if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<?php 
$custom_logo_image = get_theme_file_uri('assets/images/logo_default.svg');
if ( class_exists( 'Redux') ) {
	$logo_uploaded = codebean_option('custom_logo_image');
	if(isset($logo_uploaded['url']) && $logo_uploaded['url'] != '') {
		$custom_logo_image = $logo_uploaded['url'];
	}

}

$showLogo = codebean_option("show_logo_in_login");
?>
<?php if($showLogo==1){ ?>
<div class="site-logo">
                    <div class="studiare-logo-wrap">
                        <a href="<?php echo esc_url( home_url('/') ); ?>" class="studiare-logo studiare-main-logo" rel="home">
                            <img  src="<?php echo esc_url( $custom_logo_image ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    </div>
</div>
<?php } ?>

<div class="sc_login_reg_swither_holder sclogin">
	<h2><a id="sc_studi_active_login" href="javascript:void(0);"><?php esc_html_e( 'Login', 'woocommerce' ); ?></a></h2>
	<div class="onoffswitch">
		<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
		<label class="onoffswitch-label" for="myonoffswitch"></label>
	</div>
	<h2><a id="sc_studi_active_register" href="javascript:void(0);"><?php esc_html_e( 'Register', 'woocommerce' ); ?></a></h2>
</div>
<div class="SC_u-columns SC_col2-set sc_user_login_page" id="customer_login">


	<div class="u-column1 col-1">

<?php endif; ?>

<div id="sc_studi_main_login" class="sc_studiare_login_register_holder">
<?php 
if($otp_situ == "1"){
                $lwe = __('With Email','studiare');
                $lwm = __('With Mobile','studiare');
                echo "<div class='mb-30 sclogin_switch'><a data-divtoinactive='otp_login_frm' data-divtoactive='default_login_frm' class='scls_btn scls_active' href='#'><i class='fal fa-envelope'></i> $lwe</a><a data-divtoinactive='default_login_frm' data-divtoactive='otp_login_frm' class='scls_btn' href='#'><i class='fal fa-mobile'></i> $lwm</a></div>";
            }
            //adding otp to login page
            echo "<div id='otp_login_frm' style='display:none;'>";
            echo do_shortcode("[suncode_otp_login_form]");
            echo "</div>";
            
?>
		<form  id="default_login_frm" class=" woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label class="hidden" for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span> <i class="fal fa-user-alt"></i></label>
				<input placeholder="<?php esc_html_e( 'Username or email address', 'woocommerce' ); ?> *" type="text" class="mb-30 woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password" class="hidden"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input class="mb-30 woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?> *" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"  /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
			</p>
			<p class="woocommerce-LostPassword lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>
</div>
<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	</div>

	<div class="u-column2 col-2">

<div id="sc_studi_main_register" class="sc_studiare_login_register_holder" style="display:none;">
<?php
            if($otp_situ == "1"){
                $lwe = __('With Email','studiare');
                $lwm = __('With Mobile','studiare');
                echo "<div class='mb-30 sclogin_switch'><a data-divtoinactive='otp_register_frm' data-divtoactive='default_register_frm' class='scls_btn scls_active' href='#'><i class='fal fa-envelope'></i> $lwe</a><a data-divtoinactive='default_register_frm' data-divtoactive='otp_register_frm' class='scls_btn' href='#'><i class='fal fa-mobile'></i> $lwm</a></div>";
            }
            //adding otp to registeration page
            echo "<div id='otp_register_frm' style='display:none;'>";
            echo do_shortcode("[suncode_otp_registration_form]");
            echo "</div>"; 
            ?> 
		<form method="post" id="default_register_frm" class=" woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label class="hidden" for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input placeholder="<?php esc_html_e( 'Username', 'woocommerce' ); ?> *" type="text" class="mb-30 woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label class="hidden" for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input placeholder="<?php esc_html_e( 'Email address', 'woocommerce' ); ?> *" type="email" class="mb-30 woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label class="hidden" for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="password" class="mb-30 woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?> *" />
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-FormRow form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>
</div>
	</div>

</div>
<?php endif; ?>

<?php //do_action( 'woocommerce_after_customer_login_form' ); ?>

<script>

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

jQuery(document).ready(function($){
	$("#myonoffswitch").change(function() {
    if(this.checked) {
        $("#sc_studi_main_login").slideDown();
        $("#sc_studi_main_register").slideUp();
        $(".sc_login_reg_swither_holder").addClass('sclogin');
        $(".sc_login_reg_swither_holder").removeClass('screg');
    }else{
		$("#sc_studi_main_login").slideUp();
        $("#sc_studi_main_register").slideDown();
		$(".sc_login_reg_swither_holder").addClass('screg');
        $(".sc_login_reg_swither_holder").removeClass('sclogin');
	}
	});
	
	jQuery("#sc_studi_active_login").click(function(){
		$("#myonoffswitch" ).prop( "checked", true );
		$("#sc_studi_main_login").slideDown();
        $("#sc_studi_main_register").slideUp();
		$(".sc_login_reg_swither_holder").addClass('sclogin');
        $(".sc_login_reg_swither_holder").removeClass('screg');
	});
	jQuery("#sc_studi_active_register").click(function(){
		$("#myonoffswitch" ).prop( "checked", false );
		$("#sc_studi_main_login").slideUp();
        $("#sc_studi_main_register").slideDown();
		$(".sc_login_reg_swither_holder").addClass('screg');
        $(".sc_login_reg_swither_holder").removeClass('sclogin');
	});
});

</script>

<!-- new template by suncode -->
<style>

a.scls_btn {position: relative; display: inline-block;background: #f3f3f3; padding: 5px 10px; border-radius: 3px; margin: 0 5px; color: #919191;border: 1px solid transparent; min-width: 120px; text-align: center;}
a.scls_btn.scls_active { border: 1px solid var(--primary_color); background: var(--primary_color); color: #fff; }
.sclogin_switch { text-align: center; }


input#rememberme {
    outline: none;
}
.site-logo {
    text-align: center;
    padding-top: 14px;
}
.sc_user_login_page:before{display:none;}
.sc_user_login_page{margin:0;padding: 0px;background:transparent;}
.main-page-content {
    padding: 0 !important;
    min-height: 100vh;
}
.sc_login_reg_swither_holder {
    display: flex;
    justify-content: center;
    align-items: center;
	padding: 15px 0;
	padding: 0 0;
	background: white;
    border-radius: 10px;
    box-shadow: 0 0 10px gainsboro;
    margin: 0 auto 30px;
    max-width: 440px;
    transform: translateY(20px);
	overflow: hidden;
    position: relative;
}
.sc_login_reg_swither_holder h2 a {
    display: block;
    width: 100%;
	text-align:center;
}
.sc_login_reg_swither_holder:before {
	transform:scale(0);
	transition:.4s;	
	content: "";
    position: absolute;
    right: -160px;
    top: -39px;
    height: 100px;
    width: 250px;
    background: #4caf50;
    border-radius: 100px;
    z-index: -1;
}
body.rtl .sc_login_reg_swither_holder:before {
    left:-160px;
    right:auto
    
}
.sc_login_reg_swither_holder.screg:before {
    right: -80px;
	transform:scale(1);
	transition:.4s;
}
body.rtl .sc_login_reg_swither_holder.screg:before {
   left: -80px;
   right: auto
}

.sc_login_reg_swither_holder:after {
	transform:scale(0);
	transition:.4s;	
	content: "";
    position: absolute;
    left: -160px;
    top: -39px;
    height: 100px;
    width: 250px;
    background: #42A5F5;
    border-radius: 100px;
    z-index: -1;
}
body.rtl .sc_login_reg_swither_holder:after {
    right: -160px;
    left: auto
    
}
.sc_login_reg_swither_holder.sclogin:after {
    left: -100px;
	transform:scale(1);
	transition:.4s;
}
body.rtl .sc_login_reg_swither_holder.sclogin:after {
    right: -100px;
    left: auto
}
.sc_login_reg_swither_holder.screg a#sc_studi_active_register,.sc_login_reg_swither_holder.sclogin a#sc_studi_active_login {
    color: white;
}
.sc_login_reg_swither_holder h2 {
    padding: 10px;
    font-size: 20px;
    font-weight: 400;
    margin-bottom: 5px;
    width: 33%;
}
.woocommerce-form input:not([type="checkbox"]) {
    background: white;
    border: 0px solid #a6e3dd !important;
}
input#rememberme:focus {
    outline-color: transparent;
}
.sc_studiare_login_register_holder {
  overflow: hidden;
  background-color: white;
  padding: 40px 30px 30px 30px;
  border-radius: 10px;
  position: sticky;
  /*top: 50%;
  left: 50%;
  width: 400px;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);*/
  -webkit-transition: -webkit-transform 300ms, box-shadow 300ms;
  -moz-transition: -moz-transform 300ms, box-shadow 300ms;
  transition: transform 300ms, box-shadow 300ms;
  box-shadow: 5px 10px 10px rgba(2, 128, 1, 0.2);
  box-shadow: 0px 0px 23px rgba(116, 116, 116, 0.21);
  max-width: 440px;
  margin: 10px auto;
}
.sc_studiare_login_register_holder::before, .sc_studiare_login_register_holder::after {
  content: '';
  position: absolute;
  width: 600px;
  height: 600px;
  border-top-left-radius: 40%;
  border-top-right-radius: 45%;
  border-bottom-left-radius: 35%;
  border-bottom-right-radius: 40%;
  z-index: -1;
}
.sc_studiare_login_register_holder::before {
  right: 40%;
  top: -70%;
  background-color: rgba(69, 105, 144, 0.15);
  background-color: <?php echo studi_hex2rgba($main_color,.3); ?>;
  -webkit-animation: wawes 6s infinite linear;
  -moz-animation: wawes 6s infinite linear;
  animation: wawes 6s infinite linear;
}

.sc_studiare_login_register_holder::after {
  right: 35%;
  top: -60%;
  background-color: rgba(2, 128, 1, 0.2);
  background-color: <?php echo studi_hex2rgba($main_color,.4); ?>;
  -webkit-animation: wawes 7s infinite;
  -moz-animation: wawes 7s infinite;
  animation: wawes 7s infinite;
}
.sc_studiare_login_register_holder > input {
  display: block;
  border-radius: 5px;
  font-size: 16px;
  background: white;
  width: 100%;
  border: 0;
  padding: 10px 10px;
  margin: 15px -10px;
}
.sc_studiare_login_register_holder > button {
  cursor: pointer;
  color: #fff;
  font-size: 16px;
  text-transform: uppercase;
  width: 80px;
  border: 0;
  padding: 10px 0;
  margin-top: 10px;
  margin-left: -5px;
  border-radius: 5px;
  background-color: #ee1515;
  -webkit-transition: background-color 300ms;
  -moz-transition: background-color 300ms;
  transition: background-color 300ms;
}
.sc_studiare_login_register_holder > button:hover {
  background-color: #da1010;
}

@-webkit-keyframes wawes {
  from {
    -webkit-transform: rotate(0);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}
@-moz-keyframes wawes {
  from {
    -moz-transform: rotate(0);
  }
  to {
    -moz-transform: rotate(360deg);
  }
}
@keyframes wawes {
  from {
    -webkit-transform: rotate(0);
    -moz-transform: rotate(0);
    -ms-transform: rotate(0);
    -o-transform: rotate(0);
    transform: rotate(0);
  }
  to {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


/* toggle switch */

.onoffswitch {
    position: relative; width: 97px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
	width:33%;opacity: 0;
}
.onoffswitch-checkbox {
    display: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    height: 25px; padding: 0; line-height: 54px;
    border: 0px solid #FFFFFF; border-radius: 40px;
    background-color: #9E9E9E;
    background-color: #4CAF50;
}
.onoffswitch-label:before {
    content: "";
    display: block; width: 40px; margin: 7px;
    background: #FFFFFF;
    position: absolute; top: 0; bottom: 0;
    right: 39px;
    border-radius: 40px;
    box-shadow: 0 6px 12px 0px #757575;
}
.onoffswitch-checkbox:checked + .onoffswitch-label {
    background-color: #42A5F5;
}
.onoffswitch-checkbox:checked + .onoffswitch-label, .onoffswitch-checkbox:checked + .onoffswitch-label:before {
   border-color: #42A5F5;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label:before {
    right: 0px; 
    background-color: #FAFDFF; 
    box-shadow: 3px 6px 18px 0px rgba(0, 0, 0, 0.2);
}
label.onoffswitch-label {
    display: block;
	margin: 0;
}
</style>