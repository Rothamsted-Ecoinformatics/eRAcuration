@extends('layouts.app')
@section('content')
    <form action="/datasets/" method="POST">
        @csrf

        <div class="card">
            <div class="card-header sticky top-0 bg-blue-600 text-center">
                <div class="flex flex-row items-center justify-between">
                    <div class="basis-3/4 p-3">
                        <h1 class="text-bold justify-center p-4 text-3xl text-slate-100">New from Template :
                            {{ $dataset->id }} -
                            {{ $dataset->title }}
                        </h1>
                    </div>
                    <div class="basis-1/4 p-3">
                        <a class="text-grey-400 float-right m-2 inline-block transform rounded-lg bg-blue-500 px-5 py-3 text-sm font-semibold uppercase tracking-wider shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-2 active:bg-blue-900"
                            href="/datasets/{{ $dataset->id }}">Cancel</a>
                        <button
                            class="float-right m-2 inline-block transform rounded-lg bg-blue-500 px-5 py-3 text-sm font-semibold uppercase tracking-wider text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-2 active:bg-blue-900"
                            type="submit">Submit</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- Field in Metadata Documents --}}
                <div class="px-3 text-gray-900 antialiased">
                    <div class="mx-auto max-w-xl py-0 md:max-w-4xl">
                        <input name="templateID" type="hidden" value="{{ $dataset->id }}">
                        <label class="block">
                            <span class="p-2 text-lg font-semibold text-gray-700">Title</span>
                            <input class="form-input mt-1 block w-full rounded-md" name="title" type="text"
                                value="{{ $dataset->title }}" />
                        </label>
                        <label class="block">
                            <span class="p-2 text-lg font-semibold text-gray-700">Title</span>
                            <input class="form-input mt-1 block w-full rounded-md" name="identifier" type="text"
                                value="10.23637/" />
                        </label>
                    </div>
                </div>
            </div>
    </form>
@endsection
