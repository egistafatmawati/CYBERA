<h1>Daftar Materi</h1>

<a href="{{ route('admin.materi.create') }}">
    Tambah Materi
</a>

<hr>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Aksi</th>
    </tr>

    @foreach($materis as $materi)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $materi->judul }}</td>
        <td>

            <a href="{{ route('admin.materi.edit', $materi->id) }}">
                Edit
            </a>

            <form action="{{ route('admin.materi.destroy', $materi->id) }}"
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