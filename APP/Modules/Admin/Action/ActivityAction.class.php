<?php

// 本类由系统自动生成，仅供测试用途
class ActivityAction extends CommonAction {
    /*
     * 添加一条数据
     */

    public function add() {
        if (!isset($_POST["submit"])) {
            $this->display();
        } else {
            $tb = M("Activity");
            $data['title'] = trim($_POST['title']);

            $data['content'] = trim($_POST['content']);
            $data['time'] = date("Y-m-d H:i:s");
            $data['author'] = $_SESSION['name'];
            $result = $tb->data($data)->add();
            if ($result) {
                $this->success("成功添加", $jumpUrl = "__URL__/browse");
            } else {
                $this->error("添加失败。。。");
            }
        }
    }

    /*
     *  浏览数据
     */

    public function browse() {
        OrganAction::scan('Activity');

        $this->display();
    }

    /*
     * 删除一条数据
     */

    public function delete() {
        CommonAction::del('Activity');
    }

    /*
     * 编辑一条数据
     */

    public function edit() {
        CommonAction::writer('Activity');
        $this->display();
    }

    /*
     *  更新一条数据
     */

    public function update() {
        if ($_POST['submit'] == "") {
            $this->error("操作错误。。。");
        } else {
            $tb = M('Activity');
            $where['id'] = trim($_POST['upid']);

            $data['title'] = trim($_POST['title']);
            $data['content'] = trim($_POST["content"]);
            $result = $tb->where($where)->data($data)->save();
            if ($result) {
                $this->success("修改成功", $jumpUrl = '__URL__/browse');
            } else {
                $this->error("修改失败。。。");
            }
        }
    }

}
