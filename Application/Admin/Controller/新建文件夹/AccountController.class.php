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
 * 账户管理控制器
 * @author @janpun
 */
class AccountController extends CommonController{

  /**
   * 密码修改
   */
  public function password() {
    if(IS_POST){
      $post = I('post.');
      if(md5($post['old_password']) == $GLOBALS['user']['password']){
        if($post['password'] == $post['repassword']){
          $data['id'] = $GLOBALS['user']['id'];
          $data['password'] = md5($post['password']);
          $result = M("Admin") -> save($data);
          if($result){
            $this->success('修改成功！');
          }else{
            $this->error('修改失败！');
          }
        }else{
          $this -> error("两次密码不同");
        }
      }else{
        $this -> error("原密码不正确");
      }
    }else{
      //显示标题
      $page['title'] = "密码修改";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      $this->display();
    }
  }
}
