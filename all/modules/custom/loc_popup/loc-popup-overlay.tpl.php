<?php
/**
 * @file
 * Template for the Localitee postcode/login/signup overlay.
 *
 * Variables:
 * $close_button, $postcode_form, $login_form and $register_form are all
 * forms already processed by drupal_get_form(). This allows the forms and
 * their submit handlers to be defined independently.
 */
?>

<div class="modal" id="frontModal">
    
        <div class="modal-header">

                <?php echo drupal_render( $close_button ); 
                // <button type="button" class="close" data-dismiss="modal">×</button>
?>

                <h3><?php echo t('Welcome to Localitee') ?><span>.</span></h3>
    		
    	</div>
    	<div class="modal-body">
	    	<div class="row-fluid">
    		
    			<div class="span6 guests">
    			
                                <h3><?php echo t('Guests') ?></h3>
    				<p><?php echo t('Enter your postcode to receive content customised to your region') ?></p>

<?php echo drupal_render( $postcode_form );


    				//<form action="" method="" name="guestpostcode" id="guestpostcode">
    				
    					//<label for="postcode"><Enter your postcode</label>
    					//<input type="text" id="postcode" name="postcode" class="span6" placeholder="Enter postcode"/>
    					//<input type="submit" value="Go" name="submit" class="btn btn-success btn-large"/>
    				
    				//</form>
?>

    			</div>
    			
    			<div class="span6 members">
	    			
	    			<h3><?php echo t('Members') ?></h3>
                                <p><?php echo t('Log in to Localitee') ?></p>
<?php
echo drupal_render( $login_form );
	    			//<form action="" method="" name="loginform" id="loginform">
		    			
		    			//<label for="username">Username</label>
		    			//<input type="text" id="username" name="username"  placeholder="Enter username"/>
		    			
		    			//<label for="password">Password</label>
		    			//<input type="password" id="password" name="password"  placeholder="Enter password"/>
		    			
		    			//<input type="submit" value="Login" name="submit" class="btn btn-success btn-large"/>
		    			
		    			//<div>
			    			
			    		//	<label for="remember" class="checkbox">Keep me logged in
				    	//		<input type="checkbox" name="remember" id="remember"/>
				    	//	</label>

				    	//</div>
		    			
                                //</form>
                                ?>
		    			<ul>
		    				<li><a href="user/password"><?php echo t('Forgot your password?') ?></a></li>
		    				<li><a href="user/register"><?php echo t('Join Localitee') ?></a></li>
		    			</ul>
	    			
    			</div>
    		
    		</div>
    		
    		<div class="row-fluid">
    		
    			<div class="span12 join">
    				<h3><?php echo t('Join Localitee') ?></h3>
    				<div class="alert">
    					<p><strong><?php echo t('Holy guacamole!') ?></strong> <?php echo t('Information about joining Localitee here!') ?></p>
    					<p><a href="user/register" class="btn btn-success btn-large"><?php echo t('Join Localitee') ?></a></p>
    				</div>
    			</div>
    		
    		</div>
	    </div>

	</div>

