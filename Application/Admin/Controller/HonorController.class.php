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
 * 关于我们控制器
 * @author @janpun
 */
class HonorController extends CommonController{

  /**
   * 展览介绍
   */
  public function index() {
    $title = "honor_index";

    if(IS_POST){
      $post = I('post.');

      //特殊数据处理
      $post['content'] = str_replace(PHP_EOL, '', $post['content']);
      $post['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);

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
      $page['title'] = "荣誉";
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

  public function about() {
    $title = "about_about";

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
      $page['title'] = "千岛湖安麓";
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
}
