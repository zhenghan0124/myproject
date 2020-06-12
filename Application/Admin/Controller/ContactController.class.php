<?php
/*
*
*@copyright 2017 qianye.me
*@author zhenghan
*@version 20170813
*
*/
namespace Admin\Controller;
use Think\Controller;

/**
 * 后台首页控制器
 * @author @zhenghan
 */
class ContactController extends CommonController{

  /**
   * banner
   */
  public function banner() {
    $title = "Contact_banner";

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
      $page['title'] = "banner图";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;
      
      //获取数据
      $info = D('Block') -> get_item_by_title($title);
      $data = json_decode($info['value'], true);
      $data['content'] = html_entity_decode($data['content']);
      $this->assign('data',$data);

      $this->display();
    }
  }

  public function index() {
    //显示标题
    $page['title'] = "留言列表";
    $this -> assign('page', $page);
    $aid = session('aid');
    $this -> assign('aid', $aid);
      // var_dump($aid);exit;
      
    $count = M('Contact') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('Contact') -> order('id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }

  public function edit() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['name'] = $post['name'];
      $map['email'] = $post['email'];
      $map['mobile'] = $post['mobile'];
      $map['info'] = $post['info'];

      $count = M('Contact') -> save($map);

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
      $data = M('Contact') -> find($id);
      // $data['content'] = html_entity_decode($data['content']);
      // $data['content_en'] = html_entity_decode($data['content_en']);
      $this -> assign('data', $data);

      $this -> display();
    }
  }
  public function del() {
    $id = I('get.id');
    $count = M('Contact') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }

}
