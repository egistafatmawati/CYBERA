<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\Admin\SimulasiController as AdminSimulasiController;

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\MateriController as UserMateriController;
use App\Http\Controllers\User\SimulasiController;
use App\Http\Controllers\User\QuizController as UserQuizController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard & Fitur User

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Materi
  
    Route::get('/materi', [UserMateriController::class, 'index'])
        ->name('user.materi.index');

    Route::get('/materi/{materi}', [UserMateriController::class, 'show'])
        ->name('user.materi.show');

    // Simulasi routes moved to UI Routes for prototyping
  
    // Quiz

    Route::get('/quiz/{quiz}', [UserQuizController::class, 'show'])
        ->name('user.quiz.show');

    Route::post('/quiz/{quiz}/submit', [UserQuizController::class, 'submit'])
        ->name('user.quiz.submit');

    // Hasil Quiz
  
    Route::get('/hasil-quiz', [UserQuizController::class, 'riwayat'])
        ->name('user.quiz.riwayat');

    Route::get('/hasil-quiz/{quizResult}', [UserQuizController::class, 'hasil'])
        ->name('user.quiz.hasil');
});


// Dashboard & Fitur Admin

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // ===== Profile Admin =====
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        // CRUD Materi
        Route::resource('materi', MateriController::class);

        // CRUD Simulasi
        Route::resource('simulasi', AdminSimulasiController::class);

        // CRUD Quiz
        Route::resource('quiz', AdminQuizController::class)
            ->except(['show']);
    });

