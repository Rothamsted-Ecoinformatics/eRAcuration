@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-between">
                <div class="basis-3/4 p-3">
                    <h1 class="text-4xl text-slate-100 text-bold justify-center p-8 ">Create a new Subject (Keyword)
                    </h1>
                </div>
                <div class="basis-1/4 p-3">
                    <a href="/subjects"
                        class="float-right inline-block  px-5 py-3 mx-2 rounded-lg transform transition
                    bg-gray-500 hover:bg-gray-400 hover:-translate-y-0.5 focus:ring-gray-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2
                    active:bg-gray-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg">Cancel</a>
                    <button type="submit"
                        class="float-right inline-block  px-5 py-3 mx-2 rounded-lg transform transition
                    bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2
                    active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="border-b-2 border-rose-700">
        <h2 class="text-3xl uppercase font-extrabold pt-5  px-5">DEVELOPMENT Process</h2>
        <div class="p-5 text-sm text-rose-900 grid grid-cols-3 gap-4">

            <div class="border-2 border-slate-400 rounded-xl p-5 ">
                <h2 class="text-lg font-bold uppercase">To do </h2>
                <ul class="list-disc list-inside">
<li>Import the subject <table></table></li>
                    <li>Build the models and the relationships. </li>


                </ul>
            </div>
            <div class="border-2 border-slate-400 rounded-xl p-5">
                <h2 class="text-lg font-bold uppercase">doing</h2>
                <ul class="list-disc list-inside">

                </ul>
            </div>
            <div class="border-2 border-slate-400 rounded-xl p-5">
                <h2 class="text-lg font-bold uppercase">done</h2>
                <ul class="list-disc list-inside">


                </ul>
            </div>
        </div>
    </div>

    <div class="border-b-2 border-rose-700 bg-orange-300  px-5">
        <h2 class="text-3xl  uppercase font-extrabold pt-5">Documentation</h2>
        <h3 class="text-2xl  font-bold font-italic border-b-2 border-lime-500 ml-3 pb-3">Noteworthy Details</h3>
        <ul>
            <li>I am calling Dataset what is in fact Metadata_document. A dataset is here the metadata that we maintain for
                a dataset or a document. I am using this name as it easier to type.
                The model Dataset points to the table Metadata_document. </li>
        </ul>
        <h3 class="text-2xl  font-bold font-italie border-b-2 border-lime-500 ">Help</h3>
        <ul>
            <li>
            </li>
        </ul>
    </div>
@endsection
