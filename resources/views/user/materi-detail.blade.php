@extends('layouts.user')

@section('content')
<style>
    .konten-materi section { margin-bottom: 3rem; }
    .konten-materi h2 {
        font-size: 1.5rem; line-height: 2rem; font-weight: 700;
        margin-bottom: 1.25rem; color: #090F31;
        font-family: 'Audiowide', sans-serif;
    }
    .konten-materi p { margin-bottom: 1rem; text-align: justify; line-height: 1.7; }
    .konten-materi ul {
        list-style-type: disc !important; list-style-position: outside !important;
        padding-left: 1.5rem; margin-bottom: 1rem; text-align: justify; line-height: 1.7;
    }
    .konten-materi ol {
        list-style-type: decimal !important; list-style-position: outside !important;
        padding-left: 1.5rem; margin-bottom: 1rem; text-align: justify; line-height: 1.7;
    }
    .konten-materi li { margin-bottom: 0.75rem; }
    .konten-materi div { display: flex; flex-direction: column; gap: 1rem; }
</style>

@php
    // Data sementara untuk mensimulasikan database yang akan dihubungkan ke admin nanti.
    // Struktur ini mirip dengan apa yang akan disimpan di database (judul, gambar, deskripsi/ringkasan, isi).
    $materiData = [
        1 => [
            'judul' => 'Dasar Keamanan Siber',
            'gambar' => 'images/materi 1.png',
            'ringkasan' => 'Pahami konsep fundamental keamanan siber dan mengapa ini penting bagi semua orang di era digital.',

            'isi' => '
                <section>
                    <h2>Apa Itu Keamanan Siber?</h2>
                    <div>
                        <p>Keamanan siber adalah praktik melindungi sistem, jaringan, program, dan data dari berbagai serangan digital yang bertujuan mengakses, mengubah, menghancurkan informasi sensitif, melakukan pemerasan, atau mengganggu aktivitas sistem.</p>
                        <p>Keamanan siber menjadi penting bagi semua pengguna internet, bukan hanya perusahaan atau pemerintah, karena setiap individu berpotensi menjadi target serangan yang dapat mengancam data pribadi, informasi keuangan, dan identitas digital.</p>
                        <p>Penerapan keamanan siber semakin menantang seiring bertambahnya jumlah perangkat yang terhubung ke internet dan semakin canggihnya metode serangan siber, sehingga diperlukan kesadaran serta langkah-langkah perlindungan yang tepat untuk menjaga keamanan data dan aktivitas digital.</p>
                    </div>
                </section>
                <section>
                    <h2>Tiga Pilar Utama Keamanan Informasi (CIA Triad)</h2>
                    <ul>
                        <li><strong>CIA Triad</strong> merupakan model dasar keamanan informasi yang terdiri dari tiga pilar utama, yaitu Confidentiality (Kerahasiaan), Integrity (Integritas), dan Availability (Ketersediaan). Ketiga pilar ini digunakan sebagai dasar untuk menjaga keamanan data dan sistem informasi.</li>
                        <li><strong>Confidentiality (Kerahasiaan)</strong> memastikan bahwa data hanya dapat diakses oleh pihak yang memiliki hak akses. Pelanggaran kerahasiaan terjadi ketika informasi sensitif bocor atau diakses oleh pihak yang tidak berwenang.</li>
                        <li><strong>Integrity (Integritas)</strong> memastikan bahwa data tetap akurat, utuh, dan tidak mengalami perubahan tanpa izin. Integritas menjaga agar informasi yang digunakan tetap dapat dipercaya dan tidak dimanipulasi.</li>
                        <li><strong>Availability (Ketersediaan)</strong> memastikan bahwa sistem dan data selalu tersedia saat dibutuhkan oleh pengguna yang berwenang. Serangan seperti DDoS (Distributed Denial of Service) dapat mengganggu ketersediaan layanan dengan membanjiri server menggunakan lalu lintas palsu sehingga layanan tidak dapat diakses.</li>
                    </ul>
                </section>
                <section>
                    <h2>Ancaman Keamanan Siber yang Umum</h2>
                    <ul>
                        <li><strong>Malware</strong> adalah perangkat lunak berbahaya yang dirancang untuk merusak sistem atau mengakses perangkat tanpa izin. Malware mencakup berbagai jenis, seperti virus, worm, trojan, ransomware, dan spyware, yang masing-masing memiliki cara kerja dan dampak yang berbeda.</li>
                        <li><strong>Phishing</strong> merupakan upaya penipuan untuk mencuri informasi sensitif, seperti username, password, atau data kartu kredit, dengan menyamar sebagai pihak yang terpercaya melalui email, pesan singkat, atau website palsu.</li>
                        <li><strong>Social Engineering</strong> adalah teknik serangan yang memanfaatkan manipulasi psikologis untuk membujuk korban agar memberikan informasi rahasia. Serangan ini lebih berfokus pada kelemahan manusia dibandingkan kelemahan sistem.</li>
                        <li><strong>Brute Force Attack</strong> merupakan serangan yang dilakukan dengan mencoba berbagai kombinasi password secara otomatis hingga menemukan password yang benar. Password yang lemah dan mudah ditebak akan lebih cepat berhasil diretas.</li>
                        <li><strong>Man-in-the-Middle (MitM)</strong> adalah serangan di mana pelaku menyusup ke dalam komunikasi antara dua pihak untuk mencuri atau memanipulasi data. Serangan ini sering terjadi saat menggunakan jaringan Wi-Fi publik yang tidak aman.</li>
                    </ul>
                </section>
                <section>
                    <h2>Mengapa Keamanan Siber Penting untuk Semua Orang?</h2>
                    <ul>
                        <li>Data pribadi merupakan aset yang sangat berharga. Informasi seperti nama, alamat, nomor telepon, data keuangan, dan kebiasaan online dapat disalahgunakan untuk penipuan identitas, pencurian dana, maupun tindakan kriminal lainnya.</li>
                        <li>Serangan siber dapat menyebabkan kerugian finansial yang besar, baik bagi individu maupun organisasi. Pencurian kredensial perbankan atau akun digital dapat mengakibatkan hilangnya uang dan aset dalam waktu singkat.</li>
                        <li>Reputasi digital juga menjadi salah satu hal yang harus dilindungi. Akun media sosial atau email yang diretas dapat digunakan untuk menyebarkan informasi palsu, melakukan penipuan, atau merusak citra pribadi maupun profesional seseorang.</li>
                        <li>Perkembangan perangkat IoT (Internet of Things), seperti kamera keamanan, smart TV, dan asisten virtual, membuat jumlah perangkat yang terhubung ke internet semakin banyak. Setiap perangkat yang tidak memiliki perlindungan yang baik dapat menjadi celah bagi pelaku kejahatan siber untuk melakukan serangan.</li>
                    </ul>
                </section>
                <section>
                    <h2>Prinsip Dasar Perlindungan Diri</h2>
                    <ul>
                        <li>Gunakan password yang kuat dan unik untuk setiap akun. Password sebaiknya terdiri dari minimal 12 karakter dengan kombinasi huruf besar, huruf kecil, angka, dan simbol, serta tidak digunakan pada lebih dari satu akun.</li>
                        <li>Aktifkan autentikasi dua faktor (2FA) pada setiap akun yang mendukung fitur tersebut. Selain password, pengguna akan diminta melakukan verifikasi tambahan sehingga akun menjadi lebih aman dari akses yang tidak sah.</li>
                        <li>Perbarui perangkat lunak secara rutin, termasuk sistem operasi, aplikasi, dan antivirus. Pembaruan biasanya berisi perbaikan terhadap celah keamanan yang dapat dimanfaatkan oleh penyerang.</li>
                        <li>Berhati-hati terhadap tautan dan lampiran yang diterima melalui email, pesan singkat, atau media sosial. Hindari membuka tautan atau file dari sumber yang tidak dikenal, dan lakukan verifikasi jika pesan terlihat mencurigakan.</li>
                        <li>Lakukan backup data secara berkala dengan menyimpan salinan data penting di hard drive eksternal atau layanan cloud yang aman. Backup membantu memulihkan data apabila terjadi serangan ransomware atau kerusakan pada perangkat.</li>
                    </ul>
                </section>
            '
        ],
        2 => [
            'judul' => 'Phishing',
            'gambar' => 'images/materi 2.png',
            'ringkasan' => 'Kenali berbagai jenis serangan phishing dan cara melindungi diri dari penipuan online yang semakin canggih.',
            'isi' => '
                <section>
                    <h2>Memahami Serangan Phishing</h2>
                    <div>
                        <p>Phishing adalah jenis serangan rekayasa sosial yang menggunakan pesan palsu untuk menipu korban agar memberikan informasi sensitif, seperti username, password, kode OTP, atau menginstal malware pada perangkat.</p>
                        <p>Istilah phishing berasal dari kata fishing (memancing), yang menggambarkan cara penyerang menggunakan umpan berupa email, pesan, atau website palsu untuk menarik korban agar memberikan data penting secara sukarela.</p>
                        <p>Phishing merupakan salah satu ancaman siber yang paling berbahaya karena memanfaatkan kelemahan manusia, bukan kelemahan sistem. Meskipun perangkat telah dilindungi oleh firewall atau antivirus, satu klik pada tautan phishing dapat menyebabkan kebocoran data atau infeksi malware.</p>
                    </div>
                </section>
                <section>
                    <h2>Jenis-Jenis Serangan Phishing</h2>
                    <ul>
                        <li><strong>Email Phishing</strong> merupakan bentuk phishing yang paling umum, di mana penyerang mengirim email yang tampak berasal dari organisasi terpercaya untuk mengelabui korban agar memberikan informasi pribadi atau mengklik tautan berbahaya.</li>
                        <li><strong>Spear Phishing</strong> adalah serangan yang menargetkan individu atau organisasi tertentu. Penyerang terlebih dahulu mengumpulkan informasi mengenai target sehingga pesan yang dikirim terlihat lebih personal dan meyakinkan.</li>
                        <li><strong>Whaling</strong> merupakan jenis spear phishing yang menyasar eksekutif atau pejabat penting dalam suatu organisasi. Karena korban memiliki akses terhadap informasi sensitif, dampak serangan ini biasanya lebih besar.</li>
                        <li><strong>Smishing (SMS Phishing)</strong> dilakukan melalui pesan singkat (SMS) yang berisi tautan atau informasi palsu, seperti pemberitahuan hadiah, paket, atau transaksi, untuk memancing korban memberikan data pribadi.</li>
                        <li><strong>Vishing (Voice Phishing)</strong> menggunakan panggilan telepon sebagai media penipuan. Pelaku biasanya mengaku sebagai petugas bank, layanan pelanggan, atau instansi pemerintah untuk memperoleh informasi rahasia dari korban.</li>
                        <li><strong>Clone Phishing</strong> terjadi ketika penyerang menyalin email resmi yang pernah diterima korban, kemudian mengganti tautan atau lampirannya dengan versi berbahaya sehingga email tersebut tampak asli dan sulit dikenali.</li>
                    </ul>
                </section>
                <section>
                    <h2>Cara Mengenali Tanda-Tanda Phishing</h2>
                    <ul>
                        <li>Alamat pengirim yang mencurigakan dapat menjadi indikasi phishing. Periksa dengan teliti alamat email atau domain pengirim karena pelaku sering menggunakan nama yang sangat mirip dengan domain resmi untuk mengelabui korban.</li>
                        <li>Kesalahan tata bahasa dan ejaan sering ditemukan pada pesan phishing. Meskipun tidak selalu, email atau pesan palsu umumnya memiliki kalimat yang kurang profesional dan mengandung kesalahan penulisan.</li>
                        <li>Pesan yang bersifat mendesak merupakan ciri umum phishing. Pelaku biasanya membuat korban panik dengan pemberitahuan seperti akun akan diblokir, transaksi mencurigakan, atau permintaan verifikasi segera agar korban bertindak tanpa berpikir.</li>
                        <li>Tautan yang mencurigakan perlu diperiksa sebelum diklik. Pastikan alamat URL sesuai dengan website resmi dan hindari membuka tautan yang mengarah ke domain yang tidak dikenal atau terlihat tidak wajar.</li>
                        <li>Permintaan informasi sensitif seperti password, PIN, atau kode OTP patut diwaspadai. Perusahaan atau instansi resmi tidak akan meminta informasi tersebut melalui email, pesan singkat, maupun telepon.</li>
                        <li>Lampiran yang tidak diminta dari pengirim yang tidak dikenal sebaiknya tidak dibuka. File seperti .exe, .zip, .docm, atau .pdf dapat mengandung malware yang berpotensi menginfeksi perangkat saat dijalankan.</li>
                    </ul>
                </section>
                <section>
                    <h2>Apa yang Harus Dilakukan Jika Terkena Phishing?</h2>
                    <ul>
                        <li>Segera ganti password akun yang terdampak dengan password yang kuat dan unik. Jika password yang sama digunakan pada akun lain, segera lakukan penggantian untuk mencegah penyalahgunaan lebih lanjut.</li>
                        <li>Aktifkan autentikasi dua faktor (2FA) pada akun yang mendukung fitur tersebut. Langkah ini memberikan lapisan keamanan tambahan sehingga akun tetap terlindungi meskipun password telah diketahui oleh penyerang.</li>
                        <li>Hubungi pihak terkait, seperti bank, penyedia layanan, atau platform yang akunnya terdampak, agar mereka dapat membantu mengamankan akun serta memantau aktivitas yang mencurigakan.</li>
                        <li>Pantau aktivitas akun dan transaksi keuangan secara berkala untuk memastikan tidak ada aktivitas yang tidak dikenal atau transaksi yang dilakukan tanpa izin.</li>
                        <li>Laporkan insiden phishing kepada pihak yang berwenang agar dapat ditindaklanjuti. Pelaporan juga membantu mencegah lebih banyak korban dari serangan yang sama.</li>
                        <li>Tingkatkan pengetahuan tentang phishing dengan terus mempelajari teknik penipuan terbaru dan menerapkan kebiasaan digital yang aman agar lebih waspada terhadap berbagai bentuk serangan siber.</li>
                    </ul>
                </section>
            '
        ],
        3 => [
            'judul' => 'Malware',
            'gambar' => 'images/materi 3.png',
            'ringkasan' => 'Pelajari tentang virus, worm, trojan, dan berbagai jenis perangkat lunak berbahaya yang mengancam perangkat Anda.',
            'isi' => '
                <section>
                    <h2>Apa Itu Malware?</h2>
                    <div>
                        <p>Malware (Malicious Software) adalah perangkat lunak berbahaya yang dirancang untuk merusak, mengganggu, mencuri informasi, atau memperoleh akses tanpa izin ke suatu sistem. Berbeda dengan software biasa yang membantu pengguna, malware dibuat untuk menjalankan aktivitas yang dapat membahayakan perangkat maupun data.</p>
                        <p>Malware dapat menyebar melalui berbagai cara, seperti email phishing, lampiran yang terinfeksi, unduhan dari situs yang tidak terpercaya, perangkat USB yang terinfeksi, hingga eksploitasi celah keamanan pada sistem operasi atau aplikasi. Karena metode penyebarannya beragam, setiap pengguna perlu berhati-hati terhadap file, tautan, maupun perangkat yang digunakan.</p>
                        <p>Dampak malware juga sangat beragam, mulai dari menampilkan iklan yang mengganggu (adware), memata-matai aktivitas pengguna (spyware), mencuri password (keylogger), mengenkripsi file dan meminta tebusan (ransomware), hingga mengambil alih perangkat sebagai bagian dari botnet. Memahami cara kerja dan jenis-jenis malware merupakan langkah penting untuk melindungi perangkat, data pribadi, dan akun digital dari ancaman siber yang terus berkembang.</p>
                    </div>
                </section>
                <section>
                    <h2>Jenis-Jenis Malware yang Perlu Diketahui</h2>
                    <ul>
                        <li><strong>Virus</strong> — Malware yang menempel pada file atau program dan memerlukan tindakan pengguna untuk menyebar. Virus dapat merusak file, memperlambat sistem, hingga menyebabkan komputer tidak berfungsi dengan baik.</li>
                        <li><strong>Worm</strong> — Berbeda dengan virus, worm dapat menyebar sendiri melalui jaringan tanpa bantuan pengguna. Kemampuannya membuat worm dapat menginfeksi banyak perangkat dalam waktu singkat.</li>
                        <li><strong>Trojan Horse</strong> — Malware yang menyamar sebagai aplikasi atau file yang tampak aman agar pengguna menginstalnya. Setelah aktif, trojan dapat membuka akses bagi penyerang, mencuri data, atau menginstal malware lain.</li>
                        <li><strong>Spyware & Keylogger</strong> — Spyware memantau aktivitas pengguna secara diam-diam untuk mencuri informasi, sedangkan keylogger merekam setiap ketukan keyboard guna memperoleh username, password, atau data sensitif lainnya.</li>
                        <li><strong>Adware</strong> — Adware menampilkan iklan secara berlebihan dan sering kali mengganggu aktivitas pengguna. Beberapa adware juga dapat melacak kebiasaan pengguna untuk kepentingan iklan atau mengarahkan ke situs berbahaya.</li>
                        <li><strong>Rootkit & Botnet</strong> — Rootkit bekerja di tingkat sistem untuk menyembunyikan keberadaan malware sehingga sulit dideteksi. Sementara botnet adalah jaringan perangkat yang telah terinfeksi dan dikendalikan penyerang untuk melakukan serangan seperti DDoS, spam, atau aktivitas berbahaya lainnya.</li>
                    </ul>
                </section>
                <section>
                    <h2>Bagaimana Malware Menyebar?</h2>
                    <div>
                        <p>Malware dapat menyebar melalui berbagai cara, dan email phishing merupakan salah satu metode yang paling sering digunakan. Penyerang biasanya mengirim email berisi lampiran atau tautan berbahaya yang disamarkan sebagai dokumen penting, invoice, atau notifikasi resmi agar korban membukanya.</p>
                        <p>Penyebaran juga dapat terjadi melalui drive-by download, yaitu ketika pengguna mengunjungi situs web yang telah terinfeksi. Tanpa disadari, malware dapat terunduh dengan memanfaatkan celah keamanan pada browser atau plugin yang belum diperbarui.</p>
                        <p>Selain itu, USB drive atau media penyimpanan eksternal yang terinfeksi sering digunakan untuk menyebarkan malware. Aplikasi tidak resmi, software bajakan, serta unduhan dari sumber yang tidak terpercaya juga berisiko membawa malware. Penggunaan jaringan Wi-Fi publik yang tidak aman dapat meningkatkan risiko penyusupan dan penyebaran malware, terutama jika pengguna mengakses atau mengunduh data tanpa perlindungan.</p>
                    </div>
                </section>
                <section>
                    <h2>Cara Melindungi Diri dari Malware</h2>
                    <ul>
                        <li>Gunakan antiVirus dan anti-malware terpercaya. Pastikan selalu diperbarui agar mampu mendeteksi ancaman terbaru, termasuk malware yang belum dikenal.</li>
                        <li>Waspadai email dan lampiran mencurigakan. Jangan membuka file atau mengklik tautan dari pengirim yang tidak dikenal. Jika ragu, lakukan verifikasi melalui saluran resmi.</li>
                        <li>Unduh aplikasi dari sumber resmi. Gunakan Google Play Store, App Store, Microsoft Store, atau situs resmi pengembang. Hindari software bajakan dan aplikasi tidak resmi.</li>
                        <li>Perbarui sistem dan aplikasi secara berkala. Pembaruan keamanan membantu menutup celah yang sering dimanfaatkan malware untuk menginfeksi perangkat.</li>
                        <li>Aktifkan firewall. Firewall membantu memantau lalu lintas jaringan dan memblokir koneksi yang mencurigakan sebelum mencapai perangkat.</li>
                        <li>Lakukan backup data secara rutin. Simpan salinan data di lokasi terpisah (offline atau cloud) agar data dapat dipulihkan jika perangkat terinfeksi malware, terutama ransomware.</li>
                    </ul>
                </section>
            '
        ],
        4 => [
            'judul' => 'Ransomware',
            'gambar' => 'images/materi 4.png',
            'ringkasan' => 'Pahami ancaman ransomware, cara penyebarannya, dan strategi pencegahan yang efektif.',
            'isi' => '
                <section>
                    <h2>Memahami Ancaman Ransomware</h2>
                    <div>
                        <p>Ransomware adalah malware yang mengenkripsi file korban dan meminta tebusan (ransom) agar data dapat diakses kembali. Serangan ini menjadi salah satu ancaman siber paling berbahaya karena dapat menyerang individu, perusahaan, rumah sakit, hingga instansi pemerintah.</p>
                        <p>Ransomware pertama kali muncul pada 1989 (AIDS Trojan) dan kini berkembang menjadi Ransomware-as-a-Service (RaaS), yaitu model di mana pengembang menyewakan ransomware kepada pelaku lain sehingga serangan semakin mudah dilakukan.</p>
                        <p>Korban biasanya diminta membayar tebusan menggunakan cryptocurrency seperti Bitcoin atau Monero. Saat ini banyak pelaku juga menerapkan double extortion, yaitu mengenkripsi sekaligus mencuri data dan mengancam mempublikasikannya jika korban tidak membayar.</p>
                    </div>
                </section>
                <section>
                    <h2>Bagaimana Ransomware Bekerja?</h2>
                    <ul>
                        <li>Masuk ke perangkat melalui email phishing, lampiran berbahaya, celah keamanan, Remote Desktop Protocol (RDP), atau unduhan dari situs yang terinfeksi.</li>
                        <li>Mengenkripsi data menggunakan algoritma enkripsi kuat (seperti AES dan RSA), sehingga file tidak dapat dibuka.</li>
                        <li>Menampilkan ransom note yang berisi tuntutan pembayaran dan batas waktu sebelum kunci dekripsi dihapus atau data dipublikasikan.</li>
                        <li>Pada beberapa kasus, pelaku juga mencuri data korban sebelum proses enkripsi untuk meningkatkan tekanan agar korban membayar.</li>
                    </ul>
                </section>
                <section>
                    <h2>Jenis-Jenis Ransomware yang Signifikan</h2>
                    <ul>
                        <li><strong>WannaCry (2017)</strong> menyebar melalui celah keamanan Windows (EternalBlue) dan menginfeksi lebih dari 200.000 komputer di 150 negara hanya dalam beberapa hari.</li>
                        <li><strong>NotPetya (2017)</strong> awalnya terlihat seperti ransomware, tetapi sebenarnya merupakan wiper yang dirancang untuk menghancurkan data dan menyebabkan kerugian lebih dari US$10 miliar.</li>
                        <li><strong>REvil (Sodinokibi)</strong> merupakan kelompok Ransomware-as-a-Service (RaaS) yang menargetkan banyak perusahaan besar, termasuk melalui serangan pada Kaseya.</li>
                        <li><strong>LockBit</strong> adalah salah satu ransomware paling aktif saat ini yang menggunakan triple extortion: mengenkripsi data, mencuri data, dan melancarkan serangan DDoS untuk menekan korban.</li>
                    </ul>
                </section>
                <section>
                    <h2>Strategi Pencegahan dan Penanganan Ransomware</h2>
                    <ul>
                        <li>Lakukan backup secara rutin dengan strategi 3-2-1 (3 salinan, 2 media berbeda, 1 salinan offline/offsite) serta uji proses pemulihannya.</li>
                        <li>Perbarui sistem dan aplikasi secara berkala untuk menutup celah keamanan yang dapat dieksploitasi.</li>
                        <li>Gunakan autentikasi multi-faktor (MFA), password yang kuat, dan batasi akses Remote Desktop Protocol (RDP) agar tidak terbuka langsung ke internet.</li>
                        <li>Waspadai phishing dan lampiran mencurigakan karena menjadi jalur penyebaran ransomware yang paling umum.</li>
                        <li>Terapkan prinsip least privilege, yaitu memberikan hak akses minimum sesuai kebutuhan pengguna.</li>
                        <li>Jika terinfeksi, isolasi perangkat, jangan membayar tebusan, laporkan kepada pihak berwenang atau tim keamanan, lalu pulihkan data dari backup.</li>
                    </ul>
                </section>
            '
        ],
        5 => [
            'judul' => 'Social Engineering',
            'gambar' => 'images/materi 5.png',
            'ringkasan' => 'Pelajari taktik manipulasi psikologis yang digunakan peretas untuk mendapatkan informasi dan akses.',
            'isi' => '
                <section>
                    <h2>Apa Itu Social Engineering?</h2>
                    <div>
                        <p>Social Engineering adalah teknik manipulasi psikologis yang digunakan penyerang untuk mengelabui seseorang agar memberikan informasi rahasia, seperti password atau data pribadi, maupun melakukan tindakan yang dapat membahayakan keamanan. Berbeda dengan serangan yang mengeksploitasi celah sistem, teknik ini menjadikan manusia sebagai target utama karena sering kali lebih mudah dimanipulasi dibandingkan teknologi.</p>
                        <p>Serangan ini memanfaatkan sifat alami manusia, seperti rasa percaya, keinginan membantu, kepatuhan terhadap figur otoritas, rasa ingin tahu, dan kepanikan. Karena tidak menyerang sistem secara langsung, social engineering sering kali sulit dideteksi dan korban baru menyadari telah ditipu setelah kerugian terjadi. Oleh sebab itu, kesadaran dan kewaspadaan pengguna menjadi salah satu pertahanan paling penting dalam keamanan siber.</p>
                    </div>
                </section>
                <section>
                    <h2>Teknik-Teknik Social Engineering</h2>
                    <ul>
                        <li><strong>Pretexting</strong> — Penyerang membuat identitas atau skenario palsu untuk memperoleh informasi atau akses. Contohnya mengaku sebagai staf IT, auditor, atau pihak bank agar korban bersedia memberikan data penting atau kredensial.</li>
                        <li><strong>Baiting</strong> — Penyerang menawarkan umpan yang menarik, seperti USB drive, file gratis, atau hadiah palsu, untuk memancing rasa penasaran korban. Ketika korban membuka file atau menggunakan perangkat tersebut, malware dapat langsung menginfeksi sistem.</li>
                        <li><strong>Tailgating (Piggybacking)</strong> — Teknik di mana penyerang mengikuti karyawan yang memiliki akses sah untuk memasuki area terbatas tanpa otorisasi. Cara ini sering berhasil karena korban merasa tidak enak menolak atau menganggap pelaku memang memiliki izin.</li>
                        <li><strong>Quid Pro Quo</strong> — Penyerang menawarkan bantuan, hadiah, atau layanan tertentu sebagai imbalan atas informasi atau akses. Misalnya berpura-pura membantu memperbaiki komputer, tetapi meminta korban memberikan username dan password.</li>
                        <li><strong>Scareware</strong> — Penyerang menciptakan rasa takut melalui peringatan palsu, misalnya mengklaim komputer terinfeksi virus. Korban kemudian diarahkan untuk mengunduh aplikasi palsu atau memberikan informasi sensitif karena panik.</li>
                        <li><strong>Phishing</strong> — Penyerang mengirim email, SMS, atau pesan yang menyerupai institusi terpercaya untuk mencuri data login, informasi pribadi, atau mengarahkan korban ke situs palsu. Phishing merupakan salah satu bentuk social engineering yang paling sering digunakan dalam serangan siber.</li>
                    </ul>
                </section>
                <section>
                    <h2>Psikologi di Balik Social Engineering</h2>
                    <ul>
                        <li><strong>Prinsip Otoritas:</strong> Manusia cenderung mematuhi figur yang dianggap berwenang, seperti atasan, staf IT, polisi, atau auditor. Penyerang memanfaatkan hal ini dengan menyamar sebagai pihak berwenang agar korban mengikuti instruksinya tanpa verifikasi.</li>
                        <li><strong>Prinsip Reciprocity (Timbal Balik):</strong> Seseorang biasanya merasa perlu membalas kebaikan yang diterimanya. Penyerang sering memberikan bantuan atau informasi terlebih dahulu, lalu meminta data, akses, atau tindakan sebagai balasannya.</li>
                        <li><strong>Prinsip Kelangkaan:</strong> Rasa urgensi seperti "Promo berakhir hari ini!" atau "Sisa 2 slot!" membuat korban bertindak terburu-buru. Penyerang memanfaatkannya agar korban tidak sempat berpikir atau melakukan verifikasi.</li>
                        <li><strong>Prinsip Konsistensi:</strong> Korban yang sudah menyetujui permintaan kecil cenderung lebih mudah menyetujui permintaan berikutnya. Penyerang memulai dari hal sederhana sebelum meminta informasi atau akses yang lebih penting.</li>
                        <li><strong>Prinsip Social Proof (Bukti Sosial):</strong> Orang lebih mudah percaya jika melihat banyak orang lain melakukan hal yang sama. Penyerang memanfaatkan klaim seperti "Ribuan pengguna telah bergabung" untuk meyakinkan korbannya.</li>
                    </ul>
                </section>
                <section>
                    <h2>Melindungi Diri dari Social Engineering</h2>
                    <ul>
                        <li>Selalu verifikasi identitas sebelum memberikan informasi penting. Hubungi kembali melalui nomor atau kanal resmi, jangan percaya begitu saja pada identitas yang diklaim.</li>
                        <li>Waspadai rasa urgensi. Permintaan yang mendesak seperti "harus sekarang" atau "akun akan diblokir" sering digunakan agar korban bertindak tanpa berpikir.</li>
                        <li>Jangan membagikan data sensitif, seperti password, PIN, OTP, atau informasi pribadi melalui telepon, email, maupun pesan yang tidak dapat dipastikan keasliannya.</li>
                        <li>Gunakan teknik challenge-response, yaitu mengajukan pertanyaan yang hanya dapat dijawab oleh pihak yang benar sebelum memberikan informasi atau akses.</li>
                        <li>Laporkan setiap aktivitas mencurigakan kepada tim keamanan atau atasan, meskipun belum terjadi kebocoran data, agar serangan dapat dicegah lebih awal.</li>
                        <li>Terapkan Clear Desk Policy dengan tidak meninggalkan dokumen penting, password, kartu akses, atau media penyimpanan di meja kerja saat ditinggalkan.</li>
                    </ul>
                </section>
            '
        ],
        6 => [
            'judul' => 'Password Security',
            'gambar' => 'images/materi 6.png',
            'ringkasan' => 'Kuasai praktik terbaik dalam membuat, menyimpan, dan mengelola password untuk mengamankan identitas digital Anda.',
            'isi' => '
                <section>
                    <h2>Pentingnya Keamanan Password</h2>
                    <div>
                        <p>Password adalah garis pertahanan pertama dalam melindungi akun, data pribadi, dan informasi keuangan dari akses yang tidak sah. Meskipun teknologi keamanan terus berkembang, password yang lemah dan mudah ditebak tetap menjadi penyebab utama terjadinya peretasan dan pencurian data.</p>
                        <p>Serangan siber seperti brute force, dictionary attack, hingga credential stuffing secara otomatis akan mencoba ribuan hingga jutaan kombinasi password dalam hitungan detik. Jika Anda menggunakan password seperti "123456", tanggal lahir, atau nama hewan peliharaan, akun Anda sangat rentan untuk diambil alih oleh pihak yang tidak bertanggung jawab.</p>
                    </div>
                </section>
                <section>
                    <h2>Mengapa Password Sering Berhasil Diretas?</h2>
                    <ul>
                        <li><strong>Penggunaan Kembali (Reuse):</strong> Menggunakan password yang sama untuk beberapa akun berbeda. Jika salah satu platform mengalami kebocoran data, semua akun Anda di platform lain akan berada dalam bahaya.</li>
                        <li><strong>Terlalu Singkat dan Sederhana:</strong> Password dengan panjang di bawah 8 karakter, terutama yang hanya terdiri dari huruf kecil atau angka saja, sangat mudah ditebak menggunakan program peretas.</li>
                        <li><strong>Mengandung Informasi Pribadi:</strong> Menggunakan nama, tanggal lahir, alamat, atau hobi yang informasinya bisa dengan mudah dicari penyerang melalui media sosial.</li>
                        <li><strong>Kebocoran Data (Data Breach):</strong> Sistem atau aplikasi yang Anda gunakan mungkin pernah diretas, sehingga password Anda bocor ke dark web dan dijual kepada peretas lain.</li>
                    </ul>
                </section>
                <section>
                    <h2>Kriteria Password yang Kuat (Strong Password)</h2>
                    <ul>
                        <li><strong>Panjang Minimal 12 Karakter:</strong> Semakin panjang sebuah password, semakin eksponensial waktu yang dibutuhkan untuk meretasnya.</li>
                        <li><strong>Gunakan Kombinasi Karakter:</strong> Campurkan huruf kapital (A-Z), huruf kecil (a-z), angka (0-9), dan simbol khusus (!, @, #, $, dll) untuk meningkatkan kompleksitas.</li>
                        <li><strong>Hindari Kata Umum:</strong> Jangan menggunakan kata-kata yang ada di dalam kamus (Dictionary Word), karena mudah dipecahkan oleh program dictionary attack.</li>
                        <li><strong>Pertimbangkan Penggunaan Passphrase:</strong> Gunakan rangkaian kata yang tidak berhubungan tetapi mudah Anda ingat. Contoh: <i>BukuKuning-TerbangKeBulan#2024</i>. Passphrase biasanya lebih panjang, lebih kuat, dan lebih mudah diingat daripada string karakter acak.</li>
                    </ul>
                </section>
                <section>
                    <h2>Praktik Terbaik Mengelola Password</h2>
                    <ul>
                        <li><strong>Gunakan Password Manager:</strong> Tidak mungkin manusia bisa mengingat puluhan password yang panjang, rumit, dan berbeda-beda. Gunakan aplikasi Password Manager terpercaya (seperti Bitwarden, 1Password, atau Dashlane) untuk menyimpan dan menghasilkan password secara otomatis. Anda hanya perlu mengingat satu <i>Master Password</i> yang kuat.</li>
                        <li><strong>Jangan Pernah Bagikan Password:</strong> Pihak resmi seperti admin IT, layanan pelanggan, atau pihak bank tidak akan pernah meminta password atau PIN Anda dengan alasan apapun.</li>
                        <li><strong>Waspada Terhadap Tempat Penyimpanan:</strong> Jangan pernah menyimpan password di aplikasi catatan yang tidak terenkripsi, file Excel/Word, atau menuliskannya di kertas tempel (sticky notes) di sekitar meja kerja Anda.</li>
                        <li><strong>Rutin Memeriksa Kebocoran Data:</strong> Gunakan layanan seperti <i>Have I Been Pwned</i> untuk memeriksa apakah alamat email atau akun Anda pernah muncul dalam insiden kebocoran data massal.</li>
                    </ul>
                </section>
                <section>
                    <h2>Autentikasi Dua Faktor (2FA)</h2>
                    <div>
                        <p>Bahkan password terkuat pun bisa dicuri melalui teknik phishing atau keylogger. Oleh karena itu, selalu aktifkan Autentikasi Dua Faktor (2FA) pada semua layanan yang mendukungnya (email, media sosial, perbankan, dll).</p>
                        <p>Dengan 2FA, setelah memasukkan password yang benar, Anda akan diminta memasukkan lapisan verifikasi kedua—seperti kode OTP dari aplikasi authenticator (Google Authenticator, Authy), kode SMS, atau konfirmasi prompt di perangkat genggam. Hal ini memastikan penyerang tetap tidak bisa masuk meskipun mereka telah mengetahui password Anda.</p>
                    </div>
                </section>
            '
        ],
        7 => [
            'judul' => 'Clear Screen & Digital Hygiene',
            'gambar' => 'images/materi 7.png',
            'ringkasan' => 'Terapkan praktik keamanan fisik dan digital mulai dari clear desk policy hingga kebersihan jejak digital untuk menjaga integritas data Anda.',
            'isi' => '
                <section>
                    <h2>Apa Itu Digital Hygiene?</h2>
                    <div>
                        <p>Sama seperti kebersihan pribadi yang sangat penting untuk menjaga kesehatan fisik, <strong>Digital Hygiene</strong> (Kebersihan Digital) merupakan serangkaian praktik dan rutinitas proaktif untuk menjaga perangkat, jaringan, dan akun online agar tetap "bersih" dan aman dari berbagai ancaman siber.</p>
                        <p>Digital Hygiene yang buruk, seperti membiarkan perangkat lunak tidak diperbarui, menyimpan banyak file usang, dan tidak memiliki perlindungan layar, dapat membuka pintu gerbang bagi peretas untuk mengeksploitasi data Anda tanpa perlu menggunakan teknik peretasan yang rumit.</p>
                    </div>
                </section>
                <section>
                    <h2>Penerapan Clear Screen Policy (Kebijakan Layar Bersih)</h2>
                    <div>
                        <p>Bayangkan Anda sedang mengerjakan dokumen rahasia di kedai kopi atau di meja kantor, lalu Anda harus pergi sebentar ke toilet dan meninggalkan laptop Anda dalam keadaan terbuka. Dalam hitungan detik, seseorang dapat mengintip, memfoto, atau bahkan mencuri data penting dari layar Anda.</p>
                        <ul>
                            <li><strong>Kunci Layar Saat Ditinggalkan:</strong> Selalu biasakan menekan pintasan keyboard (seperti <i>Windows Key + L</i> di Windows atau <i>Ctrl + Cmd + Q</i> di Mac) saat Anda beranjak dari tempat duduk.</li>
                            <li><strong>Gunakan Screen Privacy Filter:</strong> Jika sering bekerja di ruang publik, pasang filter privasi pada layar laptop Anda sehingga orang di sebelah Anda tidak bisa melihat apa yang sedang Anda kerjakan (visual hacking).</li>
                            <li><strong>Atur Auto-Lock:</strong> Konfigurasikan sistem operasi dan perangkat seluler Anda agar mengunci layar secara otomatis setelah beberapa menit jika tidak ada aktivitas.</li>
                        </ul>
                    </div>
                </section>
                <section>
                    <h2>Penerapan Clear Desk Policy (Kebijakan Meja Bersih)</h2>
                    <div>
                        <p>Keamanan siber tidak hanya terkait dengan dunia digital, namun juga terkait langsung dengan keamanan fisik (Physical Security).</p>
                        <ul>
                            <li><strong>Jangan Tinggalkan Dokumen Sensitif:</strong> Jangan biarkan dokumen fisik yang berisi informasi sensitif pelanggan, data keuangan, atau dokumen strategis tergeletak begitu saja di meja saat Anda pulang atau selesai bekerja.</li>
                            <li><strong>Amankan Media Penyimpanan:</strong> Simpan flashdisk, hard drive eksternal, atau token fisik (seperti RSA SecurID) di laci yang terkunci.</li>
                            <li><strong>Buang Kertas dengan Aman:</strong> Gunakan mesin penghancur kertas (shredder) untuk memusnahkan dokumen-dokumen yang tidak lagi diperlukan, alih-alih hanya membuangnya ke tempat sampah.</li>
                        </ul>
                    </div>
                </section>
                <section>
                    <h2>Mengelola Jejak Digital (Digital Footprint)</h2>
                    <div>
                        <p>Setiap kali Anda berselancar di internet, berkomentar di media sosial, atau berbelanja secara online, Anda meninggalkan jejak data (Digital Footprint). Jejak digital ini sering digunakan oleh peretas dalam tahap awal serangan <i>Social Engineering</i> (pengintaian / reconnaissance) untuk membangun profil Anda.</p>
                        <ul>
                            <li><strong>Atur Pengaturan Privasi:</strong> Periksa secara berkala pengaturan privasi pada akun jejaring sosial (Instagram, Facebook, LinkedIn, dll). Batasi siapa saja yang bisa melihat aktivitas, informasi kontak, dan daftar teman Anda.</li>
                            <li><strong>Berpikir Sebelum Membagikan (Think Before You Post):</strong> Jangan pernah membagikan foto kartu identitas (KTP/SIM), boarding pass, ID card kantor, atau dokumen tagihan ke publik. Barcode dan nomor seri bisa dengan mudah diretas.</li>
                            <li><strong>Hapus Akun Lama yang Tidak Terpakai:</strong> Jika Anda memiliki akun lama di forum, e-commerce, atau platform lain yang tidak lagi diakses, sebaiknya ajukan penghapusan akun (delete account) untuk mengurangi titik kerentanan jika platform tersebut mengalami kebocoran data.</li>
                        </ul>
                    </div>
                </section>
            '
        ]
    ];

    $current = $materiData[$id] ?? $materiData[1];
    $prev = $id > 1 ? $id - 1 : null;
    $next = $id < 7 ? $id + 1 : null;
@endphp

<div class="w-full max-w-[1440px] mx-auto px-6 lg:px-10 py-8 pb-20">
    
    <!-- Banner Section -->
    <div class="relative w-full rounded-[20px] overflow-hidden mb-12 shadow-xl bg-black">
        <div class="absolute top-0 left-0 w-full h-[350px] z-0">
            <img src="{{ asset($current['gambar']) }}" alt="{{ $current['judul'] }}" class="w-full h-full object-cover">
            <!-- Overlay to darken background slightly for text readability -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#090F31]/80 to-[#090F31]/30"></div>
        </div>
        <div class="relative z-10 text-center py-20 px-6 h-[350px] flex flex-col justify-center items-center">
            <h1 class="text-3xl md:text-5xl lg:text-5xl leading-tight mb-6 text-white font-bold tracking-wide" style="font-family: 'Audiowide', sans-serif;">
                {{ $current['judul'] }}
            </h1>
            <a href="{{ route('user.materi') }}" class="bg-[#FFCC00] text-[#090F31] font-bold py-2 px-6 rounded-full text-sm shadow-md hover:bg-yellow-500 transition-colors inline-block">Materi</a>
        </div>
    </div>

    <!-- Content Section -->
    <div class="w-full bg-white rounded-[20px] p-8 md:p-12 shadow-xl text-[#090F31] leading-relaxed">
        <p class="text-lg md:text-xl text-center text-[#090F31] font-semibold max-w-4xl mx-auto" style="margin-bottom: 4rem;">
            {{ $current['ringkasan'] }}
        </p>

        <div class="konten-materi">
            <!-- Render Isi HTML dari array/database -->
            {!! $current['isi'] !!}
        </div>

        <!-- Navigation Buttons -->
        <div class="flex flex-row justify-between items-center" style="margin-top: 6rem; padding-top: 2rem;">
            @if($prev)
                <a href="{{ route('user.materi.detail', $prev) }}" class="text-center bg-[#FFCC00] text-[#090F31] font-bold py-3 md:py-4 px-8 md:px-12 rounded-full hover:bg-yellow-500 transition-colors shadow-md text-base md:text-lg">
                    {{ $materiData[$prev]['judul'] }}
                </a>
            @else
                <a href="{{ route('user.materi') }}" class="text-center bg-[#FFCC00] text-[#090F31] font-bold py-3 md:py-4 px-8 md:px-12 rounded-full hover:bg-yellow-500 transition-colors shadow-md text-base md:text-lg">
                    Materi
                </a>
            @endif

            @if($next)
                <a href="{{ route('user.materi.detail', $next) }}" class="text-center bg-[#090F31] text-white font-bold py-3 md:py-4 px-8 md:px-12 rounded-full hover:bg-blue-900 transition-colors shadow-md text-base md:text-lg">
                    {{ $materiData[$next]['judul'] }}
                </a>
            @else
                <a href="{{ route('user.materi') }}" class="text-center bg-[#090F31] text-white font-bold py-3 md:py-4 px-8 md:px-12 rounded-full hover:bg-blue-900 transition-colors shadow-md text-base md:text-lg">
                    Selesai
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
