<?php
/**
 * Created by PhpStorm.
 * User: wangbao
 * Date: 2017/3/12
 * Time: 13:15
 */

namespace Admin\Controller;



use Think\Page;

class PropertyController extends AdminController
{
    public function index(){
        $Page=new Page(M('Repair')->count(),2);
        $list = M('Repair')->limit($Page->firstRow,$Page->listRows)->order('id asc')->select();
        $this->assign('_page',$Page->show());
        $this->assign('list', $list);
        $this->display();
    }
    public function add(){
        if(IS_POST){
            $Repair = M('Repair');
            $data = $Repair->create();
            $Repair->create_time=time();
            if($data){
                $id = $Repair->add();
//                dump($data);exit;
                if($id){
                    $this->success('新增成功', U('index'));
                    //记录行为
                    action_log('update_channel', 'channel', $id, UID);
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Repair->getError());
            }
        } else {
            $pid = i('get.pid', 0);
            //获取父导航
            if(!empty($pid)){
                $parent = M('Channel')->where(array('id'=>$pid))->field('title')->find();
                $this->assign('parent', $parent);
            }
            $this->assign('pid', $pid);
            $this->assign('info',null);
            $this->meta_title = '新增导航';
            $this->display('edit');
        }
    }
    public function edit($id = 0){
        if(IS_POST){
            $Repair = D('Repair');
            $data = $Repair->create();
            if($data){
                if($Repair->save()){
                    //记录行为
                    action_log('update_channel', 'channel', $data['id'], UID);
                    $this->success('编辑成功', U('index'));
                } else {
                    $this->error('编辑失败');
                }
            } else {
                $this->error($Repair->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = M('Repair')->find($id);
//            dump($info);exit;
            if(false === $info){
                $this->error('获取配置信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑导航';
            $this->display();
        }
    }
}