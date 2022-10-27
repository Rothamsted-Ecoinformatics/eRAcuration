<label class="block">
    <table class="min-w-full">
        <thead class="">
            <tr>
                <th class="w-2/3 text-left">
                    <span class="text-gray-700 p-2 font-semibold text-lg">Keywords</span>
                </th>
                <th class="w-1/3 text-right py-3 px-4 font-semibold text-sm">
                    <span class=" text-blue-500" href="">Add </span>
                </th>
            </tr>
        </thead>
        <tbody>
            @php
                $stripe = $stripeLight;
            @endphp
            @foreach ($dataset->subjects as $subject)
                @if ($stripe == $stripeDark)
                    @php
                        $stripe = $stripeLight;
                    @endphp
                @else
                    @php
                        $stripe = $stripeDark;
                    @endphp
                @endif
                <tr class="{{ $stripe }}">
                    <td class="w-1/4 text-left py-1 px-4">
                        <select class="form-select block w-full mt-1  rounded-md"
                            name="subjects[]">
                            @foreach ($allSubjects as $allSubject)
                                <option value="{{ $allSubject->id }}"
                                    @if ($subject->id == $allSubject->id) selected @endif>
                                    {{ $allSubject->subject }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td class="w-1/4 text-right py-1 px-4">
                        <span class=" text-red-500" href="">Delete</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</label>
