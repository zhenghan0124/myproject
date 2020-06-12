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
 * 客房控制器
 * @author @janpun
 */
class RoomController extends CommonController{
  /**
   * banner
   */
  public function banner() {
    $title = "Room_banner";

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
      $page['title'] = "banner图";
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
   * 房型列表
   */
  public function index() {
    //显示标题
    $page['title'] = "房型列表";
    $this -> assign('page', $page);
    $aid = session('aid');
    $this -> assign('aid', $aid);
    // var_dump($aid);exit;

    $count = M('Roomtype') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('Roomtype') -> order('id desc') -> limit($Pages -> firstRow.','.$Pages -> listRows) -> select();

    $this->assign('data',$data);
    $this->assign('id',$id);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }

  /**
   * 新增房型
   */
  public function add() {
    if(IS_POST){
      $post = I('post.');
      // $map['roomid'] = I('post.roomid');
      //整理提交数据
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['pic'] = $post['pic'];
      $map['area'] = $post['area'];
      $map['people'] = $post['people'];
      $map['description'] = $post['description'];
      $map['description_en'] = $post['description_en'];
      // var_dump($map);exit;
      // $map['time'] = strtotime($post['time']);
      // $map['rank'] = $post['rank'];
      $count = M('Roomtype') -> add($map);
      if($count > 0){
        $this -> success("添加成功", U('index'));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $roomid = I('get.roomid');
      // var_dump($roomid);exit;
      $page['title'] = "新增房型";
      $this -> assign('roomid', $roomid);
      $this -> assign('page', $page);

      $this -> display();
    }
  }


  /**
   * 编辑房型
   */
  public function edit() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = intval($post['id']);
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['pic'] = $post['pic'];
      $map['area'] = $post['area'];
      $map['people'] = $post['people'];
      $map['description'] = $post['description'];
      $map['description_en'] = $post['description_en'];
      // $map['time'] = strtotime($post['time']);
      // $map['rank'] = $post['rank'];
      // var_dump($map);exit;

      $count = M('Roomtype') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", U('index'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑房型";
      $this -> assign('page', $page);

      $where = array();
      $where['id'] = I('get.id');
      // $where['roomid'] = I('get.roomid');
      $data = M('Roomtype') -> where($where) -> find();
     
      $data['breakfast'] = intval($data['breakfast']);
      $data['wifi'] = intval($data['wifi']);
       // var_dump($data);exit;
      $data['content'] = html_entity_decode($data['content']);
      $data['content_en'] = html_entity_decode($data['content_en']);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除房类
   */
  public function del_room() {
    $id = I('get.id');
    $count = M('Roomtype') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }


  /**
   * 套餐列表
   */
  public function roomtype() {
    //显示标题
    $id = I('get.id');
    $page['title'] = "套餐列表";
    $this -> assign('page', $page);
    $aid = session('aid');
    $this -> assign('aid', $aid);
    // var_dump($aid);exit;

    $count = M('Price') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('Price') ->where('roomid='.$id) -> order('id desc') -> limit($Pages -> firstRow.','.$Pages -> listRows) -> select();

    $this->assign('data',$data);
    $this->assign('id',$id);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }

  /**
   * 新增房类
   */
  public function add_roomtype() {
    if(IS_POST){
      $post = I('post.');
      $map['roomid'] = I('post.roomid');
      //整理提交数据
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['pic'] = $post['pic'];
      $map['price'] = $post['price'];
      // $map['breakfast'] = intval($post['breakfast']);
      // $map['wifi'] = intval($post['wifi']);
      $map['area'] = $post['area'];
      $map['area_en'] = $post['area_en'];
      $map['bed'] = $post['bed'];
      $map['bed_en'] = $post['bed_en'];
      $map['add'] = $post['add'];
      $map['add_en'] = $post['add_en'];
      $map['floor'] = $post['floor'];
      $map['hp_hcode'] = $post['hp_hcode'];
      $map['hp_picode '] = $post['hp_picode  '];
      $map['start_date'] = $post['start_date'];
      $map['end_date'] = $post['end_date'];
      $map['paytype'] = $post['paytype'];
      // var_dump($map);exit;
      // $map['time'] = strtotime($post['time']);
      // $map['rank'] = $post['rank'];
      $count = M('Price') -> add($map);
      if($count > 0){
        $this -> success("添加成功", U('roomtype',array('id' => $map['roomid'])));
      }else{
        $this -> error("添加失败");
      }
    }else{
      //显示标题
      $roomid = I('get.roomid');
      // var_dump($roomid);exit;
      $page['title'] = "新增房型";
      $this -> assign('roomid', $roomid);
      $this -> assign('page', $page);

      $this -> display();
    }
  }

  /**
   * 编辑房类
   */
  public function edit_roomtype() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = intval($post['id']);
      $map['roomid'] = intval($post['roomid']);
      $map['title'] = $post['title'];
      $map['title_en'] = $post['title_en'];
      $map['pic'] = $post['pic'];
      $map['price'] = $post['price'];
      // $map['breakfast'] = intval($post['breakfast']);
      // $map['wifi'] = intval($post['wifi']);
      $map['area'] = $post['area'];
      $map['area_en'] = $post['area_en'];
      $map['bed'] = $post['bed'];
      $map['bed_en'] = $post['bed_en'];
      $map['add'] = $post['add'];
      $map['add_en'] = $post['add_en'];
      $map['floor'] = $post['floor'];
      $map['hp_hcode'] = $post['hp_hcode'];
      $map['hp_picode'] = $post['hp_picode'];
      $map['start_date'] = $post['start_date'];
      $map['end_date'] = $post['end_date'];
      $map['paytype'] = $post['paytype'];
      // $map['time'] = strtotime($post['time']);
      // $map['rank'] = $post['rank'];
      // var_dump($map);exit;

      $count = M('Price') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", U('roomtype',array('id' => $map['roomid'])));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑套餐";
      $this -> assign('page', $page);

      $where = array();
      $where['id'] = I('get.id');
      $where['roomid'] = I('get.roomid');
      $data = M('Price') -> where($where) -> find();
      // var_dump($data);
      $this -> assign('data', $data);

      $this -> display();
    }
  }


