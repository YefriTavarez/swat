<?php
$redux = autocar_reduxData();
$logo = '';
$email = '';
$phon = '';
if( isset($redux['autocar-logo']['url'] )) {
	$logo = $redux['autocar-logo']['url'];
}
if( isset($redux['autocar_contactemail'] )) {
	$email = trim( $redux['autocar_contactemail'] );
}
if( isset($redux['autocar_contactphone'] )) {
	$phon = trim( $redux['autocar_contactphone'] );
}
if( isset($redux['logo_switch'] )) {
	$logo_switch =  $redux['logo_switch'] ;
}	
?>				
<div class="pre-header">
	<div class="container">
		<div class="row">
		<div class="col-md-4">
		<?php
			if($logo_switch == 'up_image'){ ?>
				<div class="logo">								 
					<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url( $logo ); ?>" class="img-responsive" alt=""></a>
				</div>
		<?php		
			}else{ 
				if( isset($redux['autocar-logo-title'] )) {
					$logo_title =  $redux['autocar-logo-title'] ;
				}
				if( isset($redux['autocar-logo-subtitle'] )) {
					$logo_subtitle =  $redux['autocar-logo-subtitle'] ;
				}
			?>
			
				<div class="logo text_logo">								 
					<a href="<?php echo esc_url(home_url('/')); ?>" class="ac_logo_back"><?php echo $logo_title;?><em><?php echo  $logo_subtitle ;?></em></a>
				</div>
			 
			<?php	
			}
		?>
			
		</div>	
		<div class="col-md-8 hidden-xs">
        <div class="right-info">
		<?php
				if( isset($redux['social_switch']) && $redux['social_switch'] == 1){
			?>
		<div class="ac_info_wrapper">	
         <div class="ac_social_wrapper">
			<ul><?php echo autocar_social_setting(); ?></ul>
         </div>
		 </div>
		 <?php 
				}
			?>
		<div class="ac_info_wrapper">
			<span><i class="fa fa-envelope"></i><?php echo esc_html__('Email', 'autocar');?></span>
				<a href="<?php echo esc_html__('mailto:','autocar');?><?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
		</div>		
         <div class="ac_info_wrapper">
			  <span><i class="fa fa-phone"></i><?php echo esc_html__('Service', 'autocar');?></span>
			  <h3><?php echo esc_html($phon);?></h3>
         </div>
		 
        </div>
       </div>
		</div>
	</div>
</div>			
<header class="site-header">
	<div id="main-header" class="main-header header-sticky">
		<div class="container clearfix">
			
			<div class="header-right-toggle pull-right hidden-md hidden-lg">
				<a href="javascript:void(0)" class="side-menu-button"><i class="fa fa-bars"></i></a>
			</div>
			<nav class="main-navigation hidden-xs hidden-sm">
				<?php
					wp_nav_menu( array('theme_location'=> 'primary','container' => 'false','fallback_cb' => 'autocar_menu_editor','depth' => 4));
				?>
			</nav>
			<div class="ac_serch_wrapper">
				<div class="dc_search_icon">
					<a href="javascript:;"><i class="fa fa-search"></i></a>
				</div>
				<div class="ac_search_form">
					 <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s"  class="form-control dc_search" placeholder="Search here"/>
					 </form>
				</div>
			</div>
		</div>
	</div>
</header>