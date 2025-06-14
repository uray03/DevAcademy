<h2 class="text-xl font-semibold mb-4">Quiz</h2>
<form action="{{ route('quiz.submit', $course->id) }}" method="POST">
    @csrf
    @foreach ($quiz->questions as $index => $question)
        <div class="mb-4">
            <p class="font-medium">{{ $index + 1 }}. {{ $question->question_text }}</p>
            <div class="ml-4 mt-2 space-y-1">
                <label><input type="radio" name="answers[{{ $question->id }}]" value="A"> A. {{ $question->option_a }}</label><br>
                <label><input type="radio" name="answers[{{ $question->id }}]" value="B"> B. {{ $question->option_b }}</label><br>
                <label><input type="radio" name="answers[{{ $question->id }}]" value="C"> C. {{ $question->option_c }}</label><br>
                <label><input type="radio" name="answers[{{ $question->id }}]" value="D"> D. {{ $question->option_d }}</label>
            </div>
        </div>
    @endforeach
    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Submit</button>
</form>
