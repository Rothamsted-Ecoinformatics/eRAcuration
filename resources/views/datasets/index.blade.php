@extends('layouts.app')
@section('content')
    <div class="card">

        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-center">
                <div class="p-5">
                    <h1 class="text-4xl text-slate-100 text-bold">eRA-curation - Datasets (metadata)
                    </h1>
                </div>

            </div>
        </div>

        <div class="card-body">
            <p class="m-2 p-2 font-bold text-red-900">To add a new dataset, please select an existing one and create a new one using the new from template form.
            <br />Run CData after changes </p>
            <livewire:eratables.dataset-datatables  />

        </div>
    </div>



    <div class="border-b-2 border-orange-500 border bg-orange-100 px-5">
        <h2 class="text-3xl uppercase font-extrabold pt-5"><a name="localHelp"></a> Documentation</h2>
        <h3 class="text-2xl font-bold font-italic ml-3 pb-3">Noteworthy Details</h3>
        <ul>
            <li>I am calling Dataset what is in fact Metadata_document. A dataset is here the metadata that we maintain for
                a dataset or a document. I am using this name as it easier to type.
                The model Dataset points to the table Metadata_document. </li>
        </ul>

    </div>
@endsection
