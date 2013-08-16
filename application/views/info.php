<div class="border" id="info">
    <div id="table">
        <table class="table">
            <tr>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php foreach ($visits as $visit): ?>
                <tr>
                    <td><?php echo date('m-d-Y', strtotime($visit->datetime)); ?></td>
                    <td><?php echo date('H:i:s', strtotime($visit->datetime)); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>