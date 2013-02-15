<div class="row-fluid">
    <div class="span9">
        <?php echo Form::open(); ?>
            <fieldset>
                <legend><?php echo sprintf("%s - %s", $subtitle, "Project"); ?></legend>
                <?php echo Session::get_flash("errors"); ?>
                <?php
                    echo Form::label("Num", "num");
                    echo Form::input("num"
                                    , Input::post("num", isset($project)? $project->num: "")
                                    , array("class" => "span3"));

                    echo Form::label("Title", "title");
                    echo Form::input("title"
                                    , Input::post("title", isset($project)? $project->title: "")
                                    , array("class" => "span7"));

                    echo Form::label("Description", "description");
                    echo Form::textarea("description"
                                    , Input::post("description", isset($project)? $project->description: "")
                                    , array("class" => "span7", "rows" => 5));

                    echo Form::label("Start", "date_start");
                    echo Form::input("date_start"
                                    , Input::post("date_start", isset($project)? $project->date_start: "")
                                    , array("class" => "span3 dateinput"));

                    echo Form::label("End", "date_end");
                    echo Form::input("date_end"
                                    , Input::post("date_end", isset($project)? $project->date_end: "")
                                    , array("class" => "span3 dateinput"));

                    echo Form::label("Status", "status");
                    echo Form::select("status", Input::post("status", isset($project)? $project->status: "0"), $opt_status);
                ?>
                <div class="form-actions">
                    <?php echo Form::submit("submit", "Save", array("class" => "btn btn-primary span2")); ?>
                    <?php echo Form::reset("reset", "Reset", array("class" => "btn")); ?>
                </div>
            </fieldset>
        <?php echo Form::close(); ?>
    </div>
</div>
<?php
    echo Asset::css("smoothness/jquery-ui-1.10.0.custom.min.css");
    echo Asset::js("jquery-1.9.1.min.js");
    echo Asset::js("jquery-ui-1.10.0.custom.min.js");
    echo Asset::js("jquery.ui.datepicker-ja.js");
?>
<script>
    $(document).ready(function() {
        $(".dateinput").datepicker();
    });
</script>