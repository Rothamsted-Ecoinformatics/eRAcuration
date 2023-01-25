@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-between">
                <div class="basis-3/4 p-3">
                    <h1 class="text-4xl text-slate-100 text-bold justify-center p-8 ">eRA-curation - users
                    </h1>
                </div>

            </div>
        </div>

        <div class="card-body pt-10 ml-2">
            <ul>
            @foreach ($newmarkers as $newmarker)

<li><strong>{{ $newmarker->position }}</strong> - {{ $newmarker->fname }} {{ $newmarker->lname }}</li>

            @endforeach
            </ul>

        </div>
    </div>
@endsection
