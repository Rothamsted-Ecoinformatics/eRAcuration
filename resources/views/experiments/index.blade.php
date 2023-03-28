@extends('layouts.app')
@section('content')
    <div class="card">

        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-center">
                <div class="p-5">
                    <h1 class="text-4xl text-slate-100 text-bold   ">eRA-curation - Experiments
                    </h1>
                </div>

            </div>
        </div>

        <div class="card-body">
            <livewire:add.expt />
            <livewire:eratables.experiment-datatables
            searchable="folder, name"
            />

        </div>
    </div>


@endsection
