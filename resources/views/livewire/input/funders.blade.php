<label class="block">
    <table class="min-w-full mt-5">
        <thead class="">
            <tr>
                <th class="text-left" colspan=3>
                    <span class="text-gray-700 p-2 font-semibold text-lg">Funders</span>
                </th>

            </tr>
        </thead>
        <tbody>
            <tr class="bg-slate-300 ">
                <td class="w-5/6 text-left py-3 px-4">
                    <select class="form-select block w-full mt-1  rounded-md"
                        wire:model='funder'>
                        <option value="">Choose a Funding Award</option>
                        @foreach ($awards as $award)
                            <option value="{{ $award->id }}">
                                {{ $award->reference_number }}
                                ({{ $award->organisation->abbreviation}})
                            </option>
                        @endforeach
                    </select>
                </td>
                <td class="w-1/6 py-3 px-4 text-right">
                    <button
                        class="disable:cursor-not-allowed rounded bg-indigo-500 py-2 px-4 text-white hover:bg-indigo-500 disabled:bg-opacity-10"
                        wire:click.prevent="addFunder">Add</button>
                </td>
            </tr>


            @foreach ($dataset->funders as $funder)

            <tr class="border-l border-r {{ $loop->first ? 'border-t ' : '' }}
                {{ $loop->last ? 'border-b ' : '' }}
                ">
                <td class="w-5/6 text-left py-1 px-4">
                    <label class="ml-7">
                                {{ $funder->reference_number }} - {{ $funder->title }}
                                ({{ $funder->organisation->abbreviation }})</label>

                </td>
                <td class="w-1/6 py-1 px-4 text-right">
                    <button wire:click.prevent="removeFunder({{$funder->id}})">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
</label>
