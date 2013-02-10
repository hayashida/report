<div class="row-fluid">
    <div class="span9">
        <h3><?php echo $project->title ?></h3>
        <dl>
            <dt>Num</dt>
            <dd><?php echo $project->num; ?></dd>
            <dt>Description</dt>
            <dd><?php echo nl2br($project->description); ?></dd>
            <dt>Start</dt>
            <dd><?php echo $project->date_start; ?></dd>
            <dt>End</dt>
            <dd><?php echo $project->date_end; ?></dd>
            <dt>Status</dt>
            <dd><?php echo $opt_status[$project->status]; ?></dd>
        </dl>
    </div>
    <div class="span3">
        <ul class="nav nav-list">
            <li class="nav-header">Actions</li>
            <li><?php echo Html::anchor("project/edit/".$project->id, "Edit"); ?></li>
            <li><?php echo Html::anchor("project/delete/".$project->id, "Delete"); ?></li>
        </ul>
    </div>
</div>