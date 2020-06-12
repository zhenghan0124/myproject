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
 * 后台首页控制器
 * @author @janpun
 */
class IndexController extends CommonController{

  /**
   * 首页
   */
  public function index() {
    $title = "index_logo";

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
      $page['title'] = "logo组合";
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


  /**
   * email
   */
  public function email() {
    $title = "index_email";

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
      $page['title'] = "接收邮箱";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      //获取数据
      $info = D('Block') -> get_item_by_title($title);
      $data = json_decode($info['value'], true);
      $this->assign('data',$data);

      $this->display();
    }
  }
}
