<?php
global $user;
global $language;
$prefix = $language->prefix;
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <meta name="viewport" content="width=1000">
  <meta name="description" content="Decorate your photos with BOOMi Photo Fun app and share them online to show your friends around the world! Our gallery is updated daily.">
  <meta name="keywords" content="Trevor Lai, BOOMi, Super BOOMi, Up Studios, Bibop, animation, China cartoons,">
  <?php print $styles; ?>
  <?php if($prefix=='cn'):?>
  	<style type="text/css" media="all">@import url("<?php print $base_path.path_to_theme();?>/css/cn.css");</style>
  <?php endif;?>
  <?php print $scripts; ?>
	<script type="text/javascript" src="<?php print $base_path.path_to_theme();?>/js/lang-en.js"></script>
	<!--[if lt IE 8]>
	<style type="text/css" media="all">@import url("<?php print $base_path.path_to_theme();?>/css/iefix.css");</style>
	<![endif]-->
    <script type="text/javascript">
        var _global_uid = <?php print $user->uid;?>
    </script>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-37329873-2']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
</body>
</html>
