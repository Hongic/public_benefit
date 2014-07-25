<?php

/*
 * 功能：公益投资
 */

class InvestorAction extends Action {

    public function index() {
        CommonAction::footer();
        CommonAction::scan("Investor");
        $this->investorList();
        $this->display();
    }

    /*
     * 列表榜单
     */

    private function investorList() {
        $tb = M("Investor");
        $investor = $tb->order("rank desc")->limit("0,16")->getField('id,title,time');
        $this->assign("investor", $investor);
    }

    /*
     * 查看详细内容
     */

    public function content() {
        CommonAction::footer();
        session_start();
        $id = trim($_GET['id']);
        $seid = "inv" . $id;
        $tb = M("Investor");
        $where['id'] = trim($_GET['id']);


        if ($_SESSION[$seid] == null) {
            $actid = $tb->where($where)->getField("click");
            $data['click'] = $actid + 1;
            $_SESSION[$seid] = trim($_GET['id']);
            $tb->where($where)->data($data)->save();
        }

        $res = $tb->where($where)->select();
        $this->assign("res", $res);
        $this->investorList();

        CommonAction::up("Investor");
        CommonAction::next("Investor");

        $this->display();
    }

}
