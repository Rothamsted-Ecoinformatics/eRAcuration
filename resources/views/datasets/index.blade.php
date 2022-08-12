@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-between">
                <div class="basis-3/4 p-3">
                    <h1 class="text-4xl text-slate-100 text-bold justify-center p-8 ">eRAcuration Datasets
                    </h1>
                </div>
                <div class="basis-1/4 p-3">
                    <a class="float-right inline-block  px-5 py-3 rounded-lg transform transition 
                    bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 
                    active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg"
                        href="/datasets/create">Add a dataset</a>
                </div>
            </div>
        </div>

        <div class="card-body pt-10">
            <livewire:dataset-datatables  />

        </div>
    </div>

    

    <div class="border-b-2 border-orange-500 border bg-orange-100  px-5">
        <h2 class="text-3xl  uppercase font-extrabold pt-5"><a name="localHelp"></a> Documentation</h2>
        <h3 class="text-2xl  font-bold font-italic ml-3 pb-3">Noteworthy Details</h3>
        <ul>
            <li>I am calling Dataset what is in fact Metadata_document. A dataset is here the metadata that we maintain for
                a dataset or a document. I am using this name as it easier to type.
                The model Dataset points to the table Metadata_document. </li>
        </ul>
        
    </div>
@endsection
