<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<html lang="<?php print $language->language; ?>">

<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  <title><?php print $head_title; ?></title>
    <!-- Le styles -->
  <?php print $styles; ?>
  <link href="/<?php print drupal_get_path('theme', 'localitee')?>/css/bootstrap.css" rel="stylesheet"/>
  <link href="/<?php print drupal_get_path('theme', 'localitee')?>/css/localitee.css" rel="stylesheet"/>
  <link href="/<?php print drupal_get_path('theme', 'localitee')?>/css/bootstrap-responsive.css" rel="stylesheet"/>
  
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans|Droid+Sans+Mono|Droid+Serif' rel='stylesheet' type='text/css'/>

    
    <!--[if lte IE 6]>
		<link rel="stylesheet" href="http://universal-ie6-css.googlecode.com/files/ie6.1.1.css" media="screen, projection">
		<link rel="stylesheet" href="css/ie6.css"/>	
	<![endif]-->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="access" class="offscreen">
  		
  	<ul role="navigation">
		<li><a href="#search" title="Skip to main navigation">Skip to search</a></li>
		<li><a href="#maincontent" title="Skip to content">Skip to content</a></li>
	</ul>
  
 </div>
 
 <?php print $page_top; ?>
 <?php print $page; ?>
  
  
  <!-- Le javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <?php print $scripts; ?>

  <!-- This is where inline JS gets placed. Moved it here to be after core
       and contrib JS files. -->
  <?php print $page_bottom; ?>
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
  <script src="/<?php print drupal_get_path('theme', 'localitee')?>/js/bootstrap.js"></script>
  <script src="/<?php print drupal_get_path('theme', 'localitee')?>/js/system.js"></script>
  
   <script>      
        $('#frontModal').modal({
            backdrop: 'static',
            keyboard: false
            
            })
    </script>

   <?php if (drupal_is_front_page()): ?>

  <script>
		    
		    $('.carousel').carousel({
			    interval: 5000
			})
	    
    </script>
    <?php endif; ?>

</body>
</html>
