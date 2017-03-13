<?php
/**
 * Created by PhpStorm.
 * User: wangbao
 * Date: 2017/3/12
 * Time: 16:28
 */

namespace Admin\Model;


use Think\Model;

class RepairModel extends Model
{
    protected $_validate = array(

    );

    protected $_auto = array(
        array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('status', 0, self::MODEL_BOTH),
    );
}