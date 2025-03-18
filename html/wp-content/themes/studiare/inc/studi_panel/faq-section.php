<h2 class="studiare-headline"><?php _e( 'Frequently Asked Questions', 'studiare' ); ?></h2>
<script>
    // Accordion
    jQuery(document).ready(function($){
        var accordion = $('.studiare_panel_holder #accordion');
        var items = accordion.find('.accordionItem');
        var contents = accordion.find('.accordionItem_content');

        var toggle = function (num) {
            var opened = accordion.find('.visible');
            var content = accordion.find('.accordionItem_content').eq(num);

            if (!items.eq(num).hasClass('active')) {
                items.removeClass('active').eq(num).addClass('active');

                setTimeout(function () {
                    content.css('height', '').addClass('no-transition visible');
                    let height = content.outerHeight() + 'px';
                    content.removeClass('no-transition visible').css('height', '0px');

                    setTimeout(function () {
                        opened.removeClass('visible no-transition').css('height', '0px');
                        content.addClass('visible').css('height', height);

                        accordion.find('.accordionItem_title .accordionItem_control i').removeClass('fal fa-minus').addClass('fal fa-plus');
                        accordion.find('.accordionItem_title').eq(num).find('.accordionItem_control i').removeClass('fal fa-plus').addClass('fal fa-minus');
                    }, 30);
                }, 30);
            } else {
                items.eq(num).removeClass('active');
                items.eq(num).find('.accordionItem_content.visible').removeClass('visible').css('height', '0px');
                items.eq(num).find('.accordionItem_title .accordionItem_control i').removeClass('fal fa-minus').addClass('fal fa-plus');
            }
        };

        accordion.find('.accordionItem_title').each(function (i) {
            $(this).on('click', function () { toggle(i); });
        });

        contents.attr('style', 'height:0;overflow:hidden');
    });
</script>
<style>
    .studiare-accordion .accordionItem_title { text-align: left; -webkit-box-pack: justify; -webkit-justify-content: space-between; -ms-flex-pack: justify; justify-content: space-between; padding: 12px 15px; display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-box-align: center; -ms-flex-align: center; -webkit-align-items: center; align-items: center; border-radius: 0.25rem; -webkit-transition: all cubic-bezier(0.645, 0.045, 0.355, 1) 0.35s; -o-transition: all cubic-bezier(0.645, 0.045, 0.355, 1) 0.35s; transition: all cubic-bezier(0.645, 0.045, 0.355, 1) 0.35s; }
    .accordionItem { margin-bottom: 15px; }
    .studiare-accordion .accordionItem_title:hover, .studiare-accordion .accordionItem.active { background-color: rgba(255, 255, 255, 0.5); }
    .accordionItem_content { padding: 0 15px 0px 15px; transition: 0.3s; }
    .accordionItem.studipnl_content.active .accordionItem_content {  border-top: 1px solid rgba(129, 122, 144, 0.15); transition: 0.3s; }
    .studiare-accordion .accordionItem_title h6 { font-size: 15px; margin: 0; }
    .studiare-accordion .accordionItem_title:hover { cursor: pointer; }
    .studiare-accordion li { list-style: inside; }
    .accordionItem.studipnl_content { padding: 8px; margin: 0 0 8px 0; }
