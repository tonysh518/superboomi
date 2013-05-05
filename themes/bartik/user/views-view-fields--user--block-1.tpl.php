<?php 
if(empty($fields['picture']->content))
	print '<img width="175" height="175" src="'.base_path().'images/noavator.gif">';
else 
	print $fields['picture']->content;
?>