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
 * 北辰酒店控制器
 * @author @janpun
 */
class BeichenController extends CommonController{

  /**
   * 酒店介绍
   */
  public function index() {
    $title = "beichen_index";

    if(IS_POST){
      $post = I('post.');

      //特殊数据处理
      $post['content'] = str_replace(PHP_EOL, '', $post['content']);

      //整理提交数据
      $data['value'] = json_encode($post);	//内容转json存储
      $result = D('Block') -> deal_with_item($title, $data);

      if($result){
        $this->success('修改成功！');
      }else{
        $this->error('修改失败！');
      }

    }else{
      //显示标题
      $page['title'] = "北辰酒店介绍";
      $this -> assign('page', $page);

      //获取数据
      $info = D('Block') -> get_item_by_title($title);
      $data = json_decode($info['value'], true);
      $data['content'] = html_entity_decode($data['content']);
      $this->assign('data',$data);

      $this->display();
    }
  }

  /**
   * 图集列表
   */
  public function picture() {
    //显示标题
    $page['title'] = "图集";
    $this -> assign('page', $page);

    $count = M('HotelPicture') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('HotelPicture') -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 新增图集
   */
  public function add_picture() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['pic'] = $post['pic'];
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      if(empty($post['description'])){
        $map['description'] = mb_substr(strip_tags(html_entity_decode($post['content'])),0,50,'utf-8');
      }else{
        $map['description'] = $post['description'];
      }
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];
      $count = M('HotelPicture') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('picture'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增图集";
      $this -> assign('page', $page);

      $this -> display();
    }
  }


  /**
   * 编辑图集
   */
  public function edit_picture() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['title'] = $post['title'];
      $map['pic'] = $post['pic'];
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      if(empty($post['description'])){
        $map['description'] = mb_substr(strip_tags(html_entity_decode($post['content'])),0,50,'utf-8');
      }else{
        $map['description'] = $post['description'];
      }
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];

      $count = M('HotelPicture') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", u('picture'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑图集";
      $this -> assign('page', $page);

      $id = I('get.id');
      $data = M('HotelPicture') -> find($id);
      $data['content'] = html_entity_decode($data['content']);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除图集
   */
  public function del_picture() {
    $id = I('get.id');
    $count = M('HotelPicture') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }


  /**
   * 服务列表
   */
  public function service() {
    //显示标题
    $page['title'] = "服务";
    $this -> assign('page', $page);

    $count = M('HotelService') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('HotelService') -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 新增服务
   */
  public function add_service() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['pic'] = $post['pic'];
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      if(empty($post['description'])){
        $map['description'] = mb_substr(strip_tags(html_entity_decode($post['content'])),0,50,'utf-8');
      }else{
        $map['description'] = $post['description'];
      }
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];
      $count = M('HotelService') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('service'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增服务";
      $this -> assign('page', $page);

      $this -> display();
    }
  }


  /**
   * 编辑服务
   */
  public function edit_service() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['title'] = $post['title'];
      $map['pic'] = $post['pic'];
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      if(empty($post['description'])){
        $map['description'] = mb_substr(strip_tags(html_entity_decode($post['content'])),0,50,'utf-8');
      }else{
        $map['description'] = $post['description'];
      }
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];

      $count = M('HotelService') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", u('service'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑服务";
      $this -> assign('page', $page);

      $id = I('get.id');
      $data = M('HotelService') -> find($id);
      $data['content'] = html_entity_decode($data['content']);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除服务
   */
  public function del_service() {
    $id = I('get.id');
    $count = M('HotelService') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }
}
