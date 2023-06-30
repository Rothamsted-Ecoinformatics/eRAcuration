@extends('layouts.app')
@section('content')
    <div class="card">

        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-center">
                <div class="p-5">
                    <h1 class="text-4xl text-slate-100 text-bold">eRA-curation - Experiments
                    </h1>
                </div>

            </div>
        </div>

        <div class="card-body">
            <p class="m-2 p-2 text-lg font-bold text-red-900"> Run BExpts after changes </p>
            <livewire:eratables.experiment-datatables
            searchable="folder, name"
            />

        </div>
        <div class="border-b-2 border-orange-500 border bg-orange-100 px-5">
            <h2 class="text-3xl uppercase font-extrabold pt-5"><a name="localHelp"></a> Documentation</h2>

            <ul>
                <li>Simple edits are possible as usual</li>
                <li>To add or delete experiments: please use the database:
                    this should not happen very often.  so because we do not add
                    experiments often and cannot add them using that app, I have removed the facility to delete an experiment
                    becasue that would be too easy. </li>

            </ul>

        </div>
    </div>


@endsection
