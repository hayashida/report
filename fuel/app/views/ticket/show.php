<div class="row-fluid">
    <div class="span9">
        <h3><?php echo nl2br($ticket->content); ?></h3>
        <dl>
            <dt>Project</dt>
            <dd><?php echo $ticket->project->title; ?></dd>
            <dt>Category</dt>
            <dd><?php echo $ticket->category; ?></dd>
            <dt>Function</dt>
            <dd><?php echo $ticket->func; ?></dd>
            <dt>Description</dt>
            <dd><?php echo nl2br($ticket->description); ?></dd>
            <dt>Status</dt>
            <dd><?php echo $opt_status[$ticket->status]; ?></dd>
        </dl>
    </div>
    <div class="span3">
        <ul class="nav nav-list">
            <li class="nav-header">Actions</li>
            <li><?php echo Html::anchor("ticket/edit/".$ticket->id, "Edit"); ?></li>
            <li><?php echo Html::anchor("ticket/delete/".$ticket->id, "Delete"); ?></li>
            <li class="divider"></li>
            <li><?php echo Html::anchor("ticket/complete/".$ticket->id, "Complete", array("class" => "btn btn-primary")); ?></li>
        </ul>
    </div>
</div>