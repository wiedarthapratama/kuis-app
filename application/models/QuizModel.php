<?php
class QuizModel extends CI_Model
{

    public function get_all_quizzes()
    {
        $query = $this->db->get('quizzes');
        return $query->result_array();
    }


    public function get_questions($quiz_id)
    {
        $this->db->where('quiz_id', $quiz_id);
        $query = $this->db->get('questions');
        return $query->result();
    }


    public function calculate_score($answers, $quiz_id)
    {
        $questions = $this->get_questions($quiz_id);
        $score = 0;

        foreach ($questions as $index => $question) {
            if (isset($answers[$index]) && $answers[$index] == $question->correct_option) {
                $score++;
            }
        }

        return $score;
    }

    public function save_result($user_id, $quiz_id, $score, $time_taken)
    {
        $data = [
            'user_id' => $user_id,
            'quiz_id' => $quiz_id,
            'score' => $score,
            'time_taken' => $time_taken
        ];

        $this->db->insert('results', $data);
    }

    public function get_results($quiz_id)
    {
        $this->db->select('users.username, results.score, results.time_taken');
        $this->db->from('results');
        $this->db->join('users', 'results.user_id = users.id');
        $this->db->where('quiz_id', $quiz_id);
        $this->db->order_by('score', 'DESC');
        $this->db->order_by('time_taken', 'ASC');
        return $this->db->get()->result();
    }

    // Menyimpan kuis
    public function insert_quiz($data)
    {
        $this->db->insert('quizzes', $data);
        return $this->db->insert_id(); // Mendapatkan ID kuis yang baru disimpan
    }

    // Menyimpan pertanyaan
    public function insert_question($data)
    {
        $this->db->insert('questions', $data);
    }

    // Simpan kuis baru
    public function save_quiz($data)
    {
        $this->db->insert('quizzes', $data);
        return $this->db->insert_id(); // Kembalikan ID kuis baru
    }

    // Simpan satu pertanyaan
    public function save_question($data)
    {
        $this->db->insert('questions', $data);
    }
}
