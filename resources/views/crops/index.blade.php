@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-between">
                <div class="basis-3/4 p-3">
                    <h1 class="text-4xl text-slate-100 text-bold justify-center p-8">eRAcuration Crops
                    </h1>
                </div>
                <div class="basis-1/4 p-3">
                    <a class="float-right inline-block px-5 py-3 rounded-lg transform transition bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg"
                        href="/crops/create">Add a crop</a>
                </div>
            </div>
        </div>

        <div class="card-body pt-10">
            <livewire:eratables.crop-datatables searchable="crop_name, historic_name, scientific_name" />

        </div>
    </div>



    <div class="border-b-2 border-orange-500 border bg-orange-100 px-5">
        <h2 class="text-3xl uppercase font-extrabold pt-5"><a name="localHelp"></a> Documentation</h2>
        <h3 class="text-2xl font-bold font-italic ml-3 pb-3">Features</h3>
        <ul>
            <li>Date</li>
            <li>Comment</li>
            <li>Image - possibly with upload - image will then be in the image database </li>
            <li>So before that, we need to have the input image feature</li>
        </ul>

    </div>
@endsection
