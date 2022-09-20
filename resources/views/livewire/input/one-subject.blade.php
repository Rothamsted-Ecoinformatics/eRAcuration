<div>
    <select class="form-select mt-1 block w-full rounded-md">
        @foreach ($allSubjects as $allSubject)
            <option value="{{ $allSubject->id }}" @if ($subject->id == $allSubject->id) selected @endif>
                {{ $allSubject->subject }}
            </option>
        @endforeach
    </select>

</div>
