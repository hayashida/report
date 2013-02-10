<?php

class Controller_Project extends Controller_Template
{
    var $opt_status = array(
            "0" => "None",
            "1" => "Proposal",
            "2" => "Working",
        );
    public function action_index()
    {
        $projects = Model_Project::find("all");

        $this->template->content = View::forge("project/index");
        $this->template->content->set_safe("projects", $projects);
    }

    public function action_create()
    {
        if (Input::method() === "POST") {
            $val = Model_Project::validate("create");
            if ($val->run()) {
                $project = Model_Project::forge();
                $project->num = $val->validated("num");
                $project->title = $val->validated("title");
                $project->description = Input::post("description");
                $project->date_start = $val->validated("date_start");
                $project->date_end = $val->validated("date_end");
                $project->status = Input::post("status");

                if ($project->save()) {
                    Response::redirect("project");
                }
            } else {
                Session::set_flash("errors", $val->show_errors());
            }
        }

        $this->template->content = View::forge("project/form");
        $this->template->content->set_safe("subtitle", "Create");
        $this->template->content->set_safe("opt_status", $this->opt_status);
    }

    public function action_show($id = null)
    {
        if (!$id)
            Response::redirect("project");

        $project = Model_Project::find($id);
        if (!$project)
            Response::redirect("project");

        $this->template->content = View::forge("project/show");
        $this->template->content->set_safe("opt_status", $this->opt_status);
        $this->template->content->set_safe("project", $project);
    }

    public function action_edit($id = null)
    {
        if (!$id)
            Response::redirect("project");

        $project = Model_Project::find($id);
        if (!$project)
            Response::redirect("project");

        if (Input::method() === "POST") {
            $val = Model_Project::validate("modifty");
            if ($val->run()) {
                $project->num = $val->validated("num");
                $project->title = $val->validated("title");
                $project->description = Input::post("description");
                $project->date_start = $val->validated("date_start");
                $project->date_end = $val->validated("date_end");
                $project->status = Input::post("status");

                if ($project->save()) {
                    Response::redirect("project");
                }
            } else {
                Session::set_flash("errors", $val->show_errors());
            }
        }

        $this->template->content = View::forge("project/form");
        $this->template->content->set_safe("subtitle", "Edit");
        $this->template->content->set_safe("opt_status", $this->opt_status);
        $this->template->content->set_safe("project", $project);
    }

    public function action_delete($id = null)
    {
        if (!$id)
            Response::redirect("project");

        $project = Model_Project::find($id);
        if (!$project)
            Response::redirect("project");

        if ($project->delete()) {

        }

        Response::redirect("project");
    }
}