<?php
/**
 * The template for displaying inner content on single posts
 */

$separate_meta = esc_html__( ', ', 'studiare' );

// Get Categories for posts.
$categories_list = get_the_category_list( $separate_meta );

// Get Tags for posts.
$tags_list = get_the_tag_list( '' );

$blog_post_share = false;
$article_author = true;

if ( class_exists('Redux') ) {
    $article_date_top_single_post = codebean_option('article_date_top_single_post');
    $article_author_top_single_post = codebean_option('article_author_top_single_post');
    $article_cats_top_single_post = codebean_option('article_cats_top_single_post');
    $article_tags_bottom_single_post = codebean_option('article_tags_bottom_single_post');
	$blog_post_share = codebean_option('blog_share_story');
	$article_author = codebean_option('article_author');
	$article_feautred_image_single_post = codebean_option('article_feautred_image_single_post');
}
$prefix = '_studiare_';
/*get post format */
$postFormat = get_post_format();
if($postFormat=="audio"){
    $audio_url = get_post_meta( get_the_ID(), '_studiare_studi_audio_url', true );
    include_once 'audio_player.php';
   
}
else{
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="post-inner">

			<header class="entry-header">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
				<?php if ( $article_date_top_single_post ) : ?>
				<div class="post-meta date"><i class="fal fa-calendar-alt"></i><?php echo get_the_date(); ?></div>
				<?php endif; ?>
				<?php if ( $article_author_top_single_post ) : ?>
				<div class="post-meta author">
                    <i class="fal fa-user"></i>
					<?php esc_html_e('Posted by', 'studiare'); ?>
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a>
				</div>
				<?php endif; ?>
				<?php if ( $article_cats_top_single_post ) : ?>
				<div class="post-meta category">
                    <i class="fal fa-folder-open"></i>
					<?php echo wp_kses_post( $categories_list ); ?>
				</div>
				<?php endif; ?>
				<?php
				if($blog_post_share){ ?>
				<div class="post-meta share_box">
				<?php 
                echo do_shortcode('[sc_studiare_product_share_box]'); 
                ?>
                </div>
                <?php  } ?>
				
			</header>

			<?php 
			
			if($postFormat=="video"){
                $video_url = get_post_meta( get_the_ID(), '_studiare_studi_video_url', true );
                if(!empty($video_url)){
                    $imag_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                    
                    if( str_contains($video_url, ".aparat.com/v") ){
                        
                        $course_video_aparat = substr($video_url, strrpos($video_url, '/') + 1);
                        $myvideo_url = studi_get_aparat_file_link($course_video_aparat);
                        
                        
                    	?>
<video id="studi_course_video_holder" width="100%" controls style="" poster="<?php echo esc_url( $imag_url ); ?>" >
		       
            <source id="studi_course_video" src="<?php echo esc_url( $myvideo_url ); ?>" type="video/mp4">
                 <?php echo __('مرورگر شما از HTML5 پشتیبانی نمی کند.','studiare'); ?>
            </video>
        <div class="video-button hidden">
            <div class="studi_play_video"><i class="fad fa-play-circle"></i></div>
        </div>
                    	<?php
                    }
                    else{
                    echo do_shortcode("[video src='$video_url' poster='$imag_url' autoplay='false' preload='none']"); 
                    }
                }
               
            }
			if ( has_post_thumbnail() && $postFormat!="video") { ?>
			<?php if ( $article_feautred_image_single_post ) : ?>
				<div class="post-thumbnail">
					<?php echo the_post_thumbnail( 'full' ); ?>
				</div>
				<?php  endif; ?>
			<?php } //endif; ?>

			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages(array(
					'before' => '<div class="page-pagination"><div class="page-links-title">' . esc_html__('Pages:', 'studiare') . '</div>',
					'after' => '</div>',
					'link_before' => '<span>', 'link_after' => '</span>'
				)); ?>
			</div>

			
            <!-- download box start -->
            <?php
            $dl_list = get_post_meta( get_the_ID(), 'download_box_group', true );
            if($dl_list){
                
                $title      = get_post_meta( get_the_ID(), $prefix.'dlbox_title', true )?:__( 'Download Links', 'studiare' );
                $password   = get_post_meta( get_the_ID(), $prefix.'dlbox_pass', true );
                $dlbtn_title= get_post_meta( get_the_ID(), $prefix.'dlbtn_title', true );
                
                
            ?>
        <style>
            .studi_dlbox_holder {  /*float: right;*/display: flow-root; width: 100%; background: #fff; border-radius: 20px; box-shadow: 0 0 15px 0px rgb(0 0 0 / 5%); padding: 15px; margin-bottom: 14px;}
            .sdlbox_header { float: right; width: 100%; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid rgb(161 171 179 / 10%); } 
            .sdlbox_passholder { float: left; direction: ltr; text-align: left; }
            .sdlbox_passholder p { display: block; letter-spacing: 2px; font-size: 12px;margin: 0; }
            .sdlbox_passholder span { display: block; letter-spacing: 2px; font-size: 12px; opacity: .6; cursor: pointer; margin: 0;}
            .stdlbox_dlicon { width: 40px; height: 40px; background: linear-gradient(45deg, #36c9f4, #0679ca);color: #f9f7f4; border-radius: 8px; text-align: center; font-size: 20px; padding-top: 10px;  margin-left: 15px; float: right; } 
            .sdlbox_header h3 { display: contents;font-size: 15px; color: #758694; float: right; line-height: 40px; }
            
            .sdlbox_content { float: right; width: 100%; }
            .sdlbox_item { position:relative;background: #f7f7f7; padding: 15px; border-radius: 5px; margin: 10px 0; display: flex; justify-content: space-between;}
            .sdlbox_item a { float: left; background: linear-gradient(45deg, #36c9f4, #0679ca);color: #f9f7f4; padding: 0 10px; border-radius: 5px; transition:.4s; }
            .sdlbox_item a:hover {  background: linear-gradient(-45deg, #36c9f4, #0679ca); }
            .sdlbox_item a i { margin: 0 5px; }
            .sdlbox_item:before { content: ""; width: 20px; height: 20px; background: #2bb7eb; position: absolute; right: -10px; border-radius: 100em; border: 5px solid #fff; transform: translate(0,20%); }
            .sdlbox_item:hover:before { background: gold; }
            .sdlbox_item_title { width: 50%; }
            .sdlbox_item_fsize { background: #dcedc8; padding: 0 5px; width: 15%; text-align: center; border-radius: 3px; color: #8bc34a; }
            
            @media screen and (max-width:767px){.sdlbox_item { display: block; } .sdlbox_item_title { width: 100%; display: block; } }
        </style>            
            <div class="studi_dlbox_holder">
           <div class="sdlbox_header">
               <span class="stdlbox_dlicon fal fa-download"></span>
               <h3><?php echo $title; ?></h3> 
               <?php if(!empty($password)){?>
                    <div class="sdlbox_passholder"><p>Password</p><span><?php echo $password; ?></span></div> 
               <?php }?>
            </div>
            <div class="sdlbox_content">
                <?php 
                if($dl_list){
                    
                    foreach($dl_list as $dl){
                        
                        $file_size=$title=$link="";
                        
                        if(array_key_exists('title', $dl)){
                            $title     = $dl['title'];
                        }
                        if(array_key_exists('link', $dl)){
                            $link      = $dl['link'];
                        }
                        if(array_key_exists('file_size', $dl)){
                            $file_size = $dl['file_size'];
                        }
                        
                        if(empty($title)){$title = $link;}
                        
                        $html = "";
                        if($link){
                                $html .= "<div class='sdlbox_item'><span class='sdlbox_item_title'>$title</span>";
                            if($file_size){
                                $html .= "<span class='sdlbox_item_fsize'>$file_size</span>";  
                            }
                                $html .= "<a href='$link' target='_blank'><i class='fal fa-download'></i>".$dlbtn_title."</a></div>";  
                        }
                        
                        echo $html;
                    }
                }
                ?>
            </div>
        </div>
            <?php } ?>
            <!-- download box end -->
            <div class="entry-tag-share">
				<?php if ( $tags_list && ! is_wp_error( $tags_list ) && $article_tags_bottom_single_post ) : ?>
					<div class="post-tags">
						<span><?php esc_html_e( 'Tags:', 'studiare' ); ?></span>
						<?php echo wp_kses_post( $tags_list ); ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( $article_author == '1' && get_the_author_meta( 'description') !== '' ) : ?>
                <div class="post-author-box">
					<?php
					$author_bio_avatar_size = apply_filters( 'goseowp_author_bio_avatar_size', 130 );

					echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
					?>
                    <div class="author-content">
                        <h5 class="author-title"><?php printf( esc_html__( 'About %s', 'studiare' ), get_the_author() ); ?></h5>
                        <p class="author-bio">
							<?php the_author_meta( 'description' ); ?>
                        </p>
                        <a class="author-link btn btn-border btn-small" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
							<?php printf( esc_html__( 'More Posts by %s', 'studiare' ), get_the_author() ); ?>
                        </a>
                    </div>
                    </div>
            <?php endif; ?>
                

		</div>

	<?php endwhile; ?>
</article>

<?php } ?>