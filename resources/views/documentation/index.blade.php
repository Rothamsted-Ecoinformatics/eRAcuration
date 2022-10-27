@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <h1 class="text-bold justify-center p-9 text-4xl text-slate-100">About eRAcuration</h1>
        </div>
        <div class="card-body">
            <h2 class="px-5 pt-5 text-3xl font-extrabold uppercase">Goals</h2>
            <h3 class="px-5 pt-5 text-2xl font-bold text-pink-900">One place for all the eRA and eRAdoc tools</h3>
            <h4 class="px-7 pt-7 text-xl font-bold text-slate-900">Done or In Progress</h4>
            <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
                <li>Images: Manage images metadata</li>
                <li>Datasets: Edit metadata for the Datasets and Documents DOIs </li>
                <li>Keywords - Subjects: add new subjects</li>
            </ul>
            <h4 class="px-7 pt-7 text-xl font-bold text-slate-900">Some Ideas</h4>
            <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">

                <li>Experiments: lists experiments and connect to GLTEN for editing metadata</li>

                <li>Data - Will that be used to assist Raw data?</li>
                <li>Users: view and manage eRAmanga - users having download privileges</li>
                <li>Users: view and manage users requests obtained from eRAmanga</li>
                <li>Users: view and manage users of eRAdata</li>

            </ul>
            <h3 class="px-5 pt-5 text-2xl font-bold text-pink-900">Runs Python Programs</h3>
            <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
                <li>Update Metadata</li>
                <li>Mint DOis</li>
                <li>Update Metadata for Experiments</li>
            </ul>
            <h3 class="px-5 pt-5 text-2xl font-bold text-pink-900">Documentation</h3>
        </div>
    </div>
@endsection
