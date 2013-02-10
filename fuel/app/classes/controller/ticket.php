<?php

class Controller_Ticket extends Controller_Template
{
    public function action_index()
    {
        $this->template->content = View::forge("ticket/index");
    }
}