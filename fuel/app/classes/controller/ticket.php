<?php

class Controller_Ticket extends Controller_Template
{
    var $opt_status = array(
            "0" => "None",
            "1" => "Complete",
        );

    var $opt_projects = array();

    public function after($response)
    {
        $response = parent::after($response);

        $this->template->set("page", "ticket");

        return $response;
    }

    public function action_index($project_id = null)
    {
        if (!$project_id) {
            $project = Model_Project::find("first");
        } else {
            $project = Model_Project::find($project_id);
            if (! $project)
                Response::redirect("ticket");
        }
        $project_id = $project->id;
        $project_title = $project->title;

        $projects = Model_Project::find("all");
        $tickets = Model_Ticket::find("all", array(
                "where" => array(
                        array("project_id", $project_id)
                    )
            ));

        $this->template->content = View::forge("ticket/index");
        $this->template->content->set_safe("project_id", $project_id);
        $this->template->content->set_safe("project_title", $project_title);
        $this->template->content->set_safe("projects", $projects);
        $this->template->content->set_safe("tickets", $tickets);
    }

    public function action_create()
    {
        if (Input::method() === "POST") {
            $val = Model_Ticket::validate("create");
            if ($val->run()) {
                $ticket = Model_Ticket::forge();
                $ticket->project_id = Input::post("project");
                $ticket->category = $val->validated("category");
                $ticket->func = $val->validated("func");
                $ticket->content = $val->validated("content");
                $ticket->description = Input::post("description");
                $ticket->status = Input::post("status");

                if ($ticket->save()) {
                    Response::redirect("ticket/index/".$ticket->project_id);
                }
            } else {
                Session::set_flash("errors", $val->show_errors());
            }
        } else {
            $project = Input::get("project");
        }
        $this->get_projects();

        $this->template->content = View::forge("ticket/form");
        $this->template->content->set_safe("subtitle", "Create");
        $this->template->content->set_safe("opt_projects", $this->opt_projects);
        $this->template->content->set_safe("opt_status", $this->opt_status);

        if (isset($project)) {
            $this->template->content->set_safe("project", $project);
        }
    }

    public function action_show($id = null)
    {
        if (!$id)
            Response::redirect("ticket");

        $ticket = Model_Ticket::find($id);
        if (!$ticket)
            Response::redirect("ticket");

        $this->template->content = View::forge("ticket/show");
        $this->template->content->set_safe("opt_status", $this->opt_status);
        $this->template->content->set_safe("ticket", $ticket);
    }

    public function action_edit($id = null)
    {
        if (!$id)
            Response::redirect("ticket");

        $ticket = Model_Ticket::find($id);
        if (!$ticket)
            Response::redirect("ticket");

        if (Input::method() === "POST") {
            $val = Model_Ticket::validate("modify");
            if ($val->run()) {
                $ticket->project_id = Input::post("project");
                $ticket->category = $val->validated("category");
                $ticket->func = $val->validated("func");
                $ticket->content = $val->validated("content");
                $ticket->description = Input::post("description");
                $ticket->status = Input::post("status");

                if ($ticket->save()) {
                    Response::redirect("ticket/index/".$ticket->project_id);
                }
            } else {
                Session::set_flash("errors", $val->show_errors());
            }
        }
        $this->get_projects();

        $this->template->content = View::forge("ticket/form");
        $this->template->content->set_safe("subtitle", "Edit");
        $this->template->content->set_safe("opt_projects", $this->opt_projects);
        $this->template->content->set_safe("opt_status", $this->opt_status);
        $this->template->content->set_safe("ticket", $ticket);
    }

    public function action_delete($id = null)
    {
        if (!$id)
            Response::redirect("ticket");

        $ticket = Model_Ticket::find($id);
        $project_id = $ticket->project_id;
        if (!$ticket)
            Response::redirect("ticket");

        if ($ticket->delete()) {

        }

        Response::redirect("ticket/index/".$project_id);
    }

    public function action_complete($id = null)
    {
        if (!$id)
            Response::redirect("ticket");

        $ticket = Model_Ticket::find($id);
        $project_id = $ticket->project_id;
        if (!$ticket)
            Response::redirect("ticket");

        $ticket->status = "1";
        if ($ticket->save()) {

        }


        Response::redirect("ticket/index/".$project_id);
    }

    private function get_projects()
    {
        $projects = Model_Project::find("all");
        foreach ($projects as $project) {
            $this->opt_projects[$project->id] = $project->title;
        }
    }
}