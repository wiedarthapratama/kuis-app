<h1 class="mb-4">Tambah Kuis Baru</h1>
<form method="post" action="<?= base_url('kuis/store') ?>">
    <div class="form-group">
        <label>Nama Kuis:</label>
        <input type="text" class="form-control" name="quiz_name" required>
    </div>

    <div id="questions">
        <div class="form-group">
            <label>Pertanyaan 1:</label>
            <textarea class="form-control" name="questions[]" required></textarea>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Opsi A:</label>
                <input type="text" class="form-control" name="option_a[]" required>
            </div>
            <div class="form-group col-md-3">
                <label>Opsi B:</label>
                <input type="text" class="form-control" name="option_b[]" required>
            </div>
            <div class="form-group col-md-3">
                <label>Opsi C:</label>
                <input type="text" class="form-control" name="option_c[]" required>
            </div>
            <div class="form-group col-md-3">
                <label>Opsi D:</label>
                <input type="text" class="form-control" name="option_d[]" required>
            </div>
        </div>

        <div class="form-group">
            <label>Jawaban Benar:</label>
            <select class="form-control" name="correct_option[]" required>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
            </select>
        </div>
    </div>

    <button type="button" class="btn btn-secondary" id="add_question">Tambah Pertanyaan</button>
    <button type="submit" class="btn btn-primary">Simpan Kuis</button>
</form>

<!-- Tambahkan JavaScript di bawah -->
<script>
    // Counter untuk jumlah pertanyaan
    let questionCount = 1;

    // Fungsi untuk menambah pertanyaan
    document.getElementById('add_question').addEventListener('click', function() {
        questionCount++;

        // Template HTML untuk pertanyaan baru
        const newQuestion = `
        <hr>
        <div class="form-group">
            <label>Pertanyaan ${questionCount}:</label>
            <textarea class="form-control" name="questions[]" required></textarea>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Opsi A:</label>
                <input type="text" class="form-control" name="option_a[]" required>
            </div>
            <div class="form-group col-md-3">
                <label>Opsi B:</label>
                <input type="text" class="form-control" name="option_b[]" required>
            </div>
            <div class="form-group col-md-3">
                <label>Opsi C:</label>
                <input type="text" class="form-control" name="option_c[]" required>
            </div>
            <div class="form-group col-md-3">
                <label>Opsi D:</label>
                <input type="text" class="form-control" name="option_d[]" required>
            </div>
        </div>

        <div class="form-group">
            <label>Jawaban Benar:</label>
            <select class="form-control" name="correct_option[]" required>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
            </select>
        </div>`;

        // Tambahkan pertanyaan baru ke form
        document.getElementById('questions').insertAdjacentHTML('beforeend', newQuestion);
    });
</script>
