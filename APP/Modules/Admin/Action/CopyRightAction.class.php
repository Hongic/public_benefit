<?php

// 本类由系统自动生成，仅供测试用途
class CopyRightAction extends CommonAction {
    /*
     * 添加
     */

    public function add() {
        OrganAction::add("版权信息");
    }

    /*
     *  浏览数据
     */

    public function browse() {
        $where['type'] = '版权信息';

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
