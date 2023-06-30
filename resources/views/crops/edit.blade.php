@extends('layouts.app')
@section('content')
<form action="/datasets/{{ $dataset->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-between">
                <div class="basis-3/4 p-3">
                    <h1 class="text-4xl text-slate-100 text-bold justify-center p-8">Edit : {{ $dataset->title }}
                    </h1>
                </div>
                <div class="basis-1/4 p-3">
                    
                        <button type = "submit" class="float-right inline-block px-5 py-3 rounded-lg transform transition bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg">Submit</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            <div class="antialiased text-gray-900 px-6">
                <div class="max-w-xl mx-auto py-12 md:max-w-4xl">
                    <label class="block">
                        <span class="text-gray-700">Crop Name</span>
                        <input type="text" name="crop_name" class="form-input mt-1 block rounded-md w-full"
                            value="{{ $crop->crop_name }}" />
                    </label>
                    
                </div>
                
            </div>

        </div>
    </div>
</form>
@endsection
