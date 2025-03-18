<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes. suncode old 3.9.0
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 9.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$login_template = codebean_option("login_page_template")?:"temp-01";
$main_color = codebean_option("login-page-main-color")?:"#ed2553";

if( isset($_GET['login_template']) && !empty($_GET['login_template']) ){
    $login_template = $_GET['login_template'];
}

do_action( 'woocommerce_before_customer_login_form' );

if($login_template=="temp-01"){include_once 'login_template-01.php';}
if($login_template=="temp-02"){include_once 'login_template-02.php';}
if($login_template=="temp-03"){include_once 'login_template-03.php';}

if($login_template=="default"){
$otp_situ = "0";
if ( class_exists( 'Redux') ) {
	 //since v12.9 adding otp
	 $otp_situ = codebean_option('otp');
}
 ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
<style>
    #customer_login { background: #fff; border-radius: 10px; box-shadow: 0 0 40px #d4d4d485; padding: 10px; }
</style>  
<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-1">

<?php endif; ?>

		<h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>
<?php 
if($otp_situ == "1"){
                $lwe = __('With Email','studiare');
                $lwm = __('With Mobile','studiare');
                echo "<div class='sclogin_switch'><a data-divtoinactive='otp_login_frm' data-divtoactive='default_login_frm' class='scls_btn scls_active' href='#'><i class='fal fa-envelope'></i> $lwe</a><a data-divtoinactive='default_login_frm' data-divtoactive='otp_login_frm' class='scls_btn' href='#'><i class='fal fa-mobile'></i> $lwm</a></div>";
            }
            //adding otp to login page
            echo "<div id='otp_login_frm' style='display:none;'>";
            echo do_shortcode("[suncode_otp_login_form]");
            echo "</div>";
            
?>
		<form id="default_login_frm" class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
			</p>
			<p class="woocommerce-LostPassword lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	</div>

	<div class="u-column2 col-2">

		<h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>
<?php
            if($otp_situ == "1"){
                $lwe = __('With Email','studiare');
                $lwm = __('With Mobile','studiare');
                echo "<div class='sclogin_switch'><a data-divtoinactive='otp_register_frm' data-divtoactive='default_register_frm' class='scls_btn scls_active' href='#'><i class='fal fa-envelope'></i> $lwe</a><a data-divtoinactive='default_register_frm' data-divtoactive='otp_register_frm' class='scls_btn' href='#'><i class='fal fa-mobile'></i> $lwm</a></div>";
            }
            //adding otp to registeration page
            echo "<div id='otp_register_frm' style='display:none;'>";
            echo do_shortcode("[suncode_otp_registration_form]");
            echo "</div>";
            ?> 
		<form id="default_register_frm" method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<style>
a.scls_btn {position: relative; display: inline-block;background: #f3f3f3; padding: 5px 10px; border-radius: 3px; margin: 0 5px; color: #919191;border: 1px solid transparent; min-width: 120px; text-align: center;}
a.scls_btn.scls_active { border: 1px solid var(--primary_color); color: var(--primary_color); background: transparent; }
.sclogin_switch { text-align: center; }
a.scls_btn.scls_active:after  { content: ""; position: absolute; background: var(--primary_color); width: 10px; height: 10px; border-radius: 20px; right: -5px; top: 14px; border: 2px solid #fff; }
a.scls_btn.scls_active:before { content: ""; position: absolute; background: var(--primary_color); width: 10px; height: 25px; border-radius: 20px; left: -6px; top: 7px; border: 2px solid #fff; }

</style>
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
</script>
<?php endif; ?>

<?php  ?>

<?php
}

do_action( 'woocommerce_after_customer_login_form' );
