@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <h1 class="text-4xl text-slate-100 text-bold justify-center p-9 ">Example Users</h1>
        </div>
        <div class="card-body">
            <livewire:user-datatables searchable="name, email" exportable />

        </div>
    </div>
@endsection