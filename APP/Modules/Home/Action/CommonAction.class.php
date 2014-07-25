<?php

/*
 * 功能：公共的方法操作（公共模板）,没有 display()
 */

class CommonAction extends Action {
    /*     * ***********************************************
     * 页尾数据处理 调用各种私有方法
     * ***********************************************
     */

    public function footer() {
        CommonAction::copyRight();
        CommonAction::school();
        CommonAction::company();
    }

    /*
     * 版权
     */

    private function copyRight() {
        $tb = M('About');
        $where['type'] = "版权信息";
        $copyRight = $tb->where($where)->order("id desc")->limit("1")->select();
        $this->assign("copyRight", $copyRight);
    }

    /*
     * 校内链接
     */

    protected function school() {
        $tb = M("School");
        $school = $tb->order("rank asc")->limit("0,6")->select();
        $this->assign("school", $school);
    }

    /*
     * 投资者的公司
     */

    private function company() {
        $tb = M("Investor");
        $company = $tb->field("company,addr")->order("rank asc")->limit("0,6")->select();
        //var_dump($company);
        //exit();
        $this->assign("company", $company);
    }

    /*
     * 分页浏览
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
     * ********************************************************************************************
     */


    /*
     *  上一篇 upid > nowid  desc 1
     *   $tbName  表名
     */

    public function up($tbName) {
        $id = trim($_GET['id']);
        $tb = M($tbName);

        $where['id'] = array("gt", $id);
        $up = $tb->where($where)->order("id asc")->limit("0,1")->select();
        $this->assign("up", $up);
    }

    /*
     *  下一篇 nextid < nowid  asc 1
     * $tbName  表名
     */

    public function next($tbName) {
        $id = trim($_GET['id']);
        $tb = M($tbName);

        $where['id'] = array("lt", $id);
        $next = $tb->where($where)->order("id desc")->limit("0,1")->select();
        $this->assign("next", $next);
    }

    /*
     * ******************************************************************************************
     */
}
