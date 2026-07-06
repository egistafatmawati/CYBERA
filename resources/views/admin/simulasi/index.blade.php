<h1>Daftar simulasi</h1>

<a href="{{ route('admin.simulasi.create') }}">
    Tambah Materi
</a>

<hr>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Aksi</th>
    </tr>

    @foreach($simulasis as $simulasi)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $simulasi->judul }}</td>
        <td>

            <a href="{{ route('admin.simulasi.edit', $simulasi->id) }}">
                Edit
            </a>

            <form action="{{ route('admin.simulasi.destroy', $simulasi->id) }}"
                  method="POST"
                  style="display:inline">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Hapus
                </button>

            </form>

        </td>
    </tr>
    @endforeach

</table>