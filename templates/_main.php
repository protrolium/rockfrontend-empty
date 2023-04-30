<?php namespace ProcessWire;

// Optional main output file, called after rendering page’s template file. 
// This is defined by $config->appendTemplateFile in /site/config.php, and
// is typically used to define and output markup common among most pages.
// 	
// When the Markup Regions feature is used, template files can prepend, append,
// replace or delete any element defined here that has an "id" attribute. 
// https://processwire.com/docs/front-end/output/markup-regions/
	
/** @var Page $page */
/** @var Pages $pages */
/** @var Config $config */
/** @var RockFrontend $rockfrontend */

$home = $pages->get('/'); // homepage directory
$rockfrontend->styles()
	->add("/site/templates/uikit/src/less/uikit.theme.less")
	->add("/site/templates/styles/custom.less")
	->addDefaultFolders()
	;
$rockfrontend
	->scripts()
	->add("/site/templates/uikit/dist/js/uikit.min.js", "defer")
	->add("/site/templates/uikit/dist/js/uikit-icons.min.js", "defer")
	->add("/site/templates/scripts/main.js")
	;

?>
<!DOCTYPE html>
<html lang="en">
	<head id="html-head">
		
		<!-- hide our site content -->
		<style>html{visibility: hidden;opacity:0;}</style>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<!-- make sure we get styling on mobile by setting meta viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $page->title; ?></title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="generator" content="ProcessWire">

		<!-- fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="" rel="stylesheet"> 

		<!-- favicons -->
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $config->urls->assets?>favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $config->urls->assets?>favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $config->urls->assets?>favicon/favicon-16x16.png">
		<link rel="manifest" href="<?php echo $config->urls->assets?>favicon/site.webmanifest">
		<link rel="mask-icon" href="<?php echo $config->urls->assets?>favicon/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">

		<!-- metatags -->
		<?php $metadata = $modules->get('MarkupMetadata');?>
		<?php echo $metadata->render();?>

	</head>
	<body id="html-body">
		<!-- make sure we are in dark mode -->
		<script type="text/javascript">
			const selectedTheme = localStorage.getItem('dark-mode');
			if (selectedTheme === "enabled") {
				html.dataset.theme = `theme-dark`;
			};
		</script>

		<?= $rockfrontend->render("sections/includes/header.latte") ?>
		<?= $rockfrontend->renderLayout($page) ?>
		<?= $rockfrontend->render("sections/includes/footer.latte") ?>

		<!-- show our site content -->
		<style>html{visibility: visible;opacity:1;}</style>

		<!-- scripts for once DOM is loaded -->
		<script type="text/javascript" src="<?php echo $config->urls->templates?>scripts/onload.js" defer></script>
	</body>
</html>