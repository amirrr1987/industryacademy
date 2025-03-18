<?php
/**
 * addig bottom menu to mobile
 *
 * date: 1402-05-29
 * author: javad pourshahabadi
 * */

add_action("wp_footer","sc_adding_btm_menu_for_mobile"); 

function sc_adding_btm_menu_for_mobile(){
    
    $show_on_mob = 1;
    $mobmore_page_id=null;
    
    $btm_account_link='';
    //sorter since version 12.9    
    $sort_items['enabled'] = array(
        "backtotop" =>  __('Back to top','studiare'),
        "home"      =>  __('Home','studiare'),
        "search"    =>  __('Search','studiare'),
        "account"   =>  __('Account','studiare'),
        "cart"      =>  __('Cart','studiare'),
        "more"      =>  __('More','studiare'),
        );
        
     if(class_exists('Redux')){
        $show_on_mob =codebean_option('show_mobile_bottom_navbar');
        $mobmore_page_id = codebean_option('mobile_more_menu');
        
        //sorter since version 12.9    
       $sort_items       =codebean_option('mobile-button-nav-blocks');
       $btm_account_link =codebean_option('btm_account_link');

    }
    $detect_mobile = new Mobile_Detect;
    if (!$detect_mobile->isMobile() || $show_on_mob==0) {return;}


     
    ?>
    
<style>


:root {
	 --bg-default: #222327;
	 --primary-white: #fff;
	 --primary-red: #ff3c41;
}
 
 .navigation {
      width: 100%;
      height: 70px;
      background: var(--primary-white);
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 15px 15px 0 0;
      padding: 0 20px;
      box-shadow: 0 0 35px #b7b7b7;
      margin: 0 auto;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 111000;


}
 .navigation .listWrap {
	 list-style: none;
	 display: flex;
	 justify-content: space-between;
	 width: 100%;
	 flex-direction: row-reverse;
	 margin: 0 20px 20px;
}
 .navigation .listWrap li {
	 width: 70px;
	 height: 70px;
	 position: relative;
	 z-index: 1;
}
 .navigation .listWrap li a {
	 text-decoration: none;
	 position: relative;
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 flex-direction: column;
	 text-align: center;
	 font-weight: 500;
	 width: 100%;
}
 .navigation .listWrap li a:hover {
	 text-decoration: none;
}
 .navigation .listWrap li a .icon {
    position: relative;
    display: block;
    line-height: 82px;
    text-align: center;
    transition: 0.5s;
    color: var(--bg-default);
    font-size: 22px;
}
 .navigation .listWrap li a .icon ion-icon {
	 font-size: 2.2rem;
}
 .navigation .listWrap li a .text {
	 position: absolute;
	 color: var(--bg-default);
	 font-weight: 400;
	 transition: 0.5s;
	 transform: translateY(20px);
	 opacity: 0;
	 z-index: 1;
	 font-size: 10px;
} 
 .navigation .listWrap li:active a .icon, .navigation .listWrap li.active a .icon {
	     transform: translateY(-8px);
}
 .navigation .listWrap li:active a .text, .navigation .listWrap li.active a .text {
	 opacity: 1;
	 transform: translateY(20px);
}
.navigation .listWrap li.indicator {
    position: absolute;
    width: 90px;
    height: 50px;
    top: 89%;
    left: -1000px;
    border-radius: 10px;
    transition: 0.3s;
    z-index: 0;
    background: #e1f5fe;
}

/*.navigation .listWrap li.indicator:after {
    content: '';
    background: radial-gradient(#f9f9f9,#cfcfcf);
    position: absolute;
    width: 60px;
    top: -62px;
    height: 40px;
    border-radius: 0 0 20px 20px;
    box-shadow: 0 0 0;
    transform: translateX(-15px);
    background:#E1F5FE;
    
}*/

.navigation .listWrap li.indicator:before {
    content: '';
    position: absolute;
    left: 24px;
    top: -50px;
    background: #E3F2FD;
    width: 24px;
    height: 24px;
    border-radius: 5px;
    transform: translateX(0px) rotate(249deg);
}
.navigation .listWrap li.indicator:after {
    content: '';
    background: radial-gradient(#f9f9f9,#cfcfcf);
    position: absolute;
    width: 20px;
    top: -41px;
    height: 20px;
    border-radius: 5px;
    box-shadow: 0 0 0;
    transform: translateX(-28px) rotate(45deg);
    background: #BBDEFB;
}

.mob_btm_searchbar {
    position: absolute;
    left: 10px;
    right: 10px;
    display: flex;
    align-items: center;
    background: #fff;
    padding: 10px;
    border-radius: 10px;
    top: 0;
    transform: translateY(0px) scale(0);
    opacity: 0;
    transition:.4s;
    box-shadow: 0 0px 20px #d5d5d5;
}
.mob_btm_searchbar.sea_active {
    transform: translateY(-60px) scale(1);
    opacity: 1;
    
}
.mob_btm_searchbar input {
    border: 0;
    background: #EEEEEE;
}
.mob_btm_searchbar a {
    background: var(--primary_color);
    padding: 5px;
    margin-right: 10px;
    border-radius: 5px;
    color: #fff;
}
.navigation .listWrap li.active a:before {
    content: '';
    position: absolute;
    left: 17px;
    top: 7px;
    height: 12px;
    width: 12px;
    background: #7ee10a;
    border-radius: 100px;
    border: 2px solid #ffffff;
    animation: scbtmpulse 1.5s linear infinite;

}
@keyframes scbtmpulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.2);
  }
  100% {
    transform: scale(1);
  }
}

