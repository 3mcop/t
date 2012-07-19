<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 */
?>

     <div class="navbar">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          
          
          <div class="btn-group pull-right account">
          <?php if (user_is_logged_in()): ?>
          
          	<a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#" id="tab">
          		<i class="icon-cog icon-white"></i> Your account
          		<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/user"><i class="icon-user"></i> Your profile</a></li>
              <li class="divider"></li>
              <li><a href="/user"><i class="icon-map-marker"></i> Postcode radius: <span><?php print $postcode_radius ?></span></a></li>
              <li class="divider"></li>
              <li><a href="/user/logout"><i class="icon-lock"></i> Sign Out</a></li>
            </ul>
          <?php else: ?>
          	<a class="btn btn-success dropdown-toggle login_btn" data-toggle="dropdown" href="#" id="tab">
          		<i class="icon-cog icon-white"></i> Sign in
                <span class="caret"></span>
            </a>
            <div id="login_box">
                <div id="login_box_content">
                    
                         <?php print render($login_form); ?>
                         
                         <ul>
		    				<li><a href="user/password"><?php echo t('Forgot your password?') ?></a></li>
		    				<li><a href="user/register"><?php echo t('Join Localitee') ?></a></li>
		    			</ul>

                 </div>
             </div>
                
            <?php endif; ?>
          </div> 
          
          <div id="branding">
          	<div class="logo"><a href="<?php print $front_page; ?>">Localitee<span>.</span></a></div>
          	<div class="postcode"><?php print $postcode; ?></div>
          </div>
          
          <div class="nav-collapse">
          
           <?php if ($main_menu): ?>
           <?php print theme('links__system_main_menu', array(
	           'links' => $main_menu,
	           'attributes' => array(
	          	 'class' => array('nav'),
	          	 'role' => 'navigation',
	           ),
          	)); ?>
        	<?php endif; ?>
          
          </div><!--/.nav-collapse -->
        </div>
      </div>
      
          <?php print $messages; ?>

      
    </div>
    
   <div class="container-fluid">
   
      <div class="row-fluid advancedsearch">
        <div class="span12">
        
          <div class="searchbox" role="search">
            
          	 <?php print render($page['search']); ?>
            
          </div><!-- /.searchbox -->
        </div><!-- /.span12 -->
      </div><!-- /.row-fluid -->
      
      <div class="row-fluid" id="maincontent" role="main">
          
            <div class="span8">

               <?php // Added these tabs back because they are needed to administer nodes (edit/delete/clone/etc).
               if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>            
            
               <?php if (drupal_is_front_page()): ?>
            
               		<?php if ($page['content_top']): ?>
            
               		<div class="col2box">
            	
	               		<?php print render($page['content_top']); ?>         	
            	
	               	</div><!-- /.col2box -->
	               	
	               	<?php endif; ?>
	               	
	               	
	               	<div class="box">
            
            			<div id="myCarousel" class="carousel slide">
            			<!-- Carousel items -->
	            			<div class="carousel-inner">
	            		
	            			<?php print render($page['content']); ?>
	            		
	            			</div><!-- /.carousel-inner -->
		            	
	            			<!-- Carousel nav -->
	            			<div class="carousel-nav">
		            			<a class="" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		            			<a class="" href="#myCarousel" data-slide="next">&rsaquo;</a>
		            			</div>
		            		<!-- Carousel nav -->
		            
		            	</div><!-- /.carousel -->
		            
		            </div><!-- /.box -->

		      <?php else: ?>          
              
              		<div class="box">
              			<?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
              			<?php if ($page['content_top']): ?>
                        	
	               			<?php print render($page['content_top']); ?>         	
            		               	
	               		<?php endif; ?>
              			<?php print render($page['content']); ?>
              		</div>
              
              <?php endif; ?>
                          
            </div><!-- /.span8 -->
            
            <div class="span4">
	            
	          <?php if ($page['sidebar_first']): ?>
	          	<?php print render($page['sidebar_first']); ?>
	          <?php endif; ?>	            
	            
            </div><!-- /.span4 -->            
            
      </div><!-- /.row-fluid -->


    </div><!--/.fluid-container-->
    
      <footer>      	 
	      	 	      
	      	 	<?php print render($page['footer']); ?>
	      	 
<?php
/**
 * Localitee postcode/login/signup overlay.
 *
 * Variables:
 *
 * $lt_overlay['show it?']
 * $lt_overlay['postcode_form']
 * $lt_overlay['login_form'] =
 */

if ( $lt_overlay['show it?'] ):
?>

<div class="modal" id="frontModal">

        <div class="modal-header">

                <h3><?php echo t('Welcome to Localitee') ?><span>.</span></h3>
    		
          <?php print $messages; ?>
    	</div>
    	<div class="modal-body">
	    	<div class="row-fluid">
    		
    			<div class="span6 guests">
    			
                                <h3><?php echo t('Guests') ?></h3>
    				<p><?php echo t('Enter your postcode to receive content customised to your region') ?></p>

<?php echo drupal_render( $lt_overlay['postcode_form'] ); ?>

    			</div>
    			
    			<div class="span6 members">
	    			
	    			<h3><?php echo t('Members') ?></h3>
                                <p><?php echo t('Log in to Localitee') ?></p>
<?php echo drupal_render( $lt_overlay['login_form'] ); ?>
		    			<ul>
		    				<li><a href="/user/password"><?php echo t('Forgot your password?') ?></a></li>
		    				<li><a href="/user/register"><?php echo t('Join Localitee') ?></a></li>
		    			</ul>
	    			
    			</div>
    		
    		</div>
    		
    		<div class="row-fluid">
    		
    			<div class="span12 join">
    				<h3><?php echo t('Join Localitee') ?></h3>
    				<div class="alert">
    					<p><strong><?php echo t('Holy guacamole!') ?></strong> <?php echo t('Information about joining Localitee here!') ?></p>
    					<p><a href="/user/register" class="btn btn-success btn-large"><?php echo t('Join Localitee') ?></a></p>
    				</div>
    			</div>
    		
    		</div>
	    </div>

	</div>
<?php endif; // $lt_overlay['show it?'] ?>

	      	 </div><!-- /.span12 -->
      	      	 
      	 </div>
        
      </footer>
