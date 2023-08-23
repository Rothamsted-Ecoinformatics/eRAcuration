@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-center">
                <div class="p-5">
                    <h1 class="text-4xl text-slate-100 text-bold">eRA-curation - Users
                    </h1>
                </div>

            </div>
        </div>
        <div class="card-body pt-10 ml-2">

       <ul>
        <li><a  class="text-xl font-bold text-blue-600 hover:text-orange-600 focus:text-red-600 active:text-orange-700" href="{{ route('urequests.index') }}">List the Requests</a></li>
        <li><a  class="text-xl font-bold text-blue-600 hover:text-orange-600 focus:text-red-600 active:text-orange-700" href="{{ route('downloads') }}">List the Downloads</a></li>
       </ul>

        </div>
    </div>
@endsection