</style>
<div class="studiare-accordion-sс accordion studiare-accordion" id="accordion">

	
	<!-- Accordion item -->
	<div class="accordionItem studipnl_content">
		<div class="accordionItem_title">
			<h6>
			صفحه اصلی سایت را چگونه تغییر دهم؟
			</h6>
			<div class="accordionItem_control btn-round btn-round-small btn-round-light">
				<i class="fal fa-plus"></i>
			</div>
		</div>
		<div class="accordionItem_content ">
			<div class="wrap">
				<div class="studiare-text-sc " id="studiare-custom-5f51fb2c4bc24">
					<ul>
						<li>
							<strong class="color-admin">
							    دقت داشته باشید ابتدا باید به روش بسته نصبی یا درون ریزی دستی دموها را نصب یا درون ریزی نموده باشید.
							</strong>
						</li>
						<li>
							<strong class="color-admin">
					            از پیشخوان>تنظیمات>خواندن، دموی دلخواه را به عنوان صفحه اصلی سایت انتخاب نمایید.
							</strong>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Accordion item -->
	<div class="accordionItem studipnl_content">
		<div class="accordionItem_title">
			<h6>چگونه با قالب استادیار کار کنم؟</h6>
			<div class="accordionItem_control btn-round btn-round-small btn-round-light">
				<i class="fal fa-plus"></i>
			</div>
		</div>
		<div class="accordionItem_content ">
			<div class="wrap">
				<div class="studiare-text-sc " id="studiare-custom-5f51fb2c4be31">
					<p>
					برای کار با قالب استادیار ابتدا باید موارد زیر آشنایی داشته باشید:
					</p>
					<ul>
						<li>
							<strong class="color-admin">
							وردپرس و موارد پیشفرض آن مثل نوشته، برگه، منو، ابزارک و ...
							</strong>
						</li>
						<li>
							<strong>
							آشنایی با افزونه های ووکامرس و المنتور
							</strong>
					</ul>
					<p>
					سپس برای کار با قالب، 
					</p>
					<ul>
						<li>
							<strong class="color-admin">
							به مستندات قالب مراجعه نمایید
								<a href="https://docs.studiaretheme.ir/" target="_blank">←</a> 
							</strong>
						</li>
						<li>
							<strong class="color-admin">
						یا فایل PDF راهنمای قالب را از پیشخوان راستچین > محصولات خریداری شده> قالب استادیار > دانلود > فایل راهنما، دانلود نمایید.
								<a href="https://www.rtl-theme.com/dashboard/#/download/82556/education" target="_blank">↓</a> 
							</strong>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <!-- Accordion item -->
	<div class="accordionItem studipnl_content">
		<div class="accordionItem_title">
			<h6>
			تغییراتی که در المنتور انجام داده ام در سایت نمایش داده نمی شود و یا ناقص است.
			</h6>
			<div class="accordionItem_control btn-round btn-round-small btn-round-light">
				<i class="fal fa-plus"></i>
			</div>
		</div>
		<div class="accordionItem_content ">
			<div class="wrap">
				<div class="studiare-text-sc " id="studiare-custom-5f51fb2c4c07e">
					<ul>
					    <p>
							<strong class="color-admin"> 
								🎆 اگر از افزونه های بهینه سازی استفاده می کنید، کش این افزونه ها را خالی کنید.
							</strong>
						</p>
						<p>
							<strong class="color-admin"> 
								✅یکی از قابلیت هایی که قالب استادیار دارد، حذف نسخه از فایل های استایل به منظور کش قوی تر است که علاوه بر افزایش سرعت وبسایت باعث فشار کمتر به هاست می شود.
							</strong>
						</p>
						<p>
							<strong class="color-admin"> 
								⭕ در زمانی که با این مشکل مواجه هستید، کش سخت مرورگر را خالی کنید تا نتیجه را مشاهده نمایید.
							</strong>
						</p>
						<p>
							<strong class="color-admin"> 
								🔴 توجه: کش سخت مرورگر با فشردن همزمان کلیدهای Ctrl+Shift+R خالی می شود.
							</strong>
						</p>
						<p>
							<strong class="color-admin"> 
								🟢همچنین می توانید از تنظیمات قالب>پیشرفته>حذف نسخه از فایل های سی اس اس و جاوا اسکریپت را غیرفعال نمایید تا کش سخت برای شما انجام نشود.
							</strong>
						</p>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Accordion item -->
	<div class="accordionItem studipnl_content">
		<div class="accordionItem_title">
			<h6>
			ارور «یک خطای مهم در این وب سایت رخ داده است»
			</h6>
			<div class="accordionItem_control btn-round btn-round-small btn-round-light">
				<i class="fal fa-plus"></i>
			</div>
		</div>
		<div class="accordionItem_content ">
			<div class="wrap">
				<div class="studiare-text-sc " id="studiare-custom-5f51fb2c4bf42">
				    <ul>
						<li>
							<strong class="color-admin">
								مطمئن شوید که قالب و افزونه ها و وردپرس به درستی به آخرین نسخه بروزرسانی شده باشد.
							</strong>
						</li>
						<li>
							<strong class="color-admin">
								افزونه هایی که نصب کردید یک به یک غیرفعال کنید ببینید با غیرفعال کردن کدام افزونه مشکل حل می شود؟
							</strong>
						</li>
						<li>
							<strong class="color-admin">
								اگر موارد فوق به نتیجه نرسید حالت دیباگ وردپرس را فعال کنید و ببینید چه خطایی رخ داده است.
							</strong>
						</li>
						<li>
							<strong class="color-admin">
                                اگر با موارد فوق به نتیجه نرسیدید، آموزش زیر را مشاهده بفرمایید:
								<a href="https://academy.rtl-theme.com/course/free-wordpress-troubleshooting-tutorial" target="_blank">آموزش عیب یابی</a> 
                            </strong>
						</li>
					</ul>
				
				</div>
			</div>
		</div>
	</div>

	<!-- Accordion item -->
	<div class="accordionItem studipnl_content">
		<div class="accordionItem_title">
			<h6>
			آیا تغییراتی که داده ام با بروزرسانی قالب از بین می رود؟
			</h6>
			<div class="accordionItem_control btn-round btn-round-small btn-round-light">
				<i class="fal fa-plus"></i>
			</div>
		</div>
		<div class="accordionItem_content ">
			<div class="wrap">
				<div class="studiare-text-sc " id="studiare-custom-5f51fb2c4c2a1">
					<p>
					📢 بروزرسانی قالب و افزونه های آن، محتوای سایت شما را تغییر نمی دهد و با بروزرسانی تغییرات شما از بین نمی رود.
					</p>
				</div>
			</div>
		</div>
	</div>


	<!-- Accordion item -->
	<div class="accordionItem studipnl_content">
		<div class="accordionItem_title">
			<h6>
			چگونه قالب را بروزرسانی کنم؟
			</h6>
			<div class="accordionItem_control btn-round btn-round-small btn-round-light">
				<i class="fal fa-plus"></i>
			</div>
		</div>
		<div class="accordionItem_content ">
			<div class="wrap">
				<div class="studiare-text-sc " id="studiare-custom-5f51fb2c4c1ae">
					<ul>
						<li>
							<strong class="color-admin">
								ابتدا از سایت خود بکاپ بگیرید.
							</strong>
						</li>
						<li>
							<strong class="color-admin">
								از صفحه محصولات خریداری شده در راستچین > قالب استادیار، روی دکمه دانلود کلیک کنید.
							</strong>
						</li>
						<li>
							<strong class="color-admin">
								فایل های بروزرسان و راهنمای قالب را دانلود نمایید.
							</strong>
						</li>
						<li>
							<strong class="color-admin">
                                طبق فایل راهنما، قالب را بروزرسانی نمایید.
                            </strong>
						</li>
						<li>
							<strong class="color-admin">
                                طبق فایل راهنما، قالب را بروزرسانی نمایید.
                            </strong>
						</li>
						<li>
							<strong class="color-admin">
                                پس از بروزرسانی قالب از پیشخوان > پنل استادیار > نصب افزونه ها، افزونه های موردنیاز قالب را به آخرین نسخه بروزرسانی نمایید.
                            </strong>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	
	<!-- Accordion item -->
	<div class="accordionItem studipnl_content">
		<div class="accordionItem_title">
			<h6>
			چگونه سرعت سایت را افزایش دهم؟
			</h6>
			<div class="accordionItem_control btn-round btn-round-small btn-round-light">
				<i class="fal fa-plus"></i>
			</div>
		</div>
		<div class="accordionItem_content ">
			<div class="wrap">
				<div class="studiare-text-sc " id="studiare-custom-5f51fb2c4c392">
					<ul>
						<li>
							<strong class="color-admin">
								افزونه های غیرکاربردی را غیرفعال و حذف نمایید.
							</strong>
						</li>
						<li>
							<strong class="color-admin">
								موارد زیر را بررسی و اعمال نمایید:
								<a href="https://www.rtl-theme.com/speedup-dashboard" target="_blank">افزونه افزایش سرعت پیشخوان وردپرس برای هاست های ایرانی</a> و  
								<a href="https://www.rtl-theme.com/blog/fix-speed-wordpress-dashboard" target="_blank">رفع مشکل کندی پیشخوان وردپرس در هاست های ایرانی</a> 
							</strong>
						</li>
						<li>
							<strong class="color-admin">
								از افزونه های بهینه سازی سرعت مثل راکت یا دراگونایزر و ... استفاده نمایید.
							</strong>
						</li>
						<li>
							<strong class="color-admin">
                                تصاویر و فایل های موجود در صفحات وب سایت خود را بهینه سازی کنید:
                                <a href="https://www.rtl-theme.com/blog/best-image-optimization-plugin" target="_blank">آموزش بهینه سازی تصاویر</a> 
                            </strong>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Accordion item -->
	<div class="accordionItem studipnl_content">
		<div class="accordionItem_title">
			<h6>
			آیا باید لایسنس افزونه های المنتور پرو و رولوشن اسلایدر را خریداری کنم؟
			</h6>
			<div class="accordionItem_control btn-round btn-round-small btn-round-light">
				<i class="fal fa-plus"></i>
			</div>
		</div>
		<div class="accordionItem_content ">
			<div class="wrap">
				<div class="studiare-text-sc " id="studiare-custom-5f51fb2c4c485">
					<ul>
						<li>
							<strong class="color-admin">
								افزونه رولوشن اسلایدر برای ساخت اسلایدر در برخی دموها استفاده شده است و نسخه ای که در دسترس شما است نسخه رایگان است که امکانات اصلی افزونه را دارد و برای ویرایش محتوا و تغییرات قابل استفاده است اما امکانات بیشتر مثل استفاده از دموهای آماده و ... نیاز به خرید لایسنس از سایت هایی مثل راستچین دارد.
							</strong>
						</li>
						<li>
							<strong class="color-admin">
								افزونه المنتور پرو یک افزونه تجاری است و نسخه اورجینال افزونه به همراه قالب در اختیار شما قرار گرفته است که با هر بار بروزرسانی قالب بروزرسانی می شود، در صورت نیاز به پشتیبانی افزونه و دریافت بروزسانی های منظم آن باید لایسنس افزونه را از سایت هایی مثل راستچین خریداری نمایید.
							</strong>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</div>
