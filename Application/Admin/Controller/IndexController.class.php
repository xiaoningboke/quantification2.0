<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	//显示首页
    public function index(){
        $this->display();
    }
    //显示学生信息
    public function student(){
    	$this->display();
    }
    //查询所有学生接口
    public function selStudent(){
    	$stu = M('Student');
    	$count = (int)$stu->count();
    	$date = $stuMen = $stu->select();
    	/*var_dump($count);
    	echo(json_encode($date));*/
    	$this->returnMsg('1','',$count,$date);
    }
    protected function returnMsg($code, $errmsg, $count, $date)
    {
        $data['code'] = 0 ;
        $data['msg'] = $errmsg ? $errmsg : '';
        $data['count'] = $count ? $count : '';
        $data['data'] = $date ? $date : '';
        $this->ajaxReturn($data);
    }
}