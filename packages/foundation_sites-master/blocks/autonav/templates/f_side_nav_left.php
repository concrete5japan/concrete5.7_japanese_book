<?php  defined('C5_EXECUTE') or die('Access Denied.');
$navItems = $controller->getNavItems();
?>

<ul class="side-nav" role="navigation" title="Link List">

<?php
for ($i = 0; $i < count($navItems); $i++) {
	$ni = $navItems[$i];
	
	if ($ni->isCurrent) {
        echo '<li role="menuitem" class="active"><a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a></li>';
	} else {
		echo '<li role="menuitem"><a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a></li>';
	}
}
?>

</ul>