.mobilemoresec {
    position: fixed;
    top: 100%;
    width: 100%;
    background: #fff;
    height: 100%;
    padding: 5px;
    border-radius: 0 0 0;
    transition:.4s;
    overflow: scroll;
    z-index:1000;
}
.mobilemoresec.moreactive {
    top: 0;
    box-shadow: 0 7px 10px #34343469;
}
.closemoreinmob {
    position: absolute;
    left: 10px;
    background: #ECEFF1;
    padding: 5px 10px;
    border-radius: 0 0 15px 15px;
    color: #263238;
    font-size: 21px;
    top: 0;
    z-index:2000;
}

.mobilemoresec a.swss_floting_ticket {
    position: relative;
    top: 0;
    right: 0;
    display: inline-block;
}
.mobilemoresec a.studi_custom_floating_btn {
    position: relative;display: inline-block;
}
.morecontenthol {
    margin-bottom: 20px;
}
li#scmore i {
    transform: translateY(-5px);
}
/** hide elements from mobile view when this menu activated **/
a#back-to-top { display: none; }
.studi_custom_floating_btn, a.swss_floting_ticket  { z-index: 110999; margin-bottom: 55px; }
    </style>
    
    <div class="navigation">
        <div class='mobilemoresec'>
            <span class='closemoreinmob'><i class='fal fa-times'></i></span>
            <?php
            
				  
            if(!empty($mobmore_page_id)){
                 $contentElementor = "";
        
                                    if (class_exists("\\Elementor\\Plugin")) {
        
                                        $pluginElementor = \Elementor\Plugin::instance();
                                        $contentElementor = $pluginElementor->frontend->get_builder_content($mobmore_page_id);
                                    }
                                    
                                    echo "<div class='morecontenthol'>$contentElementor</div>";
            }
            ?>
        </div>
        <div class='mob_btm_searchbar' style='display:nonem;'>
            <input id='scmobsearchval' type='text' placeholder='<?php echo __('Search','studiare'); ?>...'><a onclick="search_inmob()" href="javascript:void(0);"><?php echo __('Search','studiare'); ?></a>
        </div>
	<ul class="listWrap">
	    <?php
	    foreach($sort_items['enabled'] as $key=>$value){
	        switch($key) {
	            case 'backtotop':
	        ?>
		<li id='sctotop' class="list ">
			<a href="javascript:void(0);">
				<i class="icon fal fa-arrow-up"></i>
				<span class="text"><?php echo __('Back to top','studiare'); ?></span>
			</a>
		</li>
		<?php 
		        break; 
			    case 'home':
		?>
		
		<li id='schome' class="list">
			<a href="javascript:void(0);">
				<i class="icon fal fa-home"></i>
				<span class="text"><?php echo __('Home','studiare'); ?></span>
			</a>
		</li>
		<?php 
		        break; 
	            case 'search':

		?>
		<li id='scsearch' class="list">
			<a href="javascript:void(0);">
				<i class="icon fal fa-search"></i>
				<span class="text"><?php echo __('Search','studiare'); ?></span>
			</a>
		</li>
		<?php 
		        break; 
                case 'account':
		?>
		<?php 
		//check if woocommerce is active
		if ( class_exists( 'woocommerce' ) ) { 
		    
		    if(!empty($btm_account_link)){$acLink = $btm_account_link;}else{$acLink =get_permalink( wc_get_page_id( 'myaccount' ) );}
		?>
		
    		<li id='scuser' class="list" data-url='<?php echo $acLink; ?>'>
    			<a href="javascript:void(0);">
    				<i class="icon fal fa-user"></i>
    				<span class="text"><?php echo __('Account','studiare'); ?></span>
    			</a>
    		</li>
    		
    		<?php 
		        break; 
		}    
	            case 'cart':
	                if ( class_exists( 'woocommerce' ) ) { 
		?>
    		<li id='sccart' class="list" data-url='<?php echo get_permalink(wc_get_page_id( 'cart' )); ?>'>
    			<a href="javascript:void(0);">
    				<i class="icon fal fa-shopping-basket"></i>
    				<span class="text"><?php echo __('Cart','studiare'); ?></span>
    			</a>
    		</li>
    	<?php } ?>	
    	<?php 
		        break; 
	            case 'more':
	             if(!empty($mobmore_page_id)){
		?>
		<li id='scmore' class="list">
			<a href="javascript:void(0);">
				<i class="icon fal fa-ellipsis-v">
					<ion-icon name="settings-outline"></ion-icon>
				</i>
				<span class="text"><?php echo __('More','studiare'); ?></span>
			</a>
		</li>
		<?php } ?>
	<?php 
	            break;
	        }
	} 
	
	?>	
		<li id='scindicator' class="indicator"></li>
	</ul>
