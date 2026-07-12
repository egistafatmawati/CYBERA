@extends('layouts.user')

@section('content')
<div class="bg-[#090F31] min-h-screen w-full pt-8 pb-32">
    <div class="w-full max-w-[1000px] mx-auto px-6">
        
        <div class="mb-8">
            <a href="{{ route('user.quiz.preview', $quiz->id) }}" class="text-[#FFCC00] font-bold text-sm flex items-center hover:text-yellow-400 transition-colors">
                <span class="mr-2">←</span> Kembali
            </a>
        </div>

        <form action="{{ route('user.quiz.preview.submit', $quiz->id) }}" method="POST" id="quizForm">
            @csrf
            
            <div class="space-y-6">
                @foreach($questions as $index => $question)
                    <!-- Question Container -->
                    <div class="bg-[#1e2443] text-white p-6 md:p-8 rounded-xl border border-[#333a64] shadow-lg relative">
                        <input type="hidden" name="jawaban[{{ $index }}][question_id]" value="{{ $question['id'] }}">
                        
                        <h3 class="text-base md:text-lg font-bold mb-6 flex items-start gap-2">
                            <span class="shrink-0">{{ $index + 1 }}.</span>
                            <span>{{ $question['pertanyaan'] }}</span>
                        </h3>

                        <!-- Answer Options -->
                        <div class="grid grid-cols-1 gap-4">
                            @foreach($question['opsis'] as $opsi)
                                <div class="relative">
                                    <input type="radio" 
                                        name="jawaban[{{ $index }}][jawaban_user]" 
                                        value="{{ $opsi->kode }}" 
                                        id="opsi-{{ $question['id'] }}-{{ $opsi->kode }}" 
                                        class="peer hidden" 
                                        required>
                                    
                                    <label for="opsi-{{ $question['id'] }}-{{ $opsi->kode }}" 
                                        class="flex items-center px-6 py-4 rounded-lg border border-gray-500 font-medium cursor-pointer transition-all hover:border-[#FFCC00] hover:text-[#FFCC00] peer-checked:border-[#FFCC00] peer-checked:text-[#FFCC00] text-gray-300 text-sm md:text-base">
                                        <span class="mr-3 font-bold">{{ $opsi->kode }}.</span> 
                                        <span>{{ $opsi->teks_opsi }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Form Submission Buttons -->
            <div class="flex justify-end mt-12 mb-8">
                <button type="submit" class="px-12 py-3 bg-[#FFCC00] text-[#090F31] font-bold rounded-full hover:bg-yellow-500 transition-colors shadow-lg text-lg">
                    Selesai
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
