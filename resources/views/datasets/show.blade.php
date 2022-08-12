@extends('layouts.app')
@section('content')
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
                    <a class="float-right inline-block  px-5 py-3 rounded-lg transform transition 
                    bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 
                    active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg"
                        href="/datasets/{{ $dataset->id }}/copy">Use as Template</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- Field in Metadata Documents



general_resource_type_id
specific_resource_type_id
version
lang
is_ready
grade
is_external
short_name
dataset_type
url
identifier
identifier_type
doi_created
title
rights_text
rights_licence_uri
rights_licence
description_abstract
description_methods
description_toc
description_technical_info
description_quality
description_provenance
description_other
old_id --}}
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
                                    href="{{ $dataset->URL }}">{{ $dataset->url }}</a></li>
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

                            document_format_id

                            <li class="text-sm text-slate-600"><b>identifier_type:</b> {{ $dataset->identifier_type }}</li>
                            <li class="text-sm text-slate-600"><b>publisher:</b>
                                {{ $dataset->publisher->name }}</li>
                            <li class="text-sm text-slate-600"><b>Auhors:</b>
                                @foreach ($authors as $author)
                                    @if ($loop->last)
                                        {{ $author->given_name }} {{ $author->family_name }}.
                                    @else
                                        {{ $author->given_name }} {{ $author->family_name }},
                                    @endif
                                @endforeach
                            </li>
                            <li class="text-sm text-slate-600"><b>or Auhoring organisations:</b>
                                @foreach ($authorOrgs as $authorOrg)
                                    @if ($loop->last)
                                        {{ $authorOrg->name }} ({{ $authorOrg->abbreviation }} ).
                                    @else
                                        {{ $authorOrg->name }} ({{ $authorOrg->abbreviation }} ),
                                    @endif
                                @endforeach
                            </li>
                            <li class="text-sm text-slate-600"><b>publication_year:</b> {{ $dataset->publication_year }}
                            </li>
                            <li class="text-sm text-slate-600" title="General resource type"><b>General resource type:</b>
                                {{ $dataset->general_resource_type->type_value }}</li>
                            <li class="text-sm text-slate-600" title="General resource type"><b>Format:</b>
                                <span class="uppercase">{{ $dataset->document_format_id }}</span>
                            </li>
                            <li class="text-sm text-slate-600" title="Specific resource type"><b>Specific resource type:</b>
                                {{ $dataset->specific_resource_type->type_value }}</li>
                            <li class="text-sm text-slate-600"><b>grade:</b> {{ $dataset->grade }}</li>
                            <li class="text-sm text-slate-600"><b>isReady:</b> {{ $dataset->is_ready }}</li>
                            <li class="text-sm text-slate-600"><b>isExternal:</b> {{ $dataset->is_external }}</li>
                            <li class="text-sm text-slate-600"><b>language:</b> {{ $dataset->lang }}</li>
                            <li class="text-sm text-slate-600"><b>version:</b> {{ $dataset->version }}</li>
                            <li class="text-sm text-slate-600"><b>doi_created:</b> {{ $dataset->doi_created }}</li>
                            <li class="text-sm text-slate-600"><b>language:</b> {{ $dataset->language }}</li>
                            <li class="text-sm text-slate-600"><b>id:</b> {{ $dataset->id }}</li>
                            <li class="text-sm text-slate-600"><b>Keywords:</b>
                                @foreach ($subjects as $subject)
                                    @if ($loop->last)
                                        {{ $subject->subject }}.
                                    @else
                                        {{ $subject->subject }},
                                    @endif
                                @endforeach
                            </li>
                            <li class="text-sm text-slate-600"><b>Dates:</b>
                                @foreach ($dates as $date)
                                    {{ $date->type_value }} - {{ $date->history->document_date }} <br />
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="basis-2/3 p-3">
                    <div class="border-2 border-slate-400 rounded-xl p-5">
                        <h3 class="text-lg font-bold text-slate-600">Files provided</h3>
                        <table>
                            <thead>
                                <tr>
                                    <td>File Name</td>
                                    <td>Caption</td>
                                </tr>
                            </thead>
                            @foreach ($files as $file)
                                <tr>
                                    <td>{{ $file->file_name }} </td>
                                    <td>{{ $file->title }} </td>
                                </tr>
                            @endforeach

                        </table>
                        <h3 class="text-lg font-bold text-slate-600">Contributors</h3>
                        <table>
                            <thead>
                                <tr>
                                    <td>Role</td>
                                    <td>Name</td>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contributors as $contributor)
                                    <tr>
                                        <td>{{ $contributor->pivot->person_role_type_id }} </td>
                                        <td>{{ $contributor->given_name }} {{ $contributor->family_name }} </td>
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
                        <h3 class="text-lg font-bold text-slate-600">Funders</h3>
                        <div class="text-sm text-slate-800 p-3">
                            <ul>
                                @foreach ($funders as $funder)
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
