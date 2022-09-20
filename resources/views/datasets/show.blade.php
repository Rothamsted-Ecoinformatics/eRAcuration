@extends('layouts.app')
@section('content')
    @php

        $stripeDark = 'bg-slate-300';
        $stripeLight = 'bg-slate-100';
    @endphp
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-between">
                <div class="basis-3/4 p-3">
                    <h1 class="text-4xl text-slate-100 text-bold justify-center p-8 ">{{ $dataset->title }}
                    </h1>
                </div>
                <div class="basis-1/4 p-3">
                    <a class="float-right inline-block  px-5 py-3 rounded-lg transform transition
                    bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2
                    active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg"
                        href="/datasets/{{ $dataset->id }}/edit">edit</a>
                    <a class="float-right inline-block px-5 py-3 rounded-lg transform transition
                    bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2
                    active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg"
                        href="/datasets/{{ $dataset->id }}/copy">Use as Template</a>
                </div>
            </div>
        </div>
        <div class="card-body">


            <div class="flex flex-row">
                <div class="basis-1/3 p-3">
                    <div class="border-2 border-slate-400 rounded-xl p-5">
                        <ul>
                            <li class="text-sm text-slate-600"><b>id:</b>
                                {{ $dataset->id }}</li>
                            <li class="text-sm text-slate-600"><b>short_name:</b>
                                {{ $dataset->short_name }}</li>
                            <li class="text-sm text-slate-600"><b>Experiment :</b>
                                {{ $dataset->experiment_id }} - {{ $dataset->experiment->name }}
                                ({{ $dataset->experiment->code }})</li>
                            <li class="text-sm text-slate-600"><b>URL:</b> <a
                                    class="text-blue-900 hover:text-blue-600 visited:text-purple-900"
                                    href="{{ $dataset->url }}">{{ $dataset->url }}</a></li>
                            <li class="text-sm text-slate-600"><b>identifier_type:</b> {{ $dataset->dataset_type }}
                            </li>
                            @if ($dataset->identifier_type == 'DOI')
                                <li class="text-sm text-slate-600"><b>identifier :</b> <a
                                        class="text-blue-900 hover:text-blue-600 visited:text-purple-900"
                                        href="https://doi.org/{{ $dataset->identifier }}">
                                        {{ $dataset->identifier }}</a></li>
                            @else
                                <li class="text-sm text-slate-600"><b>identifier :</b> {{ $dataset->identifier }}</li>
                            @endif
                            <li class="text-sm text-slate-600"><b>identifier_type:</b> {{ $dataset->identifier_type }}</li>
                            <li class="text-sm text-slate-600"><b>publisher:</b>
                                {{ $dataset->publisher->name }}</li>
                            <li class="text-sm text-slate-600"><b>Authors:</b>
                                @foreach ($dataset->authors as $author)
                                    @if ($loop->last)
                                        {{ $author->given_name }} {{ $author->family_name }}.
                                    @else
                                        {{ $author->given_name }} {{ $author->family_name }},
                                    @endif
                                @endforeach
                            </li>
                            <li class="text-sm text-slate-600"><b>or Authoring organisations:</b>
                                @foreach ($dataset->authorOrgs as $authorOrg)
                                    @if ($loop->last)
                                        {{ $authorOrg->name }} ({{ $authorOrg->abbreviation }} ).
                                    @else
                                        {{ $authorOrg->name }} ({{ $authorOrg->abbreviation }} ),
                                    @endif
                                @endforeach
                            </li>
                            <li class="text-sm text-slate-600"><b>Publication year:</b> {{ $dataset->publication_year }}
                            </li>
                            <li class="text-sm text-slate-600" title="General resource type"><b>General resource type:</b>
                                {{ $dataset->general_resource_type->type_value }}</li>
                            <li class="text-sm text-slate-600" title="General resource type"><b>Format:</b>
                                <span class="uppercase">{{ $dataset->document_format_id }}</span>
                            </li>
                            <li class="text-sm text-slate-600" title="Specific resource type"><b>Specific resource type:</b>
                                {{ $dataset->specific_resource_type->type_value }}</li>
                            <li class="text-sm text-slate-600"><b>Grade:</b> {{ $dataset->grade }}</li>
                            <li class="text-sm text-slate-600"><b>isReady:</b> {{ $dataset->is_ready }}</li>
                            <li class="text-sm text-slate-600"><b>isExternal:</b> {{ $dataset->is_external }}</li>
                            <li class="text-sm text-slate-600"><b>language:</b> {{ $dataset->lang }}</li>
                            <li class="text-sm text-slate-600"><b>version:</b> {{ $dataset->version }}</li>
                            <li class="text-sm text-slate-600"><b>doi_created:</b> {{ $dataset->doi_created }}</li>
                            <li class="text-sm text-slate-600"><b>language:</b> {{ $dataset->language }}</li>
                            <li class="text-sm text-slate-600"><b>id:</b> {{ $dataset->id }}</li>
                            <li class="text-sm text-slate-600"><b>Keywords:</b>
                                @foreach ($dataset->subjects as $subject)
                                    @if ($loop->last)
                                        {{ $subject->subject }}.
                                    @else
                                        {{ $subject->subject }},
                                    @endif
                                @endforeach
                            </li>
                            <li class="text-sm text-slate-600"><b>Dates:</b>
                                @foreach ($dataset->dates as $date)
                                    {{ $date->type_value }} - {{ $date->history->document_date }} <br />
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="basis-2/3 p-3">
                    <div class="border-2 border-slate-400 rounded-xl p-5">
                        <h3 class="text-lg font-bold text-slate-600">Files provided</h3>

                        <table class="min-w-full">
                            <thead class="text-gray-700 bg-slate-300 font-semibold text-sm">
                                <tr>
                                    <th class="w-1/2 text-left">
                                        <span class="p-2 ">File Name</span>
                                    </th>
                                    <th class="w-1/2 text-left py-3 px-4 ">
                                        <span class="p-2 ">Caption </span>
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
                                    <tr class="{{ $stripe }}">
                                        <td class="w-1/2 text-left py-2 px-2">{{ $file->file_name }} </td>
                                        <td class="w-1/2 text-left py-2 px-2">{{ $file->title }} </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h3 class="text-lg font-bold text-slate-600">Contributors</h3>
                        <table class="min-w-full">
                            <thead class="text-gray-700 bg-slate-300 font-semibold text-sm">
                                <tr>
                                    <th class="w-1/2 text-left">
                                        <span class="p-2 ">Name</span>
                                    </th>
                                    <th class="w-1/2 text-left py-3 px-4 ">
                                        <span class="p-2 ">Role </span>
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
                                        <td class="w-1/2 text-left py-2 px-2">{{ $contributor->given_name }}
                                            {{ $contributor->family_name }} </td>
                                        <td class="w-1/2 text-left py-2 px-2">
                                            {{ $contributor->pivot->person_role_type->type_value }} </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h3 class="text-lg font-bold text-slate-600">Abstract - description_abstract</h3>
                        <div class="text-sm text-slate-800 p-3">


                            {!! \Illuminate\Support\Str::markdown($dataset->description_abstract . ' ') !!}

                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Table of Content - description_toc</h3>
                        <div class="text-sm text-slate-800 p-3">


                            {!! \Illuminate\Support\Str::markdown($dataset->description_toc . ' ') !!}

                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Technical Information - description_technical_info</h3>
                        <div class="text-sm text-slate-800 p-3">


                            {!! \Illuminate\Support\Str::markdown($dataset->description_technical_info . ' ') !!}

                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Quality - description_quality</h3>
                        <div class="text-sm text-slate-800 p-3">


                            {!! \Illuminate\Support\Str::markdown($dataset->description_quality . ' ') !!}

                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Provenance - description_provenance</h3>
                        <div class="text-sm text-slate-800 p-3">


                            {!! \Illuminate\Support\Str::markdown($dataset->description_provenance . ' ') !!}

                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Methods - description_methods</h3>
                        <div class="text-sm text-slate-800 p-3">


                            {!! \Illuminate\Support\Str::markdown($dataset->description_methods . ' ') !!}

                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Other - description_other</h3>
                        <div class="text-sm text-slate-800 p-3">


                            {!! \Illuminate\Support\Str::markdown($dataset->description_other . ' ') !!}

                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Copyrith Text - rights_text</h3>
                        <div class="text-sm text-slate-800 p-3">
                            {{ $dataset->rights_text }}
                        </div>

                        <h3 class="text-lg font-bold text-slate-600">Copyright Licence - rights_licence</h3>
                        <div class="text-sm text-slate-800 p-3">
                            {{ $dataset->rights_licence }}
                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Copyright Licence URL- rights_licence_uri</h3>
                        <div class="text-sm text-slate-800 p-3">
                            {{ $dataset->rights_licence_uri }}
                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Related Identifiers</h3>
                        {{-- id
metadata_document_id
relation_type_id
identifier_type_id
identifier
name
old_md_id --}}
                        @php
                            $LinkURL = '';
                        @endphp
                        @foreach ($dataset->related_identifiers as $rel_id)
                            @if ($rel_id->identifier_type_id == 'DOI')
                                @php
                                    $LinkURL = 'https://doi.org/' . $rel_id->identifier;
                                @endphp
                            @else
                                @php
                                    $LinkURL = $rel_id->identifier;
                                @endphp
                            @endif
                            <li> {{ $rel_id->relation_type->type_value }} - <a
                                    class="text-blue-800 hover:text-blue-700 hover:underline visited:text-pink-700"
                                    href="{{ $LinkURL }}"> {{ $LinkURL }}</a> - {{ $rel_id->name }}
                        @endforeach


                        <h3 class="text-lg font-bold text-slate-600">Funders</h3>
                        <div class="text-sm text-slate-800 p-3">
                            <ul>
                                @foreach ($dataset->funders as $funder)
                                    <li class="list-disc">{{ $funder->reference_number }} : <a class="text-blue-600  "
                                            href="{{ $funder->uri }}">{{ $funder->title }}</a>
                                        ({{ $funder->organisation->abbreviation }})
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                </h3>
            </div>
        </div>
    </div>
@endsection
