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
 * 展览中心控制器
 * @author @janpun
 */
class ExpoController extends CommonController{

  /**
   * 展览介绍
   */
  public function index() {
    $title = "expo_index";

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
      $page['title'] = "展览中心介绍";
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
   * 图集列表
   */
  public function picture() {
    //显示标题
    $page['title'] = "图集";
    $this -> assign('page', $page);
    $aid = session('aid');
    $this -> assign('aid', $aid);
    // var_dump($aid);exit;

    $count = M('ExpoPicture') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('ExpoPicture') -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 图集隐藏
   */
  public function picture_hidden() {
    $id = I('get.id');
    $expo_picture_info = M('ExpoPicture') -> find($id);
    $data['id'] = $id;
    if($expo_picture_info['is_hidden'] == 1){
      $data['is_hidden'] = 0;
      $count = M('ExpoPicture') -> save($data);
      if($count > 0){
        $this -> success("已设为显示");
      }else{
        $this -> error("设置失败");
      }
    }else{
      $data['is_hidden'] = 1;
      $count = M('ExpoPicture') -> save($data);
      if($count > 0){
        $this -> success("已设为隐藏");
      }else{
        $this -> error("设置失败");
      }
    }
  }

  /**
   * 排期隐藏
   */
  public function history_hidden() {
    $id = I('get.id');
    $expo_picture_info = M('ExpoPicture') -> find($id);
    $data['id'] = $id;
    if($expo_picture_info['is_hidden2'] == 1){
      $data['is_hidden2'] = 0;
      $count = M('ExpoPicture') -> save($data);
      if($count > 0){
        $this -> success("已设为显示");
      }else{
        $this -> error("设置失败");
      }
    }else{
      $data['is_hidden2'] = 1;
      $count = M('ExpoPicture') -> save($data);
      if($count > 0){
        $this -> success("已设为隐藏");
      }else{
        $this -> error("设置失败");
      }
    }
  }


  /**
   * 新增图集
   */
  public function add_picture() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['pic'] = $post['pic'];
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
      $count = M('ExpoPicture') -> add($map);

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
      $map['title_en'] = $post['title_en'];
      $map['pic'] = $post['pic'];
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

      $count = M('ExpoPicture') -> save($map);

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
      $data = M('ExpoPicture') -> find($id);
      $data['content'] = html_entity_decode($data['content']);
      $data['content_en'] = html_entity_decode($data['content_en']);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除图集
   */
  public function del_picture() {
    $id = I('get.id');
    $count = M('ExpoPicture') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }


  /**
   * 技术参数列表
   */
  public function data() {
    //显示标题
    $page['title'] = "技术参数";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

    $count = M('ExpoData') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('ExpoData') -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 新增技术参数
   */
  public function add_data() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['pic'] = json_encode($post['pic']);
      $map['attachment'] = $post['attachment'];
      $map['param'] = json_encode($post['param']);
      $map['param_en'] = json_encode($post['param_en']);
      $map['time'] = time();
      $map['rank'] = $post['rank'];
      $count = M('ExpoData') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('data'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增技术参数";
      $this -> assign('page', $page);

      $this -> display();
    }
  }


  /**
   * 编辑技术参数
   */
  public function edit_data() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['pic'] = json_encode($post['pic']);
      $map['attachment'] = $post['attachment'];
      $map['param'] = json_encode($post['param']);
      $map['param_en'] = json_encode($post['param_en']);
      $map['time'] = time();
      $map['rank'] = $post['rank'];

      $count = M('ExpoData') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", u('data'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑技术参数";
      $this -> assign('page', $page);

      $id = I('get.id');
      $data = M('ExpoData') -> find($id);
      $data['pic'] = json_decode($data['pic'], true);
      $data['param'] = json_decode($data['param'], true);
      $data['param_en'] = json_decode($data['param_en'], true);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除技术参数
   */
  public function del_data() {
    $id = I('get.id');
    $count = M('ExpoData') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }


  /**
   * 历史展会列表
   */
  public function history() {
    //显示标题
    $page['title'] = "历史展会";
    $this -> assign('page', $page);
    $aid = session('aid');
    $this -> assign('aid', $aid);
    // var_dump($aid);exit;
    $map['history'] = 1;
    $count = M('ExpoPicture') -> where($map) -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('ExpoPicture') -> where($map) -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 新增历史展会
   */
  public function add_history() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['pic'] = $post['pic'];
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
      $map['history'] = 1;
      $map['rank'] = $post['rank'];
      $count = M('ExpoPicture') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('history'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增历史展会";
      $this -> assign('page', $page);

      $this -> display();
    }
  }


  /**
   * 编辑历史展会
   */
  public function edit_history() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['pic'] = $post['pic'];
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

      $count = M('ExpoPicture') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", u('history'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑历史展会";
      $this -> assign('page', $page);

      $id = I('get.id');
      $data = M('ExpoPicture') -> find($id);
      $data['content'] = html_entity_decode($data['content']);
      $data['content_en'] = html_entity_decode($data['content_en']);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除历史展会
   */
  public function del_history() {
    $id = I('get.id');
    $count = M('ExpoPicture') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }



  /**
   * 报名列表
   */
  public function reserve() {
    //显示标题
    $page['title'] = "报名";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;
    $map['type'] = 1;

    $count = M('Reserve') -> where($map) -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('Reserve') -> where($map) -> order('date desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 编辑报名
   */
  public function view_reserve() {
    //显示标题
    $page['title'] = "查看报名";
    $this -> assign('page', $page);

    $id = I('get.id');
    $data = M('Reserve') -> find($id);
    $data['content'] = html_entity_decode($data['content']);
    $data['content_en'] = html_entity_decode($data['content_en']);
    $this -> assign('data', $data);

    $this -> display();
  }


  /**
   * 删除报名
   */
  public function del_reserve() {
    $id = I('get.id');
    $count = M('Reserve') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }
}
