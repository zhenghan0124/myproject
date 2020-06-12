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
 * 人才招聘控制器
 * @author @janpun
 */
class HrController extends CommonController{

  public function banner() {
    $title = "Hr_index";

    if(IS_POST){
      $post = I('post.');

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
      $page['title'] = "人才招聘";
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
   * 人才招聘列表
   */
  public function index() {
    //显示标题
    $page['title'] = "人才招聘";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;
      
    $count = M('Hr') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('Hr') -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 新增人才招聘
   */
  public function add_hr() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['education'] = $post['education'];
      $map['education_en'] = $post['education_en'];
      $map['num'] = $post['num'];
      $map['place'] = $post['place'];
      $map['place_en'] = $post['place_en'];
      $map['email'] = $post['email'];
      $map['email_en'] = $post['email_en'];
      // $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      // $map['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);
      $map['end_date'] = strtotime($post['end_date']);
      $map['time'] = time();
      $map['rank'] = $post['rank'];
      $count = M('Hr') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('index'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增人才招聘";
      $this -> assign('page', $page);

      $this -> display();
    }
  }


  /**
   * 编辑人才招聘
   */
  public function edit_hr() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['education'] = $post['education'];
      $map['education_en'] = $post['education_en'];
      $map['num'] = $post['num'];
      $map['place'] = $post['place'];
      $map['place_en'] = $post['place_en'];
      $map['email'] = $post['email'];
      $map['email_en'] = $post['email_en'];
      // $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      // $map['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);
      $map['end_date'] = strtotime($post['end_date']);
      $map['rank'] = $post['rank'];

      $count = M('Hr') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", U('index'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑人才招聘";
      $this -> assign('page', $page);

      $id = I('get.id');
      $data = M('Hr') -> find($id);
      // $data['content'] = html_entity_decode($data['content']);
      // $data['content_en'] = html_entity_decode($data['content_en']);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除人才招聘
   */
  public function del_hr() {
    $id = I('get.id');
    $count = M('Hr') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }
}
