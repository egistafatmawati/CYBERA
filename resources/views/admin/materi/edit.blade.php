@extends('layouts.admin')

@section('content')
<div class="container">

    <h2>Edit Materi</h2>

    @if ($errors->any())
        <div style="color:red; margin-bottom:20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.materi.update', $materi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom:20px;">
            <label><strong>Judul Materi</strong></label><br>
            <input
                type="text"
                name="judul"
                value="{{ old('judul', $materi->judul) }}"
                style="width:100%; padding:10px;"
                required
            >
        </div>

        <div style="margin-bottom:20px;">
            <label><strong>Deskripsi</strong></label><br>
            <textarea
                name="deskripsi"
                rows="3"
                style="width:100%; padding:10px;"
                required
            >{{ old('deskripsi', $materi->deskripsi) }}</textarea>
        </div>

        <div style="margin-bottom:20px;">
            <label><strong>Isi Materi</strong></label><br>
            <textarea
                name="isi"
                rows="12"
                style="width:100%; padding:10px;"
                required
            >{{ old('isi', $materi->isi) }}</textarea>
        </div>

        <a href="{{ route('admin.materi.index') }}">
            <button type="button">Batal</button>
        </a>

        <button type="submit">
            Update
        </button>

    </form>

</div>
@endsection