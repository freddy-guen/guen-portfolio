<?php
Class Home extends Controller
{
    function index()
    {
        $data['page_title'] = 'Accueil';
        $this->view("portfolio/index", $data);
    }
}
