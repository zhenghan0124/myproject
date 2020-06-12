<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends GlobalController {
  public function index(){
    // $title = "index_logo";
    $_SESSION['aa'] = 1;
  //获取数据
  // $info = D('Block') -> get_item_by_title('about_logo');
  $about = D('Block') -> get_item_by_title('Product_index');
  $data = json_decode($about['value'], true);
      
  //多语言支持
    if(cookie('think_language') == "en-us"){
      $data['description'] = $data['description_en'];
      $data['content'] = html_entity_decode($data['content_en']);
      
    }else{
      $data['description'] = $data['description'];
      $data['content'] = html_entity_decode($data['content']);
    }
    // var_dump($data);exit;
    $data1 = $data['pic1']['0'];
    $this->assign('data1',$data1);
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
