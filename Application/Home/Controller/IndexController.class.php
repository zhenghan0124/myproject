<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends GlobalController {
  public function index(){
    // $title = "index_logo";

  	//banner图
  	$info = D('Block') -> get_item_by_title('index_logo');
    //酒店介绍
  	$about = D('Block') -> get_item_by_title('index_about');
  	$about = json_decode($about['value'], true);
    //餐饮
    $dinner = D('Block') -> get_item_by_title('dinner_index');
    $dinner = json_decode($dinner['value'], true);
    //水疗
    $water = D('Block') -> get_item_by_title('Water_index');
    $water = json_decode($water['value'], true);
    //活动
    $activity = D('Block') -> get_item_by_title('Activity_index');
    $activity = json_decode($activity['value'], true);
    //目的地
    $product = D('Block') -> get_item_by_title('Product_index');
    $product = json_decode($product['value'], true);
    //目的地
    $honor = D('Block') -> get_item_by_title('honor_index');
    $honor = json_decode($honor['value'], true);
        // var_dump($info);
  	//多语言支持
    if(cookie('think_language') == "en-us"){
      // $about['description'] = ($about['description_en']);
      $about['content'] = html_entity_decode($about['content_en']);
      $dinner['description'] = ($dinner['description_en']);
      $water['description'] = ($water['description_en']);
      $activity['description'] = ($activity['description_en']);
    }else{
      // $about['description'] = ($about['description']);
      $about['content'] = html_entity_decode($about['content']);
      $dinner['description'] = ($dinner['description']);
      $water['description'] = ($water['description']);
      $activity['description'] = ($activity['description']);
    }
  	// var_dump($about);exit;
  	$data = json_decode($info['value'], true);
    // $num = intval(count($data['pic']));
    // var_dump($data);exit;
  	// $data['content'] = html_entity_decode($data['content']);
    $data1 = $data['pic']['0'];
  	// var_dump($data);
   //  var_dump($data1);
  	$this->assign('data',$data);
    // $this->assign('nums',$num);
    $this->assign('data1',$data1);
  	$this->assign('about',$about);
    $this->assign('dinner',$dinner);
    $this->assign('water',$water);
    $this->assign('activity',$activity);
    $this->assign('product',$product);
    $this->assign('honor',$honor);
    
    $aa = $_SESSION['aa'];
    $this->assign('aa',$aa);
    // //房型
    // $room = M('Roomtype') -> order('id desc') -> limit(3) -> select();
    // // var_dump($room);
    // $list = array();
    // foreach ($room as $value){
    //   if(cookie('think_language') == "en-us"){
    //     $value['title'] = ($value['title_en']);
    //     $value['description'] = $value['description_en'];
    //   }else{
    //     $value['title'] = $value['title'];
    //     $value['description'] = $value['description'];
    //   }
    //   $value['thumb_pic'] = thumb_name($value['pic']);

    //   $list[] = $value;
    // }
    // $this -> assign('list', $list);
    
    // //新闻
    // // $count = M('News') -> where($map) -> count();
    // // $Pages = new \Think\Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    // // $show = $Pages->show();// 分页显示输出
    // // $result_arr = M('News') -> where($map) -> order('rank desc,time desc,id desc') -> limit($Pages -> firstRow.','.$Pages -> listRows) -> select();
    // $result_arr = M('News') -> order('id desc') -> limit(4) -> select();
    // // var_dump($result_arr);
    // $result = array();
    // foreach ($result_arr as $value){
    //   if(cookie('think_language') == "en-us"){
    //     $value['title'] = ($value['title_en']);
    //     $value['description'] = $value['description_en'];
    //   }else{
    //     $value['title'] = $value['title'];
    //     $value['description'] = $value['description'];
    //   }
    //   $value['thumb_pic'] = thumb_name($value['pic']);

    //   $result[] = $value;
    // }
    // $this -> assign('result', $result);
    // var_dump($result);
    $start = date('Y-m-d');;
    $end = date('Y-m-d', strtotime('+1 day'));
    $this->assign('start',$start);
    $this->assign('end',$end);
    $this -> display();

  }
}