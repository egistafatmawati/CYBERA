<h1>Edit Simulasi</h1>

<form action="{{ route('admin.simulasi.update', $simulasi->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Judul</label><br>
        <input type="text" name="judul" value="{{ $simulasi->judul }}">
    </div>

    <br>

    <div>
        <label>Deskripsi</label><br>
        <textarea name="isi" rows="10">{{ $simulasi->deskripsi }}</textarea>
    </div>

    <br>


    <button type="submit">
        Update
    </button>
</form>