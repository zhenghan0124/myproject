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
 * G20控制器
 * @author @janpun
 */
class G20Controller extends CommonController{
  /**
   * G20介绍
   */
  public function index() {
    $title = "g20_index";

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
      $page['title'] = "G20体验馆介绍";
      $this -> assign('page', $page);

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
   * 手办列表
   */
  public function hand() {
    //显示标题
    $page['title'] = "国博手办";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

    $count = M('G20Hand') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('G20Hand') -> order('id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();
    // var_dump($data);exit;
    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }

  /**
   * 新增手办
   */
  public function add_hand() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['mprice'] = $post['mprice'];
      $map['oprice'] = $post['oprice'];
      $map['postage'] = $post['postage'];
      $map['stock'] = $post['stock'];
      $map['attribute'] = $post['attribute'];
      $map['region'] = $post['region'];
      $map['category'] = $post['category'];
      $map['pic'] = $post['pic'];
      $map['details'] = str_replace(PHP_EOL, '', $post['details']);
      $map['special'] = str_replace(PHP_EOL, '', $post['special']);
      $map['description'] = $post['description'];
      // if(empty($post['description'])){
      //   $map['description'] = mb_substr(strip_tags(html_entity_decode($post['content'])),0,50,'utf-8');
      // }else{
      //   $map['description'] = $post['description'];
      // }
      // $map['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);
      // if(empty($post['description_en'])){
      //   $map['description_en'] = substr(strip_tags(html_entity_decode($post['content_en'])),0,50);
      // }else{
      //   $map['description_en'] = $post['description_en'];
      // }
      // $map['time'] = strtotime($post['time']);
      // $map['rank'] = $post['rank'];
      $count = M('G20Hand') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('hand'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增手办";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $this -> display();
    }
  }

  /**
   * 编辑手办
   */
  public function edit_hand() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $id = $post['id'];
      $map['title'] = $post['title'];
      $map['mprice'] = $post['mprice'];
      $map['oprice'] = $post['oprice'];
      $map['postage'] = $post['postage'];
      $map['stock'] = $post['stock'];
      $map['attribute'] = $post['attribute'];
      $map['region'] = $post['region'];
      $map['category'] = $post['category'];
      $map['pic'] = $post['pic'];
      $map['details'] = str_replace(PHP_EOL, '', $post['details']);
      $map['special'] = str_replace(PHP_EOL, '', $post['special']);
      $map['description'] = $post['description'];
      // var_dump($map);exit;
      // if(empty($post['description'])){
      //   $map['description'] = mb_substr(strip_tags(html_entity_decode($post['content'])),0,50,'utf-8');
      // }else{
      //   $map['description'] = $post['description'];
      // }
      // $map['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);
      // if(empty($post['description_en'])){
      //   $map['description_en'] = substr(strip_tags(html_entity_decode($post['content_en'])),0,50);
      // }else{
      //   $map['description_en'] = $post['description_en'];
      // }
      // $map['time'] = strtotime($post['time']);
      // $map['rank'] = $post['rank'];

      $count = M('G20Hand')->where('id='.$id) -> save($map);

      if($count > 0){
        $this -> success("编辑成功", u('hand'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑手办";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $id = I('get.id');
      $data = M('G20Hand') -> find($id);
      $data['details'] = html_entity_decode($data['details']);
      $data['special'] = html_entity_decode($data['special']);
      $this -> assign('data', $data);

      $this -> display();
    }
  }

  /**
   * 删除手办
   */
  public function del_hand() {
    $id = I('get.id');
    $count = M('G20Hand') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }

  /**
   * 订单列表
   */
  public function hand_order() {
    //显示标题
    $page['title'] = "订单";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

    $count = M('G20Handorder') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('G20Handorder') -> order('oid desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();
    // var_dump($data);exit;
    for($i = 0 ; $i < count($data) ; $i++){
      $data[$i]['time'] = date('Y-m-d H:i:s', $data[$i]['time']);
    }
    // var_dump($data);
    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }

  /**
   * 编辑订单
   */
  public function edit_order() {
    if(IS_POST){
      $post = I('post.');
      //编辑订单
      if($post['act'] == 1){
        //整理提交数据
        // var_dump($post);exit;
        $oid = $post['id'];
        // var_dump($oid);exit;
        $map['name'] = $post['name'];
        $map['tel'] = $post['tel'];
        $map['address'] = $post['address'];
        $map['wuliu_info'] = $post['wuliu'];
        $map['info'] = $post['info'];

        $count = M('G20Handorder')->where('oid='.$oid) -> save($map);

        if($count > 0){
          $this -> success("编辑成功", u('hand_order'));
        }else{
          $this -> error("编辑失败");
        }
      }
      //完成订单
      if($post['act'] == 2){
        //整理提交数据
        // var_dump($post);exit;
        $oid = $post['id'];
        // var_dump($oid);exit;
        $map['statu'] = 1;

        $count = M('G20Handorder')->where('oid='.$oid) -> save($map);

        if($count > 0){
          $this -> success("操作成功", u('hand_order'));
        }else{
          $this -> error("操作失败");
        }
      }
    }else{
      //显示标题
      $page['title'] = "处理订单";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $id = I('get.id');
      $data = M('G20Handorder') -> find($id);
      $data['time'] = date('Y-m-d H:i:s', $data['time']);
      if($data['paystatu'] == 1){
        $data['paystatu'] = "已支付";
      }else{
        $data['paystatu'] = "未支付";
      }
      // var_dump($data);exit;
      $this -> assign('data', $data);

      $this -> display();
    }
  }

  /**
   * 删除订单
   */
  public function del_order() {
    $id = I('get.id');
    $count = M('G20Handorder') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }

  /**
   * G20介绍
   */
  public function ticket_notice() {
    $title = "g20_ticket_notice";

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
      $page['title'] = "G20门票公告";
      $this -> assign('page', $page);

      //获取数据
      $info = D('Block') -> get_item_by_title($title);
      $data = json_decode($info['value'], true);
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

    $count = M('G20Picture') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('G20Picture') -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

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
      $count = M('G20Picture') -> add($map);

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

      $count = M('G20Picture') -> save($map);

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
      $data = M('G20Picture') -> find($id);
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
    $count = M('G20Picture') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }


  /**
   * 菜品介绍列表
   */
  public function food() {
    //显示标题
    $page['title'] = "菜品介绍";
    $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;
      
    $count = M('G20Food') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('G20Food') -> order('rank desc,time desc,id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 新增菜品介绍
   */
  public function add_food() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['sub_title'] = $post['sub_title'];
      $map['sub_title_en'] = $post['sub_title_en'];
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
      $count = M('G20Food') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('food'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增菜品介绍";
      $this -> assign('page', $page);

      $this -> display();
    }
  }


  /**
   * 编辑菜品介绍
   */
  public function edit_food() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['sub_title'] = $post['sub_title'];
      $map['sub_title_en'] = $post['sub_title_en'];
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

      $count = M('G20Food') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", u('food'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑菜品介绍";
      $this -> assign('page', $page);

      $id = I('get.id');
      $data = M('G20Food') -> find($id);
      $data['content'] = html_entity_decode($data['content']);
      $data['content_en'] = html_entity_decode($data['content_en']);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除菜品介绍
   */
  public function del_food() {
    $id = I('get.id');
    $count = M('G20Food') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }
}
