<div class="flex flex-row items-center justify-between bg-blue-200">

    <div>
        <table class="min-w-full mt-5">
            <tr>
                <td class="w-2/8  py-3 px-4 text-left">
<p>{{ $message }}</p>
<input class="" type="hidden" wire:model="editType"
                        value="short">
                </td>
                <td class="w-2/8  py-3 px-4 text-left">
                    <input class="form-text w-full rounded-lg" type="text" wire:model="name"
                        placeholder="Name of the experiment">
                </td>
                <td class="w-1/8  py-3 px-4 text-left">
                    <input class="form-text w-full rounded-lg" type="text" wire:model="code"
                        placeholder="ex: R/BK/1">
                </td>
                <td class="w-2/8  py-3 px-4 text-left">
                    <input class="form-text w-full rounded-lg" type="text" wire:model="glten_id"
                        placeholder="Please enter the ID on GLTEN">
                </td>
                <td class="w-2/8  py-3 px-4 text-left">
                    <input class="form-text w-full rounded-lg" type="text" wire:model="key_ref_code"
                        placeholder="Please enter endnote keyRef">
                </td>
                <td class="w-2/8  py-3 px-4 text-left">
                    <select class="form-select w-full rounded-lg" wire:model="field_id">
                        @foreach ($fields as $field)
                            <option value="{{ $field->id }}">{{ $field->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td class="w-1/8 py-3 px-4 text-left">

                    <button
                        class="disable:cursor-not-allowed rounded bg-indigo-500 py-2 px-4 text-white hover:bg-indigo-500 disabled:bg-opacity-10"
                        wire:click.prevent="addExpt">Add</button>
                </td>
            </tr>
        </table>

    </div>
</div>
