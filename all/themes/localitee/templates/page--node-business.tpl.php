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
              <li><a href="/user/logout"><i class="icon-lock"></i> Log out</a></li>
            </ul>
          <?php else: ?>
          
          		<a class="btn btn-success" href="/user/register"><i class="icon-ok-sign icon-white"></i>&nbsp;&nbsp;Join</a><a class="btn btn-success" href="/guest"><i class="icon-map-marker icon-white"></i>&nbsp;&nbsp;Postcode</a><a class="btn btn-success" href="/user"><i class="icon-lock icon-white"></i>&nbsp;&nbsp;Log in</a>
       
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
      
      <div class="row-fluid businessprofile" id="maincontent" role="main">
          
            <div class="span12">  
            
            	<div class="box">
            		<h1>Openspace</h1>
            		
            		<div class="business-logo">
            			<img src="img/openspace-logo.png" alt="Logo: Openspace"/>
            		</div>
            
            		<p><b>OpenSpace is a members' co-operative. By managing our workspace ourselves, we can run an affordable, attractive office where different members and tenants carry out a variety of creative and socially conscious work.</b></p>
            		
            		<img src="img/coopvan.jpg" alt="" class="alignleft"/>
            		
            		<h3>Members and Tenants</h3>
            		<p>The space is used by a broad mix of people including:</p>

            		<p>a digital marketing consultant, a web designer, two web developer / programmers, two freelance journalists, an author, a writer / performer, a cartoonist,  an illustrator, a 3rd-sector consultant, an energy &amp; low-impact housing expert, and a national legal advice organisation.</p>
            		
            		<h3>Office Space Available</h3>
            		
            		

            		<p>Full-time spaces are available from £147 a month (£105 for Members) and are available now to freelancers, ethical businesses and social enterprises.</p>

            		<p>Flexible part-time packages are also available - see our rates, location and facilities for more information.</p>

            		<p>Our facilities include wi-fi broadband, printing, and good transport links with on-street parking.</p>
	            
            	</div>
                            
              
            </div><!--/span-->          

          </div><!--/row-fluid-->
          
          <div class="row-fluid businessprofile">
          
            <div class="span7">  
            
            	<div class="box">
            
	            	<h2>Openspace contact details</h2>
	            	
	            	<div class="address">
	            	<h4>OpenSpace Co-operative</h4>
	            	<p>Work for Change<br/>
	            	Unit 1<br/>
	            	41 Old Birley Street<br/>
	            	Hulme<br/>
	            	Manchester<br/>
	            	M15 5RF<br/>
	            	Company no: 6504771
	            	</p>
	            	</div>
	            	
	            	<div class="contact-details">
	            	<ul>
	            		<li class="phone"><span class="offscreen">Tel: </span>0161 232 9292</li>
	            		<li class="email"><span class="offscreen">Email: </span><a href="mailto:info@openspace.coop">info@openspace.coop</a></li>
	            		<li class="twitter"><a href="http://twitter.com/openspaceUK"><span class="offscreen">Twitter: </span>@openspaceUK</a></li>
	            		<li class="website"><a href="http://www.openspace.coop<">http://www.openspace.coop</a></li>
	            	</ul>
	            	</div>

	            	<h4 class="marker">Get directions to Openspace on Google Maps</h4>
	            	<div class="map">
	       
	            	<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=OpenSpace,+Old+Birley+Street,+Manchester&amp;aq=0&amp;oq=openspace+&amp;sll=53.800651,-4.064941&amp;sspn=9.560543,16.54541&amp;t=m&amp;ie=UTF8&amp;hq=OpenSpace,&amp;hnear=Old+Birley+St,+Manchester,+United+Kingdom&amp;ll=53.46525,-2.248335&amp;spn=0.003832,0.006437&amp;z=16&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.uk/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=OpenSpace,+Old+Birley+Street,+Manchester&amp;aq=0&amp;oq=openspace+&amp;sll=53.800651,-4.064941&amp;sspn=9.560543,16.54541&amp;t=m&amp;ie=UTF8&amp;hq=OpenSpace,&amp;hnear=Old+Birley+St,+Manchester,+United+Kingdom&amp;ll=53.46525,-2.248335&amp;spn=0.003832,0.006437&amp;z=16" style="color:#0000FF;text-align:left">View Larger Map</a></small>
	            	</div>
	            
            	</div>
                            
              
            </div><!--/span-->
            
            <div class="span5">  
            
            	<div class="box">
            
	            <h2>Recent Openspace activity</h2>
	            	<ul class="nav nav-tabs">
		            	<li class="active"><a href="#tabnews" data-toggle="tab">News</a></li>
		            	<li><a href="#tabevents" data-toggle="tab">Events</a></li>
		            	<li><a href="#tabdiscussions" data-toggle="tab">Discussions</a></li>
		            </ul>
		            
		            <div class="tab-content">
			            <div class="tab-pane active" id="tabnews">
			            	<ul>
	            		
		            			<li class="news"><h4><a href="">News title</a></h4>
		            				The surface is fine and powdery. I can kick it up loosely with my toe.
		            				<span><a class="" href="#">Read more &rarr;</a></span></li>
		            			<li class="news"><h4><a href="">News title</a></h4>
		            				The surface is fine and powdery. I can kick it up loosely with my toe.
		            				<span><a class="" href="#">Read more &rarr;</a></span></li>
		            			<li class="news"><h4><a href="">News title</a></h4>
		            				The surface is fine and powdery. I can kick it up loosely with my toe.
		            				<span><a class="" href="#">Read more &rarr;</a></span></li>
		            		
		            			</ul>
			            	<p><a class="btn btn-success" href="#">More Openspace news articles &raquo;</a></p>
			            </div>
			            
			            <div class="tab-pane" id="tabevents">
			            	<ul>
	            		
		            			<li class="event"><h4><a href="">Event title</a></h4>
		            				The surface is fine and powdery. I can kick it up loosely with my toe.
		            				<span><a class="" href="#">Read more &rarr;</a></span></li>
		            			<li class="event"><h4><a href="">Event title</a></h4>
		            				The surface is fine and powdery. I can kick it up loosely with my toe.
		            				<span><a class="" href="#">Read more &rarr;</a></span></li>
		            			<li class="event"><h4><a href="">Event title</a></h4>
		            				The surface is fine and powdery. I can kick it up loosely with my toe.
		            				<span><a class="" href="#">Read more &rarr;</a></span></li>
		            		
		            			</ul>
			            	<p><a class="btn btn-success" href="#">More Openspace events &raquo;</a></p>
			            </div>
			            
			            <div class="tab-pane" id="tabdiscussions">
			            	<ul>
	            		
		            			<li class="discussion"><h4><a href="">Discussion title</a></h4>
		            				The surface is fine and powdery. I can kick it up loosely with my toe.
		            				<span><a class="" href="#">Read more &rarr;</a></span></li>
		            			<li class="discussion"><h4><a href="">Discussion title</a></h4>
		            				The surface is fine and powdery. I can kick it up loosely with my toe.
		            				<span><a class="" href="#">Read more &rarr;</a></span></li>
		            			<li class="discussion"><h4><a href="">Discussion title</a></h4>
		            				The surface is fine and powdery. I can kick it up loosely with my toe.
		            				<span><a class="" href="#">Read more &rarr;</a></span></li>
		            		
		            			</ul>
			            	<p><a class="btn btn-success" href="#">More Openspace discussions &raquo;</a></p>
			            </div>
		            </div>
	            
            	</div>        
              
            </div><!--/span-->
            

          </div><!--/row-fluid-->


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
