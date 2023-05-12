@extends('layouts.app')
@section('content')
    <form action="/datasets/{{ $dataset->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header sticky top-0  bg-blue-600 text-center">
                <div class="flex flex-row items-center justify-between">
                    <div class="basis-3/4 p-3">
                        <h1 class="text-bold justify-center p-4 text-3xl text-slate-100">Edit : {{ $dataset->id }} -
                            {{ $dataset->title }}
                        </h1>
                    </div>
                    <div class="basis-1/4 p-3">
                        <a class="text-grey-400 float-right m-2 inline-block transform rounded-lg bg-gray-500 px-5 py-3 text-sm font-semibold uppercase tracking-wider  text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-2 active:bg-blue-900"
                            href="/datasets/{{ $dataset->id }}">Cancel</a>

                        <a class="text-grey-400 float-right m-2 inline-block transform rounded-lg bg-orange-500 px-5 py-3 text-sm font-semibold uppercase tracking-wider  text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-orange-400 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-2 active:bg-blue-900"
                                href="{{url('/storage/docs/cheatsheet.docx')}}">Cheatsheet
                        </a>
                        <button
                            class="float-right m-2 inline-block transform rounded-lg bg-blue-500 px-5 py-3 text-sm font-semibold uppercase tracking-wider text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-2 active:bg-blue-900"
                            type="submit">Submit</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- Field in Metadata Documents --}}
                <div class="px-3 text-gray-900 antialiased">
                    <div class="mx-auto max-w-xl py-0 md:max-w-4xl">
                        <div class="bg-gray-300 px-2 pt-6 pb-3">
                            <h2 class="text-2xl font-bold">Identification</h2>
                            <label class="block">
                                @php
                                    $startURL = 'http://doi.org/';
                                @endphp
                                @switch($dataset->identifier_type)
                                    @case('DOI')
                                        @php
                                            $startURL = 'http://doi.org/';
                                        @endphp
                                    @break

                                    @case('URL')
                                        @php
                                            $startURL = '';
                                        @endphp
                                    @break

                                    @default
                                        @php
                                            $startURL = 'http://doi.org/';
                                        @endphp
                                    @break
                                @endswitch
                                <span class="p-2 text-lg font-semibold text-gray-700"
                                    title="In general we do not want to edit the DOI">Identifier*</span>
                                <div class="p-2 text-lg font-thin text-slate-900"><a
                                        class="text-blue-700 visited:text-violet-900 hover:text-blue-500 hover:underline active:text-rose-600"
                                        href="{{ $startURL }}{{ $dataset->identifier }}">{{ $dataset->identifier }}</a>
                                    ({{ $dataset->identifier_type }})
                                </div>

                            </label>
                            <label class="block">
                                <span class="p-2 text-lg font-semibold text-gray-700"
                                    title="URL will be updated automatically if needed">URL*</span>
                                <div class="p-2 text-lg font-thin text-slate-900"><a
                                        class="text-blue-700 visited:text-violet-900 hover:text-blue-500 hover:underline active:text-rose-600"
                                        href="{{ $startURL }}{{ $dataset->identifier }}">{{ $dataset->url }}</a>
                                </div>
                            </label>
                            <label class="block">
                                <span class="p-2 text-lg font-semibold text-gray-700"
                                    title="This will be deleted when you click submit so the at the  DOI is minted again">DOI
                                    last
                                    minted*</span>
                                @php
                                    $doi_created = new DateTime($dataset->doi_created);
                                @endphp
                                {{ $doi_created->format('Y-m-d') }}
                            </label>
                        </div>
                        <label class="block">
                            <span class="p-2 text-lg font-semibold text-gray-700">Title</span>
                            <input class="form-input mt-1 block w-full rounded-md" name="title" type="text"
                                value="{{ $dataset->title }}" />
                        </label>
                        <div class="mt-6 grid grid-cols-1 items-start gap-6 md:grid-cols-2">
                            <div class="grid grid-cols-1 gap-6">
                                <label class="block">
                                    <span class="p-2 text-lg font-semibold text-gray-700">Select Experiment</span>
                                    <select class="form-select mt-1 block w-full rounded-md" name="experiment_id">
                                        @foreach ($experiments as $experiment)
                                            <option value="{{ $experiment->id }}"
                                                @if ($dataset->experiment_id == $experiment->id) selected @endif>
                                                {{ $experiment->name }} ({{ $experiment->code }})
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                                <label class="block">
                                    <span class="p-2 text-lg font-semibold text-gray-700"
                                        title="   0: really nothing to show
    1: only shows on intranet test site and not minted
    2: shows on internet and minted DOI">is_ready
                                        State*</span>

                                    <select class="form-select mt-1 block w-full rounded-md" name="is_ready">
                                        @php
                                            $is_readySelected = ' ';
                                        @endphp
                                        @for ($grade = 1; $grade < 3; $grade++)
                                            @if ($dataset->is_ready == $grade)
                                                @php
                                                    $is_readySelected = ' selected';
                                                @endphp
                                            @else
                                                @php
                                                    $is_readySelected = ' ';
                                                @endphp
                                            @endif
                                            <option value="{{ $grade }}" {{ $is_readySelected }}>
                                                {{ $grade }}
                                            </option>
                                        @endfor
                                    </select>

                                </label>
                                <label class="block">
                                    <span class="p-2 text-lg font-semibold text-gray-700">Grade</span>

                                    <select class="form-select mt-1 block w-full rounded-md" name="grade">
                                        @php
                                            $gradeSelected = ' ';
                                        @endphp
                                        @for ($grade = 0; $grade < 4; $grade++)
                                            @if ($dataset->grade == $grade)
                                                @php
                                                    $gradeSelected = ' selected';
                                                @endphp
                                            @else
                                                @php
                                                    $gradeSelected = ' ';
                                                @endphp
                                            @endif
                                            <option value="{{ $grade }}" {{ $gradeSelected }}>{{ $grade }}
                                            </option>
                                        @endfor
                                    </select>

                                </label>

                                <label class="block">
                                    <span class="p-2 text-lg font-semibold text-gray-700"
                                        title="in the extremely rare case when the dataset is described here, but hosted womewhere else and we do not mint the DOI">is
                                        External*</span>
                                    @php
                                        $isexternal = ' ';
                                        $isNotExternal = '';
                                    @endphp

                                    @if ($dataset->is_external == 0)
                                        @php
                                            $isexternal = ' ';
                                            $isNotExternal = ' checked';
                                        @endphp
                                    @else
                                        @php
                                            $isexternal = ' checked';
                                            $isNotExternal = '';
                                        @endphp
                                    @endif
                                    <fieldset class="block">
                                        <div class="mt-2">
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input class="form-radio" name="is_external" type="radio"
                                                        value="0" {{ $isNotExternal }} />
                                                    <span class="ml-2">No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input class="form-radio" name="is_external" type="radio"
                                                        value="1" {{ $isexternal }} />
                                                    <span class="ml-2">Yes</span>
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </label>
                                <label class="block">
                                    <span class="p-2 text-lg font-semibold text-gray-700">Publisher</span>
                                    <select class="form-select mt-1 block w-full rounded-md" name="publisher_id">
                                        @foreach ($publishers as $publisher)
                                            <option value="{{ $publisher->id }}"
                                                @if ($dataset->publisher_id == $publisher->id) selected @endif>
                                                {{ $publisher->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>

                                @livewire('input.authors', ['dataset_id' => $dataset->id])

                                @livewire('input.author-orgs', ['dataset_id' => $dataset->id])

                            </div>
                            <div class="grid grid-cols-1 gap-6">
                                <label class="block">
                                    <span class="p-2 text-lg font-semibold text-gray-700"
                                        title="This is the name of the folder, or a short name for the dataset. Case sensitive. Leave blank for documents that are at the root of the experiment">Short
                                        Name*</span>
                                    <input class="form-input mt-1 block w-full rounded-md" name="short_name" type="text"
                                        value="{{ $dataset->short_name }}" />
                                </label>
                                <label class="block rounded-md">
                                    <span class="p-2 text-lg font-semibold text-gray-700">Version</span>
                                    <input class="form-input mt-1 block w-full rounded-md" name="version" type="number"
                                        value="{{ $dataset->version }}" />
                                </label>
                                <label class="block">
                                    <span class="p-2 text-lg font-semibold text-gray-700">Publication Year</span>
                                    <select class="form-select mt-1 block w-full rounded-md" name="publication_year">
                                        @php
                                            $yearSelected = ' ';
                                        @endphp
                                        @for ($year = 2010; $year < 2025; $year++)
                                            @if ($dataset->publication_year == $year)
                                                @php
                                                    $yearSelected = ' selected';
                                                @endphp
                                            @else
                                                @php
                                                    $yearSelected = ' ';
                                                @endphp
                                            @endif
                                            <option value="{{ $year }}" {{ $yearSelected }}>{{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                </label>
                                <label class="block">
                                    <span class="p-2 text-lg font-semibold text-gray-700">Dataset Access Type</span>
                                    <select class="form-select mt-1 block w-full rounded-md" name="dataset_type">
                                        <option value="OA" @if ($dataset->dataset_type == 'OA') selected @endif>OA
                                        </option>
                                        <option value="Frictionless" @if ($dataset->dataset_type == 'Frictionless') selected @endif>
                                            Frictionless</option>
                                        <option value="Other" @if ($dataset->dataset_type == 'Other') selected @endif>Other
                                        </option>
                                    </select>
                                </label>
                                <label class="block">
                                    <span class="p-2 text-lg font-semibold text-gray-700">Format</span>
                                    <select class="form-select mt-1 block w-full rounded-md" name="document_format_id">
                                        @foreach ($document_formats as $document_format)
                                            <option value="{{ $document_format->id }}"
                                                @if ($dataset->document_format_id == $document_format->id) selected @endif>
                                                {{ $document_format->id }} ({{ $document_format->mime_type }})
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                                <label class="block">
                                    <span class="p-2 text-lg font-semibold text-gray-700">Resource General Type</span>
                                    <select class="form-select mt-1 block w-full rounded-md"
                                        name="general_resource_type_id">
                                        <option value="4" @if ($dataset->general_resource_type_id == 4) selected @endif>Dataset
                                        </option>
                                        <option value="12" @if ($dataset->general_resource_type_id == 12) selected @endif>Text
                                        </option>
                                    </select>
                                </label>
                                <label class="block">
                                    <span class="p-2 text-lg font-semibold text-gray-700">Resource Specific Type</span>
                                    <select class="form-select mt-1 block w-full rounded-md"
                                        name="specific_resource_type_id">
                                        @foreach ($specific_resource_types as $specific_resource_type)
                                            <option value="{{ $specific_resource_type->id }}"
                                                @if ($dataset->specific_resource_type_id == $specific_resource_type->id) selected @endif>
                                                {{ $specific_resource_type->type_value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>

                                @livewire('input.subjects', ['dataset_id' => $dataset->id])

                            </div>
                        </div>
                    </div>
                    <div class="mx-auto max-w-4xl py-12">

                        @livewire('input.contributors', ['dataset_id' => $dataset->id])

                        @livewire('input.associated-files', ['dataset_id' => $dataset->id])

                        @livewire('input.related-identifiers', ['dataset_id' => $dataset->id])

                        @livewire('input.funders', ['dataset_id' => $dataset->id])

                        @livewire('input.dates', ['dataset_id' => $dataset->id])


                        <h2 class="pt-12 text-2xl font-bold">Abstracts and Descriptions</h2>
                        <label class="block">
                            <span class="p-2 text-lg font-semibold text-gray-700">Abstract</span>
                            <textarea class="form-textarea mt-1 block h-24 w-full rounded-md" name="description_abstract" rows="8"
                                placeholder="This is Compulsory">{{ $dataset->description_abstract }} </textarea>
                        </label>
                        <label class="block">
                            <span class="p-2 text-lg font-semibold text-gray-700">Table of Content</span>
                            <textarea class="form-textarea mt-1 block h-24 w-full rounded-md" name="description_toc" rows="8">{{ $dataset->description_toc }} </textarea>
                        </label>
                        <label class="block">
                            <span class="p-2 text-lg font-semibold text-gray-700">Technical Information</span>
                            <textarea class="form-textarea mt-1 block h-24 w-full rounded-md" name="description_technical_info" rows="8">{{ $dataset->description_technical_info }} </textarea>
                        </label>
                        <label class="block">
                            <span class="p-2 text-lg font-semibold text-gray-700">Quality Assurance</span>
                            <textarea class="form-textarea mt-1 block h-24 w-full rounded-md" name="description_quality" rows="8">{{ $dataset->description_quality }} </textarea>
                        </label>
                        <label class="block">
                            <span class="p-2 text-lg font-semibold text-gray-700">Provenance</span>
                            <textarea class="form-textarea mt-1 block h-24 w-full rounded-md" name="description_provenance" rows="8">{{ $dataset->description_provenance }} </textarea>
                        </label>
                        <label class="block">
                            <span class="p-2 text-lg font-semibold text-gray-700">Methods</span>
                            <textarea class="form-textarea mt-1 block h-24 w-full rounded-md" name="description_methods" rows="8">{{ $dataset->description_methods }} </textarea>
                        </label>
                        <label class="block">
                            <span class="p-2 text-lg font-semibold text-gray-700">Other</span>
                            <textarea class="form-textarea mt-1 block h-24 w-full rounded-md" name="description_other" rows="8">{{ $dataset->description_other }} </textarea>
                        </label>

                        <h2 class="pt-12 text-2xl font-bold">Licence and funding</h2>
                        <label class="block">
                            <span class="p-2 text-lg font-semibold text-gray-700">Copyright</span>
                            <input class="form-input mt-1 block w-full rounded-md" name="rights_text" type="text"
                                value="Copyright Rothamsted Research" />
                        </label>
                        <label class="block">
                            <span class="p-2 text-lg font-semibold text-gray-700">Copyright Licence URL</span>
                            <input class="form-input mt-1 block w-full rounded-md" name="rights_licence_uri"
                                type="text" value="http://creativecommons.org/licenses/by/4.0" />
                        </label>
                        <label class="block">
                            <span class="p-2 text-lg font-semibold text-gray-700">Copyright Licence</span>
                            <textarea class="form-textarea mt-1 block h-24 w-full rounded-md" name="rights_licence" rows="3"
                                placeholder="">This work is licensed under the terms of the Creative Commons Attribution 4.0 International License</textarea>
                        </label>

                    </div>
                </div>

            </div>
        </div>
    </form>
    <div class="border border-b-2 border-orange-500 bg-orange-100 px-5">
        <h2 class="pt-12 text-3xl font-extrabold uppercase"><a name="localHelp"></a> Documentation</h2>
        <p>Please refer to the  <a class="text-blue-600
            font-semibold
         active:bg-blue-900"
            href="{{url('/storage/docs/cheatsheet.docx')}}">Cheatsheet
    </a> for help with what to put in</p>
    </div>
@endsection
