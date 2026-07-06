<label>Materi</label>

<select name="materi_id">
    @foreach($materis as $materi)
        <option value="{{ $materi->id }}">
            {{ $materi->judul }}
        </option>
    @endforeach
</select>

<br><br>

<label>Judul Simulasi</label>
<input type="text" name="judul">

<br><br>

<label>Deskripsi</label>
<textarea name="deskripsi"></textarea>

<br><br>

<button type="submit">
    Simpan
</button>