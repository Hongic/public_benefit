<?php

/*
 * 功能：公益活动
 */

class ActivityAction extends Action {

    public function index() {
        CommonAction::footer();
        CommonAction::scan("Activity");
        $this->activityList();
        $this->display();
    }

    /*
     *  点击链接，查看具体的内容    点击+1    session_id=str+id  
     *  上一篇  下一篇
     */

    public function content() {
        CommonAction::footer();
        session_start();
        $id = trim($_GET['id']);
        $seid = "act" . $id;
        $tb = M("Activity");
        $where['id'] = trim($_GET['id']);


        if ($_SESSION[$seid] == null) {
            $actid = $tb->where($where)->getField("click");
            $data['click'] = $actid + 1;
            $_SESSION[$seid] = trim($_GET['id']);


            $tb->where($where)->data($data)->save();
        }

        $res = $tb->where($where)->select();
        $this->assign("res", $res);
        $this->activityList();

        CommonAction::up("Activity");
        CommonAction::next("Activity");

        $this->display();
    }

    /*
     * *************************************************************************************
     * 活动列表
     */

    private function activityList() {
        $tb = M("Activity");
        $activity = $tb->order("click desc")->getField('id,title,time');
        $this->assign("activity", $activity);
    }

    private function click($id) {

        if ($_SESSION[$id] == null) {
            $actid = $tb->where($where)->limit("0,16")->getField("click");
            $data['click'] = $actid + 1;
            $_SESSION[$id] = trim($_GET['id']);
            $tb->where($where)->data($data)->save();
        }
    }

}
