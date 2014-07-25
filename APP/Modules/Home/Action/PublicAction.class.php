<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PublicAction extends Action {

    public function index() {
        $this->a();
        $this->b();
        TestAction::c();
        $this->display();
    }

    public function a() {
        $this->assign("a", "3333333");
        //  $this->display();
    }

    public function b() {
        $this->assign("b", "666666");
        // $this->display();
    }

}
