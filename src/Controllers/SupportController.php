<?php
class SupportController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        $this->view('comingsoon.view');
    }
}
