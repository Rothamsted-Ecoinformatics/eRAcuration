{{-- Field in Metadata Documents --}}
<div class="mx-auto max-w-xl py-0 md:max-w-4xl">
    <input name="templateID" type="hidden" wire:model="template_id" value="{{$template_id}}">
    <p>Use this form to create a new dataset metadata document from this one. Most of the information will be saved as a new document and you will then be able to edit what needs to change</p>
    <label class="block">
        <span class="p-2 text-lg font-semibold text-gray-700">Title for the new dataset of document</span>
        <input class="form-input mt-1 block w-full rounded-md" wire:model.lazy="title" type="text"
            placeholder="Enter a new Title" />
            @error('title') <span class="text-red-700">{{ $message }}</span> @enderror
    </label>
    <label class="block">
        <span class="p-2 text-lg font-semibold text-gray-700">Shortname (folder) if different from template</span>
        <input class="form-input mt-1 block w-full rounded-md" wire:model.lazy="shortname" type="text"
            placeholder="You may change the shortname" />
    </label>
    <label class="block">
        <span class="p-2 text-lg font-semibold text-gray-700">Version</span>
        <input class="form-input mt-1 block w-full rounded-md" wire:model.lazy="version" type="text"
            placeholder="You may change the version" />
    </label>
    <label class="block">
        <span class="p-2 text-lg font-semibold text-gray-700">DOI</span><span class="p-2 text-small  text-gray-500">choose carefully as not easy to change afterward</span>
        <input class="form-input mt-1 block w-full rounded-md" wire:model.lazy="identifier" type="text" placeholder="10.23637/" />
        @error('identifier') <span class="text-red-700">{{ $message }}</span> @enderror
        <br />
        @error('url') <span class="text-red-700">{{ $message }}</span> @enderror
    </label>
    <div class="basis-1/4 p-3">
        <button
                        class="disable:cursor-not-allowed rounded bg-indigo-500 py-2 px-4 text-white hover:bg-indigo-500 disabled:bg-opacity-10"
                        wire:click.prevent="addDataset">Add Dataset from Template</button>
    </div>
</div>
