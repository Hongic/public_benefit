<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TestAction extends Action {

    public function index() {
        $this->assign("test", "sss");
        $this->a();
        $this->display();
    }

    public function c() {
        $this->assign("a", "123456");
        // $this->display("a");
    }

}
