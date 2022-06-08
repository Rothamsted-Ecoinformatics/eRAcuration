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
  --: not needed in the form
  * : form input started
  **: form input finished 

id : autoincrement
md_id : That will have to be created with a kind of random formula
lte_id : 
URL : will be calculated from expt, shortname and version
identifier: Will need to have a way to check that it exists or not 
identifier_type: List  taken from another table
dstype: list from another table
title
publisher: need to list the organisations
publication_year
grt_id
srt_id
format_id
fa_id
grade
isReady
isExternal
[language]
version
short_name
doi_created
created_at
updated_at
language
SSMA_TimeStamp --}}
            <div class="flex flex-row">
                <div class="basis-1/3 p-3">
                    <div class="border-2 border-slate-400 rounded-xl p-5">
                        <ul>
                            <li class="text-sm text-slate-600"><b>short_name:</b>
                                {{ $dataset->short_name }}</li>
                            <li class="text-sm text-slate-600"><b>Experiment :</b>
                                {{ $dataset->experiment->experiment_name }}
                                ({{ $dataset->experiment->experiment_code }})</li>
                            <li class="text-sm text-slate-600"><b>URL:</b> <a
                                    class="text-blue-900 hover:text-blue-600 visited:text-purple-900"
                                    href="{{ $dataset->URL }}">{{ $dataset->URL }}</a></li>
                            <li class="text-sm text-slate-600"><b>identifier_type:</b> {{ $dataset->identifier_type }}
                            </li>
                            @if ($dataset->identifier_type == 'DOI')
                                <li class="text-sm text-slate-600"><b>identifier :</b> <a
                                        class="text-blue-900 hover:text-blue-600 visited:text-purple-900"
                                        href="https://doi.org/{{ $dataset->identifier }}">
                                        {{ $dataset->identifier }}</a></li>
                            @else
                                <li class="text-sm text-slate-600"><b>identifier :</b> {{ $dataset->identifier }}</li>
                            @endif



                            <li class="text-sm text-slate-600"><b>dstype:</b> {{ $dataset->dstype }}</li>
                            <li class="text-sm text-slate-600"><b>publisher:</b> {{ $dataset->publisher }}</li>
                            <li class="text-sm text-slate-600"><b>publication_year:</b> {{ $dataset->publication_year }}
                            </li>
                            <li class="text-sm text-slate-600" title="General resource type"><b>grt_id:</b>
                                {{ $dataset->grt_id }}</li>
                            <li class="text-sm text-slate-600" title="Specific resource type"><b>srt_id:</b>
                                {{ $dataset->srt_id }}</li>
                            <li class="text-sm text-slate-600"><b>format_id:</b> {{ $dataset->format_id }}</li>
                            <li class="text-sm text-slate-600"><b>fa_id:</b> {{ $dataset->fa_id }}</li>
                            <li class="text-sm text-slate-600"><b>grade:</b> {{ $dataset->grade }}</li>
                            <li class="text-sm text-slate-600"><b>isReady:</b> {{ $dataset->isReady }}</li>
                            <li class="text-sm text-slate-600"><b>isExternal:</b> {{ $dataset->isExternal }}</li>
                            <li class="text-sm text-slate-600"><b>language:</b> {{ $dataset->language }}</li>
                            <li class="text-sm text-slate-600"><b>version:</b> {{ $dataset->version }}</li>
                            <li class="text-sm text-slate-600"><b>doi_created:</b> {{ $dataset->doi_created }}</li>
                            <li class="text-sm text-slate-600"><b>created_at:</b> {{ $dataset->created_at }}</li>
                            <li class="text-sm text-slate-600"><b>updated_at:</b> {{ $dataset->updated_at }}</li>
                            <li class="text-sm text-slate-600"><b>language:</b> {{ $dataset->language }}</li>
                            <li class="text-sm text-slate-600"><b>id:</b> {{ $dataset->id }}</li>
                            <li class="text-sm text-slate-600"><b>md_id:</b> {{ $dataset->md_id }}</li>
                            <li class="text-sm text-slate-600"><b>Keywords:</b>
                                @foreach ($subjects as $subject)
                                    {{ $subject->subject }},
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="basis-2/3 p-3">
                    <div class="border-2 border-slate-400 rounded-xl p-5">
                        <h3 class="text-lg font-bold text-slate-600">Abstract - description_abstract</h3>
                        <div class="text-sm text-slate-800 p-3">
                            
                                
                                {!! \Illuminate\Support\Str::markdown($dataset->description_abstract." ") !!}
                            
                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Table of Content - description_toc</h3>
                        <div class="text-sm text-slate-800 p-3">
                            
                                
                                {!! \Illuminate\Support\Str::markdown($dataset->description_toc." ") !!}
                            
                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Technical Information - description_technical_info</h3>
                        <div class="text-sm text-slate-800 p-3">
                            
                                
                                {!! \Illuminate\Support\Str::markdown($dataset->description_technical_info." ") !!}
                            
                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Quality - description_quality</h3>
                        <div class="text-sm text-slate-800 p-3">
                            
                               
                                {!! \Illuminate\Support\Str::markdown($dataset->description_quality." ") !!}
                            
                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Provenance - description_provenance</h3>
                        <div class="text-sm text-slate-800 p-3">
                            
                                
                                {!! \Illuminate\Support\Str::markdown($dataset->description_provenance." ") !!}
                            
                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Methods - description_methods</h3>
                        <div class="text-sm text-slate-800 p-3">
                            
                                
                                {!! \Illuminate\Support\Str::markdown($dataset->description_methods." ") !!}
                            
                        </div>
                        <h3 class="text-lg font-bold text-slate-600">Other - description_other</h3>
                        <div class="text-sm text-slate-800 p-3">
                            
                                
                                {!! \Illuminate\Support\Str::markdown($dataset->description_other." ") !!}
                            
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
                    </div>
                </div>
                </h3>
            </div>
        </div>
    </div>
@endsection
