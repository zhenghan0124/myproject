<?php
namespace Home\Controller;
use Think\Controller;
class ActivityController extends GlobalController {
  public function index(){
    // $title = "index_logo";
    $_SESSION['aa'] = 1;
  //获取数据
  // $info = D('Block') -> get_item_by_title('about_logo');
  $about = D('Block') -> get_item_by_title('Activity_index');
  $data = json_decode($about['value'], true);
      
  //多语言支持
    if(cookie('think_language') == "en-us"){
      $data['content'] = html_entity_decode($data['content_en']);
      
    }else{
      $data['content'] = html_entity_decode($data['content']);
    }

    $data1 = $data['pic1']['0'];

    $this->assign('data1',$data1);
  // var_dump($data);
  // $data = $about['pic'];
  // $data['content'] = html_entity_decode($data['content']);
  // var_dump($data);exit;
    $huodong = M('Activity') -> order('id desc') -> select();
   
    $result = array();
    foreach ($huodong as $value){
      // $value['thumb_pic'] = thumb_name($value['pic']);

      //多语言支持
      if(cookie('think_language') == "en-us"){
          $value['title'] = $value['title_en'];
          $value['description'] = $value['description_en'];
          $value['content'] = html_entity_decode($value['content_en']);
      }
      // $value['thumb_pic'] = thumb_name($value['pic']);
      $result[] = $value;
    }
  // var_dump($result);exit;
  $this->assign('huodong',$result);
  $this->assign('data',$data);
    $this -> display();
  }

  public function detail(){
    $id = I('get.id');
    $data = M('Shuiliao') -> find($id);
    // var_dump($data);exit;
    if(cookie('think_language') == "en-us"){
      $data['title'] = $data['title_en'];
      $data['content'] = html_entity_decode($data['content_en']);
      
    }else{
      $data['title'] = $data['title'];
      $data['content'] = html_entity_decode($data['content']);
    }
    $this->assign('data',$data);
    $this -> display();
  }
}
