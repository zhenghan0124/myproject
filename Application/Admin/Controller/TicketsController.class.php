<?php
/**
 * Created by PhpStorm.
 * User: leijuly
 * Date: 2017/12/10
 * Time: 22:17
 */

namespace Admin\Controller;


class TicketsController extends CommonController
{
    public function index()
    {
        //显示标题
        $page['title'] = "门票管理";
        $this->assign('page', $page);

        $count = M('Tickets')->count();
        $Pages = new \Think\Page($count, 25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Pages->show();// 分页显示输出
        $data = M('Tickets')->order('rank desc,id desc')->limit($Pages->firstRow . ',' . $Pages->listRows)->select();

        $this->assign('data', $data);
        $this->assign('pagenavi', $show);

        $this->display();
    }
    public function delete(){
        $id = I('id');
        if(!$id){
            $this->error('编号错误');
        }
        $Model = M('Tickets');
        $res = $Model->where(['id'=>$id])->delete();
        if($res === false){
            $this->error('删除失败');
        }
        $this->success('删除成功');
    }
    public function form()
    {
        if (IS_POST) {
            $post = I('post.');
            $Model = M('Tickets');
            $Model->create();
            //特殊数据处理
            $Model->description = str_replace(PHP_EOL, '', $post['description']);
            $Model->description_en = str_replace(PHP_EOL, '', $post['description_en']);
            $Model->content = str_replace(PHP_EOL, '', $post['content']);
            $Model->content_en = str_replace(PHP_EOL, '', $post['content_en']);
            if ($post['id']) {
                if ($Model->save() === false) {
                    $this->error("编辑失败");
                }
                $this->success("编辑成功", U('index'));
                die;
            } else {
                if ($Model->add() === false){
                    $this->error("新增失败");
                }
                $this->success("新增成功", U('index'));
                die;
            }
        }

        //显示标题
        $page['title'] = "新增门票";
        $id = I('get.id');
        if ($id) {
            $page['title'] = "编辑门票";
            $data = M('Tickets')->find($id);
            $data['description'] = html_entity_decode($data['description']);
            $data['description_en'] = html_entity_decode($data['description_en']);
            $data['content'] = html_entity_decode($data['content']);
            $data['content_en'] = html_entity_decode($data['content_en']);
            $this->assign('data', $data);
        }

        $this->assign('page', $page);
        $this->display();
    }
    
    public function orderlist(){
        //显示标题
        $page['title'] = "订单管理";
        $this->assign('page', $page);

        $count = M('TicketsOrder')->count();
        $Pages = new \Think\Page($count, 25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Pages->show();// 分页显示输出
        $data = M('TicketsOrder')->order('id desc')->limit($Pages->firstRow . ',' . $Pages->listRows)->select();
        $tickets = M('Tickets')->select();
        foreach($data AS &$row){
            foreach($tickets AS $tk){
                if($tk['id'] == $row['tid']){
                    $row['title'] = $tk['title'];
                }
            }
        }
        $this->assign('data', $data);
        $this->assign('pagenavi', $show);
        $this->display();
    }
    
    public function orderdetail(){
        //显示标题
        $page['title'] = "订单详情";
        $this->assign('page', $page);      
		
        if (IS_POST) {
            $post = I('post.');
            $res = M('TicketsOrder')->where(['id'=>$post['id']])->save(['remark'=>$post['remark']]);
            if($res === false){
                $this->error('保存错误');
            }
            $this->success('保存成功');die;
        }
        
        $id = I('get.id');
        $data = M('TicketsOrder')->find($id);
        $data['title'] = M('Tickets')->where(['id'=>$data['tid']])->getField('title');
        $logs = M('TicketsLog')->where(['ordersn'=>$data['ordersn']])->order('id')->select();

        $this->assign('data', $data);
        $this->assign('logs', $logs);
        $this->display();
    }
	public function blocklist(){
		//显示标题
        $page['title'] = "停售日期";
        $this->assign('page', $page);
		
		$tid = intval(I('tid'));
		$list = M('TicketsBlock')->where(['tid'=>$tid])->order('id DESC')->select();
		$this->assign('list', $list);
		$this->display();
	}
	public function block(){
		$id = intval(I('id'));
		$tid = intval(I('tid'));
			
		if (IS_POST) {
            $post = I('post.');
			$_POST['sdate'] = strtotime(I('sdate'));
			$_POST['edate'] = strtotime(I('edate'));
			
			if($post['id']){
				$res = M('TicketsBlock')->where(['id'=>$post['id']])->save();
			}else{
				M('TicketsBlock')->create();
				$res = M('TicketsBlock')->add();
			}			 
            if($res === false){
                $this->error('保存错误');
            }
            $this->success('保存成功',U('blocklist',['tid'=>$tid]));die;
        }
		
		$tk = M('Tickets')->find($tid);
		if($id){
			$data = M('TicketsBlock')->find($id);
			
		}else{
			$data['sdate'] = time();
			$data['edate'] = time();
		}
			
		$this->assign('tk', $tk);
		$this->assign('data', $data);
		$this->display();
	}
	public function blockdel(){
		$id = intval(I('id'));
		$res = M('TicketsBlock')->where(['id'=>$id])->delete();
		if($res === false){
			$this->error('删除错误');
		}
		$this->success('删除成功');
	}
}