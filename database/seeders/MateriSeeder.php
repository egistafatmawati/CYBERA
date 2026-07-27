<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Materi;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materis = [
            [
                'judul' => 'Dasar Keamanan Siber',
                'deskripsi' => 'Pahami konsep fundamental keamanan siber dan mengapa ini penting bagi semua orang di era digital.',
                'isi' => '<section>
                    <h2>Apa Itu Phishing?</h2>

                    <p>
                    Phishing adalah teknik penipuan siber yang bertujuan mencuri informasi sensitif, seperti username, password, kode OTP, data kartu kredit, atau informasi pribadi lainnya dengan menyamar sebagai pihak yang tepercaya. Serangan ini umumnya dilakukan melalui email, pesan singkat, media sosial, atau website palsu yang tampak menyerupai layanan resmi.
                    </p>

                    <p>
                    Phishing merupakan salah satu metode serangan siber yang paling umum karena memanfaatkan kelengahan manusia, bukan kelemahan teknologi. Korban sering kali diarahkan untuk mengklik tautan, mengunduh lampiran berbahaya, atau memasukkan kredensial pada halaman login palsu tanpa menyadari bahwa mereka sedang ditipu.
                    </p>

                    <p>
                    Keberhasilan serangan phishing dapat mengakibatkan pencurian identitas, pengambilalihan akun, kerugian finansial, hingga kebocoran data pribadi maupun informasi perusahaan. Oleh karena itu, memahami cara kerja phishing menjadi langkah penting dalam menjaga keamanan digital.
                    </p>
                </section>

                <section>
                    <h2>Jenis-Jenis Phishing</h2>

                    <p>
                        <strong>Email Phishing</strong> adalah bentuk phishing yang paling umum. Penyerang mengirimkan email yang tampak berasal dari perusahaan, bank, atau layanan resmi untuk membujuk korban mengklik tautan atau memberikan informasi rahasia.
                    </p>

                    <p>
                        <strong>Spear Phishing</strong> merupakan serangan yang ditargetkan kepada individu atau organisasi tertentu menggunakan informasi yang telah dikumpulkan sebelumnya. Selain itu, terdapat <strong>Whaling</strong> yang secara khusus menargetkan eksekutif atau pejabat penting dalam suatu organisasi.
                    </p>

                    <p>
                        Bentuk phishing lainnya meliputi <strong>Smishing</strong> (melalui SMS), <strong>Vishing</strong> (melalui panggilan telepon), dan <strong>Clone Phishing</strong>, yaitu serangan yang menggunakan salinan email asli tetapi mengganti tautan atau lampiran dengan versi berbahaya.
                    </p>
                </section>

                <section>
                    <h2>Ciri-Ciri Upaya Phishing</h2>

                    <p>
                        Salah satu tanda phishing adalah alamat email atau domain website yang tampak mirip dengan layanan resmi, tetapi memiliki perbedaan kecil, seperti penambahan huruf, angka, atau karakter tertentu. Oleh karena itu, selalu periksa alamat pengirim dan URL sebelum memasukkan informasi pribadi.
                    </p>

                    <p>
                        Pesan phishing sering kali menggunakan bahasa yang mendesak atau menakut-nakuti, misalnya mengklaim bahwa akun akan diblokir jika tidak segera melakukan verifikasi. Tujuannya adalah membuat korban bertindak terburu-buru tanpa melakukan pemeriksaan lebih lanjut.
                    </p>

                    <p>
                        Waspadai pula pesan yang meminta password, kode OTP, PIN, atau data kartu pembayaran. Layanan resmi tidak akan pernah meminta informasi sensitif tersebut melalui email, pesan singkat, maupun telepon.
                    </p>
                </section>

                <section>
                    <h2>Cara Menghindari Phishing</h2>

                    <p>
                        Selalu periksa alamat website sebelum login dan pastikan menggunakan domain resmi. Hindari mengklik tautan yang diterima melalui email atau pesan jika sumbernya tidak jelas. Sebaiknya akses layanan dengan mengetik alamat website secara langsung melalui browser.
                    </p>

                    <p>
                        Aktifkan autentikasi dua faktor (2FA) pada akun penting agar akun tetap lebih aman meskipun password berhasil diketahui oleh pihak lain. Gunakan juga password yang kuat dan berbeda untuk setiap akun, serta manfaatkan password manager untuk mengelolanya dengan aman.
                    </p>

                    <p>
                        Jika menerima pesan yang mencurigakan, lakukan verifikasi melalui saluran resmi, seperti menghubungi layanan pelanggan atau membuka website resmi perusahaan. Jangan pernah memberikan kode OTP, password, maupun informasi rahasia kepada siapa pun.
                    </p>
                </section>

                <section>
                    <h2>Apa yang Harus Dilakukan Jika Menjadi Korban?</h2>

                    <p>
                        Jika Anda telah memasukkan password pada website phishing, segera ubah password akun tersebut dan password akun lain yang menggunakan kombinasi serupa. Apabila memungkinkan, logout dari semua sesi login dan aktifkan autentikasi dua faktor (2FA).
                    </p>

                    <p>
                        Jika informasi keuangan atau data kartu pembayaran telah bocor, segera hubungi bank atau penyedia layanan terkait untuk memblokir transaksi dan mengamankan akun. Pantau aktivitas akun secara berkala untuk mendeteksi transaksi atau login yang tidak dikenal.
                    </p>

                    <p>
                        Simpan bukti seperti email, pesan, atau alamat website phishing, kemudian laporkan kepada penyedia layanan atau tim keamanan organisasi agar tindakan pencegahan dapat dilakukan dan pengguna lain tidak menjadi korban serangan yang sama.
                    </p>
                </section>',
            ],
            [
                'judul' => 'Phishing',
                'deskripsi' => 'Kenali berbagai jenis serangan phishing dan cara melindungi diri dari penipuan online yang semakin canggih.',
                'isi' => '<section>
                    <h2>Memahami Serangan Phishing</h2>

                    <p>
                        Phishing adalah jenis serangan rekayasa sosial yang menggunakan pesan palsu untuk menipu korban agar memberikan informasi sensitif, seperti username, password, kode OTP, atau menginstal malware pada perangkat.
                    </p>

                    <p>
                        Istilah <em>phishing</em> berasal dari kata <em>fishing</em> (memancing), yang menggambarkan cara penyerang menggunakan umpan berupa email, pesan, atau website palsu untuk menarik korban agar memberikan data penting secara sukarela.
                    </p>

                    <p>
                        Phishing merupakan salah satu ancaman siber yang paling berbahaya karena memanfaatkan kelemahan manusia, bukan kelemahan sistem. Meskipun perangkat telah dilindungi oleh firewall atau antivirus, satu klik pada tautan phishing dapat menyebabkan kebocoran data atau infeksi malware.
                    </p>
                </section>

                <section>
                    <h2>Jenis-Jenis Serangan Phishing</h2>

                    <p>
                        <strong>Email Phishing</strong> merupakan bentuk phishing yang paling umum, di mana penyerang mengirim email yang tampak berasal dari organisasi terpercaya untuk mengelabui korban agar memberikan informasi pribadi atau mengklik tautan berbahaya.
                    </p>

                    <p>
                        <strong>Spear Phishing</strong> adalah serangan yang menargetkan individu atau organisasi tertentu menggunakan informasi yang telah dikumpulkan sebelumnya sehingga pesan terlihat lebih personal. <strong>Whaling</strong> merupakan variasi spear phishing yang menyasar eksekutif atau pejabat penting dalam suatu organisasi.
                    </p>

                    <p>
                        Jenis phishing lainnya meliputi <strong>Smishing</strong> (SMS Phishing), <strong>Vishing</strong> (Voice Phishing melalui telepon), dan <strong>Clone Phishing</strong>, yaitu serangan yang menyalin email resmi lalu mengganti tautan atau lampirannya dengan versi berbahaya agar terlihat meyakinkan.
                    </p>
                </section>

                <section>
                    <h2>Cara Mengenali Tanda-Tanda Phishing</h2>

                    <p>
                        Periksa alamat pengirim dan domain website dengan teliti. Penyerang sering menggunakan alamat yang sangat mirip dengan domain resmi untuk mengelabui korban agar percaya bahwa pesan tersebut berasal dari sumber yang tepercaya.
                    </p>

                    <p>
                        Waspadai pesan yang mengandung kesalahan tata bahasa, bernada mendesak, atau meminta Anda segera melakukan tindakan seperti memverifikasi akun, mengubah password, atau mengonfirmasi transaksi. Taktik ini bertujuan membuat korban bertindak tanpa berpikir panjang.
                    </p>

                    <p>
                        Jangan pernah memberikan password, PIN, maupun kode OTP melalui email, SMS, atau telepon. Hindari juga membuka lampiran atau mengklik tautan dari pengirim yang tidak dikenal karena dapat mengarah ke website palsu atau menginstal malware pada perangkat.
                    </p>
                </section>

                <section>
                    <h2>Apa yang Harus Dilakukan Jika Terkena Phishing?</h2>

                    <p>
                        Jika Anda telah memasukkan informasi pada website phishing, segera ubah password akun yang terdampak dan gunakan password yang berbeda untuk setiap layanan. Apabila password yang sama digunakan pada akun lain, segera lakukan penggantian untuk mencegah penyalahgunaan lebih lanjut.
                    </p>

                    <p>
                        Aktifkan autentikasi dua faktor (2FA) pada akun yang mendukung fitur tersebut, kemudian hubungi pihak terkait seperti bank, penyedia layanan, atau administrator sistem agar mereka dapat membantu mengamankan akun dan memantau aktivitas yang mencurigakan.
                    </p>

                    <p>
                        Pantau aktivitas akun dan transaksi secara berkala, serta laporkan insiden phishing kepada pihak yang berwenang atau tim keamanan. Mempelajari teknik phishing terbaru dan menerapkan kebiasaan digital yang aman akan membantu mengurangi risiko menjadi korban di masa mendatang.
                    </p>
                </section>

                <section>
                    <h2>Langkah Pencegahan Phishing</h2>

                    <p>
                        Selalu akses layanan dengan mengetik alamat website secara langsung melalui browser atau menggunakan bookmark yang telah disimpan. Hindari mengklik tautan yang dikirim melalui email, pesan singkat, atau media sosial jika keasliannya belum dapat dipastikan.
                    </p>

                    <p>
                        Gunakan password yang kuat dan unik untuk setiap akun, aktifkan autentikasi dua faktor (2FA), serta manfaatkan password manager untuk menyimpan kredensial dengan aman. Langkah-langkah ini dapat mengurangi dampak apabila password berhasil dicuri melalui serangan phishing.
                    </p>

                    <p>
                        Biasakan melakukan verifikasi melalui saluran resmi sebelum memberikan informasi sensitif atau melakukan transaksi. Kewaspadaan dan kebiasaan memeriksa setiap pesan yang diterima merupakan pertahanan terbaik terhadap berbagai bentuk serangan phishing.
                    </p>
                </section>',
            ],
            [
                'judul' => 'Malware',
                'deskripsi' => 'Pelajari tentang virus, worm, trojan, dan berbagai jenis perangkat lunak berbahaya yang mengancam perangkat Anda.',
                'isi' => '<section>
                    <h2>Apa Itu Malware?</h2>

                    <p>
                        Malware (Malicious Software) adalah perangkat lunak berbahaya yang dirancang untuk merusak, mengganggu, mencuri informasi, atau memperoleh akses tanpa izin ke suatu sistem. Berbeda dengan software biasa yang membantu pengguna, malware dibuat untuk menjalankan aktivitas yang dapat membahayakan perangkat maupun data.
                    </p>

                    <p>
                        Malware dapat menyebar melalui berbagai cara, seperti email phishing, lampiran yang terinfeksi, unduhan dari situs yang tidak terpercaya, perangkat USB yang terinfeksi, hingga eksploitasi celah keamanan pada sistem operasi atau aplikasi. Karena metode penyebarannya beragam, setiap pengguna perlu berhati-hati terhadap file, tautan, maupun perangkat yang digunakan.
                    </p>

                    <p>
                        Dampak malware juga sangat beragam, mulai dari menampilkan iklan yang mengganggu (adware), memata-matai aktivitas pengguna (spyware), mencuri password (keylogger), mengenkripsi file dan meminta tebusan (ransomware), hingga mengambil alih perangkat sebagai bagian dari botnet. Memahami cara kerja dan jenis-jenis malware merupakan langkah penting untuk melindungi perangkat, data pribadi, dan akun digital dari ancaman siber yang terus berkembang.
                    </p>
                </section>

                <section>
                    <h2>Jenis-Jenis Malware yang Perlu Diketahui</h2>

                    <p>
                        <strong>Virus</strong> adalah malware yang menempel pada file atau program dan memerlukan tindakan pengguna untuk menyebar. <strong>Worm</strong> berbeda karena dapat menyebar sendiri melalui jaringan tanpa bantuan pengguna sehingga mampu menginfeksi banyak perangkat dalam waktu singkat.
                    </p>

                    <p>
                        <strong>Trojan Horse</strong> menyamar sebagai aplikasi atau file yang tampak aman agar pengguna menginstalnya. Setelah aktif, trojan dapat membuka akses bagi penyerang, mencuri data, atau menginstal malware lain. <strong>Spyware</strong> dan <strong>Keylogger</strong> bekerja secara diam-diam untuk memantau aktivitas pengguna dan mencuri informasi sensitif seperti username maupun password.
                    </p>

                    <p>
                        <strong>Adware</strong> menampilkan iklan yang berlebihan dan dapat melacak aktivitas pengguna untuk kepentingan iklan. Sementara itu, <strong>Rootkit</strong> menyembunyikan keberadaan malware agar sulit dideteksi, sedangkan <strong>Botnet</strong> merupakan jaringan perangkat yang telah terinfeksi dan dikendalikan penyerang untuk melakukan serangan seperti DDoS, spam, maupun aktivitas berbahaya lainnya.
                    </p>
                </section>

                <section>
                    <h2>Bagaimana Malware Menyebar?</h2>

                    <p>
                        Email phishing merupakan salah satu metode penyebaran malware yang paling umum. Penyerang mengirimkan email berisi lampiran atau tautan berbahaya yang disamarkan sebagai dokumen penting, invoice, atau notifikasi resmi agar korban membukanya.
                    </p>

                    <p>
                        Malware juga dapat menyebar melalui <em>drive-by download</em>, yaitu ketika pengguna mengunjungi website yang telah terinfeksi. Dengan memanfaatkan celah keamanan pada browser atau plugin yang belum diperbarui, malware dapat terunduh tanpa disadari oleh pengguna.
                    </p>

                    <p>
                        Selain itu, USB drive yang terinfeksi, software bajakan, aplikasi dari sumber yang tidak terpercaya, serta penggunaan jaringan Wi-Fi publik yang tidak aman dapat meningkatkan risiko penyebaran malware dan kompromi terhadap perangkat.
                    </p>
                </section>

                <section>
                    <h2>Cara Melindungi Diri dari Malware</h2>

                    <p>
                        Gunakan antivirus dan anti-malware yang tepercaya serta pastikan selalu diperbarui agar mampu mendeteksi ancaman terbaru. Perbarui juga sistem operasi dan aplikasi secara berkala untuk menutup celah keamanan yang dapat dimanfaatkan oleh malware.
                    </p>

                    <p>
                        Hindari membuka lampiran atau mengklik tautan dari pengirim yang tidak dikenal. Unduh aplikasi hanya dari sumber resmi seperti Google Play Store, App Store, Microsoft Store, atau website resmi pengembang, dan hindari menggunakan software bajakan.
                    </p>

                    <p>
                        Aktifkan firewall untuk membantu memantau lalu lintas jaringan dan memblokir koneksi yang mencurigakan. Selain itu, lakukan backup data secara rutin ke media penyimpanan offline atau layanan cloud agar data penting dapat dipulihkan apabila perangkat terinfeksi malware, terutama ransomware.
                    </p>
                </section>

                <section>
                    <h2>Tanda-Tanda Perangkat Terinfeksi Malware</h2>

                    <p>
                        Perangkat yang terinfeksi malware sering menunjukkan gejala seperti kinerja yang melambat, aplikasi sering mengalami crash, munculnya iklan atau pop-up yang tidak biasa, serta penggunaan CPU atau memori yang meningkat tanpa alasan yang jelas.
                    </p>

                    <p>
                        Tanda lainnya meliputi perubahan pada browser, seperti halaman utama yang berubah sendiri, munculnya toolbar yang tidak dikenal, atau pengalihan ke website yang mencurigakan. Beberapa malware juga dapat menonaktifkan antivirus atau mengubah pengaturan keamanan perangkat.
                    </p>

                    <p>
                        Jika Anda mencurigai adanya infeksi malware, segera putuskan koneksi internet, lakukan pemindaian menggunakan antivirus yang telah diperbarui, hapus file atau aplikasi yang mencurigakan, dan pulihkan data dari backup apabila diperlukan.
                    </p>
                </section>',
            ],
            [
                'judul' => 'Ransomware',
                'deskripsi' => 'Pahami ancaman ransomware, cara penyebarannya, dan strategi pencegahan yang efektif.',
                'isi' => '<section>
                    <h2>Memahami Ancaman Ransomware</h2>
                    <p>
                        Ransomware adalah jenis malware yang mengenkripsi file korban dan meminta tebusan (<em>ransom</em>) agar data dapat diakses kembali. Serangan ini menjadi salah satu ancaman siber paling berbahaya karena dapat menyerang individu, perusahaan, rumah sakit, hingga instansi pemerintah.
                    </p>
                    <p>
                        Ransomware pertama kali muncul pada tahun 1989 melalui <strong>AIDS Trojan</strong> dan terus berkembang hingga muncul model <strong>Ransomware-as-a-Service (RaaS)</strong>, yaitu layanan yang memungkinkan pelaku menyewa ransomware dari pengembang untuk melakukan serangan terhadap korban.
                    </p>
                    <p>
                        Saat ini, banyak pelaku ransomware tidak hanya mengenkripsi data, tetapi juga mencuri informasi penting sebelum proses enkripsi dilakukan. Teknik yang dikenal sebagai <em>double extortion</em> ini digunakan untuk mengancam mempublikasikan data korban apabila tebusan tidak dibayarkan.
                    </p>
                </section>
                <section>
                    <h2>Bagaimana Ransomware Bekerja?</h2>
                    <p>
                        Ransomware umumnya masuk ke perangkat melalui email phishing, lampiran berbahaya, eksploitasi celah keamanan, layanan Remote Desktop Protocol (RDP) yang tidak diamankan, maupun unduhan dari website yang telah terinfeksi.
                    </p>
                    <p>
                        Setelah berhasil masuk, ransomware mengenkripsi file menggunakan algoritma enkripsi yang kuat, seperti AES dan RSA, sehingga dokumen, foto, maupun data penting tidak dapat dibuka tanpa kunci dekripsi yang dimiliki oleh pelaku.
                    </p>
                    <p>
                        Setelah proses enkripsi selesai, korban akan menerima <em>ransom note</em> yang berisi tuntutan pembayaran beserta batas waktu tertentu. Pada beberapa kasus, pelaku juga mengancam akan menyebarkan data yang telah dicuri apabila korban menolak membayar tebusan.
                    </p>
                </section>
                <section>
                    <h2>Jenis-Jenis Ransomware yang Signifikan</h2>
                    <p>
                        <strong>WannaCry</strong> (2017) menyebar melalui celah keamanan Windows yang dikenal sebagai EternalBlue dan menginfeksi lebih dari 200.000 komputer di sekitar 150 negara hanya dalam beberapa hari.
                    </p>
                    <p>
                        <strong>NotPetya</strong> (2017) awalnya tampak seperti ransomware, tetapi sebenarnya merupakan <em>wiper</em> yang dirancang untuk menghancurkan data dan menyebabkan kerugian finansial dalam skala besar. Sementara itu, <strong>REvil (Sodinokibi)</strong> menjadi salah satu kelompok Ransomware-as-a-Service yang terkenal karena menyerang banyak perusahaan besar.
                    </p>
                    <p>
                        <strong>LockBit</strong> merupakan salah satu ransomware yang paling aktif dalam beberapa tahun terakhir. Kelompok ini dikenal menggunakan teknik <em>triple extortion</em>, yaitu mengenkripsi data, mencuri data, dan melancarkan serangan DDoS untuk meningkatkan tekanan terhadap korban.
                    </p>
                </section>
                <section>
                    <h2>Strategi Pencegahan Ransomware</h2>
                    <p>
                        Lakukan backup data secara rutin menggunakan strategi <strong>3-2-1</strong>, yaitu memiliki tiga salinan data, menggunakan dua media penyimpanan yang berbeda, dan menyimpan satu salinan secara offline atau di lokasi terpisah. Pastikan proses pemulihan data juga diuji secara berkala.
                    </p>
                    <p>
                        Perbarui sistem operasi dan aplikasi secara rutin untuk menutup celah keamanan yang dapat dimanfaatkan penyerang. Gunakan password yang kuat, aktifkan autentikasi multi-faktor (MFA), serta batasi akses Remote Desktop Protocol (RDP) agar tidak terbuka langsung ke internet.
                    </p>
                    <p>
                        Tingkatkan kewaspadaan terhadap email phishing, lampiran, maupun tautan yang mencurigakan. Terapkan prinsip <em>least privilege</em> dengan memberikan hak akses minimum kepada setiap pengguna sesuai kebutuhan pekerjaannya.
                    </p>
                </section>
                <section>
                    <h2>Apa yang Harus Dilakukan Jika Terinfeksi?</h2>
                    <p>
                        Jika perangkat diduga terinfeksi ransomware, segera putuskan koneksi dari jaringan untuk mencegah penyebaran ke perangkat lain. Jangan mematikan perangkat secara sembarangan kecuali diarahkan oleh tim keamanan, karena informasi penting untuk proses investigasi dapat hilang.
                    </p>
                    <p>
                        Hindari membayar tebusan karena tidak ada jaminan bahwa pelaku akan memberikan kunci dekripsi atau menghapus data yang telah dicuri. Selain itu, pembayaran tebusan dapat mendorong pelaku untuk terus melakukan serangan terhadap korban lain.
                    </p>
                    <p>
                        Laporkan insiden kepada tim keamanan atau pihak yang berwenang, kemudian pulihkan data menggunakan backup yang bersih setelah perangkat dipastikan bebas dari malware. Evaluasi penyebab insiden agar langkah pencegahan yang lebih baik dapat diterapkan di masa mendatang.
                    </p>
                </section>',
            ],
            [
                'judul' => 'Social Engineering',
                'deskripsi' => 'Pelajari taktik manipulasi psikologis yang digunakan peretas untuk mendapatkan informasi dan akses.',
                'isi' => '<section>
                    <h2>Apa Itu Social Engineering?</h2>
                    <p>
                        Social Engineering adalah teknik manipulasi psikologis yang digunakan penyerang untuk mengelabui seseorang agar memberikan informasi rahasia, seperti password, kode OTP, atau data pribadi, maupun melakukan tindakan yang dapat membahayakan keamanan. Berbeda dengan serangan yang mengeksploitasi celah sistem, teknik ini menjadikan manusia sebagai target utama karena sering kali lebih mudah dimanipulasi dibandingkan teknologi.
                    </p>
                    <p>
                        Serangan ini memanfaatkan sifat alami manusia, seperti rasa percaya, keinginan membantu, kepatuhan terhadap figur otoritas, rasa ingin tahu, dan kepanikan. Karena tidak menyerang sistem secara langsung, social engineering sering kali sulit dideteksi dan korban baru menyadari telah ditipu setelah kerugian terjadi.
                    </p>
                    <p>
                        Kesadaran, kewaspadaan, dan kebiasaan melakukan verifikasi sebelum bertindak merupakan pertahanan terbaik terhadap serangan social engineering. Semakin memahami cara kerja teknik ini, semakin kecil kemungkinan seseorang menjadi korban manipulasi.
                    </p>
                </section>
                <section>
                    <h2>Teknik-Teknik Social Engineering</h2>
                    <p>
                        <strong>Pretexting</strong> dilakukan dengan membuat identitas atau skenario palsu untuk memperoleh informasi atau akses. <strong>Baiting</strong> menggunakan umpan seperti USB drive, hadiah, atau file gratis agar korban menjalankan malware atau memberikan informasi penting. <strong>Tailgating (Piggybacking)</strong> terjadi ketika penyerang mengikuti orang yang memiliki akses sah untuk memasuki area terbatas tanpa izin.
                    </p>
                    <p>
                        <strong>Quid Pro Quo</strong> menawarkan bantuan atau hadiah sebagai imbalan atas informasi maupun akses. <strong>Scareware</strong> memanfaatkan rasa takut melalui peringatan keamanan palsu agar korban menginstal aplikasi berbahaya atau memberikan data sensitif.
                    </p>
                    <p>
                        <strong>Phishing</strong> merupakan bentuk social engineering yang paling umum. Penyerang mengirim email, SMS, atau pesan yang tampak berasal dari institusi tepercaya untuk mencuri kredensial, informasi pribadi, atau mengarahkan korban ke website palsu.
                    </p>
                </section>
                <section>
                    <h2>Psikologi di Balik Social Engineering</h2>
                    <p>
                        Penyerang sering memanfaatkan prinsip <strong>otoritas</strong>, yaitu kecenderungan seseorang untuk mematuhi figur yang dianggap memiliki wewenang, seperti atasan, staf IT, petugas bank, atau auditor. Dengan menyamar sebagai pihak tersebut, pelaku berusaha memperoleh kepercayaan korban.
                    </p>
                    <p>
                        Teknik lainnya memanfaatkan prinsip <strong>reciprocity</strong> (timbal balik), <strong>kelangkaan</strong> (scarcity), dan <strong>konsistensi</strong>. Korban dibuat merasa harus membalas bantuan, terburu-buru karena adanya batas waktu, atau terdorong menyetujui permintaan yang semakin besar setelah sebelumnya menyetujui permintaan kecil.
                    </p>
                    <p>
                        Penyerang juga memanfaatkan <strong>social proof</strong> (bukti sosial), yaitu kecenderungan seseorang mempercayai sesuatu karena dianggap telah dilakukan oleh banyak orang. Memahami prinsip-prinsip psikologi ini membantu pengguna lebih waspada terhadap berbagai bentuk manipulasi.
                    </p>
                </section>
                <section>
                    <h2>Cara Melindungi Diri dari Social Engineering</h2>
                    <p>
                        Selalu verifikasi identitas sebelum memberikan informasi penting. Hubungi kembali melalui nomor telepon, email, atau kanal resmi, dan jangan langsung percaya pada identitas yang diklaim oleh seseorang melalui pesan atau panggilan telepon.
                    </p>
                    <p>
                        Waspadai permintaan yang bersifat mendesak atau menimbulkan kepanikan. Jangan pernah membagikan password, PIN, kode OTP, maupun informasi pribadi melalui email, telepon, atau pesan instan tanpa memastikan keaslian permintaan tersebut.
                    </p>
                    <p>
                        Gunakan teknik <em>challenge-response</em> dengan mengajukan pertanyaan yang hanya dapat dijawab oleh pihak yang benar. Jika menemukan aktivitas yang mencurigakan, segera laporkan kepada tim keamanan atau pihak yang berwenang agar dapat ditangani sebelum menimbulkan kerugian.
                    </p>
                </section>
                <section>
                    <h2>Membangun Kebiasaan yang Aman</h2>
                    <p>
                        Keamanan informasi tidak hanya bergantung pada teknologi, tetapi juga pada perilaku pengguna. Biasakan berpikir kritis sebelum mengklik tautan, membuka lampiran, atau memberikan informasi kepada pihak lain, terutama jika permintaan tersebut tidak biasa.
                    </p>
                    <p>
                        Terapkan praktik keamanan seperti Clear Desk Policy, mengunci layar komputer saat meninggalkan meja kerja, menggunakan password yang kuat dan unik, serta mengaktifkan autentikasi dua faktor (2FA) pada akun penting.
                    </p>
                    <p>
                        Mengikuti pelatihan keamanan siber secara berkala dan memahami teknik social engineering terbaru akan membantu meningkatkan kesadaran serta mengurangi risiko menjadi korban manipulasi maupun kebocoran data.
                    </p>
                </section>
                </section>',
            ],
            [
                'judul' => 'Password Security',
                'deskripsi' => 'Kuasai praktik terbaik dalam membuat dan mengelola password yang aman di era digital.',
                'isi' => '<section>
                    <h2>Mengapa Password Sangat Penting?</h2>
                    <p>
                        Password merupakan lapisan pertama keamanan yang melindungi akun, data pribadi, dan aset digital Anda. Password yang lemah mudah ditebak atau dipecahkan melalui serangan seperti <em>brute force</em>, sehingga dapat menyebabkan akun diambil alih oleh pihak yang tidak berwenang.
                    </p>

                    <p>
                        Banyak orang masih menggunakan password umum seperti <strong>"123456"</strong> atau <strong>"password"</strong>, padahal password yang lebih panjang dan unik jauh lebih sulit dipecahkan. Karena sebagian besar pengguna memiliki banyak akun online, penggunaan password yang kuat menjadi langkah penting untuk menjaga keamanan data.
                    </p>

                    <p>
                        Dengan menerapkan praktik pengelolaan password yang baik, risiko pencurian akun, penyalahgunaan identitas, dan kebocoran informasi pribadi dapat dikurangi secara signifikan.
                    </p>
                </section>

                <section>
                    <h2>Kriteria Password yang Kuat</h2>
                    <p>
                        Gunakan password yang panjang. NIST merekomendasikan minimal 8 karakter untuk akun biasa dan 12 karakter atau lebih untuk akun penting karena semakin panjang password, semakin sulit untuk dipecahkan.
                    </p>

                    <p>
                        Kombinasikan huruf besar, huruf kecil, angka, dan simbol, serta hindari pola yang mudah ditebak seperti <strong>Password123!</strong>. Jangan gunakan informasi pribadi seperti nama, tanggal lahir, nama hewan peliharaan, atau data yang mudah ditemukan di media sosial.
                    </p>

                    <p>
                        Gunakan <em>passphrase</em>, yaitu gabungan beberapa kata acak yang mudah diingat tetapi sulit ditebak, misalnya <strong>"kuda-baterai-stapler-biru"</strong>. Selain itu, gunakan password yang berbeda untuk setiap akun agar kebocoran pada satu layanan tidak memengaruhi akun lainnya.
                    </p>
                </section>

                <section>
                    <h2>Password Manager: Solusi Modern</h2>
                    <p>
                        Password manager adalah aplikasi yang menyimpan dan mengelola password dalam brankas terenkripsi yang hanya dapat dibuka menggunakan master password. Dengan aplikasi ini, Anda dapat menggunakan password yang kuat, unik, dan berbeda untuk setiap akun tanpa harus mengingat semuanya.
                    </p>

                    <p>
                        Selain menyimpan password, password manager juga dapat membuat password acak, melakukan sinkronisasi antar perangkat, serta memberikan peringatan jika password lemah, digunakan berulang, atau terdeteksi dalam kebocoran data.
                    </p>

                    <p>
                        Keamanan password manager bergantung pada master password. Oleh karena itu, gunakan master password yang panjang dan unik, aktifkan autentikasi dua faktor (2FA), serta simpan recovery key atau recovery code di tempat yang aman sebagai cadangan.
                    </p>
                </section>

                <section>
                    <h2>Autentikasi Dua Faktor (2FA) dan Multi-Faktor (MFA)</h2>

                    <p>
                        Autentikasi Dua Faktor (2FA) menambahkan lapisan keamanan kedua selain password sehingga akun tetap lebih aman meskipun password berhasil dicuri. Faktor kedua dapat berupa kode OTP, aplikasi authenticator, maupun perangkat keamanan fisik.
                    </p>

                    <p>
                        Metode 2FA yang umum digunakan meliputi SMS, aplikasi authenticator seperti Google Authenticator atau Microsoft Authenticator, serta security key berbasis USB atau NFC. Di antara ketiganya, aplikasi authenticator dan security key umumnya memberikan tingkat keamanan yang lebih baik dibandingkan SMS.
                    </p>

                    <p>
                        Aktifkan 2FA atau MFA pada akun penting seperti email, layanan perbankan, media sosial, dan penyimpanan cloud. Simpan recovery code di tempat yang aman, serta jangan pernah membagikan kode OTP maupun kode autentikasi kepada siapa pun karena layanan resmi tidak akan pernah memintanya.
                    </p>
                </section>

                <section>
                    <h2>Praktik Terbaik dalam Mengelola Password</h2>

                    <p>
                        Ganti password jika terdapat indikasi kebocoran data atau jika akun menunjukkan aktivitas yang mencurigakan. Tidak perlu mengganti password secara berkala tanpa alasan, tetapi segera lakukan penggantian apabila password diketahui atau diduga telah diketahui oleh pihak lain.
                    </p>

                    <p>
                        Hindari menyimpan password pada sticky note, buku catatan, atau file teks tanpa perlindungan. Jika perlu menyimpan password, gunakan password manager yang menyediakan enkripsi dan perlindungan yang memadai.
                    </p>

                    <p>
                        Selalu pastikan Anda memasukkan password pada website resmi dengan memeriksa alamat URL terlebih dahulu. Waspadai situs phishing yang menyerupai layanan asli untuk mencuri kredensial pengguna, dan biasakan melakukan verifikasi sebelum login.
                    </p>
                </section>

                <section>
                    <h2>Kesimpulan: Menjaga Keamanan Password di Era Digital</h2>

                    <p>
                        Password yang kuat, unik, dan dikelola dengan baik adalah kunci untuk melindungi akun dan data pribadi di dunia maya. Dengan menggabungkan penggunaan password yang robust, memanfaatkan password manager, serta mengaktifkan autentikasi dua faktor (2FA), Anda dapat secara signifikan mengurangi risiko menjadi korban serangan siber.
                    </p>

                    <p>
                        Ingatlah, keamanan digital adalah tanggung jawab berkelanjutan. Dengan mempraktikkan langkah-langkah keamanan ini secara konsisten, Anda dapat menjaga aset digital tetap aman dan terhindar dari kerugian akibat pencurian identitas atau penyalahgunaan informasi pribadi.
                    </p>
                </section>
            </article>
        </main>',
            ],
            [
                'judul' => 'Clear Screen & Digital Hygiene',
                'deskripsi' => 'Praktik keamanan fisik dan digital — dari clear desk policy, screen locking, hingga kebersihan jejak digital di internet.',
                'isi' => '<section>
                    <h2>Apa Itu Clear Screen & Digital Hygiene?</h2>

                    <p>
                        Clear Screen dan Digital Hygiene adalah serangkaian kebiasaan yang bertujuan menjaga keamanan lingkungan kerja digital serta melindungi informasi sensitif dari akses yang tidak sah. Clear Screen mengacu pada kebiasaan mengunci layar komputer atau perangkat setiap kali ditinggalkan, sedangkan Digital Hygiene mencakup berbagai praktik menjaga keamanan perangkat, akun, dan data secara rutin.
                    </p>

                    <p>
                        Banyak insiden keamanan terjadi bukan karena serangan yang canggih, melainkan akibat kelalaian sederhana, seperti layar yang tidak dikunci, password yang terlihat, atau dokumen penting yang dibiarkan terbuka. Oleh karena itu, membiasakan perilaku digital yang aman menjadi langkah penting untuk mencegah kebocoran data dan serangan siber.
                    </p>

                    <p>
                        Penerapan Clear Screen dan Digital Hygiene merupakan bagian dari praktik terbaik keamanan informasi. Dengan disiplin menjaga kebersihan digital, risiko pencurian identitas, penyalahgunaan akun, maupun kebocoran data dapat dikurangi secara signifikan.
                    </p>
                </section>

                <section>
                    <h2>Clear Desk Policy — Keamanan Fisik di Tempat Kerja</h2>

                    <p>
                        Clear Desk Policy adalah kebijakan yang mengharuskan pengguna membersihkan area kerja dari dokumen sensitif, catatan berisi informasi rahasia, kartu akses, maupun media penyimpanan sebelum meninggalkan meja kerja. Tujuannya adalah mencegah informasi penting dilihat atau diambil oleh pihak yang tidak memiliki izin.
                    </p>

                    <p>
                        Keamanan informasi tidak hanya berasal dari sistem digital, tetapi juga dari lingkungan fisik. Dokumen yang berisi data sensitif sebaiknya segera diambil dari printer dan disimpan di tempat yang aman. USB drive, hard disk eksternal, dan laptop juga harus diamankan agar tidak hilang atau disalahgunakan.
                    </p>

                    <p>
                        Menerapkan Clear Desk Policy secara konsisten membantu mengurangi risiko kebocoran data akibat kelalaian serta menciptakan budaya kerja yang lebih aman dan bertanggung jawab terhadap perlindungan informasi.
                    </p>

                    <p>
                        Menerapkan Clear Desk Policy secara konsisten membantu mengurangi risiko kebocoran data akibat kelalaian serta menciptakan budaya kerja yang lebih aman dan bertanggung jawab terhadap perlindungan informasi.
                    </p>
                </section>

                <section>
                    <h2>Clear Screen Policy — Lindungi Layar Anda</h2>

                    <p>
                        Clear Screen Policy mewajibkan pengguna mengunci layar komputer setiap kali meninggalkan perangkat, meskipun hanya sebentar. Gunakan kombinasi <strong>Windows + L</strong> pada Windows atau <strong>Control + Command + Q</strong> pada macOS agar orang lain tidak dapat mengakses perangkat tanpa izin.
                    </p>

                    <p>
                        Aktifkan screen saver yang terkunci otomatis setelah beberapa menit tidak digunakan sebagai perlindungan tambahan apabila pengguna lupa mengunci layar. Saat bekerja di tempat umum, gunakan privacy filter untuk membatasi sudut pandang layar agar informasi sensitif tidak mudah terlihat.
                    </p>

                    <p>
                        Hindari menampilkan informasi rahasia di tempat ramai dan waspadai <em>shoulder surfing</em>, yaitu tindakan seseorang mengintip layar dari belakang untuk mencuri informasi. Atur juga notifikasi lock screen agar tidak menampilkan isi pesan yang bersifat pribadi.
                    </p>
                </section>

                <section>
                    <h2>Digital Hygiene — Kebersihan Jejak Digital</h2>

                    <p>
                        Digital Hygiene adalah kebiasaan menjaga keamanan jejak digital dan informasi pribadi saat menggunakan internet. Bersihkan riwayat browsing dan cookies secara berkala, serta gunakan mode incognito atau private browsing ketika memakai perangkat bersama atau mengakses layanan sensitif.
                    </p>

                    <p>
                        Lakukan pemeriksaan terhadap akun lama yang sudah tidak digunakan dan hapus akun yang tidak diperlukan. Periksa pula informasi pribadi yang tersedia di internet, seperti alamat, nomor telepon, atau foto yang dapat berisiko disalahgunakan.
                    </p>

                    <p>
                        Kelola pengaturan privasi media sosial dengan membatasi siapa yang dapat melihat profil, postingan, maupun informasi pribadi Anda. Ingat bahwa jejak digital dapat bertahan dalam waktu lama sehingga setiap informasi yang dibagikan perlu dipertimbangkan dengan baik.
                    </p>
                </section>

                <section>
                    <h2>Keamanan Perangkat & Data — Praktik Terbaik</h2>

                    <p>
                        Lindungi perangkat dengan mengaktifkan enkripsi penuh (<em>full-disk encryption</em>), seperti BitLocker pada Windows atau FileVault pada macOS. Dengan enkripsi, data tetap terlindungi meskipun laptop atau media penyimpanan hilang maupun dicuri.
                    </p>

                    <p>
                        Aktifkan fitur Find My Device pada Android atau Find My pada perangkat Apple untuk membantu menemukan perangkat yang hilang, menguncinya dari jarak jauh, atau menghapus data apabila diperlukan.
                    </p>

                    <p>
                        Sebelum menjual, mendonasikan, atau membuang perangkat lama, lakukan <em>secure erase</em> agar data tidak dapat dipulihkan kembali. Dokumen fisik yang berisi informasi sensitif juga harus dimusnahkan dengan aman menggunakan paper shredder, bukan hanya dibuang begitu saja.
                    </p>

                    <p>
                        Sebagai perlindungan tambahan, pisahkan penggunaan perangkat untuk pekerjaan dan keperluan pribadi jika memungkinkan. Langkah ini membantu membatasi dampak apabila salah satu akun atau perangkat mengalami kompromi akibat malware atau serangan siber.
                    </p>
                </section>',
            ],
        ];

        foreach ($materis as $materi) {
            Materi::updateOrCreate(
                ['judul' => $materi['judul']], 
                [
                    'slug' => Str::slug($materi['judul']),
                    'deskripsi' => $materi['deskripsi'],
                    'isi' => $materi['isi'],
                ]
            );
        }
    }
}
