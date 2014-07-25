<?php

class NewsAction extends Action {
    /*
     * 默认页面
     */

    public function index() {
        CommonAction::footer();
        CommonAction::scan("News");
        $this->newsList();
        $this->display();
    }

    /*
     *  点击链接，查看具体的内容
     */

    public function content() {
        CommonAction::footer();
        session_start();
        $id = trim($_GET['id']);
        $seid = "new" . $id;
        $tb = M("News");
        $where['id'] = trim($_GET['id']);
        if ($_SESSION[$seid] == null) {
            $newid = $tb->where($where)->getField("click");
            $data['click'] = $newid + 1;
            $_SESSION[$seid] = trim($_GET['id']);
            $tb->where($where)->data($data)->save();
        }
        $res = $tb->where($where)->select();
        $this->assign("res", $res);

        $this->newsList();
        CommonAction::up("News");
        CommonAction::next("News");

        $this->display();
    }

    /*
     * 新闻列表
     */

    private function newsList() {
        $tb = M("News");
        $news = $tb->order("click desc")->limit("0,16")->getField('id,title,time');

        $this->assign("news", $news);
    }

}
