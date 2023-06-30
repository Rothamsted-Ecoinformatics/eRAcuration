@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-center">
                <div class="p-5">
                    <h1 class="text-4xl text-slate-100 text-bold">eRA-curation - Keywords (subjects)
                    </h1>
                </div>

            </div>
        </div>

        <div class="card-body">
            <livewire:add.keyword />
            <livewire:eratables.subject-datatables
            searchable="subject, subject_schemas.name"
            />

        </div>
        <div class="border-b-2 border-orange-500 border bg-orange-100 px-5">
            <h2 class="text-3xl uppercase font-extrabold pt-5"><a name="localHelp"></a> Documentation</h2>

            <p>This is a very simple table. Add the keywords with the simple adding function.
                You can edit the ones already entered, but if you need to change the ontology, please delete and start again. That is easy enough. </p>
            <p>When entering a code: ensure it is only the code that is entered, not the whole URL. It will be obvious anyway if that happens. </p>

        </div>
    </div>


@endsection
