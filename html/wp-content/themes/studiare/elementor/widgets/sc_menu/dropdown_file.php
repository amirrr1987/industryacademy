<?php
$sub_rnd_id = rand(200,5000);
$sub_rnd_id = "submn_id_".$sub_rnd_id;
?>
<style>
.studi_rl_with_sub .studi_rl_sub span { display: inline-block; }
.studi_rl_with_sub{position:relative;}
.studi_rl_with_sub .studi_rl_sub {
  position: absolute;
  top: 120px;
  right: -10px;
  padding: 10px 20px;
  background: #fff;
  width: 200px;
  box-sizing: 0 5px 25px rgba(0, 0, 0, 0.1);
  border-radius: 15px;
  transition: 0.5s;
  visibility: hidden;
  opacity: 0;
}

.studi_rl_with_sub .studi_rl_sub.active {
  top: 60px;
  visibility: visible;
  opacity: 1;
  box-shadow: 0 5px 30px #0000002b;
}

.studi_rl_with_sub .studi_rl_sub::before {
  content: "";
  position: absolute;
  top: -5px;
  right: 28px;
  width: 20px;
  height: 20px;
  background: #fff;
  transform: rotate(45deg);
}



.studi_rl_with_sub .studi_rl_sub ul li {
  list-style: none;
  padding: 10px 0;
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
  display: flex;
  align-items: center;
}
.studi_rl_with_sub .studi_rl_sub ul li:last-child {border-bottom: 0px;} 
.studi_rl_with_sub .studi_rl_sub ul li img {
  max-width: 20px;
  margin-right: 10px;
  opacity: 0.5;
  transition: 0.5s;
}

.studi_rl_with_sub .studi_rl_sub ul li:hover img {
  opacity: 1;
}

.studi_rl_with_sub .studi_rl_sub ul li a {
  display: inline-block;
  text-decoration: none;
  color: #555;
  transition: 0.5s;
}

.studi_rl_with_sub .studi_rl_sub ul li:hover a {
  color: var(--primary_color);
}
.studi_rl_sub ul {
    margin: 10px 0 0 0;
}
.studi_rl_sub i {
    color: dimgrey;
}
</style>


<div id="studi_rl_with_sub<?php echo"$sub_rnd_id";?>" class="studi_rl_with_sub">
      
        <a href="#" onclick="menuToggle(event,'<?php echo $sub_rnd_id;?>')" class="login-button btn btn-filled">
            <?php if ( $show_avatar==1) { echo get_avatar( get_current_user_id(), 32 );} else {?><i class="fal fa-user"></i> <?php } ?><span>
                <?php if ( $show_display_name==1) { echo  esc_html( $current_user->display_name );} else echo esc_html($header_button_custom_text_1); ?></span>
        </a>
      
      <div id="<?php echo $sub_rnd_id;?>" class="studi_rl_sub">
          
       
        <?php /**
        if ( $settings['submenu_list'] ) { ?>
        
            <ul>
                <?php foreach (  $settings['submenu_list'] as $item ) {  //start lessons list
                			
                			$icon           = $item['icon']['value'];
                			$title          = $item['link_title']; 
                			$link          = $item['link']['url']; 
                			
                			echo "<li><a href='$link'><i class='$icon'></i> $title </a></li>";
                } ?>			
              
            </ul>
            
        <?php } 
        **/
        ?>   
        
        <!-- submneu start -->
        <?php
        
        $menu_location = $hb_submenu;
        if(isset($settings['menu_id']) && $settings['menu_id'] !=''){
            $menu_location = $settings['menu_id'];
        }
		//print_r();

		 $menu = wp_nav_menu( array( 

		                                'menu' 	=> $menu_location,
										'menu_class'      	=> '',
										'container_class'	=> '',
										'fallback_cb' 		=> 'sc_studiFrontendWalker::fallback',
										'walker' 			=> new \sc_studiFrontendWalker,
										'echo'            => false
								  ) );
		?>
		<div class="" role="navigation">
	                <?php echo wp_kses_post($menu); ?>
        </div>
        <!-- submneu end -->
        
      </div>
    </div>
    <script>
      function menuToggle(event,id) {
          event.preventDefault();
        //const toggleMenu = document.querySelector(".studi_rl_sub.<?php echo $sub_rnd_id;?>");
        var toggleMenu = document.getElementById(id);
        toggleMenu.classList.toggle("active");
        
       

      }
      
     jQuery(document).ready(function(){
         
        var mymen = document.getElementById('studi_rl_with_sub<?php echo"$sub_rnd_id";?>');

        document.addEventListener('click', function(event) {
          var isClickInside = mymen.contains(event.target);
          if (!isClickInside) {
              //const toggleMenu = document.querySelector(".studi_rl_sub.<?php echo $sub_rnd_id;?>");
              const toggleMenu = document.getElementById("<?php echo $sub_rnd_id;?>");
            toggleMenu.classList.remove("active");
          }
        });
         
     });
     
    </script>