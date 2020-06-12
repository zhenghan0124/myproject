<?php
/*
*
*@copyright 2017 qianye.me
*@author Janpun
*@version 20170813
*
*/
namespace Admin\Controller;
use Think\Controller;

/**
 * 会议中心控制器
 * @author @janpun
 */
class BusinessController extends CommonController{
  public function index() {
    $title = "Business_index";

    if(IS_POST){
      $post = I('post.');

      //特殊数据处理
      $post['content'] = str_replace(PHP_EOL, '', $post['content']);
      $post['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);

      //整理提交数据
      $data['value'] = json_encode($post);  //内容转json存储
      $result = D('Block') -> deal_with_item($title, $data);

      if($result){
        $this->success('修改成功！');
      }else{
        $this->error('修改失败！');
      }

    }else{
      //显示标题
      $page['title'] = "商务休闲";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;
      
      //获取数据
      $info = D('Block') -> get_item_by_title($title);
      $data = json_decode($info['value'], true);
      $data['content'] = html_entity_decode($data['content']);
      $data['content_en'] = html_entity_decode($data['content_en']);
      $this->assign('data',$data);

      $this->display();
    }
  }

  /**
   * 历史会议列表
   */
  public function history() {
    //显示标题
    $page['title'] = "历史会议";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

    // $map['history'] = 1;
    $count = M('MeetingPicture') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('MeetingPicture') -> where($map) -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 新增历史会议
   */
  public function add_history() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['pic'] = $post['pic'];
      $map['price'] = $post['price'];
      $map['etime'] = strtotime($post['etime']);
      $map['stime'] = strtotime($post['stime']);
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      if(empty($post['description'])){
        $map['description'] = mb_substr(strip_tags(html_entity_decode($post['content'])),0,50,'utf-8');
      }else{
        $map['description'] = $post['description'];
      }
      $map['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);
      if(empty($post['description_en'])){
        $map['description_en'] = substr(strip_tags(html_entity_decode($post['content_en'])),0,50);
      }else{
        $map['description_en'] = $post['description_en'];
      }
      // $map['history'] = 1;
      // $map['rank'] = $post['rank'];
      $map['time'] = strtotime($post['time']);
      $count = M('MeetingPicture') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('history'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增历史会议";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $this -> display();
    }
  }


  /**
   * 编辑历史会议
   */
  public function edit_history() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['pic'] = $post['pic'];
      $map['price'] = $post['price'];
      $map['etime'] = strtotime($post['etime']);
      $map['stime'] = strtotime($post['stime']);
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      if(empty($post['description'])){
        $map['description'] = mb_substr(strip_tags(html_entity_decode($post['content'])),0,50,'utf-8');
      }else{
        $map['description'] = $post['description'];
      }
      $map['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);
      if(empty($post['description_en'])){
        $map['description_en'] = substr(strip_tags(html_entity_decode($post['content_en'])),0,50);
      }else{
        $map['description_en'] = $post['description_en'];
      }
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];

      $count = M('MeetingPicture') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", u('history'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑历史会议";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $id = I('get.id');
      $data = M('MeetingPicture') -> find($id);
      $data['content'] = html_entity_decode($data['content']);
      $data['content_en'] = html_entity_decode($data['content_en']);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除历史会议
   */
  public function del_history() {
    $id = I('get.id');
    $count = M('MeetingPicture') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }
}
