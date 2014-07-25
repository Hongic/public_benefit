<?php

// 本类由系统自动生成，仅供测试用途
class UsAction extends CommonAction {

    public function index() {
        $this->display();
    }

    /*
     * 添加
     */

    public function add() {
        OrganAction::add("关于我们");
    }

    /*
     *  浏览数据
     */

    public function browse() {
        $where['type'] = '关于我们';
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
