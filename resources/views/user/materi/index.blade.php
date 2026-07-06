@foreach($materis as $materi)

<div class="card">

    <h3>{{ $materi->judul }}</h3>

    <p>{{ $materi->deskripsi }}</p>

    <a href="{{ route('user.materi.show', $materi) }}">
        Baca Materi
    </a>

</div>

@endforeach