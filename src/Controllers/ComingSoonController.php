<?php
class ComingSoonController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        $this->view('comingsoon.view');
    }
}
