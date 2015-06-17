<?php
namespace Quick\Controller;

class Html extends Factory
{
    protected $view = NULL;

    protected function initView(){
        $this->view = \Quick\View\Html::instance();
    }
}