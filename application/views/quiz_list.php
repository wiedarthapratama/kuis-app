<h1 class="mb-4">Daftar Kuis</h1>
<a href="<?= base_url('kuis/add') ?>" class="btn btn-primary mb-3">Tambah Kuis Baru</a>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>Nama Kuis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($quizzes)): ?>
            <?php foreach ($quizzes as $quiz): ?>
                <tr>
                    <td><?= htmlspecialchars($quiz['quiz_name'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                        <a href="<?= base_url('kuis/start/' . $quiz['id']) ?>" class="btn btn-success">Mulai</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">Tidak ada kuis yang tersedia.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
