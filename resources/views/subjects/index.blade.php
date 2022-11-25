@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-center">
                <div class="p-5">
                    <h1 class="text-4xl text-slate-100 text-bold   ">Keywords or Subjects
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
    </div>


@endsection
