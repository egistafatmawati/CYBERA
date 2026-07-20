<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materi;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionOption;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define quizzes for each materi
        $quizData = [
  'Dasar Keamanan Siber' => 
  [
    'judul' => 'Dasar Keamanan Siber',
    'deskripsi' => 'Uji pemahaman Anda tentang konsep fundamental keamanan siber.',
    'questions' => 
    [
      0 => 
      [
        'pertanyaan' => 'Apa tujuan utama dari serangan phishing?',
        'opsi' => 
        [
          'A' => 'Mempercepat koneksi internet',
          'B' => 'Mencuri informasi sensitif',
          'C' => 'Membersihkan virus dari komputer',
          'D' => 'Memblokir iklan di browser',
        ],
        'jawaban_benar' => 'B',
        'penjelasan' => '',
      ],
      1 => 
      [
        'pertanyaan' => 'Manakah dari berikut ini yang BUKAN merupakan jenis phishing?',
        'opsi' => 
        [
          'A' => 'Spear Phishing',
          'B' => 'Smishing',
          'C' => 'Whaling',
          'D' => 'Surfing',
        ],
        'jawaban_benar' => 'D',
        'penjelasan' => '',
      ],
    ],
  ],
  'Phishing' => 
  [
    'judul' => 'Phishing',
    'deskripsi' => 'Uji kemampuan Anda mengenali dan menghindari serangan phishing.',
    'questions' => 
    [
      0 => 
      [
        'pertanyaan' => 'Apa yang sebaiknya dilakukan jika menerima email mencurigakan yang meminta password?',
        'opsi' => 
        [
          'A' => 'Segera membalas dengan password yang diminta',
          'B' => 'Mengklik tautan untuk memverifikasi akun',
          'C' => 'Mengabaikan, menghapus email, atau melaporkannya',
          'D' => 'Meneruskan email ke semua kontak',
        ],
        'jawaban_benar' => 'C',
        'penjelasan' => '',
      ],
      1 => 
      [
        'pertanyaan' => 'Apa istilah untuk serangan phishing yang dikirimkan melalui pesan teks (SMS]?',
        'opsi' => 
        [
          'A' => 'Vishing',
          'B' => 'Smishing',
          'C' => 'Spear Phishing',
          'D' => 'Whaling',
        ],
        'jawaban_benar' => 'B',
        'penjelasan' => '',
      ],
    ],
  ],
  'Malware' => 
  [
    'judul' => 'Malware',
    'deskripsi' => 'Uji pemahaman Anda tentang berbagai jenis perangkat lunak berbahaya.',
    'questions' => 
    [
      0 => 
      [
        'pertanyaan' => 'Jenis malware apa yang menyamar sebagai perangkat lunak yang sah untuk menipu pengguna agar menginstalnya?',
        'opsi' => 
        [
          'A' => 'Worm',
          'B' => 'Trojan Horse',
          'C' => 'Spyware',
          'D' => 'Ransomware',
        ],
        'jawaban_benar' => 'B',
        'penjelasan' => '',
      ],
      1 => 
      [
        'pertanyaan' => 'Malware yang secara diam-diam memantau aktivitas pengguna disebut...',
        'opsi' => 
        [
          'A' => 'Spyware',
          'B' => 'Adware',
          'C' => 'Botnet',
          'D' => 'Rootkit',
        ],
        'jawaban_benar' => 'A',
        'penjelasan' => '',
      ],
    ],
  ],
  'Ransomware' => 
  [
    'judul' => 'Ransomware',
    'deskripsi' => 'Uji pengetahuan Anda tentang ancaman ransomware.',
    'questions' => 
    [
      0 => 
      [
        'pertanyaan' => 'Apa dampak utama dari serangan ransomware?',
        'opsi' => 
        [
          'A' => 'Menghapus semua file sistem operasi',
          'B' => 'Menampilkan iklan secara terus-menerus',
          'C' => 'Mengenkripsi file dan meminta tebusan',
          'D' => 'Mempercepat kinerja komputer',
        ],
        'jawaban_benar' => 'C',
        'penjelasan' => '',
      ],
      1 => 
      [
        'pertanyaan' => 'Apa strategi backup yang sangat direkomendasikan untuk mencegah hilangnya data akibat ransomware?',
        'opsi' => 
        [
          'A' => 'Strategi 1-2-3',
          'B' => 'Strategi 3-2-1',
          'C' => 'Strategi Backup Otomatis Harian',
          'D' => 'Strategi Cloud-Only',
        ],
        'jawaban_benar' => 'B',
        'penjelasan' => '',
      ],
    ],
  ],
  'Social Engineering' => 
  [
    'judul' => 'Social Engineering',
    'deskripsi' => 'Uji pemahaman Anda tentang taktik manipulasi psikologis.',
    'questions' => 
    [
      0 => 
      [
        'pertanyaan' => 'Apa target utama dari serangan social engineering?',
        'opsi' => 
        [
          'A' => 'Kelemahan pada firewall',
          'B' => 'Sistem operasi komputer',
          'C' => 'Psikologi dan kelengahan manusia',
          'D' => 'Koneksi jaringan internet',
        ],
        'jawaban_benar' => 'C',
        'penjelasan' => '',
      ],
      1 => 
      [
        'pertanyaan' => 'Teknik membuntuti orang yang memiliki akses sah untuk memasuki area terbatas disebut...',
        'opsi' => 
        [
          'A' => 'Baiting',
          'B' => 'Pretexting',
          'C' => 'Tailgating',
          'D' => 'Quid Pro Quo',
        ],
        'jawaban_benar' => 'C',
        'penjelasan' => '',
      ],
    ],
  ],
  'Password Security' => 
  [
    'judul' => 'Password Security',
    'deskripsi' => 'Uji pengetahuan Anda tentang cara mengelola password yang kuat.',
    'questions' => 
    [
      0 => 
      [
        'pertanyaan' => 'Berapa panjang minimal password yang direkomendasikan oleh NIST untuk akun penting?',
        'opsi' => 
        [
          'A' => '6 karakter',
          'B' => '8 karakter',
          'C' => '12 karakter',
          'D' => '16 karakter',
        ],
        'jawaban_benar' => 'C',
        'penjelasan' => '',
      ],
      1 => 
      [
        'pertanyaan' => 'Apa fungsi utama dari Autentikasi Dua Faktor (2FA]?',
        'opsi' => 
        [
          'A' => 'Membuat password lebih mudah diingat',
          'B' => 'Menghapus virus dari komputer',
          'C' => 'Menambahkan lapisan keamanan kedua selain password',
          'D' => 'Mencegah spam masuk ke email',
        ],
        'jawaban_benar' => 'C',
        'penjelasan' => '',
      ],
    ],
  ],
  'Clear Screen & Digital Hygiene' => 
  [
    'judul' => 'Clear Screen & Digital Hygiene',
    'deskripsi' => 'Uji pemahaman Anda tentang kebersihan digital.',
    'questions' => 
    [
      0 => 
      [
        'pertanyaan' => 'Apa kombinasi tombol pintas (shortcut] untuk mengunci layar (Clear Screen] pada sistem operasi Windows?',
        'opsi' => 
        [
          'A' => 'Ctrl + Alt + Delete',
          'B' => 'Windows + L',
          'C' => 'Alt + F4',
          'D' => 'Windows + D',
        ],
        'jawaban_benar' => 'B',
        'penjelasan' => '',
      ],
      1 => 
      [
        'pertanyaan' => 'Tindakan mengintip layar orang lain dari belakang untuk mencuri informasi disebut...',
        'opsi' => 
        [
          'A' => 'Screen peeping',
          'B' => 'Back surfing',
          'C' => 'Shoulder surfing',
          'D' => 'Eye hacking',
        ],
        'jawaban_benar' => 'C',
        'penjelasan' => '',
      ],
    ],
  ],
];

        // Wipe the quizzes first so they get assigned fresh IDs sequentially
        \DB::table('quiz_question_options')->delete();
        \DB::table('quiz_questions')->delete();
        \DB::table('quizzes')->delete();

        foreach ($quizData as $materiJudul => $qData) {
            $materi = Materi::where('judul', $materiJudul)->first();
            
            if ($materi) {
                // 1. Buat atau update Quiz
                $quiz = Quiz::updateOrCreate(
                    ['materi_id' => $materi->id],
                    [
                        'judul' => $qData['judul'],
                        'deskripsi' => $qData['deskripsi']
                    ]
                );

                // 2. Insert Questions
                foreach ($qData['questions'] as $index => $qItem) {
                    $question = QuizQuestion::updateOrCreate(
                        [
                            'quiz_id' => $quiz->id,
                            'urutan' => $index + 1
                        ],
                        [
                            'pertanyaan' => $qItem['pertanyaan'],
                            'jenis_jawaban' => 'pilihan_ganda',
                            'jawaban_benar' => $qItem['jawaban_benar'],
                            'penjelasan' => $qItem['penjelasan'] ?? null
                        ]
                    );

                    // 3. Insert Options
                    // Delete old options first to avoid duplicates if options changed
                    $question->options()->delete();
                    foreach ($qItem['opsi'] as $kode => $teks) {
                        QuizQuestionOption::create([
                            'quiz_question_id' => $question->id,
                            'kode' => $kode,
                            'teks_opsi' => $teks
                        ]);
                    }
                }
            }
        }
    }
}