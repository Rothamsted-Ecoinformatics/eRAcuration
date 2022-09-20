@php
        $stripeDark = 'bg-slate-300';
        $stripeLight = 'bg-slate-100';
@endphp
<label class="block">
    <table class="min-w-full">
        <thead class="">
            <tr>
                <th class="w-2/3 text-left">
                    <span class="text-gray-700 p-2 font-semibold text-lg">LIVEWIRE Keywords</span>
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
                        @livewire('input.one-subject',
                        [
                            'subject' => $subject,
                            'allSubjects' => $allSubjects,
                            ])
                    </td>
                    <td class="w-1/4 text-right py-1 px-4">
                        <button wire:click = "removeSubject('{{$subject->subject}}')"> TODO Remove </button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</label>
