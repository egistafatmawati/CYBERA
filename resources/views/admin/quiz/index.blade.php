<h1>Daftar Quiz</h1>

<a href="{{ route('admin.quiz.create') }}">Tambah Quiz</a>

@foreach($quizzes as $quiz)
    <p>
        {{ $quiz->materi->judul ?? '-' }}

        <a href="{{ route('admin.quiz.edit', $quiz) }}">
            Edit
        </a>
    </p>
@endforeach