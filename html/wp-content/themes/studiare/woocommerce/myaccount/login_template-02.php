<?php
$otp_situ = "0";
if ( class_exists( 'Redux') ) {
	 //since v12.9 adding otp
	 $otp_situ = codebean_option('otp');
}
//do_action( 'woocommerce_before_customer_login_form' ); 

 //if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<?php 
$custom_logo_image = get_theme_file_uri('assets/images/logo_default.svg');
if ( class_exists( 'Redux') ) {
	$logo_uploaded = codebean_option('custom_logo_image');
	if(isset($logo_uploaded['url']) && $logo_uploaded['url'] != '') {
		$custom_logo_image = $logo_uploaded['url'];
	}

}
$showLogo = codebean_option("show_logo_in_login");

//https://codepen.io/andytran/pen/RPBdgM
?>

<?php if($showLogo==1){ ?>
<div class="studitoplogin site-logo">
                    <div class="studiare-logo-wrap">
                        <a href="<?php echo esc_url( home_url('/') ); ?>" class="studiare-logo studiare-main-logo" rel="home">
                            <img  src="<?php echo esc_url( $custom_logo_image ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    </div>
</div>
<?php } ?>

<div class="studiaccount container">
<div class="card"></div>
<div class="card">
<h1 class="title"><?php esc_attr_e( 'Log in', 'woocommerce' ); ?></h1>
<?php 
if($otp_situ == "1"){
                $lwe = __('With Email','studiare');
                $lwm = __('With Mobile','studiare');
                echo "<form class='mb-30 sclogin_switch'><a data-divtoinactive='otp_login_frm' data-divtoactive='default_login_frm' class='scls_btn scls_active' href='#'><i class='fal fa-envelope'></i> $lwe</a><a data-divtoinactive='default_login_frm' data-divtoactive='otp_login_frm' class='scls_btn' href='#'><i class='fal fa-mobile'></i> $lwm</a></form>";
            }
            //adding otp to login page
            echo "<div id='otp_login_frm' class='input-container' style='display:none;'>";
            echo do_shortcode("[suncode_otp_login_form]");
            echo "</div>";
            
?>
<form id="default_login_frm" class="woocommerce-form woocommerce-form-login login" method="post">
    
<div class="input-container">
	<?php do_action( 'woocommerce_login_form_start' ); ?>    
<input type="text" id="username" name="username" required="required" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" >
<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?> </label>
<div class="bar"></div>
</div>
<div class="input-container">
<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" id="password" name="password" required="required" autocomplete="current-password">
<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?></label>
<div class="bar"></div>
</div>
<div class="button-container">
	<?php do_action( 'woocommerce_login_form' ); ?>
    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"  /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
    <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
<button type="submit" class="sc_tmp2_login" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><span><?php esc_html_e( 'Log in', 'woocommerce' ); ?></span></button>
</div>
<div class="footer">	<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a></div>
	<?php do_action( 'woocommerce_login_form_end' ); ?>
</form>


</div>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
<div class="card alt">
<div class="toggle"></div>
<h1 class="title"> <?php esc_attr_e( 'Register', 'woocommerce' ); ?>
<div class="close"></div>
</h1>
<?php
            if($otp_situ == "1"){
                $lwe = __('With Email','studiare');
                $lwm = __('With Mobile','studiare');
                echo "<form class='mb-30 sclogin_switch'><a data-divtoinactive='otp_register_frm' data-divtoactive='default_register_frm' class='scls_btn scls_active' href='#'><i class='fal fa-envelope'></i> $lwe</a><a data-divtoinactive='default_register_frm' data-divtoactive='otp_register_frm' class='scls_btn' href='#'><i class='fal fa-mobile'></i> $lwm</a></form>";
            }
            //adding otp to registeration page
            echo "<div id='otp_register_frm' class='input-container' style='display:none;'>";
            echo do_shortcode("[suncode_otp_registration_form]");
            echo "</div>"; 
            ?> 
<form id="default_register_frm" method="post" <?php do_action( 'woocommerce_register_form_tag' ); ?>>
    	<?php do_action( 'woocommerce_register_form_start' ); ?>
<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>    	
<div class="input-container">
<input type="text" name="username" id="reg_username" required="required" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>">
<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?></label>
<div class="bar"></div>
</div>
<?php endif; ?>

<div class="input-container">
<input type="email" name="email" id="reg_email" required="required" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>">
<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?></label>
<div class="bar"></div>
</div>

