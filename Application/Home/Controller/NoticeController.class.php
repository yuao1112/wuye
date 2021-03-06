<?php
/**
 * Created by PhpStorm.
 * User: wangbao
 * Date: 2017/3/13
 * Time: 11:51
 */

namespace Home\Controller;


class NoticeController extends HomeController
{
    public function notice(){
        $articleList=M('Document')->select();
//        dump($articleList);exit;
        $this->assign('articleList',$articleList);
        $this->display('notice');
    }
    public function noticeDetail($detail_id){
        //1.1方式一：
        $document=M('Document');//1.1.1、1.2.1
//        $document->where(['id'=>$detail_id])->setInc('view');//1.1.2
        //1.2方式二：
        $View=$document->where(['id'=>$detail_id])->find();//1.2.2
        $View['view']+=1;//1.2.3
        $document->create($View);//1.2.4
        $document->save();//1.2.5


//        $noticeDetail=M('DocumentArticle')->where(['id'=>$detail_id])->select();
        $noticeDetail=M('documentArticle')->find($detail_id);
//        dump($noticeDetail);exit;
        $this->assign('noticeDetail',$noticeDetail);
        $this->display('notice-detail');
    }
    public function _empty()
    {
        parent::_empty(); // TODO: Change the autogenerated stub
        echo '您输入的方法不存在';
    }
}