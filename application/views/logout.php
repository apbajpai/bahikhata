<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?=base_url('assets/extras/fab.gif');?>">

    <title><?=ucfirst($this->router->class);?></title>

    
    <!-- <link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet"> -->

    
    <!-- Bootstrap core CSS --><?=link_tag('assets/css/bootstrap.min.css');?>
    <!-- Custom styles for this template --><?=link_tag('assets/css/signin.css');?>
  </head>

  <body class="text-center">
  	<?php
		
		
				 
		 // 
  	//$this->session->unset_userdata('user_id');
  	$this->session->unset_userdata('session_id');
    $this->session->unset_userdata('user_name');
  	$this->session->unset_userdata('user_session_id');
    $this->session->sess_destroy();
		$this->session->set_userdata(['sess_mess' => "logged out.. "]);		
    redirect('login', 'refresh');
		
				 
?>



  </body>
</html>