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
 * 服务指南控制器
 * @author @janpun
 */
class ServiceController extends CommonController{

  /**
   * 主办方手册列表
   */
  public function manual() {
    //显示标题
    $page['title'] = "主办方手册";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

    $count = M('Manual') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('Manual') -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 新增主办方手册
   */
  public function add_manual() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['attachment'] = $post['attachment'];
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];
      $count = M('Manual') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('manual'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增主办方手册";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $this -> display();
    }
  }


  /**
   * 编辑主办方手册
   */
  public function edit_manual() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['attachment'] = $post['attachment'];
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];

      $count = M('Manual') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", u('manual'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑主办方手册";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $id = I('get.id');
      $data = M('Manual') -> find($id);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除主办方手册
   */
  public function del_manual() {
    $id = I('get.id');
    $count = M('Manual') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }


  /**
   * 广告服务列表
   */
  public function ads() {
    //显示标题
    $page['title'] = "广告服务";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

    $count = M('Ads') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('Ads') -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 新增广告服务
   */
  public function add_ads() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['attachment'] = $post['attachment'];
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];
      $count = M('Ads') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('ads'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增广告服务";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $this -> display();
    }
  }


  /**
   * 编辑广告服务
   */
  public function edit_ads() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['attachment'] = $post['attachment'];
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];

      $count = M('Ads') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", u('ads'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑广告服务";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $id = I('get.id');
      $data = M('Ads') -> find($id);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除广告服务
   */
  public function del_ads() {
    $id = I('get.id');
    $count = M('Ads') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }


  /**
   * 展位搭建须知列表
   */
  public function rule() {
    //显示标题
    $page['title'] = "展位搭建须知";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

    $count = M('Rule') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('Rule') -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 新增展位搭建须知
   */
  public function add_rule() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      $map['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];
      $count = M('Rule') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('rule'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增展位搭建须知";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $this -> display();
    }
  }


  /**
   * 编辑展位搭建须知
   */
  public function edit_rule() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      $map['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];

      $count = M('Rule') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", u('rule'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑展位搭建须知";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $id = I('get.id');
      $data = M('Rule') -> find($id);
      $data['content'] = html_entity_decode($data['content']);
      $data['content_en'] = html_entity_decode($data['content_en']);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除展位搭建须知
   */
  public function del_rule() {
    $id = I('get.id');
    $count = M('Rule') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }


  /**
   * 公交线路列表
   */
  public function bus() {
    //显示标题
    $page['title'] = "公交线路";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

    $count = M('Bus') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('Bus') -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 新增公交线路
   */
  public function add_bus() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      $map['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];
      $count = M('Bus') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('bus'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增公交线路";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $this -> display();
    }
  }


  /**
   * 编辑公交线路
   */
  public function edit_bus() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      $map['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];

      $count = M('Bus') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", u('bus'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑公交线路";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $id = I('get.id');
      $data = M('Bus') -> find($id);
      $data['content'] = html_entity_decode($data['content']);
      $data['content_en'] = html_entity_decode($data['content_en']);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除公交线路
   */
  public function del_bus() {
    $id = I('get.id');
    $count = M('Bus') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }



  /**
   * 如何到达
   */
  public function traffic() {
    $title = "service_traffic";

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
      $page['title'] = "如何到达";
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
   * 申请列表
   */
  public function construct() {
    //显示标题
    $page['title'] = "施工申办";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

    $count = M('Construct') -> where($map) -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('Construct') -> where($map) -> order('time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 编辑申请
   */
  public function view_construct() {
    //显示标题
    $page['title'] = "查看申请";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;
      
    $id = I('get.id');
    $data = M('Construct') -> find($id);
    $data['content'] = html_entity_decode($data['content']);
    $data['content_en'] = html_entity_decode($data['content_en']);
    $this -> assign('data', $data);

    $this -> display();
  }


  /**
   * 删除申请
   */
  public function del_construct() {
    $id = I('get.id');
    $count = M('Construct') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }
}
