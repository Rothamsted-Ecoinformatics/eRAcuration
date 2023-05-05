@extends('layouts.app')
@section('content')
    <div class="card">

        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-center">
                <div class="p-5">
                    <h1 class="text-bold text-4xl text-slate-100">eRA-curation - Requests
                    </h1>
                </div>

            </div>
        </div>

        <div class="card-body">

            <livewire:eramangatables.urequest-datatables searchable="ltes, lname, institution, country, IP" />

        </div>
        <div class="border-b-2 border-orange-500 border bg-orange-100  px-5">
            <h2 class="text-3xl  uppercase font-extrabold pt-5"><a name="localHelp"></a> Documentation</h2>

            <p>Codes: Here are the translations of the codes</p>
            <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
                <li><b>COL</b>: A colleague</li>
                <li><b>SEO</b>: Search Engine result</li>
                <li><b>TWT</b>: Twitter</li>
                <li><b>SNO</b>: Social Network Other</li>
                <li><b>DOI</b>: Link in Paper (DOI)</li>
                <li><b>OTHER</b>: Other and the reason </li>
            </ul>

        </div>
    </div>
@endsection
