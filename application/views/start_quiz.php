<div class="container mt-4">
    <h1 class="mb-4">Mulai Kuis</h1>
    <form id="quizForm" method="post" action="<?= base_url('kuis/submit') ?>">
        <!-- Menyimpan quiz_id dan user_id dengan value yang tepat -->
        <input type="hidden" name="quiz_id" value="<?= htmlspecialchars($quiz_id, ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id, ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" id="time_taken" name="time_taken">

        <div id="questions">
            <?php foreach ($questions as $index => $question): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Pertanyaan <?= $index + 1 ?></h5>
                        <p class="card-text"><?= htmlspecialchars($question->question, ENT_QUOTES, 'UTF-8') ?></p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[<?= $index ?>]" value="a" id="option_a_<?= $index ?>">
                            <label class="form-check-label" for="option_a_<?= $index ?>">
                                <?= htmlspecialchars($question->option_a, ENT_QUOTES, 'UTF-8') ?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[<?= $index ?>]" value="b" id="option_b_<?= $index ?>">
                            <label class="form-check-label" for="option_b_<?= $index ?>">
                                <?= htmlspecialchars($question->option_b, ENT_QUOTES, 'UTF-8') ?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[<?= $index ?>]" value="c" id="option_c_<?= $index ?>">
                            <label class="form-check-label" for="option_c_<?= $index ?>">
                                <?= htmlspecialchars($question->option_c, ENT_QUOTES, 'UTF-8') ?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[<?= $index ?>]" value="d" id="option_d_<?= $index ?>">
                            <label class="form-check-label" for="option_d_<?= $index ?>">
                                <?= htmlspecialchars($question->option_d, ENT_QUOTES, 'UTF-8') ?>
                            </label>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
    </form>
</div>

<script>
    var startTime = Date.now();

    $('#quizForm').submit(function() {
        var endTime = Date.now();
        var timeTaken = Math.floor((endTime - startTime) / 1000);
        $('#time_taken').val(timeTaken);
    });
</script>