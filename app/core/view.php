<?php
class View{

	function generate($content_view, $template_view, $data = null, $error = null){
		include 'app/views/'.$template_view;
	}
}
