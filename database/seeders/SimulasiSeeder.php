<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Simulasi;
use App\Models\Materi;

class SimulasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $simulasis = [
  0 => 
  [
    'materi_judul' => 'Password Security',
    'judul' => 'Simulasi Password Security',
    'deskripsi' => 'Kuasai seni membuat dan mengelola password yang aman. Simulasi ini mencakup analisis kekuatan password, kuis tentang best practices keamanan password, dan skenario dunia nyata tentang pengelolaan kredensial yang aman.',
    'tips' => 
    [
      0 => 'Cara membuat password yang kuat dan mudah diingat',
      1 => 'Mengapa passphrase lebih aman daripada password kompleks',
      2 => 'Bahaya menggunakan password yang sama di banyak akun',
      3 => 'Pentingnya Two-Factor Authentication (2FA]',
    ],
    'skenario' => 
    [
      0 => 
      [
        'skenario_teks' => '“Anda baru saja membuat password \'123456\' untuk akun email baru Anda.”

Password: 123456',
        'pertanyaan' => 'Apakah password ini aman?',
        'opsi' => 
        [
          0 => 'Ya, Ini Website Palsu',
          1 => 'Tidak, terlalu pendek dan mudah ditebak',
          2 => 'Ya, karena hanya saya yang tahu',
          3 => 'Tidak yakin',
        ],
        'jawaban_benar' => '1',
        'penjelasan' => 'Password \'123456\' adalah password paling umum dan paling pertama dicoba oleh peretas. Password seperti ini bisa dibobol dalam waktu kurang dari 1 detik dengan brute force attack.',
      ],
      1 => 
      [
        'skenario_teks' => '“Anda ingin membuat password yang kuat. Mana password terbaik?”',
        'pertanyaan' => 'Pilih password terbaik dari pilihan berikut:',
        'opsi' => 
        [
          0 => 'P@ssw0rd!',
          1 => 'Tr0ub4dor&3',
          2 => 'Kuda-baterai-pokok-1',
          3 => 'Admin123',
        ],
        'jawaban_benar' => '2',
        'penjelasan' => '\'Kuda-baterai-pokok-1\' adalah password terbaik! Ini adalah passphrase - rangkaian kata acak yang panjang (24 karakter], mudah diingat, tapi sangat sulit ditebak. Passphrase lebih aman daripada password pendek dengan karakter kompleks.',
      ],
    ],
  ],
  1 => 
  [
    'materi_judul' => 'Ransomware',
    'judul' => 'Simulasi Ransomware',
    'deskripsi' => 'Ransomware adalah salah satu ancaman siber paling merusak. Dalam simulasi ini, Anda akan menghadapi skenario terkait ransomware — dari cara masuknya, tanda-tanda infeksi, hingga langkah penanganan yang benar — dan belajar bagaimana merespons dengan tepat.',
    'tips' => 
    [
      0 => 'Mengenali vektor masuk ransomware (email, RDP, software bajakan]',
      1 => 'Tanda-tanda awal infeksi ransomware',
      2 => 'Langkah penanganan yang benar saat terinfeksi',
      3 => 'Strategi pencegahan dan backup yang efektif',
    ],
    'skenario' => 
    [
      0 => 
      [
        'skenario_teks' => 'Komputer Tiba-Tiba Menampilkan Pesan Tebusan

Saat bekerja, tiba-tiba layar komputer Anda menampilkan pesan: \'SEMUA FILE ANDA TELAH DIENKRIPSI. Anda punya 72 jam untuk membayar 2 Bitcoin ke alamat berikut. Jika tidak, kunci dekripsi akan dihapus permanen.\' Semua file Anda berubah ekstensi menjadi .locked.',
        'pertanyaan' => 'Apa langkah PERTAMA yang harus dilakukan?',
        'opsi' => 
        [
          0 => 'A. Segera cari cara membayar Bitcoin yang diminta',
          1 => 'B. Restart komputer berulang kali sampai normal',
          2 => 'C. Putuskan koneksi jaringan (Wi-Fi/LAN] dan isolasi perangkat dari network',
          3 => 'D. Hapus semua file yang berubah ekstensi',
        ],
        'jawaban_benar' => '2',
        'penjelasan' => 'Langkah pertama dan paling kritis: ISOLASI! Segera putuskan koneksi jaringan untuk mencegah ransomware menyebar ke perangkat lain di network. Jangan restart dulu — beberapa ransomware justru menyelesaikan enkripsi saat restart. Setelah isolasi, laporkan ke tim IT/keamanan.',
      ],
      1 => 
      [
        'skenario_teks' => 'Download Software Bajakan

Anda mendownload \'crack\' untuk software desain mahal dari sebuah forum. Setelah menjalankan crack tersebut, komputer melambat drastis dan muncul file-file dengan nama acak di desktop.',
        'pertanyaan' => 'Apa yang kemungkinan terjadi?',
        'opsi' => 
        [
          0 => 'A. Software bajakan biasanya berat, wajar kalau lambat',
          1 => 'B. Komputer mungkin terinfeksi ransomware yang mulai mengenkripsi file',
          2 => 'C. Hanya masalah performa biasa, perlu restart',
          3 => 'D. itu fitur dari crack-nya, file acak itu normal',
        ],
        'jawaban_benar' => '1',
        'penjelasan' => 'Software bajakan/crack adalah salah satu vektor ransomware paling umum. Gejala yang disebutkan — sistem melambat + file acak bermunculan — adalah tanda klasik ransomware sedang mengenkripsi data di background. Software bajakan tidak pernah aman; hemat di depan, mahal di belakang.',
      ],
    ],
  ],
  2 => 
  [
    'materi_judul' => 'Clear Screen & Digital Hygiene',
    'judul' => 'Simulasi Clear Screen & Digital Hygiene',
    'deskripsi' => 'Keamanan tidak hanya tentang teknologi — kebiasaan sederhana seperti mengunci layar dan membersihkan jejak digital sama pentingnya. Hadapi skenario tentang keamanan fisik, clear desk policy, dan digital hygiene untuk membangun kebiasaan aman.',
    'tips' => 
    [
      0 => 'Praktik Clear Screen Policy — kunci layar setiap meninggalkan meja',
      1 => 'Clear Desk Policy — amankan dokumen sensitif dan media penyimpanan',
      2 => 'Digital hygiene — bersihkan jejak digital dan audit privasi rutin',
      3 => 'Keamanan perangkat — enkripsi, secure erase, dan remote wipe',
    ],
    'skenario' => 
    [
      0 => 
      [
        'skenario_teks' => 'Komputer Tiba-Tiba Banyak Pop-up Iklan

Setelah mendownload \'free PDF converter\' dari internet, browser dan desktop Anda dipenuhi pop-up iklan yang muncul setiap beberapa menit. Bahkan saat tidak browsing, iklan tetap muncul di desktop.',
        'pertanyaan' => 'Jenis malware apa yang kemungkinan menginfeksi komputer Anda?',
        'opsi' => 
        [
          0 => 'Tidak ada risiko — hanya 2 menit dan ini di dalam kantor',
          1 => 'Risiko tinggi — siapa pun yang lewat bisa melihat, memfoto, atau mengakses data sensetif. Termasuk tamu, cleaning service, atau rekan dari departemen lain',
          2 => 'Risiko rendah selama di kantor sendiri',
          3 => 'Paling hanya kena tegur HRD',
        ],
        'jawaban_benar' => '1',
        'penjelasan' => 'Insiden keamanan bisa terjadi dalam hitungan detik! Seseorang bisa memfoto data customer, mengirim email dari akun Anda, mencuri file, atau menginstal malware — semua dalam 2 menit. Kunci layar (Windows+L] hanya butuh 1 detik tapi mencegah kebocoran data besar-besaran.',
      ],
      1 => 
      [
        'skenario_teks' => 'Membuang Laptop Lama

Anda akan menjual laptop lama. Anda sudah melakukan factory reset, tapi data perusahaan pernah disimpan di laptop itu — termasuk laporan keuangan dan database customer. Pembeli adalah orang tidak dikenal dari marketplace.',
        'pertanyaan' => 'Apakah factory reset cukup aman?',
        'opsi' => 
        [
          0 => 'Ya, factory reset menghapus semua data',
          1 => 'Cukup aman kalau dilakukan 2 kali',
          2 => 'Serahkan saja ke pembeli, biar dia yang urus',
          3 => 'Tidak cukup! Factory reset hanya menghapus ppointer file, data bisa dipulihkan dengan software recovery. Perlu secure erase (overwrite multiple times] atau enkripsi + format',
        ],
        'jawaban_benar' => '3',
        'penjelasan' => 'Factory reset tidak benar-benar menghapus data — hanya menandai space sebagai \'available\' tanpa benar-benar menimpa data. Data sensitif bisa dipulihkan dengan software recovery seperti Recuva. Gunakan software secure erase (DBAN, Parted Magic, atau built-in Windows \'Reset this PC\' dengan opsi \'Clean the drive\'].',
      ],
    ],
  ],
  3 => 
  [
    'materi_judul' => 'Malware',
    'judul' => 'Simulasi Malware Detection',
    'deskripsi' => 'Dari virus hingga rootkit, malware hadir dalam berbagai bentuk. Simulasi ini menyajikan skenario realistis di mana Anda harus mengidentifikasi jenis malware berdasarkan gejala, memilih tindakan yang tepat, dan memahami cara pencegahannya.',
    'tips' => 
    [
      0 => 'Membedakan jenis-jenis malware: virus, worm, trojan, adware, spyware, rootkit',
      1 => 'Mengenali gejala spesifik dari setiap jenis malware',
      2 => 'Memilih tindakan penanganan yang tepat untuk setiap ancaman',
      3 => 'Memahami vektor penyebaran malware dan pencegahannya',
    ],
    'skenario' => 
    [
      0 => 
      [
        'skenario_teks' => 'Komputer Tiba-Tiba Banyak Pop-up Iklan

Setelah mendownload \'free PDF converter\' dari internet, browser dan desktop Anda dipenuhi pop-up iklan yang muncul setiap beberapa menit. Bahkan saat tidak browsing, iklan tetap muncul di desktop.',
        'pertanyaan' => 'Jenis malware apa yang kemungkinan menginfeksi komputer Anda?',
        'jawaban_benar' => '0',
        'opsi' => 
        [
          0 => 'Adware / Potentially Unwanted Program (PUP]',
          1 => 'Ransomware',
          2 => 'Rootkit',
          3 => 'Worm',
        ],
        'penjelasan' => 'Gejala pop-up iklan yang invasif dan muncul bahkan saat tidak browsing adalah ciri khas adware. Adware sering dibundel dengan \'free software\' dari sumber tidak resmi. Meskipun terlihat hanya mengganggu, adware sering menjadi pintu masuk malware yang lebih berbahaya — jangan diabaikan!',
      ],
      1 => 
      [
        'skenario_teks' => 'Komputer Tiba-Tiba Menampilkan Pesan Tebusan

Saat bekerja, tiba-tiba layar komputer Anda menampilkan pesan: \'SEMUA FILE ANDA TELAH DIENKRIPSI. Anda punya 72 jam untuk membayar 2 Bitcoin ke alamat berikut. Jika tidak, kunci dekripsi akan dihapus permanen.\' Semua file Anda berubah ekstensi menjadi .locked.',
        'pertanyaan' => 'Apa langkah PERTAMA yang harus dilakukan?',
        'opsi' => 
        [
          0 => 'Ini hanya virus biasa yang menyembunyikan file',
          1 => 'Trojan yang mencuri data',
          2 => 'Spyware',
          3 => 'Worm - malware yang menyebar sendiri melalui USB dan jaringan ke perangkat lain',
        ],
        'jawaban_benar' => '3',
        'penjelasan' => 'Ini adalah worm! Ciri khas worm: (1] menyebar sendiri antar perangkat tanpa perlu tindakan user (via USB, network], (2] menyembunyikan file asli dan mengganti dengan shortcut berbahaya, (3] otomatis menginfeksi perangkat baru yang terhubung. Worm sangat berbahaya karena penyebarannya yang agresif.',
      ],
    ],
  ],
  4 => 
  [
    'materi_judul' => 'Phishing',
    'judul' => 'Simulasi Phishing Email',
    'deskripsi' => 'Latih kemampuan Anda mengidentifikasi email phishing. Anda akan diberikan contoh email realistis dan harus menentukan mana yang phishing dan mana yang aman. Pelajari pola-pola serangan phishing yang umum digunakan peretas untuk mencuri data pribadi.',
    'tips' => 
    [
      0 => 'Periksa alamat pengirim — domain harus resmi dan tidak mencurigakan',
      1 => 'Waspadai nada mendesak atau mengancam seperti "AKUN ANDA AKAN DIBLOKIR!"',
      2 => 'Jangan klik tautan mencurigakan — arahkan kursor untuk melihat URL sebenarnya',
      3 => 'Email resmi biasanya menyapa dengan nama Anda, bukan "Pengguna" atau "Nasabah"',
    ],
    'skenario' => 
    [
      0 => 
      [
        'skenario_teks' => 'Dari:security@bankbni.co.id

Subjek:URGENT: Akun Anda Terdeteksi Aktivitas Mencurigakan!

----------------------

Yth. Nasabah Setia BNI,  
Sistem kami mendeteksi adanya upaya login mencurigakan dari perangkat tidak dikenal di akun Anda. Demi keamanan, akun Anda sementara kami blokir.  
Untuk membuka blokir dan memverifikasi identitas Anda, silakan klik tautan berikut:  http://bni-verifikasi-akun.xyz/verify  
Anda wajib melakukan verifikasi dalam 1x24 jam. Jika tidak, akun Anda akan dinonaktifkan permanen.  
Terima kasih, Tim Keamanan BNI',
        'pertanyaan' => 'Apakah Email ini Phishing?',
        'jawaban_benar' => 'A',
        'opsi' => 
        [
          'A' => 'Ya, Ini Phishing',
          'B' => 'Tidak, Ini Aman',
        ],
        'penjelasan' => 'Ini adalah email phishing! Bank tidak akan pernah meminta Anda mengklik tautan dari domain tidak resmi. Domain resmi BNI adalah bni.co.id. Selain itu, bank selalu menyapa nasabah dengan nama lengkap, bukan \'Nasabah Setia\'.',
      ],
      1 => 
      [
        'skenario_teks' => 'Dari:admin@kemendikbud.go.id

Subjek:Pendaftaran Bantuan Subsidi Kuota Internet 2026

----------------------

Yth. Mahasiswa/Pelajar,  

Kementerian Pendidikan dan Kebudayaan membuka pendaftaran Bantuan Subsidi Kuota Internet 2026.  

Bantuan: Kuota 50GB/bulan selama 6 bulan  

Syarat pendaftaran: 
1. Kirimkan foto KTP dan Kartu Mahasiswa/Pelajar 
2. Kirimkan nomor telepon aktif 
3. Kirimkan kode OTP yang akan kami kirim  

Pendaftaran di: 
https://subsidi-kemendikbud.com/daftar  

Pendaftaran ditutup besok!  

Kemendikbud RI',
        'pertanyaan' => 'Apakah Email ini Phishing?',
        'jawaban_benar' => '0',
        'opsi' => 
        [
          0 => 'Ya, Ini Phishing',
          1 => 'Tidak, Ini Aman',
        ],
        'penjelasan' => 'Iya ini adalah Phishing yang mengatasnamakan pemerintah! Domain resmi kemendikbud adalah kemdikbud.go.id (tanpa \'e\' kedua]. Instansi pemerintah tidak pernah meminta kode OTP. Program subsidi resmi selalu diumumkan melalui kanal resmi dan media massa, bukan email langsung.',
      ],
    ],
  ],
  5 => 
  [
    'materi_judul' => 'Dasar Keamanan Siber',
    'judul' => 'Simulasi Website Palsu',
    'deskripsi' => 'Belajar membedakan website asli dan palsu. Anda akan diperlihatkan contoh website berbeda dan harus mengidentifikasi apakah website tersebut resmi atau tiruan. Kenali ciri-ciri website palsu seperti URL mencurigakan, kurangnya HTTPS, dan desain yang tidak konsisten.',
    'tips' => 
    [
      0 => 'URL mencurigakan — domain aneh, typo, atau TLD tidak umum (.xyz, .site, .online]',
      1 => 'Tidak ada ikon gembok (SSL/HTTPS] di address bar',
      2 => 'Desain tidak konsisten, banyak typo, atau gambar berkualitas rendah',
      3 => 'Tidak ada informasi kontak yang jelas atau halaman kebijakan privasi',
    ],
    'skenario' => 
    [
      0 => 
      [
        'skenario_teks' => 'Portal Informasi COVID-19

https://covid19.go.id/

Anda mencari informasi resmi COVID-19 dari pemerintah Indonesia.',
        'pertanyaan' => 'Apakah Website ini palsu?',
        'opsi' => 
        [
          0 => 'Ya, Ini Website Palsu',
          1 => 'Tidak, Ini Website Resmi',
        ],
        'jawaban_benar' => '1',
        'penjelasan' => 'Ini adalah Situs resmi pemerintah! Menggunakan domain go.id yang hanya bisa didaftarkan oleh instansi pemerintah Indonesia dengan dokumen resmi. HTTPS valid dan informasi kontak tersedia.',
      ],
      1 => 
      [
        'skenario_teks' => 'Lowongan Kerja

https://rekrutmen-ptmaju.online/lowongan

Anda melamar pekerjaan di PT Maju Jaya melalui link dari grup WhatsApp.',
        'pertanyaan' => 'Apakah Website ini palsu?',
        'jawaban_benar' => '0',
        'opsi' => 
        [
          0 => 'Ya, Ini Website Palsu',
          1 => 'Tidak, Ini Website Resmi',
        ],
        'penjelasan' => 'Lowongan kerja palsu! Perusahaan profesional menggunakan domain .com atau .co.id dengan website resmi. Lowongan yang meminta biaya pendaftaran atau administrasi adalah penipuan.',
      ],
    ],
  ],
  6 => 
  [
    'materi_judul' => 'Social Engineering',
    'judul' => 'Simulasi Social Engineering',
    'deskripsi' => 'Social engineering adalah seni manipulasi psikologis untuk mendapatkan informasi rahasia. Dalam simulasi ini, Anda akan menghadapi skenario realistis — dari telepon penipuan, pesan WhatsApp mencurigakan, hingga perangkap media sosial — dan belajar mengenali taktik manipulasi.',
    'tips' => 
    [
      0 => 'Vishing— Penipuan melalui panggilan telepon dengan menyamar sebagai pihak berwenang',
      1 => 'CEO Fraud— Penipu menyamar sebagai petinggi perusahaan untuk meminta transfer dana',
      2 => 'Pretexting— Membangun cerita palsu untuk mendapatkan kepercayaan korban',
      3 => 'Baiting— Menggunakan umpan (seperti USB drive] untuk menjebak korban',
    ],
    'skenario' => 
    [
      0 => 
      [
        'skenario_teks' => 'Telepon dari ‘Customer Service Bank’',
        'percakapan' => 
        [
          0 => 
          [
            'pengirim' => 'Penelepon',
            'pesan' => 'Anda menerima telepon dari seseorang yang mengaku sebagai customer service bank Anda. Dia menyebutkan nama lengkap Anda dan tahu bank apa yang Anda gunakan.',
          ],
          1 => 
          [
            'pengirim' => 'Penelepon',
            'pesan' => 'Penelepon
Selamat siang, Bapak/Ibu Budi Santoso? Saya Andi dari Customer Service BCA. Kami mendeteksi transaksi mencurigakan sebesar Rp 2.500.000 dari akun Anda 5 menit yang lalu.',
          ],
          2 => 
          [
            'pengirim' => 'Anda',
            'pesan' => 'Transaksi apa? Saya tidak melakukan transaksi apa pun!',
          ],
          3 => 
          [
            'pengirim' => 'Penelepon',
            'pesan' => 'Itulah mengapa kami menghubungi. Demi keamanan, kami perlu memblokir akun Anda segera. Tapi kami perlu verifikasi identitas dulu. Bisa sebutkan nomor kartu ATM dan 3 digit CVV di belakang kartu Anda?',
          ],
        ],
        'pertanyaan' => 'Apa yang harus Anda lakukan?',
        'opsi' => 
        [
          0 => 'Berikan data yang diminta agar akun segera diblokir',
          1 => 'Tutup telepon dan hubungi nomor resmi bank yang tertera di kartu ATM Anda',
          2 => 'Tanyakan baik identitas penelepon secara detail',
          3 => 'Ikuti instruksinya karena dia tahu nama dan bank Anda',
        ],
        'jawaban_benar' => '1',
        'penjelasan' => 'Ini social engineering tipe vishing (voice phishing]! Bank TIDAK PERNAH meminta nomor kartu lengkap, CVV, PIN, atau OTP melalui telepon. Tutup telepon dan hubungi nomor resmi bank Anda. Informasi nama dan bank Anda bisa didapat dari media sosial atau kebocoran data.',
      ],
      1 => 
      [
        'skenario_teks' => 'Pesan WhatsApp dari \'Bos\'',
        'percakapan' => 
        [
          0 => 
          [
            'pengirim' => 'Pengirim',
            'pesan' => 'Anda adalah staf keuangan di sebuah perusahaan. Tiba-tiba Anda menerima pesan WhatsApp dari nomor tidak dikenal yang mengaku sebagai CEO perusahaan Anda.',
          ],
          1 => 
          [
            'pengirim' => 'Pengirim (mengaku CEO]',
            'pesan' => 'Halo, ini saya Pak Hartono. HP saya rusak, jadi saya pakai nomor sementara. Lagi di meeting penting nih.',
          ],
          2 => 
          [
            'pengirim' => 'Anda',
            'pesan' => 'Oh, baik Pak. Ada yang bisa saya bantu?',
          ],
          3 => 
          [
            'pengirim' => 'Pengirim',
            'pesan' => 'Iya, tolong transfer Rp 50 juta ke rekening ini: BCA 1234567890 a/n CV Mitra Sejati. Ini urgent untuk pembayaran vendor hari ini. Nanti saya ganti besok.',
          ],
        ],
        'pertanyaan' => 'Apa yang sebaiknya Anda lakukan?',
        'opsi' => 
        [
          0 => 'Segera transfer karena pesan dari CEO',
          1 => 'Verifikasi melalui telepon atau komunikasi resmi perusahaan sebelum melakukan transfer',
          2 => 'Minta bukti invoice terlebih dahulu',
          3 => 'Transfer setengahnya dulu untuk berjaga-jaga',
        ],
        'jawaban_benar' => '1',
        'penjelasan' => 'Ini adalah CEO Fraud / Business Email Compromise! Penipu mengaku sebagai petinggi perusahaan untuk meminta transfer dana. Selalu verifikasi permintaan transfer melalui jalur komunikasi resmi perusahaan. Kebijakan keuangan yang baik mengharuskan otorisasi ganda untuk transfer besar.',
      ],
    ],
  ],
];

        foreach ($simulasis as $data) {
            // Ambil materi berdasarkan judul
            $materi = Materi::where('judul', $data['materi_judul'])->first();

            if ($materi) {
                Simulasi::updateOrCreate(
                    ['judul' => $data['judul']],
                    [
                        'materi_id' => $materi->id,
                        'slug' => \Illuminate\Support\Str::slug($data['judul']),
                        'deskripsi' => $data['deskripsi'],
                        // Encode array JSON
                        'tips' => json_encode($data['tips']),
                        'skenario' => json_encode($data['skenario'])
                    ]
                );
            }
        }
    }
}