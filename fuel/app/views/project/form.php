<div class="row-fluid">
    <div class="span9">
        <?php echo Form::open(); ?>
            <fieldset>
                <legend><?php echo sprintf("%s - %s", $subtitle, "Project"); ?></legend>
                <?php echo Session::get_flash("errors"); ?>
                <?php
                    echo Form::label("Num", "num");
                    echo Form::input("num", Input::post("num", isset($project)? $project->num: ""));

                    echo Form::label("Title", "title");
                    echo Form::input("title", Input::post("title", isset($project)? $project->title: ""));

                    echo Form::label("Description", "description");
                    echo Form::textarea("description", Input::post("description", isset($project)? $project->description: ""));

                    echo Form::label("Start", "date_start");
                    echo Form::input("date_start", Input::post("date_start", isset($project)? $project->date_start: ""));

                    echo Form::label("End", "date_end");
                    echo Form::input("date_end", Input::post("date_end", isset($project)? $project->date_end: ""));

                    echo Form::label("Status", "status");
                    echo Form::select("status", Input::post("status", isset($project)? $project->status: "0"), $opt_status);
                ?>
                <div class="form-actions">
                    <?php echo Form::submit("submit", "Save", array("class" => "btn btn-primary")); ?>
                    <?php echo Form::reset("reset", "Reset", array("class" => "btn")); ?>
                </div>
            </fieldset>
        <?php echo Form::close(); ?>
    </div>
</div>
