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
class DinnerController extends CommonController{
  public function index() {
    $title = "dinner_index";

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
      $page['title'] = "餐饮";
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
  public function dinner() {
    //显示标题
    $page['title'] = "餐饮";
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
   * 新增图集
   */
  public function add_picture() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['pic'] = $post['pic'];
      $map['pic1'] = $post['pic1'];
      $map['pic2'] = $post['pic2'];
      $map['pic3'] = $post['pic3'];
      $map['pic4'] = $post['pic4'];
      $map['pic5'] = $post['pic5'];
      $map['pic6'] = $post['pic6'];
      $map['title_one'] = $post['title_one'];
      $map['title_one_en'] = $post['title_one_en'];
      $map['title_two'] = $post['title_two'];
      $map['title_two_en'] = $post['title_two_en'];
      $map['title_three'] = $post['title_three'];
      $map['title_three_en'] = $post['title_three_en'];
      $map['title_four'] = $post['title_four'];
      $map['title_four_en'] = $post['title_four_en'];
      $map['title_five'] = $post['title_five'];
      $map['title_five_en'] = $post['title_five_en'];
      $map['title_six'] = $post['title_six'];
      $map['title_six_en'] = $post['title_six_en'];
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      $map['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);
      $map['description'] = $post['description'];
      $map['description_en'] = $post['description_en'];
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
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];
      $count = M('ExpoPicture') -> add($map);

      if($count > 0){
        $this -> success("添加成功", U('dinner'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $page['title'] = "新增餐饮服务";
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
      $map['pic1'] = $post['pic1'];
      $map['pic2'] = $post['pic2'];
      $map['pic3'] = $post['pic3'];
      $map['pic4'] = $post['pic4'];
      $map['pic5'] = $post['pic5'];
      $map['pic6'] = $post['pic6'];
      $map['title_one'] = $post['title_one'];
      $map['title_one_en'] = $post['title_one_en'];
      $map['title_two'] = $post['title_two'];
      $map['title_two_en'] = $post['title_two_en'];
      $map['title_three'] = $post['title_three'];
      $map['title_three_en'] = $post['title_three_en'];
      $map['title_four'] = $post['title_four'];
      $map['title_four_en'] = $post['title_four_en'];
      $map['title_five'] = $post['title_five'];
      $map['title_five_en'] = $post['title_five_en'];
      $map['title_six'] = $post['title_six'];
      $map['title_six_en'] = $post['title_six_en'];
      $map['content'] = str_replace(PHP_EOL, '', $post['content']);
      $map['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);
      $map['description'] = $post['description'];
      $map['description_en'] = $post['description_en'];
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
      $map['time'] = strtotime($post['time']);
      $map['rank'] = $post['rank'];
      // var_dump($map);exit;
      $count = M('ExpoPicture') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", u('dinner'));
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
      // var_dump($data);exit;
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
}