// UI Routes
Route::prefix('user')->group(function () {
    Route::view('/dashboard', 'user.dashboard')->name('user.dashboard');
    Route::view('/materi', 'user.materi')->name('user.materi');
    Route::get('/materi-detail/{id}', function($id) {
        return view('user.materi-detail', ['id' => $id]);
    })->name('user.materi.detail');
    
    // Simulasi UI Routes (No auth required for prototyping)
    Route::view('/simulasi', 'user.simulasi')->name('user.simulasi');
    Route::get('/materi/{materi}/simulasi', [SimulasiController::class, 'show'])->name('user.simulasi.show');
    Route::get('/materi/{materi}/simulasi/play', [SimulasiController::class, 'play'])->name('user.simulasi.play');
    Route::post('/materi/{materi}/simulasi/submit', [SimulasiController::class, 'submit'])->name('user.simulasi.submit');

    Route::view('/quiz', 'user.quiz')->name('user.quiz');
    
    // Quiz UI Routes (No auth required for prototyping)
    Route::get('/quiz-preview/{id}', function($id) {
        $titles = [
            1 => 'Dasar Keamanan Siber',
            2 => 'Phishing',
            3 => 'Malware',
            4 => 'Ransomware',
            5 => 'Social Engineering',
            6 => 'Password Security',
            7 => 'Clear Screen & Digital Hygiene'
        ];
        $quiz = (object)[
            'id' => $id,
            'materi_id' => $id,
            'judul' => $titles[$id] ?? ('Topik ' . $id),
            'deskripsi' => 'Uji pengetahuan Anda tentang ' . strtolower($titles[$id] ?? 'topik ini') . ', mengenali ancaman dan cara perlindungan yang efektif.'
        ];
        
        // Pass a dummy questions collection of 6 items so the fallback isn't triggered
        $questions = collect(array_fill(0, 6, ['dummy']));
        
        return view('user.quiz.show', compact('quiz', 'questions'));
    })->name('user.quiz.preview');

    Route::get('/quiz-preview/{id}/play', function($id) {
        $titles = [
            1 => 'Dasar Keamanan Siber',
            2 => 'Phishing',
            3 => 'Malware',
            4 => 'Ransomware',
            5 => 'Social Engineering',
            6 => 'Password Security',
            7 => 'Clear Screen & Digital Hygiene'
        ];
        $quiz = (object)[
            'id' => $id,
            'materi_id' => $id,
            'judul' => $titles[$id] ?? ('Topik ' . $id)
        ];
        
        $questions = collect([
            [
                'id' => 1,
                'pertanyaan' => 'Apa kepanjangan dari HTTPS yang benar dan fungsinya?',
                'opsis' => [
                    (object)['kode' => 'A', 'teks_opsi' => 'HyperText Transfer Protocol Secure — mengenkripsi data'],
                    (object)['kode' => 'B', 'teks_opsi' => 'High Tech Transfer Protocol'],
                    (object)['kode' => 'C', 'teks_opsi' => 'HyperText Transfer Protocol Standard'],
                    (object)['kode' => 'D', 'teks_opsi' => 'Host Transfer Technology']
                ]
            ],
            [
                'id' => 2,
                'pertanyaan' => 'Apa tiga pilar utama dalam CIA Triad?',
                'opsis' => [
                    (object)['kode' => 'A', 'teks_opsi' => 'Control, Integrity, Automation'],
                    (object)['kode' => 'B', 'teks_opsi' => 'Confidentiality, Integrity, Availability'],
                    (object)['kode' => 'C', 'teks_opsi' => 'Confidentiality, Information, Access'],
                    (object)['kode' => 'D', 'teks_opsi' => 'Control, Information, Authentication']
                ]
            ],
            [
                'id' => 3,
                'pertanyaan' => 'Manakah dari berikut ini yang merupakan contoh dari perangkat lunak berbahaya (Malware)?',
                'opsis' => [
                    (object)['kode' => 'A', 'teks_opsi' => 'Phishing email yang meminta password'],
                    (object)['kode' => 'B', 'teks_opsi' => 'Menelpon pura-pura menjadi customer service bank'],
                    (object)['kode' => 'C', 'teks_opsi' => 'Program yang diam-diam mengunci file dan meminta tebusan'],
                    (object)['kode' => 'D', 'teks_opsi' => 'Menebak password akun media sosial secara manual']
                ]
            ],
            [
                'id' => 4,
                'pertanyaan' => 'Apa tujuan utama dari \'Confidentiality\' (Kerahasiaan) dalam keamanan siber?',
                'opsis' => [
                    (object)['kode' => 'A', 'teks_opsi' => 'Memastikan sistem selalu online dan dapat diakses'],
                    (object)['kode' => 'B', 'teks_opsi' => 'Mencegah perubahan data secara tidak sah'],
                    (object)['kode' => 'C', 'teks_opsi' => 'Menyediakan fitur backup data otomatis'],
                    (object)['kode' => 'D', 'teks_opsi' => 'Memastikan data hanya dapat diakses oleh pihak yang berwenang']
                ]
            ],
            [
                'id' => 5,
                'pertanyaan' => 'Jika Anda menerima email berisi lampiran mencurigakan dari pengirim tidak dikenal, langkah terbaik adalah...',
                'opsis' => [
                    (object)['kode' => 'A', 'teks_opsi' => 'Jangan buka lampirannya dan segera hapus/laporkan email tersebut'],
                    (object)['kode' => 'B', 'teks_opsi' => 'Buka lampiran untuk memastikan apakah isinya aman atau tidak'],
                    (object)['kode' => 'C', 'teks_opsi' => 'Balas email tersebut dan tanyakan maksud pengirimannya'],
                    (object)['kode' => 'D', 'teks_opsi' => 'Teruskan email ke rekan kerja untuk meminta pendapat mereka']
                ]
            ],
            [
                'id' => 6,
                'pertanyaan' => 'Mengapa penting untuk selalu memperbarui (update) sistem operasi dan perangkat lunak secara berkala?',
                'opsis' => [
                    (object)['kode' => 'A', 'teks_opsi' => 'Untuk mendapatkan tampilan desain antarmuka terbaru'],
                    (object)['kode' => 'B', 'teks_opsi' => 'Agar kecepatan pemrosesan perangkat keras meningkat'],
                    (object)['kode' => 'C', 'teks_opsi' => 'Menutup celah keamanan (patch) yang bisa dieksploitasi peretas'],
                    (object)['kode' => 'D', 'teks_opsi' => 'Memperbesar kapasitas penyimpanan hard disk secara otomatis']
                ]
            ]
        ]);
        return view('user.quiz.play', compact('quiz', 'questions'));
    })->name('user.quiz.preview.play');

    Route::post('/quiz-preview/{id}/submit', function(Illuminate\Http\Request $request, $id) {
        $jawaban = $request->input('jawaban', []);
        
        $details = collect();
        $benar = 0;
        
        $kunci = [1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D', 5 => 'A', 6 => 'C'];
        
        $questionsData = [
            1 => [
                'pertanyaan' => 'Apa kepanjangan dari HTTPS yang benar dan fungsinya?',
                'penjelasan' => 'HTTPS (HyperText Transfer Protocol Secure) menggunakan enkripsi SSL/TLS untuk mengamankan komunikasi antara browser dan server, melindungi data dari penyadapan.',
                'options' => [
                    (object)['kode' => 'A', 'teks_opsi' => 'HyperText Transfer Protocol Secure — mengenkripsi data'],
                    (object)['kode' => 'B', 'teks_opsi' => 'High Tech Transfer Protocol'],
                    (object)['kode' => 'C', 'teks_opsi' => 'HyperText Transfer Protocol Standard'],
                    (object)['kode' => 'D', 'teks_opsi' => 'Host Transfer Technology']
                ]
            ],
            2 => [
                'pertanyaan' => 'Apa tiga pilar utama dalam CIA Triad?',
                'penjelasan' => 'CIA Triad terdiri dari Confidentiality (Kerahasiaan), Integrity (Integritas), dan Availability (Ketersediaan). Ini adalah model dasar panduan keamanan informasi.',
                'options' => [
                    (object)['kode' => 'A', 'teks_opsi' => 'Control, Integrity, Automation'],
                    (object)['kode' => 'B', 'teks_opsi' => 'Confidentiality, Integrity, Availability'],
                    (object)['kode' => 'C', 'teks_opsi' => 'Confidentiality, Information, Access'],
                    (object)['kode' => 'D', 'teks_opsi' => 'Control, Information, Authentication']
                ]
            ],
            3 => [
                'pertanyaan' => 'Manakah dari berikut ini yang merupakan contoh dari perangkat lunak berbahaya (Malware)?',
                'penjelasan' => 'Malware (Malicious Software) mencakup program seperti ransomware yang mengunci file dan meminta tebusan. Phishing dan telepon penipuan adalah bentuk social engineering.',
                'options' => [
                    (object)['kode' => 'A', 'teks_opsi' => 'Phishing email yang meminta password'],
                    (object)['kode' => 'B', 'teks_opsi' => 'Menelpon pura-pura menjadi customer service bank'],
                    (object)['kode' => 'C', 'teks_opsi' => 'Program yang diam-diam mengunci file dan meminta tebusan'],
                    (object)['kode' => 'D', 'teks_opsi' => 'Menebak password akun media sosial secara manual']
                ]
            ],
            4 => [
                'pertanyaan' => 'Apa tujuan utama dari \'Confidentiality\' (Kerahasiaan) dalam keamanan siber?',
                'penjelasan' => 'Kerahasiaan (Confidentiality) memastikan bahwa data atau informasi hanya dapat diakses oleh pihak-pihak yang memiliki wewenang atau hak akses yang sah.',
                'options' => [
                    (object)['kode' => 'A', 'teks_opsi' => 'Memastikan sistem selalu online dan dapat diakses'],
                    (object)['kode' => 'B', 'teks_opsi' => 'Mencegah perubahan data secara tidak sah'],
                    (object)['kode' => 'C', 'teks_opsi' => 'Menyediakan fitur backup data otomatis'],
                    (object)['kode' => 'D', 'teks_opsi' => 'Memastikan data hanya dapat diakses oleh pihak yang berwenang']
                ]
            ],
            5 => [
                'pertanyaan' => 'Jika Anda menerima email berisi lampiran mencurigakan dari pengirim tidak dikenal, langkah terbaik adalah...',
                'penjelasan' => 'Membuka lampiran dari sumber tidak dikenal dapat memicu eksekusi malware secara otomatis. Langkah paling aman adalah menghapus email tersebut atau melaporkannya ke tim IT.',
                'options' => [
                    (object)['kode' => 'A', 'teks_opsi' => 'Jangan buka lampirannya dan segera hapus/laporkan email tersebut'],
                    (object)['kode' => 'B', 'teks_opsi' => 'Buka lampiran untuk memastikan apakah isinya aman atau tidak'],
                    (object)['kode' => 'C', 'teks_opsi' => 'Balas email tersebut dan tanyakan maksud pengirimannya'],
                    (object)['kode' => 'D', 'teks_opsi' => 'Teruskan email ke rekan kerja untuk meminta pendapat mereka']
                ]
            ],
            6 => [
                'pertanyaan' => 'Mengapa penting untuk selalu memperbarui (update) sistem operasi dan perangkat lunak secara berkala?',
                'penjelasan' => 'Pembaruan (update) sering kali menyertakan patch keamanan (security patch) untuk menutup celah kerentanan yang baru ditemukan sebelum dieksploitasi oleh peretas.',
                'options' => [
                    (object)['kode' => 'A', 'teks_opsi' => 'Untuk mendapatkan tampilan desain antarmuka terbaru'],
                    (object)['kode' => 'B', 'teks_opsi' => 'Agar kecepatan pemrosesan perangkat keras meningkat'],
                    (object)['kode' => 'C', 'teks_opsi' => 'Menutup celah keamanan (patch) yang bisa dieksploitasi peretas'],
                    (object)['kode' => 'D', 'teks_opsi' => 'Memperbesar kapasitas penyimpanan hard disk secara otomatis']
                ]
            ]
        ];
        
        foreach($jawaban as $index => $j) {
            $qId = $j['question_id'];
            $jUser = $j['jawaban_user'];
            
            $isCorrect = ($kunci[$qId] ?? 'A') == $jUser;
            if($isCorrect) $benar++;
            
            $qData = $questionsData[$qId] ?? $questionsData[1];
            
            $question = (object)[
                'id' => $qId,
                'pertanyaan' => $qData['pertanyaan'],
                'jawaban_benar' => $kunci[$qId] ?? 'A',
                'penjelasan' => $qData['penjelasan'],
                'options' => collect($qData['options'])
            ];

            $details->push((object)[
                'question' => $question,
                'jawaban_user' => $jUser,
                'is_correct' => $isCorrect
            ]);
        }
        
        $skor = count($jawaban) > 0 ? round(($benar / count($jawaban)) * 100) : 0;
        
        $quizResult = (object)[
            'quiz_id' => $id,
            'skor' => $skor,
            'details' => $details
        ];
        
        return view('user.quiz.hasil', compact('quizResult'));
    })->name('user.quiz.preview.submit');
    
    Route::view('/profile', 'user.profile')->name('user.profile');
});

Route::prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::view('/pengguna', 'admin.pengguna')->name('admin.pengguna');
    Route::view('/materi', 'admin.materi')->name('admin.materi');
    Route::view('/simulasi', 'admin.simulasi')->name('admin.simulasi');
    Route::view('/quiz', 'admin.quiz')->name('admin.quiz');
    Route::view('/profile', 'admin.profile')->name('admin.profile');
});

require __DIR__.'/auth.php';