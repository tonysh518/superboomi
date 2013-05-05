<?php

if($is_front){
	include('page--front.tpl.php');
	return;
}
else if (arg(0) == 'node' && is_numeric(arg(1))) {
    $nid = arg(1);
    $node = node_load(array('nid' => $nid));
    $type = $node->type;
    $path = drupal_lookup_path('alias',"node/".$node->nid);
    if($path == 'test')
    {
        include('page--test.tpl.php');
        return;
    }
    if($path == 'storyidea')
    {
        include('page--storyidea.tpl.php');
        return;
    }
    if($path == 'printing')
    {
        include('page--printing.tpl.php');
        return;
    }
    if($path == 'readwatch')
    {
        include('page--readwatch.tpl.php');
        return;
    }
}
?>
<div id="page-wrapper">
<?php print render($page['content']); ?>
</div> <!-- /#page, /#page-wrapper -->
