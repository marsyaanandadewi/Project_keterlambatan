<body>
    <div>
        <h1>SURAT PERNYATAAN TIDAK AKAN DATANG TERLAMBAT KESEKOLAH</h1>
        <p>Yang bertanda tangan dibawah ini:</p>

        <p>NIS: {{ $late[0]['student']->nis}}</p>
        <p>Nama: {{ $late[0]['student']->name}}</p>
        <p>Rombel: {{ $late[0]['student']->rombel->rombel }}</p>
        <p>Rayon: {{ $late[0]['student']->rayon->rayon }}</p>
        <p>Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat datang ke sekolah sebanyak {{ $jumlahKeterlambatan }} kali yang mana hal tersebut termasuk kedalam pelanggaran kedisiplinan. Saya berjanji tidak akan terlambat datang ke sekolah lagi. Apabila saya terlambat datang ke sekolah lagi saya siap diberikan sanksi yang sesuai dengan peraturan sekolah.</p>

        <p>Demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan.</p>

        <p>{{ $late[0]->created_at->format('d F Y') }} Orang Tua/Wali Peserta Didik,</p>

        <div class="signature">
            <p>Peserta Didik, ({{ $late[0]->student->name }})</p>
            <p>Pembimbing Siswa, Kesiswaan, ({{ $late[0]->student->rayon->rayon }})</p>
            <div class="bot">
                <div class="date">
                    <p>Bogor, <?php echo strftime(" %d %B %Y"); ?></p>
                </div>
                <div class="info">
                    <div class="card">
                        <div class="sign">
                            <p>Orang Tua/Wali Peserta Didik,</p>
                            <br> <br>
                            <p>(...........................)</p>
                        </div>
                        <br>
                        <div class="ttd">
                            <p>Peserta Didik,</p>
                            <br> <br>
                            <p>( {{ $late[0]['student']->name}})</p>
                        </div>
                        <br>
                        <div class="tandatangan">
                            <p>Kesiswaan,</p>
                            <br> <br>
                            <p>(...........................)</p>
                        </div>
                        <br>
                        <div class="ttd">
                            <p>Pembimbing Siswa,</p>
                            <br> <br>
                            <p>( {{ $late[0]['student']->rayon->rayon }})</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>