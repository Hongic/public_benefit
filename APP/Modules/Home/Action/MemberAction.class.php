<?php

/*
 * 功能：指导老师、本届会长、本届成员
 */

class MemberAction extends Action {
    /*
     * 全局变量
     */

    public function index() {
        CommonAction::footer();

        $this->teacher();
        $this->newPro();
        $this->nowMem();


        $this->display();
    }

    /*
     * 指导老师
     */

    public function teacher() {

        $tb = M("Propriter");
        $where['title'] = "指导老师";
        $teacher = $tb->where($where)->order("id desc")->limit("0,1")->getField("id,address,content");
        $this->assign("teacher", $teacher);
    }

    /*
     * 本届会长 id address content
     */

    public function newPro() {

        $tb = M("Propriter");

        $nowpro = $tb->order("id desc")->limit("0,1")->getField("id,address,content");

        $this->assign("nowpro", $nowpro);
    }

    /*
     * 本届成员
     */

    public function nowMem() {
        $tb = M("Member");

        $nowmem = $tb->order("id desc")->limit("0,1")->getField("content");

        $this->assign("nowmem", $nowmem);
    }

    /*
     * ******************************************************************************
     */

    /*
     * 更多 会长
     */

    public function morePro() {
        CommonAction::footer();

        CommonAction::scan("Propriter", $where = "", $pageSize = "3", $order = "id  desc");
        $this->display();
    }

    public function contentPro() {
        CommonAction::footer();
        $tb = M("Propriter");
        $where['id'] = trim($_GET['id']);
        $cp = $tb->where($where)->select();
        $this->assign("cp", $cp);

        CommonAction::up("Propriter");
        CommonAction::next("Propriter");


        $this->display();
    }

    /*
     * 更多 成员
     */

    public function moreMem() {
        CommonAction::footer();

        CommonAction::scan("Member", $where = "", $pageSize = "5", $order = "id  desc");
        $this->display();
    }

    /*
     * 内容详解
     */

    public function contentMem() {
        CommonAction::footer();
        $tb = M("Member");
        $where['id'] = trim($_GET['id']);
        $mem = $tb->where($where)->select();
        $this->assign("mem", $mem);

        CommonAction::up("Member");
        CommonAction::next("Member");

        $this->display();
    }

}
