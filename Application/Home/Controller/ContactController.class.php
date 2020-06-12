<?php
namespace Home\Controller;
use Think\Controller;
class ContactController extends GlobalController {
  public function index(){
  	    $_SESSION['aa'] = 1;
      $this -> display();

  }
}
