@extends('layouts.app')
@section('content')
    <div class="card">

        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-center">
                <div class="basis-3/4 p-5">
                    <h1 class="text-bold text-4xl text-slate-100">eRA-curation - Images
                    </h1>
                </div>
                <div class="basis-1/4 p-5">
                    <a class="float-right inline-block transform rounded-lg bg-blue-500 px-5 py-3 text-sm font-semibold uppercase tracking-wider text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-2 active:bg-blue-900"
                        href="#addImage">Add an image</a>
                </div>
            </div>
        </div>
        <div class="card-body pt-10">
            <livewire:eratables.image-datatables searchable="fileLocation, exptID" />

        </div>
    </div>

    <a name="localHelp"></a>

    <div class="border-b-2 border-rose-700 bg-orange-100 px-5">
         @include('documentation.images')

    </div>
@endsection
