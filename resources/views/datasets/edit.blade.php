@extends('layouts.app')
@section('content')
    @php
    $stripeDark = 'bg-lime-200';
    $stripeLight = 'bg-white';
    @endphp
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
                        <div class="bg-gray-300 pt-6 pb-3 px-2">
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
                                <span title="In general we do not want to edit the DOI"
                                    class="text-gray-700 p-2 font-semibold text-lg">Identifier*</span>
                                <div class="text-slate-900  text-lg font-thin  p-2"><a
                                        class="text-blue-700 hover:text-blue-500 hover:underline active:text-rose-600  visited:text-violet-900"
                                        href="{{ $startURL }}{{ $dataset->identifier }}">{{ $dataset->identifier }}</a>
                                    ({{ $dataset->identifier_type }})
                                </div>

                            </label>
                            <label class="block">
                                <span title="URL will be updated automatically if needed"
                                    class="text-gray-700 p-2 font-semibold text-lg">URL*</span>
                                <div class="text-slate-900  text-lg font-thin  p-2"><a
                                        class="text-blue-700 hover:text-blue-500 hover:underline active:text-rose-600  visited:text-violet-900"
                                        href="{{ $startURL }}{{ $dataset->identifier }}">{{ $dataset->url }}</a>
                                </div>
                            </label>
                            <label class="block">
                                <span class="text-gray-700 p-2 font-semibold text-lg"
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
                            <span class="text-gray-700 p-2 font-semibold text-lg">Title</span>
                            <input type="text" name="title" class="form-input mt-1 block rounded-md w-full"
                                value="{{ $dataset->title }}" />
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
                                    <span class="text-gray-700 p-2 font-semibold text-lg"
                                        title="   0: really nothing to show
    1: only shows on intranet test site and not minted
    2: shows on internet and minted DOI">is_ready
                                        State*</span>


                                    <select class="form-select block w-full mt-1  rounded-md" name="is_ready">
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
                                    <span class="text-gray-700 p-2 font-semibold text-lg">Grade</span>


                                    <select class="form-select block w-full mt-1  rounded-md" name="grade">
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
                                    <span class="text-gray-700 p-2 font-semibold text-lg"
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
                                                    <input class="form-radio" type="radio" {{ $isNotExternal }}
                                                        name="is_external" value="0" />
                                                    <span class="ml-2">No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input class="form-radio" type="radio" {{ $isexternal }}
                                                        name="is_external" value="1" />
                                                    <span class="ml-2">Yes</span>
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $stripe = $stripeLight;
                                            @endphp
                                            @foreach ($dataset->authors as $author)
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
                                                            name="authors[]">
                                                            @foreach ($persons as $person)
                                                                <option value="{{ $person->id }}"
                                                                    @if ($author->id == $person->id) selected @endif>
                                                                    {{ $person->given_name }} {{ $person->family_name }}
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
                                                $stripe = $stripeLight;
                                            @endphp
                                            @foreach ($dataset->authorOrgs as $authorOrg)
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
                                                            name="authorOrgs[]">
                                                            @foreach ($organisations as $organisation)
                                                                <option value="{{ $organisation->id }}"
                                                                    @if ($authorOrg->id == $organisation->id) selected @endif>
                                                                    {{ $organisation->name }}
                                                                    {{ $organisation->abbreviation }}
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


                            </div>
                            <div class="grid grid-cols-1 gap-6">
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg"
                                        title="This is the name of the folder, or a short name for the dataset. Case sensitive. Leave blank for documents that are at the root of the experiment">Short
                                        Name*</span>
                                    <input type="text" name="short_name"
                                        class="form-input mt-1 block rounded-md w-full"
                                        value="{{ $dataset->short_name }}" />
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
                                        <option value="OA" @if ($dataset->dataset_type == 'OA') selected @endif>OA
                                        </option>
                                        <option value="Frictionless" @if ($dataset->dataset_type == 'Frictionless') selected @endif>
                                            Frictionless</option>
                                        <option value="Other" @if ($dataset->dataset_type == 'Other') selected @endif>Other
                                        </option>
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
                                </label>
                                <label class="block">
                                    <span class="text-gray-700 p-2 font-semibold text-lg">Resource General Type</span>
                                    <select class="form-select block w-full mt-1  rounded-md"
                                        name="general_resource_type_id">
                                        <option value="4" @if ($dataset->general_resource_type_id == 4) selected @endif>Dataset
                                        </option>
                                        <option value="12" @if ($dataset->general_resource_type_id == 12) selected @endif>Text
                                        </option>
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

                            </div>
                        </div>
                    </div>
                    <div class="max-w-4xl mx-auto py-12">
                        <label class="block">
                            <table class="min-w-full">
                                <thead class="">
                                    <tr>
                                        <th class="w-6/7 text-left" colspan=2>
                                            <span class="text-gray-700 p-2 font-semibold text-lg">Dates</span>
                                        </th>
                                        <th class="w-1/7 text-right py-3 px-4 font-semibold text-sm">
                                            <span class=" text-blue-500" href="">Add </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stripe = $stripeLight;
                                        $item = 0;
                                    @endphp
                                    @foreach ($dataset->dates as $date)
                                        @php

                                            $item++;
                                            //the form input accepts format'Y-m-d' which we get like this
                                            $time_input = strtotime($date->history->document_date);
                                            $date_input = date('Y-m-d', $time_input);

                                        @endphp
                                        @if ($stripe == $stripeDark)
                                            @php
                                                $stripe = $stripeLight;
                                            @endphp
                                        @else
                                            @php
                                                $stripe = $stripeDark;
                                            @endphp
                                        @endif
                                        </li>
                                        <tr class="{{ $stripe }}">
                                            <td class="w-3/7 text-left py-1 px-4">
                                                <select class="form-select block w-full mt-1  rounded-md"
                                                    name="date[{{ $item }}]['type_value']">
                                                    @foreach ($date_types as $date_type)
                                                        <option value="{{ $date_type->id }}"
                                                            @if ($date->type_value == $date_type->type_value) selected @endif>
                                                            {{ $date_type->type_value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="w-3/7 text-left py-1 px-4">
                                                <input type="date" class="form-input mt-1 block rounded-md w-full"
                                                    name="date[{{ $item }}]['document_date']"
                                                    value="{{ $date_input }}" />

                                            </td>
                                            <td class="w-1/7 text-right py-1 px-4">

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
                                            <span class="text-gray-700 p-2 font-semibold text-lg">Contributors</span>
                                        </th>
                                        <th class="w-1/3 text-right py-3 px-4 font-semibold text-sm">
                                            <span class=" text-blue-500" href="">Add </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stripe = $stripeLight;
                                        $item = 0;
                                    @endphp
                                    @foreach ($dataset->contributors as $contributor)
                                        @php
                                            $item++;
                                        @endphp
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
                                            <td class="w-1/3 text-left py-3 px-4">
                                                <select class="form-select block w-full mt-1  rounded-md"
                                                    name="contributors[{{ $item }}]['person_id']">
                                                    @foreach ($persons as $person)
                                                        <option value="{{ $person->id }}"
                                                            @if ($contributor->pivot->person_id == $person->id) selected @endif>
                                                            {{ $person->given_name }} {{ $person->family_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="w-1/3 text-left py-3 px-4">
                                                <select class="form-select block w-full mt-1  rounded-md"
                                                    name="contributors[{{ $item }}]['person_role_type_id']">
                                                    @foreach ($person_role_types as $prt)
                                                        <option value="{{ $prt->id }}"
                                                            @if ($contributor->pivot->person_role_type->id == $prt->id) selected @endif>
                                                            {{ $prt->type_value }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </td>
                                            <td class="w-1/3 text-right py-3 px-4">

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
                                        <th class="w-5/6 text-left">
                                            <span class="text-gray-700 p-2 font-semibold text-lg">Files Provided</span>
                                        </th>
                                        <th class="w-1/6 text-right py-3 px-4 font-semibold text-sm">
                                            <span class=" text-blue-500" href="">Add </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stripe = $stripeLight;
                                        $item = 0;
                                    @endphp
                                    @foreach ($dataset->files as $file)
                                        @php
                                            $item++;
                                        @endphp
                                        @if ($stripe == $stripeDark)
                                            @php
                                                $stripe = $stripeLight;
                                            @endphp
                                        @else
                                            @php
                                                $stripe = $stripeDark;
                                            @endphp
                                        @endif
                                        </li>
                                        <tr class="{{ $stripe }}">
                                            <td class="w-5/6 text-left py-3 px-4">
                                                <label class="block">
                                                    <span class="text-gray-700 p-2 font-semibold text-lg">Title or Caption
                                                    </span>
                                                    <input type="text" class="form-input mt-1 block rounded-md w-full"
                                                        name="new_document_file[{{ $item }}]['title']"
                                                        value="{{ $file->title }} " />
                                                </label>
                                                <label class="block">
                                                    <span class="text-gray-700 p-2 font-semibold text-lg">File Name with
                                                        extension</span>
                                                    <input type="text" class="form-input mt-1 block rounded-md w-full"
                                                        name="new_document_file[{{ $item }}]['file_name']"
                                                        value="{{ $file->file_name }}" />
                                                </label>
                                                <label class="block">
                                                    <span class="text-gray-700 p-2 font-semibold text-lg">Size</span>
                                                    <input type="text" class="form-input mt-1 block rounded-md w-full"
                                                        name="new_document_file[{{ $item }}]['size_value']"
                                                        value="{{ $file->size_value }}" />
                                                </label>
                                                <label class="block">
                                                    <span class="text-gray-700 p-2 font-semibold text-lg">Unit</span>
                                                    <select class="form-select block w-full mt-1  rounded-md"
                                                        name="new_document_file[{{ $item }}]['document_unit_id']">
                                                        <option value="GB"
                                                            @if ($file->document_unit_id == 'GB') selected @endif>GB
                                                        </option>
                                                        <option value="KB"
                                                            @if ($file->document_unit_id == 'KB') selected @endif>KB
                                                        </option>
                                                        <option value="MB"
                                                            @if ($file->document_unit_id == 'MB') selected @endif>MB
                                                        </option>
                                                        <option value="pages"
                                                            @if ($file->document_unit_id == 'pages') selected @endif>pages
                                                        </option>

                                                    </select>
                                                </label>
                                                <label class="block">
                                                    <span class="text-gray-700 p-2 font-semibold text-lg"
                                                        title="One illustration image can be added here to be placed at the top of the page">is
                                                        illustration*</span>
                                                    @php
                                                        $isIllustration = ' ';
                                                        $isNotIllustration = ' ';
                                                    @endphp

                                                    @if ($file->is_illustration == 0)
                                                        @php
                                                            $isIllustration = ' ';
                                                            $isNotIllustration = ' checked';
                                                        @endphp
                                                    @else
                                                        @php
                                                            $isIllustration = ' checked';
                                                            $isNotIllustration = '';
                                                        @endphp
                                                    @endif
                                                    <fieldset class="block">
                                                        <div class="mt-2">
                                                            <div>
                                                                <label class="inline-flex items-center">
                                                                    <input class="form-radio" type="radio"
                                                                        {{ $isNotIllustration }}
                                                                        name="new_document_file[{{ $item }}]['is_illustration']"
                                                                        value="0" />
                                                                    <span class="ml-2">No</span>
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <label class="inline-flex items-center">
                                                                    <input class="form-radio" type="radio"
                                                                        {{ $isIllustration }}
                                                                        name="new_document_file[{{ $item }}]['is_illustration']"
                                                                        value="1" />
                                                                    <span class="ml-2">Yes</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </label>
                                            </td>
                                            <td class="w-1/6 text-right py-3 px-4">

                                                <span class=" text-red-500" href="">Delete</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </label>
                        <h2 class="text-2xl font-bold py-12">Abstracts and Descriptions</h2>
                        <label class="block">
                            <span class="text-gray-700 p-2 font-semibold text-lg">Abstract</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md " rows="8" placeholder="This is Compulsory"
                                name="description_abstract">{{ $dataset->description_abstract }} </textarea>
                        </label>
                        <label class="block">
                            <span class="text-gray-700 p-2 font-semibold text-lg">Table of Content</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md " rows="8" name="description_toc">{{ $dataset->description_toc }} </textarea>
                        </label>
                        <label class="block">
                            <span class="text-gray-700 p-2 font-semibold text-lg">Technical Information</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="8" name="description_technical_info">{{ $dataset->description_technical_info }} </textarea>
                        </label>
                        <label class="block">
                            <span class="text-gray-700 p-2 font-semibold text-lg">Quality Assurance</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="8" name="description_quality">{{ $dataset->description_quality }} </textarea>
                        </label>
                        <label class="block">
                            <span class="text-gray-700 p-2 font-semibold text-lg">Provenance</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="8" name="description_provenance">{{ $dataset->description_provenance }} </textarea>
                        </label>
                        <label class="block">
                            <span class="text-gray-700 p-2 font-semibold text-lg">Methods</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="8" name="description_methods">{{ $dataset->description_methods }} </textarea>
                        </label>
                        <label class="block">
                            <span class="text-gray-700 p-2 font-semibold text-lg">Other</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="8" name="description_other">{{ $dataset->description_other }} </textarea>
                        </label>

                        <h2 class="text-2xl font-bold py-12">Licence and funding</h2>
                        <label class="block">
                            <span class="text-gray-700 p-2 font-semibold text-lg">Copyright</span>
                            <input type="text" name="rights_text" class="form-input mt-1 block rounded-md w-full"
                                value="Copyright Rothamsted Research" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700 p-2 font-semibold text-lg">Copyright Licence URL</span>
                            <input type="text" name="rights_licence_uri"
                                class="form-input mt-1 block rounded-md w-full"
                                value="http://creativecommons.org/licenses/by/4.0" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700 p-2 font-semibold text-lg">Copyright Licence</span>
                            <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="3" placeholder=""
                                name="rights_licence">This work is licensed under the terms of the Creative Commons Attribution 4.0 International License</textarea>
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
                                        $stripe = $stripeLight;
                                    @endphp
                                    @foreach ($dataset->funders as $funder)
                                        @if ($stripe == $stripeDark)
                                            @php
                                                $stripe = $stripeLight;
                                            @endphp
                                        @else
                                            @php
                                                $stripe = $stripeDark;
                                            @endphp
                                        @endif
                                        </li>
                                        <tr class="{{ $stripe }}">
                                            <td class="w-1/4 text-left py-1 px-4">
                                                <select class="form-select block w-full mt-1  rounded-md"
                                                    name="funders[]">
                                                    @foreach ($awards as $award)
                                                        <option value="{{ $award->id }}"
                                                            @if ($funder->pivot->funding_award_id == $award->id) selected @endif>
                                                            {{ $award->reference_number }}
                                                            ({{ $award->organisation->abbreviation }})
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
                        <label class="block">
                            <table class="min-w-full">
                                <thead class="">
                                    <tr>
                                        <th class="w-3/4 text-left" colspan=4>
                                            <span class="text-gray-700 p-2 font-semibold text-lg">Related
                                                Identifiers</span>
                                        </th>
                                        <th class="w-1/4 text-right py-3 px-4 font-semibold text-sm">
                                            <span class=" text-blue-500" href="">Add </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stripe = $stripeLight;
                                        $item = 0;
                                    @endphp

                                    @foreach ($dataset->related_identifiers as $rel_id)
                                        @if ($stripe == $stripeDark)
                                            @php
                                                $stripe = $stripeLight;
                                            @endphp
                                        @else
                                            @php
                                                $stripe = $stripeDark;
                                            @endphp
                                        @endif
                                        @php
                                            $item++;
                                        @endphp
                                        <tr class="{{ $stripe }}">
                                            <td class="w-1/5 text-left py-3 px-4">
                                                <select class="form-select block w-full mt-1  rounded-md"
                                                    name="new_related_identifiers[{{ $item }}]['identifier_type_id']">
                                                    <option value="DOI"
                                                        @if ($rel_id->identifier_type_id == 'DOI') selected @endif>DOI
                                                    </option>
                                                    <option value="ISBN"
                                                        @if ($rel_id->identifier_type_id == 'ISBN') selected @endif>ISBN
                                                    </option>
                                                    <option value="ISSN"
                                                        @if ($rel_id->identifier_type_id == 'ISSN') selected @endif>ISSN
                                                    </option>
                                                    <option value="PMID"
                                                        @if ($rel_id->identifier_type_id == 'PMID') selected @endif>PMID
                                                    </option>
                                                    <option value="PURL"
                                                        @if ($rel_id->identifier_type_id == 'PURL') selected @endif>PURL
                                                    </option>
                                                    <option value="URL"
                                                        @if ($rel_id->identifier_type_id == 'URL') selected @endif>URL
                                                    </option>
                                                    <option value="URN"
                                                        @if ($rel_id->identifier_type_id == 'URN') selected @endif>URN
                                                    </option>
                                                </select>
                                            </td>
                                            <td class="w-1/5 text-left py-3 px-4">
                                                <select class="form-select block w-full mt-1  rounded-md"
                                                    name="new_related_identifiers[{{ $item }}]['relation_type_id']">
                                                    @foreach ($relation_types as $relation_type)
                                                        <option value="{{ $relation_type->id }}"
                                                            @if ($rel_id->relation_type_id == $relation_type->id) selected @endif>
                                                            {{ $relation_type->type_value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="w-1/5 text-left py-3 px-4">
                                                <input type="text"
                                                    name="new_related_identifiers[{{ $item }}]['identifier']"
                                                    class="form-input mt-1 block rounded-md w-full"
                                                    value="{{ $rel_id->identifier }}" />
                                            </td>
                                            <td class="w-1/5 text-left py-3 px-4">
                                                <input type="text"
                                                    name="new_related_identifiers[{{ $item }}]['name']"
                                                    class="form-input mt-1 block rounded-md w-full"
                                                    value="{{ $rel_id->name }}" />
                                            </td>
                                            <td class="w-1/5 text-right py-3 px-4">
                                                <input type="hidden"
                                                    name="new_related_identifiers[{{ $item }}]['metadata_document_id']"
                                                    value="{{ $dataset->id }}">

                                                <span class=" text-red-500" href="">Delete</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
