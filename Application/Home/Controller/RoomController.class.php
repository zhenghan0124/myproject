<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 客房控制器
 * @author @janpun
 */
class RoomController extends GlobalController{
  public function index() {
    $about = D('Block') -> get_item_by_title('Room_banner');
    $data = json_decode($about['value'], true);
    // var_dump($data);exit;
    $room = M('Roomtype') -> order('id desc') -> select();
    $list = array();
    foreach ($room as $value) {
      if(cookie('think_language') == "en-us"){
          $value['title'] = $value['title_en'];
          $value['description'] = $value['description_en'];
      }else{
          $value['title'] = $value['title'];
          $value['description'] = $value['description'];
      }
      $list[] = $value;
    }
    $data1 = $data['pic']['0'];
    $this->assign('data1',$data1);
    $this->assign('list',$list);
    $this->display();
  }

  public function detail() {
    $id = I('get.id');
    $room = M('Roomtype') -> find($id);
    // var_dump($room);exit;
    if(cookie('think_language') == "en-us"){
          // $room['title'] = $room['title_en'];
          $room['description'] = $room['description_en'];
      }else{
          // $room['title'] = $room['title'];
          $room['description'] = $room['description'];
      }
    $this->assign('room',$room);
    $this->display();
  }

}
