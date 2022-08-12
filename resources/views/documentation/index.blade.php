@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <h1 class="text-4xl text-slate-100 text-bold justify-center p-9 ">About eRAcuration</h1>
        </div>
        <div class="card-body">
            <h2 class="text-3xl uppercase font-extrabold pt-5  px-5">Goals</h2>
            <h3 class="text-2xl font-bold pt-5  px-5 text-pink-900">One place for all the eRA and eRAdoc tools</h3>
            <ul class="text-sm text-slate-900 pt-5 px-9 list-disc list-inside">
                <li>Experiments: lists experiments and connect to GLTEN for editing metadata</li>
                <li>Images: Manage images metadata</li>
                <li>Datasets: Edit metadata for the Datasets and Documents DOIs </li>
                <li>Data? Will that be used to assist Raw data?</li>
                <li>Users: view and manage eRAmanga - users having download privileges</li>
                <li>Users: view and manage users requests obtained from eRAmanga</li>
                <li>Users: view and manage users of eRAdata</li>

            </ul>
            <h3 class="text-2xl font-bold pt-5  px-5 text-pink-900">Runs Python Programs</h3>
            <ul class="text-sm text-slate-900 pt-5 px-9 list-disc list-inside">
                <li>Update Metadata</li>
                <li>Mint DOis</li>
                <li>Update Metadata for Experiments</li>
            </ul>
            <h3 class="text-2xl font-bold pt-5  px-5 text-pink-900">Documentation</h3>
        </div>
    </div>
@endsection