  /**
   * 删除房类
   */
  public function del_roomtype() {
    $id = I('get.id');
    $count = M('Price') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }

  /**
   * 在线预订列表
   */
  public function order() {
    //显示标题
    $page['title'] = "预定列表";
    $this -> assign('page', $page);
    $aid = session('aid');
    $this -> assign('aid', $aid);
    // var_dump($aid);exit;
    // $map['history'] = 1;
    $count = M('Order') -> count();
    $Pages = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show = $Pages->show();// 分页显示输出
    $data = M('Order') -> order('id desc') -> limit($Page -> firstRow.','.$Page -> listRows) -> select();
    // var_dump($data);exit;

    $this->assign('data',$data);
    $this -> assign('pagenavi', $show);

    $this -> display();
  }


  /**
   * 编辑预定信息
   */
  public function edit_order() {
    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $map['id'] = $post['id'];

      $map['title'] = $post['title'];
      $map['name'] = $post['name'];
      $map['pmtitle'] = $post['pmtitle'];
      $map['sdate'] = $post['sdate'];
      $map['edate'] = $post['edate'];
      $map['people'] = $post['people'];
      $map['nums'] = $post['nums'];
      $map['mobile'] = $post['mobile'];
      $map['email'] = $post['email'];
      $map['info'] = $post['info'];
     

      $count = M('Order') -> save($map);

      if($count > 0){
        $this -> success("编辑成功", U('order'));
      }else{
        $this -> error("编辑失败");
      }
    }else{
      //显示标题
      $page['title'] = "编辑订单";
      $this -> assign('page', $page);

      $id = I('get.id');
      $data = M('Order') -> find($id);
      $this -> assign('data', $data);

      $this -> display();
    }
  }

    public function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $expTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        vendor("PHPExcel.PHPExcel");

        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

        //$objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));


        for($i=0;$i<$cellNum;$i++){//有几列
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'1', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){//有几行
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+2), $expTableData[$i][$expCellName[$j][0]]);
            }
        }


        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
    /**
     *
     * 导出Excel
     */
    function expUser(){//导出Excel
      header("Content-Type: text/html;charset=utf-8");
        $xlsName  = "订单列表";
        $xlsCell  = array(
            array('name','客人姓名'),
            array('mobile','客人电话'),
            array('ordersn','网页订单号'),
            array('transaction_id','支付订单号'),
            array('title','房型'),
            array('pricetitle','套餐'),
            array('time','下单时间'),
            array('sdate','入住时间'),
            array('edate','退房时间'),
            array('nums','房间数量'),
            array('sum_price','订单金额'),
            array('paytype','支付方式'),
            // array('yufu','预付方式'),
            // array('cname','持卡人姓名'),
            // array('card','卡类型'),
            // array('cardnumber','卡号'),
            // array('month','到期月份'),
            // array('year','到期年份'),
        );
        $xlsModel = M('Order');
        $starttime=I('post.starttime');
        $endtime=I('post.endtime');

        // $xlsData=$xlsModel->where("creattime BETWEEN '{$starttime}' and '{$endtime}' AND statu=1")->select();
        $xlsData=$xlsModel->where("date BETWEEN '{$starttime}' and '{$endtime}'")->select();
        // $xlsModel->getLastSql();
        // var_dump($xlsModel);
        $data = array();
        foreach ($xlsData as $value) {
          $value['time'] = date("Y-m-d H:i:s",$value['time']);
          if($value['paytype'] == 3){
            $value['paytype'] = '到店';
          }elseif($value['paytype'] == 22){
            $value['paytype'] = '支付宝支付';
            $value['transaction_id'] = $value['transaction_id'].' ';
          }elseif($value['paytype'] == 21){
            $value['paytype'] = '微信支付';
            $value['transaction_id'] = $value['transaction_id'].' ';
          }
          // if($value['yufu'] == 0){
          //   $value['yufu'] = '首日房价';
          // }elseif($value['yufu'] == 1){
          //   $value['yufu'] = '全额房价';
          // }
          $data[] = $value;
        }
        // var_dump($data);exit;

        $this->exportExcel($xlsName,$xlsCell,$data);
    }


  /**
   * 删除历史展会
   */
  public function del_order() {
    $id = I('get.id');
    $count = M('Order') -> delete($id);
    if($count > 0){
      $this -> success("删除成功");
    }else{
      $this -> error("删除失败");
    }
  }


  /**
   * policy
   */
  public function policy() {
    $title = "room_policy";

    if(IS_POST){
      $post = I('post.');

      //整理提交数据
      $post['content'] = str_replace(PHP_EOL, '', $post['content']);
      $post['content_en'] = str_replace(PHP_EOL, '', $post['content_en']);
      $data['value'] = json_encode($post);  //内容转json存储
      $result = D('Block') -> deal_with_item($title, $data);

      if($result){
        $this->success('修改成功！');
      }else{
        $this->error('修改失败！');
      }

    }else{
      //显示标题
      $page['title'] = "预约政策";
      $this -> assign('page', $page);
      $aid = session('aid');
      $this -> assign('aid', $aid);
      // var_dump($aid);exit;

      //获取数据
      $info = D('Block') -> get_item_by_title($title);
      $data = json_decode($info['value'], true);
      $data['content'] = html_entity_decode($data['content']);
      $data['content_en'] = html_entity_decode($data['content_en']);
      // var_dump($data);exit;
      $this->assign('data',$data);

      $this->display();
    }
  }


}
