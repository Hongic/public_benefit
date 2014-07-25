<?php

/*
 * 功能：公共函数库
 */

class CommonAction extends Action {
    /*
     * 登陆
     */
    /*
     * 构造函数，优先级最高，直接调用LoginChcek
     */

    public function __construct() {
        header("Content-type:text/html;charset=utf-8");
        parent::__construct();
        $this->checkLogin();
    }

    /*
     * 是否登陆检测：如果已登陆就跳转到index.html，否则跳到 login.html
     */

    private function checkLogin() {
        if (!isset($_SESSION['name']) && $_SESSION['name'] == NULL) {
            $this->error("你还没有登录", $jumpUrl = "__APP__/Admin/Login/login");
        }
    }

    /*
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
     */

    /*
     *    插入数据
     *   $tbName
     */

    public function insert($tbName) {
        
    }

    /*
     *    删除 
     *   $tbname  数据表名
     *   $delid   get穿过来的id
     */

    public function del($tbName) {
        $delid = trim($_GET['delid']);
        if ($delid == "") {
            $this->error("非法操作");
        } else {
            $tb = M($tbName);
            $where['id'] = $delid;
            $result = $tb->where($where)->delete();
            if ($result) {
                $this->success("成功删除一条数据", $jumpUrl = "__URL__/browse");
            } else {
                $this->error("删除失败。。。");
            }
        }
    }

    /*
     *    编辑
     *   $tbname  数据表名
     *   $delid   get穿过来的id
     */

    public function writer($tbName) {
        $edlid = trim($_GET['edid']);
        if ($edlid == "") {
            $this->error("非法操作");
        } else {
            $tb = M($tbName);
            $where['id'] = $edlid;
            $result = $tb->where($where)->select();
            $this->assign("result", $result);
        }
    }

    /*
     * 更新
     */

    public function update() {
        $edid = trim($_POST['id']);
    }

    /*
     *   浏览
     *  $tbName  数据表名
     */
    /*
      public function scan($tbName, $where = "", $order = "id  desc") {
      $tb = M($tbName);
      $result = $tb->where($where)->order($order)->select();
      $this->assign("result", $result);
      }
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

}
