<?php

/*
 * 功能：关于我们
 */

class UsAction extends Action {

    public function index() {
        CommonAction::footer();
        $tb = M("About");
        $where['type'] = "关于我们";
        $us = $tb->where($where)->order("id desc")->limit("1")->getField('content');


        $this->assign("us", $us);



        $this->display();
    }

}
