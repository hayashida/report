<div class="navbar navbar-googlebar">
    <div class="navbar-inner">
        <ul class="nav">
            <li>
                <div class="btn-group">
                    <button class="btn">Selected：<?php echo $project_title; ?></button>
                    <button class="btn dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <?php foreach ($projects as $project): ?>
                        <li><?php echo Html::anchor("ticket/index/".$project->id, $project->title); ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </li>
            <li><?php echo Html::anchor("ticket/create?project=".$project_id, "New Ticket"); ?></li>
        </ul>
        <form class="navbar-form pull-right">
            <input type="text" name="" id="" placeholder="Search">
            <button class="btn btn-primary"><i class="icon-search icon-white"></i></button>
        </form>
    </div>
</div>
<div class="row-fluid">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Status</th>
                <th>Category</th>
                <th>Function</th>
                <th>Content</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket): ?>
            <tr>
                <td><?php
                    if ($ticket->status === "1")
                        echo "○";
                ?></td>
                <td><?php echo $ticket->category; ?></td>
                <td><?php echo $ticket->func; ?></td>
                <td><?php
                    echo $ticket->content;
                    if ($ticket->description !== "") {
                        echo "&nbsp;<a href=\"#\" data-toggle=\"tooltip\" class=\"docs-tooltip\">";
                        echo "<p>".$ticket->description."</p>";
                        echo "<i class=\"icon-info-sign\"></i></a>";
                    }
                ?></td>
                <td><?php echo date("Y-m-d H:i", $ticket->created_at); ?></td>
                <td><?php echo Html::anchor("ticket/show/".$ticket->id, "show"); ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php echo Asset::js("jquery-1.9.1.min.js"); ?>
<?php echo Asset::js("bootstrap.min.js"); ?>
<script>
    $(document).ready(function() {
        $("a[data-toggle=tooltip]").tooltip({
            placement: "bottom",
            title: function() {
                var ele = $(this).children("p")[0];
                return $(ele).html();
            }
        });
    });
</script>