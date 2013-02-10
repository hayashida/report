<div class="navbar navbar-googlebar">
    <div class="navbar-inner">
        <?php echo Html::anchor("project/create", "New Project", array("class" => "brand")); ?>
    </div>
</div>
<div class="row-fluid">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Status</th>
                <th>Num</th>
                <th>Project</th>
                <th>Start</th>
                <th>End</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td></td>
                <td><?php echo $project->num; ?></td>
                <td><?php echo $project->title; ?></td>
                <td><?php echo $project->date_start; ?></td>
                <td><?php echo $project->date_end; ?></td>
                <td><?php echo Html::anchor("project/show/".$project->id, "show"); ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
