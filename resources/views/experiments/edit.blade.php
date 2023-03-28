@extends('layouts.app')
@section('content')
    <form action="/experiments/{{ $experiment->id }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header sticky top-0 bg-blue-600 text-center">
                <div class="flex flex-row items-center justify-between">
                    <div class="basis-3/4 p-3">
                        <h1 class="text-bold justify-center p-4 text-3xl text-slate-100">Edit : {{ $experiment->id }} -
                            {{ $experiment->name }}
                        </h1>
                    </div>
                    <div class="basis-1/4 p-3">
                        <a class="text-grey-400 float-right m-2 inline-block transform rounded-lg bg-blue-500 px-5 py-3 text-sm font-semibold uppercase tracking-wider shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-2 active:bg-blue-900"
                            href="/experiments">Cancel</a>
                        <button
                            class="float-right m-2 inline-block transform rounded-lg bg-blue-500 px-5 py-3 text-sm font-semibold uppercase tracking-wider text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-2 active:bg-blue-900"
                            type="submit">Submit</button>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <input class="form-text w-full rounded-lg" type="text" wire:model="name"
                    placeholder="Name of the experiment">

<p>TO BE CONTINUED</p>


            </div>
        </div>
    </form>
@endsection
