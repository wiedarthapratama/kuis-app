<h1>Quiz Results</h1>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Username</th>
            <th>Score</th>
            <th>Time Taken (seconds)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $result): ?>
            <tr>
                <td><?= $result->username ?></td>
                <td><?= $result->score ?></td>
                <td><?= $result->time_taken ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
