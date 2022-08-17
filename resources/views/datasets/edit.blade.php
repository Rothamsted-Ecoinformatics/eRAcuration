@extends('layouts.app')
@section('content')
    <form action="/datasets/{{ $dataset->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header bg-blue-600 text-center">
                <div class="flex flex-row items-center justify-between">
                    <div class="basis-3/4 p-3">
                        <h1 class="text-4xl text-slate-100 text-bold justify-center p-8 ">Edit : {{ $dataset->id }} -
                            {{ $dataset->title }}
                        </h1>
                    </div>
                    <div class="basis-1/4 p-3">
                        <a href="/datasets/{{ $dataset->id }}"
                            class="float-right inline-block  px-5 py-3 mx-2 rounded-lg transform transition
                        bg-gray-500 hover:bg-gray-400 hover:-translate-y-0.5 focus:ring-gray-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2
                        active:bg-gray-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg">Cancel</a>
                        <button type="submit"
                            class="float-right inline-block  px-5 py-3 mx-2 rounded-lg transform transition
                        bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2
                        active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg">Submit</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- Field in Metadata Documents --}}
                <div class="antialiased text-gray-900 px-3">
                    <div class="max-w-xl mx-auto py-0 md:max-w-4xl">
                        <div class="bg-gray-300">
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
                                <span class="text-gray-700 p-2 font-semibold text-lg">Identifier</span>
                                <div class="text-slate-900  text-lg font-thin  p-2"><a
                                        class="text-blue-700 hover:text-blue-500 hover:underline active:text-rose-600  visited:text-violet-900"
                                        href="{{ $startURL }}{{ $dataset->identifier }}">{{ $dataset->identifier }}</a>
                                    ({{ $dataset->identifier_type }})
                                </div>
                                <div
                                    class="text-gray-700 p-2 font-semibold text-lg text-sm font-thin font-italic bg-yellow-100 p-2">
                                    In general we
                                    do not want to edit the DOI</div>
                            </label>
                            <label class="block">
                                <span class="text-gray-700 p-2 font-semibold text-lg">URL</span>
                                <div class="text-slate-900  text-lg font-thin  p-2"><a
                                        class="text-blue-700 hover:text-blue-500 hover:underline active:text-rose-600  visited:text-violet-900"
                                        href="{{ $startURL }}{{ $dataset->identifier }}">{{ $dataset->url }}</a>
                                </div>
                                <div
                                    class="text-gray-700 p-2 font-semibold text-lg text-sm font-thin font-italic bg-yellow-100 p-2">
                                    URL will be
                                    updated
                                    automatically if needed.</div>
                            </label>
                        </div>
                        <label class="block">
                            <span class="text-gray-700 p-2 font-semibold text-lg">Title</span>
                            <input type="text" name="title" class="form-input mt-1 block rounded-md w-full"
                                value="{{ $dataset->title }}" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700 p-2 font-semibold text-lg">URL</span>
                            <input type="text" name="url" class="form-input mt-1 block rounded-md w-full"
                                value="{{ $dataset->url }}" />
                        </label>
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                            <div class="grid grid-cols-1 gap-6">
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">Select Experiment</span>
                                    <select class="form-select block w-full mt-1  rounded-md" name="experiment_id">
                                        @foreach ($experiments as $experiment)
                                            <option value="{{ $experiment->id }}"
                                                @if ($dataset->experiment_id == $experiment->id) selected @endif>
                                                {{ $experiment->name }} ({{ $experiment->code }})
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">is_ready State</span>
                                    <input type="text" name="is_ready" class="form-input mt-1 block rounded-md w-full"
                                        value="{{ $dataset->is_ready }}" />
                                    <div
                                        class="text-gray-700 p-2 font-semibold text-lg text-sm font-thin font-italic bg-yellow-100 p-2">
                                        0: really
                                        nothing to show - 1: only shows on intranet test site and not minted - 2: shows on
                                        internet and minted DOI</div>
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">Grade</span>
                                    <input type="text" name="grade" class="form-input mt-1 block rounded-md w-full"
                                        value="{{ $dataset->grade }}" />
                                    <div
                                        class="text-gray-700 p-2 font-semibold text-lg text-sm font-thin font-italic bg-yellow-100 p-2">
                                        This value
                                        seems deprecated now</div>
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">DOI minted</span>
                                    <input type="text" name="doi_created" class="form-input mt-1 block rounded-md w-full"
                                        value="{{ $dataset->doi_created }}" />
                                    <div
                                        class="text-gray-700 p-2 font-semibold text-lg text-sm font-thin font-italic bg-yellow-100 p-2">
                                        Delete this
                                        if you need the DOI to be minted again. Do not edit otherwise</div>
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">is External</span>
                                    <input type="text" name="is_external" class="form-input mt-1 block rounded-md w-full"
                                        value="{{ $dataset->is_external }}" />
                                    <div
                                        class="text-gray-700 p-2 font-semibold text-lg text-sm font-thin font-italic bg-yellow-100 p-2">
                                        in the
                                        extremely rare case when the dataset is described here, but hosted womewhere else
                                        and we do not mint the DOI</div>
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">Publisher</span>
                                    <select class="form-select block w-full mt-1  rounded-md" name="publisher_id">
                                        @foreach ($organisations as $organisation)
                                            <option value="{{ $organisation->id }}"
                                                @if ($dataset->publisher_id == $organisation->id) selected @endif>
                                                {{ $organisation->name }} ({{ $organisation->abbreviation }})
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                                <label class="block">

                                    <table class="min-w-full">
                                        <thead class="">
                                            <tr>
                                                <th class="w-2/3 text-left">
                                                    <span class="text-gray-700 p-2 font-semibold text-lg">Authors</span>
                                                </th>
                                                <th class="w-1/3 text-right py-3 px-4 font-semibold text-sm">
                                                    <span class=" text-blue-500" href="">Add </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $stripe = 'bg-gray-200';
                                            @endphp
                                            @foreach ($authors as $author)
                                                @if ($stripe == 'bg-white')
                                                    @php
                                                        $stripe = 'bg-gray-200';
                                                    @endphp
                                                @else
                                                    @php
                                                        $stripe = 'bg-white';
                                                    @endphp
                                                @endif
                                                <tr class="{{ $stripe }}">
                                                    <td class="w-1/4 text-left py-3 px-4">{{ $author->given_name }}
                                                        {{ $author->family_name }}</td>
                                                    <td class="w-1/4 text-right py-3 px-4">
                                                        <span class=" text-red-500" href="">Delete</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </label>
                                <label class="block">
                                    <table class="min-w-full">
                                        <thead class="">
                                            <tr>
                                                <th class="w-2/3 text-left">
                                                    <span class="text-gray-700 p-2 font-semibold text-lg">or Authoring
                                                        Organisations</span>
                                                </th>
                                                <th class="w-1/3 text-right py-3 px-4 font-semibold text-sm">
                                                    <span class=" text-blue-500" href="">Add </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $stripe = 'bg-gray-200';
                                            @endphp
                                            @foreach ($authorOrgs as $authorOrg)
                                                @if ($stripe == 'bg-white')
                                                    @php
                                                        $stripe = 'bg-gray-200';
                                                    @endphp
                                                @else
                                                    @php
                                                        $stripe = 'bg-white';
                                                    @endphp
                                                @endif
                                                <tr class="{{ $stripe }}">
                                                    <td class="w-1/4 text-left py-3 px-4">{{ $authorOrg->name }}
                                                        ({{ $authorOrg->abbreviation }})
                                                    </td>
                                                    <td class="w-1/4 text-right py-3 px-4">
                                                        <span class=" text-red-500" href="">Delete</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </label>
                                <label class="block">
                                    <table class="min-w-full">
                                        <thead class="">
                                            <tr>
                                                <th class="w-2/3 text-left" colspan=2>
                                                    <span
                                                        class="text-gray-700 p-2 font-semibold text-lg">Contributors</span>
                                                </th>
                                                <th class="w-1/3 text-right py-3 px-4 font-semibold text-sm">
                                                    <span class=" text-blue-500" href="">Add </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $stripe = 'bg-gray-200';
                                            @endphp
                                            @foreach ($contributors as $contributor)
                                                @if ($stripe == 'bg-white')
                                                    @php
                                                        $stripe = 'bg-gray-200';
                                                    @endphp
                                                @else
                                                    @php
                                                        $stripe = 'bg-white';
                                                    @endphp
                                                @endif
                                                <tr class="{{ $stripe }}">
                                                    <td class="w-1/3 text-left py-3 px-4">{{ $contributor->given_name }}
                                                        {{ $contributor->family_name }}</td>
                                                    <td class="w-1/3 text-left py-3 px-4">
                                                        {{ $contributor->pivot->person_role_type->type_value }}</td>
                                                    <td class="w-1/3 text-right py-3 px-4">
                                                        <span class=" text-green-500" href="">Edit</span>
                                                        <span class=" text-red-500" href="">Delete</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </label>
                                <label class="block">
                                    <table class="min-w-full">
                                        <thead class="">
                                            <tr>
                                                <th class="w-2/3 text-left">
                                                    <span class="text-gray-700 p-2 font-semibold text-lg">Funding
                                                        Awards</span>
                                                </th>
                                                <th class="w-1/3 text-right py-3 px-4 font-semibold text-sm">
                                                    <span class=" text-blue-500" href="">Add </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $stripe = 'bg-gray-200';
                                            @endphp
                                            @foreach ($funders as $funder)
                                                @if ($stripe == 'bg-white')
                                                    @php
                                                        $stripe = 'bg-gray-200';
                                                    @endphp
                                                @else
                                                    @php
                                                        $stripe = 'bg-white';
                                                    @endphp
                                                @endif
                                                </li>
                                                <tr class="{{ $stripe }}">
                                                    <td class="w-1/4 text-left py-3 px-4">{{ $funder->reference_number }}
                                                        ({{ $funder->organisation->abbreviation }})
                                                    </td>
                                                    <td class="w-1/4 text-right py-3 px-4">
                                                        <span class=" text-red-500" href="">Delete</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </label>
                            </div>
                            <div class="grid grid-cols-1 gap-6">
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">Short Name</span>
                                    <input type="text" name="shortname"
                                        class="form-input mt-1 block rounded-md w-full"
                                        value="{{ $dataset->short_name }}" />
                                    <div
                                        class="text-gray-700 p-2 font-semibold text-lg text-sm font-thin font-italic bg-yellow-100 p-2">
                                        This is the
                                        name of the folder,
                                        or a short name for the dataset. Case sensitive. Leave blank for documents that are
                                        at the root of the experiment </div>
                                </label>
                                <label class="block rounded-md">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">Version</span>
                                    <input type="number" class="form-input mt-1 block rounded-md w-full" name="version"
                                        value="1" />
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">Publication Year</span>
                                    <select class="form-select block w-full mt-1  rounded-md" name="publication_year">
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
                                    <span class="text-gray-700 p-2 font-semibold text-lg">Dataset Access Type</span>
                                    <select class="form-select block w-full mt-1  rounded-md" name="dataset_type">
                                        <option value="OA">OA</option>
                                        <option value="Frictionless">Frictionless</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">Format</span>
                                    <select class="form-select block w-full mt-1  rounded-md" name="document_format_id">
                                        @foreach ($document_formats as $document_format)
                                            <option value="{{ $document_format->id }}"
                                                @if ($dataset->document_format_id == $document_format->id) selected @endif>
                                                {{ $document_format->id }} ({{ $document_format->mime_type }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <p>this is now absent in this version of the database: are we resintating it?</p>
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">Resource General Type</span>
                                    <select class="form-select block w-full mt-1  rounded-md"
                                        name="general_resource_type_id">
                                        <option value="4">Dataset</option>

                                        <option value="12">Text</option>
                                    </select>
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">Resource Specific Type</span>
                                    <select class="form-select block w-full mt-1  rounded-md"
                                        name="specific_resource_type_id">
                                        @foreach ($specific_resource_types as $specific_resource_type)
                                            <option value="{{ $specific_resource_type->id }}"
                                                @if ($dataset->specific_resource_type_id == $specific_resource_type->id) selected @endif>
                                                {{ $specific_resource_type->type_value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
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
                                                $stripe = 'bg-gray-200';
                                            @endphp
                                            @foreach ($subjects as $subject)
                                                @if ($stripe == 'bg-white')
                                                    @php
                                                        $stripe = 'bg-gray-200';
                                                    @endphp
                                                @else
                                                    @php
                                                        $stripe = 'bg-white';
                                                    @endphp
                                                @endif
                                                </li>
                                                <tr class="{{ $stripe }}">
                                                    <td class="w-1/4 text-left py-3 px-4">{{ $subject->subject }}
                                                    </td>
                                                    <td class="w-1/4 text-right py-3 px-4">
                                                        <span class=" text-red-500" href="">Delete</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </label>
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">Document Dates</span>
                                    <p>Here I suggest having a table with the dates already created, and a button to add
                                        another
                                        dates. When updated, automatic updated date added</p>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-4xl mx-auto py-12">


                        <h2 class="text-2xl font-bold">Abstracts and Descriptions</h2>
                        <label class="block">
                            <span class="text-gray-700">Abstract</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md " rows="8" placeholder="This is Compulsory"
                                name="description_abstract">{{ $dataset->description_abstract }} </textarea>
                        </label>

                        <label class="block">
                            <span class="text-gray-700">Table of Content</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md " rows="8" name="description_toc">{{ $dataset->description_toc }} </textarea>
                        </label>

                        <label class="block">
                            <span class="text-gray-700">Technical Information</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="8" name="description_technical_info">{{ $dataset->description_technical_info }} </textarea>
                        </label>

                        <label class="block">
                            <span class="text-gray-700">Quality Assurance</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="8" name="description_quality">{{ $dataset->description_quality }} </textarea>
                        </label>

                        <label class="block">
                            <span class="text-gray-700">Provenance</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="8" name="description_provenance">{{ $dataset->description_provenance }} </textarea>
                        </label>

                        <label class="block">
                            <span class="text-gray-700">Methods</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="8" name="description_methods">{{ $dataset->description_methods }} </textarea>
                        </label>


                        <label class="block">
                            <span class="text-gray-700">Other</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="8" name="description_other">{{ $dataset->description_other }} </textarea>
                        </label>


                        <label class="block">
                            <span class="text-gray-700">Copyright</span>
                            <input type="text" name="rights_text" class="form-input mt-1 block rounded-md w-full"
                                value="Copyright Rothamsted Research" />
                        </label>

                        <label class="block">
                            <span class="text-gray-700">Copyright Licence URL</span>
                            <input type="text" name="rights_licence_uri"
                                class="form-input mt-1 block rounded-md w-full"
                                value="http://creativecommons.org/licenses/by/4.0" />
                        </label>

                        <label class="block">
                            <span class="text-gray-700">Copyright Licence</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="3" placeholder=""
                                name="rights_licence">This work is licensed under the terms of the Creative Commons Attribution 4.0 International License</textarea>
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Funding Awards</span>
                            <p>to do</p>
                        </label>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-between">
                    <div class="basis-3/4 p-3">
                        <h1 class="text-4xl text-slate-600 text-bold justify-center p-8 ">Editing :{{ $dataset->id }} -
                            {{ $dataset->title }}
                        </h1>
                    </div>
                    <div class="basis-1/4 p-3">
                        <button type="submit"
                            class="float-right inline-block  px-5 py-3 rounded-lg transform transition
                        bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2
                        active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="border-b-2 border-orange-500 border bg-orange-100  px-5">
        <h2 class="text-3xl  uppercase font-extrabold pt-5"><a name="localHelp"></a> Documentation</h2>
        <ul>
            <li></li>
        </ul>
    </div>
@endsection
