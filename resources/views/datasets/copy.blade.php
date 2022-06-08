@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-between">
                <div class="basis-3/4 p-3">
                    <h1 class="text-4xl text-slate-100 text-bold justify-center p-8 ">New Item from "{{ $dataset->title }}" as template
                    </h1>
                </div>
                <div class="basis-1/4 p-3">
                    <a class="float-right inline-block  px-5 py-3 rounded-lg transform transition 
                    bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 
                    active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg"
                        href="/datasets">Save</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- Field in Metadata Documents
  --: not needed in the form
  * : form input started
  **: form input finished 

-- id : autoincrement
-- md_id : That will have to be created with a kind of random formula
* lte_id : 
-- URL : will be calculated from expt, shortname and version
* identifier: Will need to have a way to check that it exists or not 
* identifier_type: List  taken from another table
** dstype: list from another table
** title
* publisher: need to list the organisations
** publication_year
** grt_id
srt_id
** format_id
fa_id
grade
isReady
isExternal
[language]
version
rights_text
rights_licence_uri
rights_licence
** description_toc
** description_technical_info
** description_quality
** description_provenance
** description_methods
** description_abstract
** description_other
short_name
doi_created
created_at
updated_at
language
SSMA_TimeStamp --}}
<p>This is like the edit form, but all fiels are editable and it will go to the store procedure not the update procedure<p>
            <div class="antialiased text-gray-900 px-6">
                <div class="max-w-xl mx-auto py-12 md:max-w-4xl">
                    <label class="block">
                        <span class="text-gray-700">Title</span>
                        <input type="text" name="title" class="form-input mt-1 block rounded-md w-full"
                            value="{{ $dataset->title }}" />
                    </label>
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                        <div class="grid grid-cols-1 gap-6">
                            
                            <label class="block">
                                <span class="text-gray-700">Select Experiment</span>
                                <select class="form-select block w-full mt-1  rounded-md" name="lte_id">

                                    @foreach ($experiments as $experiment)
                                        <option value="{{ $experiment->experiment_id }}"
                                            @if ($dataset->lte_id == $experiment->experiment_id) selected @endif>
                                            {{ $experiment->experiment_name }} ({{ $experiment->experiment_code }})
                                        </option>
                                    @endforeach
                                </select>
                            </label>

                            <label class="block">
                                <span class="text-gray-700">Identifier</span>
                                <input type="text" name="identifier" class="form-input mt-1 block rounded-md w-full"
                                    placeholder="Please enter the identifier" />
                                <div class="text-gray-700 text-sm font-thin font-italic bg-yellow-100 p-2">This is the DOI,
                                    or ISBN or anything else. </div>
                            </label>
                            <label class="block">
                                <span class="text-gray-700">Identifier Type</span>
                                <select class="form-select block w-full mt-1  rounded-md" name="identifier_type">
                                    <option>DOI</option>
                                    <option>TODO URL</option>
                                </select>
                            </label>
                           

                            <label class="block">
                                <span class="text-gray-700">Publisher</span>
                                <select class="form-select block w-full mt-1  rounded-md" name="identifier_type">
                                    <option>TODO Rothamsted Research</option>
                                    <option>TODO ...</option>
                                </select>
                                <div class="text-gray-700 text-sm font-thin font-italic bg-yellow-100 p-2">Lists the
                                    Organisation's table </div>
                            </label>
                            <label class="block">
                                <span class="text-gray-700">Authors</span>
                                <select class="form-multiselect block w-full mt-1   rounded-md" multiple="" name="authors">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </label>
                            <label class="block">
                                <span class="text-gray-700">or Authoring Organisations</span>
                                <select class="form-multiselect block w-full mt-1   rounded-md" multiple="" name="authors">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </label>
                            <label class="block">
                                <span class="text-gray-700">Contributors</span>
                                <select class="form-multiselect block w-full mt-1   rounded-md" multiple=""
                                    name="contributors">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </label>


                        </div>
                        <div class="grid grid-cols-1 gap-6">
                            <label class="block">
                                <span class="text-gray-700">Short Name</span>
                                <input type="text" name="shortname" class="form-input mt-1 block rounded-md w-full"
                                    value="{{ $dataset->short_name }}" />
                                <div class="text-gray-700 text-sm font-thin font-italic bg-yellow-100 p-2">Folder name</div>
                            </label>
                            <label class="block rounded-md">
                                <span class="text-gray-700">Version</span>
                                <input type="number" class="form-input mt-1 block rounded-md w-full" name="version"
                                    value="" />
                            </label>
                            <label class="block">
                                <span class="text-gray-700">Publication Year</span>
                                <select class="form-select block w-full mt-1  rounded-md" name="publication_year">
                                    @php
                                        $yearSelected = ' ';
                                    @endphp
                                    @for ($year = 2010; $year < 2025; $year++)
                                        @if ($year == 2022)
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
                                <div class="text-gray-700 text-sm font-thin font-italic bg-yellow-100 p-2">Lists years 1950
                                    >>> </div>
                            </label>
                            <label class="block">
                                <span class="text-gray-700">Dataset Access Type</span>
                                <select class="form-select block w-full mt-1  rounded-md" name="dstype">
                                    <option value="OA">OA</option>
                                    <option value="Frictionless">Frictionless</option>
                                    <option value="Other">Other</option>
                                </select>
                            </label>

                            <label class="block">
                                <span class="text-gray-700">Format</span>
                                <select class="form-select block w-full mt-1  rounded-md" name="format_id">
                                    <option value="1">html</option>
                                    <option value="2">doc</option>
                                    <option value="3">txt</option>
                                    <option value="4">pdf</option>
                                    <option value="5">xml</option>
                                    <option value="6">json</option>
                                    <option value="7">csv</option>
                                    <option value="8">tab</option>
                                    <option value="9">xls</option>
                                    <option value="10">docx</option>
                                    <option value="11" selected>xlsx</option>
                                    <option value="12">jpg</option>
                                    <option value="13">gif</option>
                                    <option value="14">png</option>

                                </select>
                            </label>
                            <label class="block">
                                <span class="text-gray-700">Resource General Type</span>
                                <select class="form-select block w-full mt-1  rounded-md" name="grt_id">
                                    <option value="4">Dataset</option>

                                    <option value="12">Text</option>
                                </select>
                            </label>

                            <label class="block">
                                <span class="text-gray-700">Resource Specific Type</span>
                                <select class="form-select block w-full mt-1  rounded-md" name="srt_id">
                                    <option value="1">Book</option>
                                    <option value="2">Book Chapter</option>
                                    <option value="3">Manual</option>
                                    <option value="4">Report</option>
                                    <option value="5" selected>Crop yield data</option>
                                    <option value="6">Web resource</option>
                                    <option value="7">Crop nutrient data</option>
                                    <option value="8">Species observation data</option>
                                    <option value="9">Field plot map</option>
                                    <option value="10">Rainfall data</option>
                                    <option value="11">Soil data</option>
                                    <option value="12">Experiment details</option>
                                    <option value="13">Treatment details</option>
                                    <option value="14">Disease data</option>
                                    <option value="15">Temperature data</option>
                                    <option value="16">30 year mean weather data</option>
                                    <option value="17">Weather Data</option>
                                </select>
                            </label>
                            <label class="block">
                                <span class="text-gray-700">Keywords</span>
                                <ul>
                                    @foreach ($subjects as $subject)
                                        <li>{{ $subject->subject }}</li>
                                    @endforeach
                                </ul>
                                <select class="select2-multiple form-control block w-full mt-1   rounded-md"
                                    multiple="subjects" name="subjects">
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->subject_id }}" class="uppercase">
                                            {{ $subject->subject }}</option>
                                    @endforeach




                                </select>
                                <p>See also Select2 multiple livewire component</p>
                            </label>
                            <label class="block">
                                <span class="text-gray-700">Document Dates</span>
                                <p>Here I suggest having a table with the dates already created, and a button to add another
                                    dates. When updated, automatic updated date added</p>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="max-w-4xl mx-auto py-12">
                    <h2 class="text-2xl font-bold">Associated Files</h2>
                    <p>Here I suggest having a table with the files already created, and a button to add another file. </p>

                    <h2 class="text-2xl font-bold">Abstracts and Descriptions</h2>
                    <label class="block">
                        <span class="text-gray-700">Abstract</span>
                        <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="4" placeholder="This is Compulsory"
                            name="description_abstract">{{ $dataset->description_abstract }}</textarea>
                    </label>

                    <label class="block">
                        <span class="text-gray-700">Table of Content</span>
                        <textarea class="form-textarea mt-1 block w-full h-24  rounded-md " rows="4" placeholder=""
                            name="description_toc">{{ $dataset->description_toc }}</textarea>
                    </label>

                    <label class="block">
                        <span class="text-gray-700">Technical Information</span>
                        <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="4" placeholder=""
                            name="description_technical_info">{{ $dataset->description_technical_info }}</textarea>
                    </label>

                    <label class="block">
                        <span class="text-gray-700">Quality Assurance</span>
                        <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="4" placeholder=""
                            name="description_quality">{{ $dataset->description_quality }}</textarea>
                    </label>

                    <label class="block">
                        <span class="text-gray-700">Provenance</span>
                        <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="4" placeholder=""
                            name="description_provenance">{{ $dataset->description_provenance }}</textarea>
                    </label>

                    <label class="block">
                        <span class="text-gray-700">Methods</span>
                        <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="4" placeholder=""
                            name="description_methods">{{ $dataset->description_methods }}</textarea>
                    </label>


                    <label class="block">
                        <span class="text-gray-700">Other</span>
                        <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="4" placeholder=""
                            name="description_other">{{ $dataset->description_other }}</textarea>
                    </label>

                    <h2 class="text-2xl font-bold">Associated Documents</h2>
                    <p>Here I suggest having a table with the Documents already associated, and a button to add
                        another one.
                    </p>

                    <label class="block">
                        <span class="text-gray-700">Copyright</span>
                        <input type="text" name="title" class="form-input mt-1 block rounded-md w-full" name="rights_text"
                            value="Copyright Rothamsted Research" />
                    </label>

                    <label class="block">
                        <span class="text-gray-700">Copyright Licence URL</span>
                        <input type="text" name="title" class="form-input mt-1 block rounded-md w-full"
                            name="rights_licence_uri" value="http://creativecommons.org/licenses/by/4.0" />
                    </label>

                    <label class="block">
                        <span class="text-gray-700">Copyright Licence</span>
                        <textarea class="form-textarea mt-1 block w-full h-24  rounded-md" rows="3" placeholder=""
                            name="rights_licence">This work is licensed under the terms of the Creative Commons Attribution 4.0 International License</textarea>
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Funding Awards</span>
                        <select class="form-multiselect block w-full mt-1   rounded-md" multiple name="funding">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                        </select>
                    </label>
                </div>
            </div>

        </div>
    </div>
@endsection
