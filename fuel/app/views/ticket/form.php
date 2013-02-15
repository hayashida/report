<div class="row-fluid">
    <div class="span9">
        <?php echo Form::open(); ?>
        <fieldset>
            <legend><?php echo sprintf("%s - %s", $subtitle, "Ticket"); ?></legend>
            <?php echo Session::get_flash("errors"); ?>
            <?php
                echo Form::label("Project", "project");
                echo Form::select("project"
                                    , Input::post("project", isset($ticket)? $ticket->project_id: $project)
                                    , $opt_projects);

                echo Form::label("Category", "category");
                echo Form::input("category"
                                    , Input::post("category", isset($ticket)? $ticket->category: "")
                                    , array("class" => "span7"));

                echo Form::label("Function", "func");
                echo Form::input("func"
                                    , Input::post("func", isset($ticket)? $ticket->func: "")
                                    , array("class" => "span7"));

                echo Form::label("Content", "content");
                echo Form::textarea("content"
                                    , Input::post("content", isset($ticket)? $ticket->content: "")
                                    , array("class" => "span7"));

                echo Form::label("Description", "description");
                echo Form::textarea("description"
                                    , Input::post("description", isset($ticket)? $ticket->description: "")
                                    , array("class" => "span7", "rows" => 5));

                echo Form::label("Status", "status");
                echo Form::select("status", Input::post("status", isset($ticket)? $ticket->status: ""), $opt_status);
            ?>
            <div class="form-actions">
                <?php echo Form::submit("submit", "Save", array("class" => "btn btn-primary span2")); ?>
                <?php echo Form::reset("reset", "Reset", array("class" => "btn")); ?>
            </div>
        </fieldset>
        <?php echo Form::close(); ?>
    </div>
</div>