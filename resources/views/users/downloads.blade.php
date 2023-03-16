@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-between">
                <div class="basis-3/4 p-3">
                    <h1 class="text-4xl text-slate-100 text-bold justify-center p-8 ">eRA-curation - Downloads
                    </h1>
                </div>

            </div>
        </div>

        <div class="card-body">

            <livewire:eramangatables.download-datatables
            searchable="DOI, fullname, institution, dldate, country, IP"
            />

        </div>
    </div>
@endsection
