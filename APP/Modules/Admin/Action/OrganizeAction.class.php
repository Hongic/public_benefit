<?php

/*
 * 功能：组织机构
 */

class OrganizeAction extends CommonAction {
    /*
     * 添加
     */

    public function add() {
        OrganAction::add("组织机构");
    }

    /*
     *  浏览数据
     */

    public function browse() {
        $where['type'] = '组织机构';
        OrganAction::scan('About', $where);
        $this->display();
    }

    /*
     * 编辑
     */

    public function edit() {
        OrganAction::edit();
        $this->display();
    }

    /*
     * 更新
     */

    public function update() {
        OrganAction::update();
    }

    /*
     * 删除
     */

    public function delete() {
        OrganAction::del();
    }

}
