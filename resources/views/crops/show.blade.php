@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-between">
                <div class="basis-3/4 p-3">
                    <h1 class="text-4xl text-slate-100 text-bold justify-center p-8">{{ $crop->crop_name }}
                    </h1>
                </div>
                <div class="basis-1/4 p-3">
                    <a class="float-right inline-block px-5 py-3 rounded-lg transform transition bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg"
                        href="/datasets/{{ $crop->id }}/edit">edit</a>
                        
                </div>
            </div>
        </div>
        <div class="card-body">
          
            
        </div>
    </div>
@endsection
