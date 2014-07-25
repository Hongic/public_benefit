<?php

// 本类由系统自动生成，仅供测试用途
class InvestorAction extends CommonAction {

    public function index() {
        $this->display();
    }

    /*
     * 添加公益投资
     */

    public function add() {
        $dirName = "./Uploads/Investor/";
        $tbName = "Investor";
        if (!isset($_POST["submit"])) {
            $this->display();
        } else {

            if (!is_dir($dirName)) {
                if (mkdir($dirName, $mode = 0777) == FALSE) {
                    $this->error("创建 $dirName 文件夹失败");
                }
            }


            /*
             *   处理上传文件的信息
             */
            $fileTmp = trim($_FILES['address']['tmp_name']);

            if (!is_uploaded_file($fileTmp)) {
                $this->error("非法执行了上传文件操作");
            } else {
                $fileName = trim($_FILES['address']['name']);
                $fileSize = trim($_FILES['address']['size']);
                $fileType = substr($fileName, strripos($fileName, "."));
                $dateTime = date("YmdHis");
                $path = $dirName . $dateTime . $fileType;

                if (!move_uploaded_file($fileTmp, $path)) {
                    $this->error("上传文件失败");
                } else {

                    $tbName = M($tbName);
                    $data['title'] = trim($_POST['title']);
                    $data['content'] = trim($_POST['content']);
                    $data['investor'] = trim($_POST['investor']);
                    $data['address'] = $dateTime . $fileType;
                    $data['company'] = trim($_POST['company']);
                    $data['addr'] = trim($_POST['addr']);
                    $data['rank'] = trim($_POST['rank']);
                    $data['time'] = date("Y-m-d H:i:s");
                    $data['author'] = trim($_SESSION['name']);
                    $result = $tbName->data($data)->add();

                    if ($result == TRUE) {
                        $this->success("数据入库成功", $jumpUrl = "__URL__/browse");
                    } else {
                        $this->error("数据入库失败");
                    }
                }
            }
        }
    }

    /*
     * 浏览
     */

    public function browse() {
        OrganAction::scan('Investor');

        $this->display();
    }

    /*
     * 删除
     */

    public function delete() {
        CommonAction::del('Investor');
    }

    /*
     * 编辑
     */

    public function edit() {
        CommonAction::writer('Investor');
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
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $fileTmp = trim($_FILES['address']['tmp_name']);
            if (!$fileTmp == "") {
                $fileName = trim($_FILES['address']['name']);
                $fileSize = trim($_FILES['address']['size']);
                $fileType = substr($fileName, strripos($fileName, "."));
                $dateTime = date("YmdHis");
                $path = $dirName . $dateTime . $fileType;
                move_uploaded_file($fileTmp, $path);
                $data['address'] = $dateTime . $fileType;
            }
            $tb = M("Investor");
            $data['title'] = trim($_POST['title']);
            $data['content'] = trim($_POST['content']);
            $data['investor'] = trim($_POST['investor']);
            $data['company'] = trim($_POST['company']);
            $data['addr'] = trim($_POST['addr']);
            $data['rank'] = trim($_POST['rank']);
            //exit();
            $result = $tb->where($where)->data($data)->save();
            if ($result) {
                $this->success("修改成功", $jumpUrl = "__URL__/browse");
            } else {
                $this->error("失败。。。");
            }
        }
    }

}
