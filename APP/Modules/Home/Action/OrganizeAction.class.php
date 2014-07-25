<?php

/*
 * 功能：组织机构
 */

class OrganizeAction extends Action {

    public function index() {
        CommonAction::footer();
        $tb = M("About");
        $where['type'] = "组织机构";
        $organ = $tb->where($where)->order("id desc")->limit("1")->getField('content');
       
        $this->assign("organ", $organ);



        $this->display();
    }

}