</div>
    
    <script>
        
        
          
        jQuery(document).ready(function() {
            
          jQuery('.closemoreinmob').click(function(){
               
              jQuery('.mobilemoresec').removeClass('moreactive');
          });
          
          
          
          var curUrl = window.location.href ;
          if(curUrl=='<?php echo get_site_url();?>/'){
              jQuery("#schome").addClass('active');
              jQuery("#schome").click();
              
          }
        <?php 
		
		if ( class_exists( 'woocommerce' ) ) { 
		?>
		if(curUrl=='<?php echo get_permalink( wc_get_page_id( 'myaccount' ) );?>'){
              jQuery("#scuser").addClass('active');
              jQuery("#scuser").click();
              
          }
          if(curUrl=='<?php echo get_permalink( wc_get_page_id( 'cart' ) );?>'){
              jQuery("#sccart").addClass('active');
              jQuery("#sccart").click();
              
          }
		<?php } ?>
		
		<?php if(is_search() && isset($_GET['s'])){ ?>
		
		        jQuery("#scsearch").addClass('active');
                jQuery("#scsearch").click();
                jQuery("#scsearch").click();
                
		<?php } ?>
          
        });
        function search_inmob(){
            
            var search_val = jQuery('#scmobsearchval').val();
            window.location="<?php echo get_site_url();?>/?s="+search_val;
        }
        
        const listItem = document.querySelectorAll('.list');

        function activateLink() {
        	listItem.forEach( item => {
        		item.classList.remove('active');
        	});
        	this.classList.add('active');
        }
        
        listItem.forEach( item => {
        	item.addEventListener('click', activateLink);
        	item.addEventListener('click', getPositionAtCenter);
        });
        
        
         function getPositionAtCenter() {
            
            var eid = this.id; 
            var delay_time = 500;

            var element = document.getElementById(eid);
            var offset = element.getBoundingClientRect().left;
            var width = element.offsetWidth;
            var centerX = offset - 10;
            
            var indicator = document.getElementById("scindicator");
            indicator.style.left = centerX+"px"; 
            
            
            if(eid=='scsearch'){
                
                jQuery('.mob_btm_searchbar').toggleClass('sea_active');
            }
            else{
                jQuery('.mob_btm_searchbar').removeClass('sea_active');
            }
            
            if(eid=='schome' && window.location.href !='<?php echo get_site_url();?>/'){
                
                setTimeout(function(){
                    window.location="<?php echo get_site_url();?>";
                },delay_time);
                
            }
            if(eid=='scuser' || eid=='sccart'){
                
                var url = jQuery(this).attr('data-url');
                if(window.location.href !=url){
                    setTimeout(function(){
                        window.location=url;
                    },delay_time);
                }
            }
            
            if(eid=='sctotop'){
                jQuery("#back-to-top").click();
            }
            if(eid=='scmore'){
                jQuery(".mobilemoresec").toggleClass('moreactive');
            }
          
         }

    </script>
    
    <?php
}