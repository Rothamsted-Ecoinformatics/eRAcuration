<label class="block">
    <table class="mt-5 min-w-full">
        <thead>
            <tr>
                <th class="w-5/6 text-left">
                    <span class="p-2 text-lg font-semibold text-gray-700">Files Provided</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-slate-300">
                <td class="w-5/6 py-3 px-4 text-left">
                    <label class="block">
                        <span class="p-2 text-sm text-gray-400">Title or Caption
                        </span>
                        <input class="form-input mt-1 block w-full rounded-md" type="text" wire:model.lazy='title'
                            placeholder="Please enter a caption of title for that file" />
                            @error('title') <span class="text-red-700">{{ $message }}</span> @enderror
                    </label>
                    <label class="block">
                        <span class="p-2 text-sm text-gray-400">File Name without
                            extension</span>
                        <input class="form-input mt-1 block w-full rounded-md" type="text" wire:model.lazy='file_name'
                            placeholder="Please enter the filename without extension" />
                            @error('file_name') <span class="text-red-700">{{ $message }}</span> @enderror

                    </label>
                    <label class="block">
           <span class="p-2 text-sm text-gray-400">Extension</span>
                        <select class="form-select mt-1 block w-full rounded-md" wire:model='extension'>
                            <option value="">Select extension</option>
                            <option value="csv">csv</option>
                            <option value="jpg">xls</option>
                            <option value="xlsx">xlsx</option>
                            <option value="doc">doc</option>
                            <option value="pdf">pdf</option>
                            <option value="txt">txt</option>
                            <option value="gif">gif</option>
                            <option value="jpg">jpg</option>
                            <option value="png">png</option>
                            <option value="zip">zip</option>

                        </select>
                    </label>
                    @error('extension') <span class="text-red-700">{{ $message }}</span> @enderror
                    <label class="block">
                        <span class="p-2 text-sm text-gray-400">Size</span>
                        <input class="form-input mt-1 block w-full rounded-md" type="text" wire:model.lazy='size_value'
                             />
                             @error('size_value') <span class="text-red-700">{{ $message }}</span> @enderror
                    </label>
                    <label class="block">
                        <span class="p-2 text-sm text-gray-400">Unit</span>
                        <select class="form-select mt-1 block w-full rounded-md" wire:model='document_unit_id'>
                            <option value="">Select Unit</option>
                            <option value="KB">KB</option>
                            <option value="MB">MB</option>
                            <option value="GB">GB</option>
                            <option value="pages">pages</option>
                        </select>
                        @error('document_unit_id') <span class="text-red-700">{{ $message }}</span> @enderror
                    </label>
                    <label class="block">
                        <span class="p-2 text-sm text-gray-400"
                            title="One illustration image can be added here to be placed at the top of the page">is
                            illustration*</span>
                        <fieldset class="block">
                            <div class="mt-2 px-4">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input class="form-radio" type="radio" value="0"
                                            wire:model="is_illustration" />
                                        <span class="ml-2">No</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input class="form-radio" type="radio" value="1"
                                            wire:model="is_illustration" />
                                        <span class="ml-2">Yes</span>
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                    </label>
                </td>
                <td class="w-1/6 py-3 px-4 text-right align-bottom">
                    <button
                        class="disable:cursor-not-allowed rounded bg-indigo-500 py-2 px-4 text-white hover:bg-indigo-500 disabled:bg-opacity-10"
                        wire:click.prevent="addDocumentFile">Add</button>
                </td>
            </tr>
            @foreach ($dataset->files as $file)
                <tr
                    class="{{ $loop->first ? 'border-t ' : '' }} {{ $loop->last ? 'border-b ' : '' }} border-l border-r">
                    <td class="w-5/6 py-1 text-left">
                        <label class="ml-7">  {{ $file->title }} -
                        {{ $file->file_name }} - {{ $file->document_format_id }} {{ $file->size_value }}
                        {{ $file->document_unit_id }} - ({{ $file->is_illustration }})
                        </label>
                    </td>
                    <td class="w-1/6 py-1 text-right">
                        <button wire:click.prevent="removeDocumentFile({{ $file->id }})">
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