<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
<div class="input-container">
<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="reg_password" required="required" autocomplete="new-password">
<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?></label>
<div class="bar"></div>
</div>
<?php else : ?>
<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>
<?php endif; ?>
<div class="input-container">
<?php do_action( 'woocommerce_register_form' ); ?>
</div>
<div class="button-container">
    <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
<button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><span><?php esc_html_e( 'Register', 'woocommerce' ); ?></span></button>
</div>
	<?php do_action( 'woocommerce_register_form_end' ); ?>
</form>
</div>
<?php endif; ?>

</div>
<?php //do_action( 'woocommerce_after_customer_login_form' ); ?>

<script>
jQuery(document).ready(function($){
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
a.scls_btn.scls_active { border: 1px solid var(--primary_color); background: var(--primary_color); color: #fff; }
.sclogin_switch { text-align: center; }
#otp_login_frm.input-container label,#otp-registration-form label{ position: relative; }
.rtl input#otp_phone::placeholder,.rtl input#otp_reg_phone::placeholder { font-size: 14px;text-align:right; }
input#otp_phone, input#otp_reg_phone,input#otp_back{text-align:left;}
input#otp_reg_phone,#otp_reg { background: #fff; }

button.sc_tmp2_login {
    margin-top: 20px;
}

input#rememberme {
    outline: none;
}
.studitoplogin.site-logo {
    text-align: center;
   padding: 0 0 30px;
}
.woocommerce-privacy-policy-text {
    color: white;
}
html {
  background: #e9e9e9 !imoprtant;
    
}
body {
  background: #e9e9e9;
  color: #666666;
  font-size: 14px;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

/* Pen Title */
.pen-title {
  padding: 50px 0;
  text-align: center;
  letter-spacing: 2px;
}
.pen-title h1 {
  margin: 0 0 20px;
  font-size: 48px;
  font-weight: 300;
}
.pen-title span {
  font-size: 12px;
}
.pen-title span .fa {
  color: #ed2553;
}
.pen-title span a {
  color: #ed2553;
  font-weight: 600;
  text-decoration: none;
}

/* Rerun */
.rerun {
  margin: 0 0 30px;
  text-align: center;
}
.rerun a {
  cursor: pointer;
  display: inline-block;
  background: #ed2553;
  border-radius: 3px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  padding: 10px 20px;
  color: #ffffff;
  text-decoration: none;
  -webkit-transition: 0.3s ease;
  transition: 0.3s ease;
}
.rerun a:hover {
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}

/* Scroll To Bottom */
#codepen, #portfolio {
  position: fixed;
  bottom: 30px;
  right: 30px;
  background: #363636;
  width: 56px;
  height: 56px;
  border-radius: 100%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  -webkit-transition: 0.3s ease;
  transition: 0.3s ease;
  color: #ffffff;
  text-align: center;
}
#codepen i, #portfolio i {
  line-height: 56px;
}
#codepen:hover, #portfolio:hover {
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
}

/* CodePen */
#portfolio {
  bottom: 96px;
  right: 36px;
  background: #ed2553;
  width: 44px;
  height: 44px;
  -webkit-animation: buttonFadeInUp 1s ease;
  animation: buttonFadeInUp 1s ease;
}
#portfolio i {
  line-height: 44px;
}

/* Container */
.studiaccount.container {
  position: relative;
  max-width: 460px;
  width: 100%;
  margin: 0 auto 100px;
}
.studiaccount.container.active .card:first-child {
  background: #f2f2f2;
  margin: 0 15px;
}
.studiaccount.container.active .card:nth-child(2) {
  background: #fafafa;
  margin: 0 10px;
}
.studiaccount.container.active .card.alt {
  top: 20px;
  right: 0;
  width: 100%;
  min-width: 100%;
  height: auto;
  border-radius: 5px;
  padding: 60px 0 40px;
  overflow: hidden;
}
.card.alt form {
    transform: scale(0);
}
.studiaccount.container.active .card.alt form{
     transform: scale(1);
}
.studiaccount.container.active .card.alt .toggle {
  position: absolute;
  top: 40px;
  right: -70px;
  box-shadow: none;
  -webkit-transform: scale(20);
  transform: scale(20);
  -webkit-transition: -webkit-transform .3s ease;
  transition: -webkit-transform .3s ease;
  transition: transform .3s ease;
  transition: transform .3s ease, -webkit-transform .3s ease;
}
.studiaccount.container.active .card.alt .toggle:before {
  content: '';
}
.studiaccount.container.active .card.alt .title,
.studiaccount.container.active .card.alt .input-container,
.studiaccount.container.active .card.alt .button-container {
  left: 0;
  opacity: 1;
  visibility: visible;
  -webkit-transition: .3s ease;
  transition: .3s ease;
}
.container.active .card.alt .title {
  -webkit-transition-delay: .3s;
          transition-delay: .3s;
}
.container.active .card.alt .input-container {
  -webkit-transition-delay: .4s;
          transition-delay: .4s;
}
.container.active .card.alt .input-container:nth-child(2) {
  -webkit-transition-delay: .5s;
          transition-delay: .5s;
}
.container.active .card.alt .input-container:nth-child(3) {
  -webkit-transition-delay: .6s;
          transition-delay: .6s;
}
.container.active .card.alt .button-container {
  -webkit-transition-delay: .7s;
          transition-delay: .7s;
}

