@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-center">
                <div class="p-5">
                    <h1 class="text-4xl text-slate-100 text-bold ">eRA-curation - Datasets (edit metadata)
                    </h1>
                </div>

            </div>
        </div>
        <div class="card-body p-5">
            <h2 class="px-5 pt-5 text-3xl font-extrabold uppercase">Goals</h2>
            <h3 class="px-5 pt-5 text-2xl font-bold text-pink-900">One place for all the eRA and eRAdoc tools</h3>
            <h4 class="px-7 pt-7 text-xl font-bold text-slate-900">Done or In Progress</h4>
            <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
                <li>Images: Manage images metadata</li>
                <li>Datasets: Edit metadata for the Datasets and Documents DOIs </li>
                <li>Keywords - Subjects: add new subjects</li>
                <li>Experiments - list the experiments and make simple edits</li>
                <li>Downloads: lists the dataset downloads, sorting, searching and exports</li>
                <li>Requests: lists the user requests, sorting, searching and export</li>
            </ul>
            <h4 class="px-7 pt-7 text-xl font-bold text-slate-900">Some Ideas</h4>
            <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">

                <li>Updates: an interface to assist with tweeting</li>
                <li>Data - Will that be used to assist Raw data?</li>


            </ul>
            <h3 class="px-5 pt-5 text-2xl font-bold text-pink-900">Runs Python Programs</h3>
            <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
                <li>Update Metadata</li>
                <li>Mint DOis</li>
                <li>Update Metadata for Experiments</li>
            </ul>
            <p>It would be nice to link them from here, but the tools are available as CLIs in the datacite folder</p>

            <h3 class="px-5 pt-5 text-2xl font-bold text-pink-900">Documentation</h3>

            <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
                <li>A place to link to all documentation documents and sites</li>
            </ul>
        </div>
    </div>
@endsection
