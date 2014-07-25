<?php

// 本类由系统自动生成，仅供测试用途
class SchoolAction extends CommonAction {

    public function index() {
        $this->display();
    }

    /*
     * 添加站点
     */

    public function add() {
        if (!isset($_POST["submit"])) {
            $this->display();
        } else {
            $tb = M("School");
            $data['name'] = trim($_POST['site']);
            $data['address'] = trim($_POST['school']);
            $data['time'] = date("Y-m-d H:i:s");
            $data['rank'] = trim($_POST['rank']);
            $result = $tb->data($data)->add();
            if ($result) {
                $this->success("成功添加站点", $jumpUrl = "__URL__/browse");
            } else {
                $this->error("添加站点失败。。。");
            }
        }
    }

    /*
     * 浏览
     */

    public function browse() {
        OrganAction::scan('School');

        $this->display();
    }

    /*
     * 删除
     */

    public function delete() {
        CommonAction::del('School');
    }

    /*
     * 编辑
     */

    public function edit() {
        CommonAction::writer('School');
        $this->display();
    }

    /*
     * 更新
     */

    public function update() {
        if ($_POST['submit'] == "") {
            $this->error("操作错误。。。");
        } else {
            $where['id'] = trim($_POST['upid']);
            $data['name'] = trim($_POST['name']);
            $data['address'] = trim($_POST['address']);
            $data['rank'] = trim($_POST['rank']);
            $tb = M("School");
            $result = $tb->where($where)->save($data);
            if ($result) {
                $this->success("修改成功", $jumpUrl = '__URL__/browse');
            } else {
                $this->error("修改失败。。。");
            }
        }
    }

}
