<div class="flex flex-row items-center justify-between bg-blue-200">

    <div>
        <table class="min-w-full mt-5">
            <tr>
                <td class="w-2/8 py-3 px-4 text-left">
<p>{{ $message }}</p>
                </td>
                <td class="w-2/8 py-3 px-4 text-left">
                    <input class="form-text w-full rounded-lg" type="text" wire:model="subject"
                        placeholder="Please enter a new subject">
                        @error('subject') <span class="text-red-700">{{ $message }}</span> @enderror
                </td>
                <td class="w-1/8 py-3 px-4 text-left">
                    <input class="form-text w-full rounded-lg" type="text" wire:model="uri"
                        placeholder="Please enter the ID">
                        @error('uri') <span class="text-red-700">{{ $message }}</span> @enderror
                </td>
                <td class="w-2/8 py-3 px-4 text-left">
                    <select class="form-select w-full rounded-lg" wire:model="schema_id">
                        <option value="NONE">Select Ontology</option>
                        @foreach ($schemas as $schema)
                            <option value="{{ $schema->id }}">{{ $schema->name }} ({{ $schema->abbreviation }})
                            </option>
                        @endforeach
                    </select>
                    @error('schema_id') <span class="text-red-700">{{ $message }}</span> @enderror
                </td>
                <td class="w-1/8 py-3 px-4 text-left">

                    <button
                        class="disable:cursor-not-allowed rounded bg-indigo-500 py-2 px-4 text-white hover:bg-indigo-500 disabled:bg-opacity-10"
                        wire:click.prevent="addSubject">Add</button>
                </td>
            </tr>
        </table>

    </div>
</div>