/* Card */
.card {
  position: relative;
  background: #ffffff;
  border-radius: 5px;
  padding: 60px 0 40px 0;
  box-sizing: border-box;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  -webkit-transition: .3s ease;
  transition: .3s ease;
  /* Title */
  /* Inputs */
  /* Button */
  /* Footer */
  /* Alt Card */
}
.card:first-child {
  background: #fafafa;
  height: 10px;
  border-radius: 5px 5px 0 0;
  margin: 0 10px;
  padding: 0;
}
.card .title {
  position: relative;
  z-index: 1;
  border-left: 5px solid <?php echo $main_color; //#ed2553 ?>;
  margin: 0 0 35px;
  padding: 10px 0 10px 50px;
  color: <?php echo $main_color; //#ed2553 ?>;
  font-size: 32px;
  font-weight: 600;
  text-transform: uppercase;
  text-align:center;
}
.card .input-container {
  position: relative;
  margin: 0 60px 30px;
}
.card .input-container input {
  outline: none;
  z-index: 1;
  position: relative;
  background: none;
  width: 100%;
  height: 60px;
  border: 0;
  color: #212121;
  font-size: 24px;
  font-weight: 400;
}
.card .input-container input:focus ~ label {
  color: #9d9d9d;
  -webkit-transform: translate(-12%, -50%) scale(0.75);
          transform: translate(-12%, -50%) scale(0.75);
}
.card .input-container input:focus ~ .bar:before, .card .input-container input:focus ~ .bar:after {
  width: 50%;
}
.card .input-container input:valid ~ label {
  color: #9d9d9d;
  -webkit-transform: translate(-12%, -50%) scale(0.75);
          transform: translate(-12%, -50%) scale(0.75);
}
.card .input-container label {
  position: absolute;
  top: 0;
  right: 0;
  color: #757575;
  font-size: 16px;
  font-weight: 300;
  line-height: 60px;
  -webkit-transition: 0.2s ease;
  transition: 0.2s ease;
}
.card .input-container .bar {
  position: absolute;
  left: 0;
  bottom: 0;
  background: #757575;
  width: 100%;
  height: 1px;
}
.card .input-container .bar:before, .card .input-container .bar:after {
  content: '';
  position: absolute;
  background: <?php echo $main_color; //#ed2553 ?>;
  width: 0;
  height: 2px;
  -webkit-transition: .2s ease;
  transition: .2s ease;
}
.card .input-container .bar:before {
  left: 50%;
}
.card .input-container .bar:after {
  right: 50%;
}
.card .button-container {
  margin: 0 60px;
  text-align: center;
}
.card .button-container button {
  outline: 0;
  cursor: pointer;
  position: relative;
  display: inline-block;
  background: 0;
  width: 240px;
  border: 2px solid #e3e3e3;
  padding: 20px 0;
  font-size: 24px;
  font-weight: 600;
  line-height: 1;
  text-transform: uppercase;
  overflow: hidden;
  -webkit-transition: .3s ease;
  transition: .3s ease;
}
.card .button-container button span {
  position: relative;
  z-index: 1;
  color: #ddd;
  -webkit-transition: .3s ease;
  transition: .3s ease;
}
.card .button-container button:before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  display: block;
  background: <?php echo $main_color; //#ed2553 ?>;
  width: 30px;
  height: 30px;
  border-radius: 100%;
  margin: -15px 0 0 -15px;
  opacity: 0;
  -webkit-transition: .3s ease;
  transition: .3s ease;
}
.card .button-container button:hover, .card .button-container button:active, .card .button-container button:focus {
  border-color: <?php echo $main_color; //#ed2553 ?>;
}
.card .button-container button:hover span, .card .button-container button:active span, .card .button-container button:focus span {
  color: <?php echo $main_color; //#ed2553 ?>;
}
.card .button-container button:active span, .card .button-container button:focus span {
  color: #ffffff;
}
.card .button-container button:active:before, .card .button-container button:focus:before {
  opacity: 1;
  -webkit-transform: scale(10);
  transform: scale(10);
}
.card .footer {
  margin: 20px 0 0;
  color: #d3d3d3;
  font-size: 24px;
  font-weight: 300;
  text-align: center;
}
.card .footer a {
  color: inherit;
  text-decoration: none;
  -webkit-transition: .3s ease;
  transition: .3s ease;
  font-size:14px;
}
.card .footer a:hover {
  color: #bababa;
}
.card.alt {
  position: absolute;
  top: 40px;
  right: -70px;
  z-index: 10;
  width: 140px;
  height: 140px;
  background: none;
  border-radius: 100%;
  box-shadow: none;
  padding: 0;
  -webkit-transition: .3s ease;
  transition: .3s ease;
  /* Toggle */
  /* Title */
  /* Input */
  /* Button */
}
.card.alt .toggle {
  position: relative;
  background: <?php echo $main_color; //#ed2553 ?> ;
  width: 140px;
  height: 140px;
  border-radius: 100%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  color: #ffffff;
  font-size: 58px;
  line-height: 140px;
  text-align: center;
  cursor: pointer;
 
}
.card.alt .toggle:before {
  content: '\f040';
    display: inline-block;
    /* font: normal normal normal 74px/1 "Font Awesome 5 Pro"; */
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    -webkit-transform: translate(0, -10px);
    transform: translate(0, 10px);
    content: "<?php esc_attr_e( 'Register', 'woocommerce' ); ?>";
    font-size: 24px;
}
.card.alt .toggle:after {
    content: "\f234";
    position: absolute;
    top: -24px;
    right: 41px;
    font-size: 36px;
    font-family: "Font Awesome 5 Pro";
}

