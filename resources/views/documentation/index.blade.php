@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-center">
                <div class="p-5">
                    <h1 class="text-bold text-4xl text-slate-100">eRA-curation - Datasets (edit metadata)
                    </h1>
                </div>
            </div>
        </div>
        <p class="m-2 p-2 text-lg font-bold text-red-900"> A place to start for the managment of e-RA, the metadata,
            datasets,
            people, ... </p>
        <div class="flex flex-row">
            <div class="m-2 basis-1/3 justify-center">
                <div class="rounded border-2 border-sky-500 p-2">

                    <h2 class="px-5 pt-5 text-3xl font-bold uppercase">At a glance</h2>
                    <h3 class="text-2l px-7 pt-5 font-bold text-slate-900">Done</h3>
                    <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
                        <li><a class="text-blue-400 hover:text-blue-300 active:bg-blue-900 sm:text-base"
                                href="{{ route('images.index') }}">Images</a> - Manage images metadata</li>
                        <li><a class="text-blue-400 hover:text-blue-300 active:bg-blue-900 sm:text-base"
                                href="{{ route('datasets.index') }}">Datasets</a> - Edit metadata for the Datasets and
                            Documents
                            DOIs </li>
                        <li><a class="text-blue-400 hover:text-blue-300 active:bg-blue-900 sm:text-base"
                                href="{{ route('subjects.index') }}">Keywords</a> - Subjects: add new subjects</li>
                        <li><a class="text-blue-400 hover:text-blue-300 active:bg-blue-900 sm:text-base"
                                href="{{ route('experiments.index') }}">Experiments</a> - list the experiments and make
                            simple
                            edits
                        </li>
                        <li><a class="text-blue-400 hover:text-blue-300 active:bg-blue-900 sm:text-base"
                                href="{{ route('downloads') }}">Downloads</a> - lists the dataset downloads, sorting,
                            searching
                            and
                            exports</li>
                        <li><a class="text-blue-400 hover:text-blue-300 active:bg-blue-900 sm:text-base"
                                href="{{ route('urequests.index') }}">Requests</a> : lists the user requests, sorting,
                            searching
                            and
                            export</li>
                        <li><b>Link to eracurator tool: </b></li>
                        <ul class="list-inside list-decimal px-9 pt-1 text-xs text-slate-900">
                            <li><a class="text-blue-400 hover:text-blue-300 active:bg-blue-900 sm:text-base"
                                    href="http://burdock2/eracurator/cdstage2shamrock2.aspx">CDSTAGE External update</a> :
                                Move
                                Datasets from CDSTAGE to WWW</li>
                            <li><a class="text-blue-400 hover:text-blue-300 active:bg-blue-900 sm:text-base"
                                    href="http://burdock2/eracurator/cdera2shamrock2.aspx">CDERA External update</a> : Move
                                Datasets from CDERA to WWW - METDATA only</li>
                        </ul>
                        <li><b>To update the site once edits have been made: </b></li>
                        <ul class="list-inside list-decimal px-9 pt-1 text-xs text-slate-900">
                            <li>Update Experiments: after change in GLTEN, or here, use app:  <b>\Rothamsted Research\e-RA - Documents\Website maintenance\update eRA website from eraGILBERT</b> - BExpts  </li>
                            <li>Update Metadata : use the app in <b>\Rothamsted Research\e-RA - Documents\Website maintenance\update eRA website from eraGILBERT</b> - CData  </li>
                            <li>Mint DOis: NIC uses DOITools23 to mint information from eraGILBERT</li>
                            <li>After running these apps, use copy.bat to copy over the data to the intranet. </li>
                            <li>Package Datasets: App not ready yet</li>
                        </ul>
                    </ul>
                    <h3 class="text-2l px-7 pt-5 font-bold text-slate-900">Improvements</h3>
                    <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
                        <li>The interface needs a login system</li>
                        <li>Tool to add one image at a time</li>
                        <li>Add files by selecting the file from the repository (fake adding: we only pick up the filename,
                            size and so on)</li>
                        <li><a class="text-blue-400 hover:text-blue-300 active:bg-blue-900 sm:text-base"
                                href="{{ route('updates.index') }}">Updates</a>: an interface to assist with tweeting</li>
                        <li>Data - Will that be used to assist Raw data?</li>
                    </ul>
                    <h3 class="text-2l px-7 pt-5 font-bold text-slate-900">Models that could have a page: </h3>
                    <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
                        <li><a class="text-blue-400 hover:text-blue-300 active:bg-blue-900 sm:text-base"
                                href="#">People</a>:
                            List, add, edit people</li>
                        <li><a class="text-blue-400 hover:text-blue-300 active:bg-blue-900 sm:text-base"
                                href="#">Organisations</a>: List, add, edit organisations</li>
                    </ul>

                </div>
            </div>
            <div class="m-2 flex basis-2/3 justify-center">
                <div class="rounded border-2 border-sky-500 p-2">
                    @include('documentation.images')
                    @include('documentation.styles')
                </div>
            </div>

        </div>
    </div>
@endsection
