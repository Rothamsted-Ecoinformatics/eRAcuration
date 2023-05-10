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
        <p class="text-lg font-bold text-red-900 m-2 p-2"> A place to start for the managment of e-RA, the metadata,
            datasets,
            people, ... </p>
        <div class="flex flex-row">
            <div class="basis-1/3 justify-center m-2">
                <div class="border-2 border-sky-500 p-2 rounded">


                    <h2 class="px-5 pt-5 text-3xl font-bold uppercase">At a glance</h2>
                    <h3 class="text-2l px-7 pt-5 font-bold text-slate-900">Done or In Progress</h3>
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
                    </ul>
                    <h3 class="text-2l px-7 pt-5 font-bold text-slate-900">Some ideas</h3>
                    <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
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

                    <h3 class="text-2l px-7 pt-5 font-bold text-slate-900">Runs Python Programs</h3>
                    <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
                        <li>Update Metadata : use the app in LOCATION - BExpts, CData... </li>
                        <li>Mint DOis: NIC to use the app in LOCATION</li>
                        <li>Package Datasets: use app in LOCATION</li>
                    </ul>
                </div>
            </div>
            <div class="flex basis-2/3 justify-center m-2">
                <div class="border-2 border-sky-500 p-2 rounded ">
                    @include('documentation.images')
                    @include('documentation.styles')
                </div>
            </div>

        </div>
    </div>
@endsection