@media screen and (max-width:425px){
    .card.alt {
    top: -20px;
    right: 0px;}
    .card.alt .toggle {
    position: relative;
    background: <?php echo $main_color; //#ed2553 ?>;
    width: 100px;
    height: 100px;}
    .card.alt .toggle:before {
    -webkit-transform: translate(0, -30px);
    transform: translate(0, -15px);
    }
    .card.alt .toggle:after {
    top: -37px;
    right: 31px;
    font-size: 24px;
    }
    .card.alt .toggle:before{
        font-size:19px;
    }
    .card .input-container {
    position: relative;
    margin: 0 30px 30px;
}
.card.alt .title .close {
   
    right: 30px !important;}
}
.card.alt .title,
.card.alt .input-container,
.card.alt .button-container {
  left: 100px;
  opacity: 0;
  visibility: hidden;
}
.card.alt .title {
  position: relative;
  border-color: #ffffff;
  color: #ffffff;
}
.card.alt .title .close {
  cursor: pointer;
  position: absolute;
  top: 0;
  right: 60px;
  display: inline;
  color: #ffffff;
  font-size: 58px;
  font-weight: 400;
}
.card.alt .title .close:before {
  content: '\00d7';
}
.card.alt .input-container input {
  color: #ffffff;
}
.card.alt .input-container input:focus ~ label {
  color: #ffffff;
}
.card.alt .input-container input:focus ~ .bar:before, .card.alt .input-container input:focus ~ .bar:after {
  background: #ffffff;
}
.card.alt .input-container input:valid ~ label {
  color: #ffffff;
}
.card.alt .input-container label {
  color: rgba(255, 255, 255, 0.8);
}
.card.alt .input-container .bar {
  background: rgba(255, 255, 255, 0.8);
}
.card.alt .button-container button {
  width: 100%;
  background: #ffffff;
  border-color: #ffffff;
}
.card.alt .button-container button span {
  color: <?php echo $main_color; //#ed2553 ?>;
}
.card.alt .button-container button:hover {
  background: rgba(255, 255, 255, 0.9);
}
.card.alt .button-container button:active:before, .card.alt .button-container button:focus:before {
  display: none;
}

/* Keyframes */
@-webkit-keyframes buttonFadeInUp {
  0% {
    bottom: 30px;
    opacity: 0;
  }
}
@keyframes buttonFadeInUp {
  0% {
    bottom: 30px;
    opacity: 0;
  }
}


input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px #ffffff inset !important;
    z-index: 0 !important;
    text-align: left;
}
</style>