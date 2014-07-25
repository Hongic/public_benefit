<?php

// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

    public function index() {
        CommonAction::footer();

        $this->propriter();
        $this->notice();
        $this->activity();
        $this->news();
        $this->pic();


        $this->display();
    }

    /*
     * 公告
     */

    public function notice() {
        $tb = M("About");
        $where['type'] = "最新公告";
        $notice = $tb->where($where)->order('id desc')->limit("0,1")->getField("content");
        $this->assign("notice", $notice);
    }

    /*
     * 本届会长 只查询最新的一条数据
     */

    private function propriter() {
        $tb = M("Propriter");
        $propriter = $tb->order("id desc")->limit("1")->select();

        $this->assign("propriter", $propriter);
    }

    /*
     * 最新公益 16
     */

    private function activity() {
        $tb = M("Activity");
        $act = $tb->order("id desc")->limit("0,16")->getField("id,title,time");
        $this->assign("act", $act);
    }

    /*
     * 新闻动态 16
     */

    private function news() {
        $tb = M("News");
        $new = $tb->order("id desc")->limit("0,16")->getField("id,title,time");
        $this->assign("new", $new);
    }

    /*
     * 活动图
     */

    private function pic() {
        $tb = M("Pic");
        $pic = $tb->limit("0,10")->select();
        $this->assign("pic", $pic);
    }

}
