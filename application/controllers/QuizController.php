<?php
defined('BASEPATH') or exit('No direct script access allowed');

class QuizController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('QuizModel');
    }

    public function index()
    {
        // Ambil data kuis dari model
        $data['quizzes'] = $this->QuizModel->get_all_quizzes();

        // Siapkan konten halaman
        $data['title'] = 'Daftar Kuis';
        $data['content'] = $this->load->view('quiz_list', $data, TRUE); // Memuat konten view sebagai string

        // Render template
        $this->load->view('template', $data);
    }


    // Menampilkan form untuk menambahkan kuis dan pertanyaan
    public function add_quiz()
    {
        $data['title'] = 'Tambah Kuis';
        $data['content'] = $this->load->view('add_quiz', NULL, TRUE);
        $this->load->view('template', $data);
    }


    // Menyimpan data kuis dan pertanyaan
    public function store_quiz()
    {
        // Ambil data dari form
        $quiz_name = $this->input->post('quiz_name');
        $questions = $this->input->post('questions');
        $options_a = $this->input->post('option_a');
        $options_b = $this->input->post('option_b');
        $options_c = $this->input->post('option_c');
        $options_d = $this->input->post('option_d');
        $correct_options = $this->input->post('correct_option');

        // Simpan kuis
        $quiz_data = [
            'quiz_name' => $quiz_name
        ];
        $quiz_id = $this->QuizModel->save_quiz($quiz_data);

        // Simpan pertanyaan
        for ($i = 0; $i < count($questions); $i++) {
            $question_data = [
                'quiz_id' => $quiz_id,
                'question' => $questions[$i],
                'option_a' => $options_a[$i],
                'option_b' => $options_b[$i],
                'option_c' => $options_c[$i],
                'option_d' => $options_d[$i],
                'correct_option' => $correct_options[$i],
            ];
            $this->QuizModel->save_question($question_data);
        }

        // Redirect atau beri notifikasi setelah berhasil menyimpan
        redirect('kuis');
    }

    public function start_quiz($quiz_id)
    {
        // Ambil data pertanyaan untuk kuis yang diberikan
        $data['questions'] = $this->QuizModel->get_questions($quiz_id);

        // Ambil ID pengguna dari session atau sumber lain
        $data['user_id'] = $this->session->userdata('user_id'); // Pastikan session user_id diatur

        $data['quiz_id'] = $quiz_id;

        $data['title'] = 'Start Kuis';
        $data['content'] = $this->load->view('start_quiz', $data, TRUE);

        // Pass data ke view
        $this->load->view('template', $data);
    }


    public function submit_answers()
    {
        $answers = $this->input->post('answers'); // jawaban peserta
        $quiz_id = $this->input->post('quiz_id');
        $user_id = $this->input->post('user_id');
        $time_taken = $this->input->post('time_taken');

        $score = $this->QuizModel->calculate_score($answers, $quiz_id);

        $this->QuizModel->save_result($user_id, $quiz_id, $score, $time_taken);

        redirect('kuis/result/' . $quiz_id);
    }

    public function show_result($quiz_id)
    {
        $data['results'] = $this->QuizModel->get_results($quiz_id);
        
        $data['title'] = 'Result Kuis';
        $data['content'] = $this->load->view('quiz_result', $data, TRUE);

        // Pass data ke view
        $this->load->view('template', $data);
    }
}
