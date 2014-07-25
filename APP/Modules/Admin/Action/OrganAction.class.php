
<?php

/*
 * 功能：我们、组织、公告、版权 公用库
 */

class OrganAction extends CommonAction {
    /*
     * 添加
     */

    public function add($type) {
        if (!isset($_POST["submit"])) {
            $this->display();
        } else {
            $datta['title'] = trim($_POST['title']);
            $datta['content'] = trim($_POST['content']);
            $datta['type'] = trim($type);
            $datta['author'] = $_SESSION['name'];
            $datta['time'] = date("Y-m-d");
            $tb = M('About');
            $result = $tb->data($datta)->add();
            if ($result) {
                $this->success("您添加了一条数据", $jumpUrl = '__URL__/browse');
            } else {
                $this->error("添加失败");
            }
        }
    }

    /*
     * 浏览
     */

    public function scan($tbName, $where = "", $pageSize = "16", $order = "id  desc") {
        import("@.ORG.Page");
        $tb = M($tbName);
        $count = $tb->where($where)->count();
        $newPage = new Page($count, $pageSize);
        $newPage->setConfig('header', '记录');
        $newPage->setConfig('theme', "%header% %nowPage%/%totalPage% 页 %upPage% %first% %prePage% %linkPage% %nextPage% %end% %downPage%");


        $result = $tb->where($where)->order($order)->limit($newPage->firstRow . ',' . $newPage->listRows)->select();

        $this->assign('result', $result);
        // $show  显示分页栏
        $show = $newPage->show();
        if ($count >= $pageSize) {
            $this->assign('page', $show);
        }
    }

    /*
     * 编辑
     */

    public function edit() {
        $edlid = trim($_GET['edid']);
        if ($edlid == "") {
            $this->error("非法操作");
        } else {
            $tb = M('About');
            $where['id'] = $edlid;
            $result = $tb->where($where)->select();
            $this->assign("result", $result);
        }
    }

    /*
     * 更新
     */

    public function update() {
        if ($_POST['submit'] == "") {
            $this->error("操作错误。。。");
        } else {
            $upid = trim($_POST['upid']);
            if ($upid == "") {
                $this->error("非法操作");
            } else {
                $tb = M('About');
                $where['id'] = $upid;
                $data['title'] = trim($_POST['title']);
                $data['content'] = trim($_POST['content']);
                $result = $tb->where($where)->data($data)->save();
                if ($result) {
                    $this->success("数据修改成功", $jumpUrl = '__URL__/browse');
                } else {
                    $this->error("修改失败");
                }
            }
        }
    }

    /*
     *    删除 
     *   $tbname  数据表名
     *   $delid   get穿过来的id
     */

    public function del() {
        $delid = trim($_GET['delid']);
        if ($delid == "") {
            $this->error("非法操作");
        } else {
            $tb = M('About');
            $where['id'] = $delid;
            $result = $tb->where($where)->delete();
            if ($result) {
                $this->success("成功删除一条数据", $jumpUrl = "__URL__/browse");
            } else {
                $this->error("删除失败。。。");
            }
        }
    }

}

?>
