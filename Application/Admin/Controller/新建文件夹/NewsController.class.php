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
 *  新闻控制器
 * @author @janpun
 */
class NewsController extends CommonController{

  /**
   * 新闻列表
   */
  public function index() {
    //显示标题
    $page['title'] = "新闻";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

    $count = M('News') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('News') -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 新增新闻
   */
  public function add_news() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['category'] = $post['category'];
      $map['pic'] = $post['pic'];
      $map['author'] = $post['author'];
      $map['language'] = $post['language'];
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      if(empty($post['description'])){
        $map['description'] = mb_substr(strip_tags(html_entity_decode($post['content'])),0,50,'utf-8');
      }else{
        $map['description'] = $post['description'];
      }
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];
      $count = M('News') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('index'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增新闻";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $this -> display();
    }
  }


  /**
   * 编辑新闻
   */
  public function edit_news() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['title'] = $post['title'];
      $map['category'] = $post['category'];
      $map['pic'] = $post['pic'];
      $map['author'] = $post['author'];
      $map['language'] = $post['language'];
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      if(empty($post['description'])){
        $map['description'] = mb_substr(strip_tags(html_entity_decode($post['content'])),0,50,'utf-8');
      }else{
        $map['description'] = $post['description'];
      }
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];

      $count = M('News') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", u('index'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑新闻";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;
      
      $id = I('get.id');
      $data = M('News') -> find($id);
      $data['content'] = html_entity_decode($data['content']);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除新闻
   */
  public function del_news() {
    $id = I('get.id');
    $count = M('News') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }
}
