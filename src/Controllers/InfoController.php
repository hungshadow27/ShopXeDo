<?php
class InfoController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {

        $this->view('info.view');
    }
}
