<?php
namespace Home\Controller;
use Think\Controller;
class DinnerController extends GlobalController {
  public function index(){
    // $title = "index_logo";
    $_SESSION['aa'] = 1;
  //获取数据
  // $info = D('Block') -> get_item_by_title('about_logo');
  // $about = D('Block') -> get_item_by_title('dinner_index');
  // $data = json_decode($about['value'], true);
      
  // //多语言支持
  //   if(cookie('think_language') == "en-us"){
  //     $data['content'] = html_entity_decode($data['content_en']);
      
  //   }else{
  //     $data['content'] = html_entity_decode($data['content']);
  //   }
  //   $num = intval(count($data['pic']));
  //   $data1 = $data['pic']['0'];
  //   $this->assign('nums',$num);
  //   $this->assign('data1',$data1);
    $data = M('ExpoPicture') -> order('id desc') -> select();
    $result = array();
    foreach ($data as $value){
      if(cookie('think_language') == "en-us"){
        $value['title'] = ($value['title_en']);
        $value['title_one'] = $value['title_one_en'];
        $value['title_two'] = $value['title_two_en'];
        $value['title_three'] = $value['title_three_en'];
        $value['title_four'] = $value['title_four_en'];
        $value['description'] = $value['description_en'];
      }else{
        $value['title'] = ($value['title']);
        $value['title_one'] = $value['title_one'];
        $value['title_two'] = $value['title_two'];
        $value['title_three'] = $value['title_three'];
        $value['title_four'] = $value['title_four'];
        $value['description'] = $value['description'];
      }
      // $value['thumb_pic'] = thumb_name($value['pic']);

      $result[] = $value;
    }
    // var_dump($result);exit;
  // var_dump($data);exit;
  // $data = $about['pic'];
  // $data['content'] = html_entity_decode($data['content']);
  // var_dump($data);
  $this->assign('data',$result);
    $this -> display();
  }

}
