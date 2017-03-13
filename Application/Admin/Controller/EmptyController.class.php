<?php
/**
 * Created by PhpStorm.
 * User: wangbao
 * Date: 2017/3/13
 * Time: 0:58
 */

namespace Admin\Controller;


use Think\Controller;

class EmptyController extends Controller
{
    public function _empty(){
        echo '您输入的网址有误';
    }
}