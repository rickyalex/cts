<!DOCTYPE html>
<html>
    <head>
        <title><?php echo isset($title) ? $title : 'Zepernick CI Playground' ?></title>
        <?php $ts = time(); ?>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>assets/css/zepernick.css" rel="stylesheet" />
		
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/zjs.utils.js?ts=<?php echo $ts ?>"></script>
		<?php
            if (isset($jsArray) && is_array($jsArray)) {
                foreach ($jsArray as $value) {
                    echo '<script type="text/javascript" src="' . base_url() . $value . '?ts=' . $ts . '"></script>' . PHP_EOL;
                }
            }
            if (isset($cssArray)) {
                foreach ($cssArray as $value) {
                    echo '<link href="' . base_url() . $value . '?ts=' . $ts . '" type="text/css" rel="stylesheet" />' . PHP_EOL;
                }
            }
			
		?>
	</head>
	<body>
		<!-- sticky footer here using this answer
			http://stackoverflow.com/a/14595609/1771306
			 -->
			<div id="wrap">
		 		<?php
		       			$this -> load -> view('menu');	
		       		?>
		       <div class="container-fluid">
		           
		           <div class="row">
		               <div class="col-md-10">
		               		<div class="container-fluid">
	                        <!-- Content Block -->                    	               
		               
