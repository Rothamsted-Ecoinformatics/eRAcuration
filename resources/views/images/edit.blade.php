@extends('layouts.app')
@section('content')
    <div class="card">
        <form action="/images/{{ $image->id }}" method="POST">
            <div class="card-header bg-blue-600 text-center">
                <div class="flex flex-row items-center justify-between">
                    <div class="basis-3/4 p-3">
                        <h1 class="text-4xl text-slate-100 text-bold justify-center p-8 ">Edit an image
                        </h1>
                    </div>
                    <div class="basis-1/4 p-3">
                        <button type="Cancel"
                            class="float-right inline-block  px-5 py-3 ml-3 rounded-lg transform transition 
                            bg-gray-500 hover:bg-gray-400 hover:-translate-y-0.5 focus:ring-gray-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 
                            active:bg-gray-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg">Cancel</button>
                        <button type="submit"
                            class="float-right inline-block  px-5 py-3 ml-3  rounded-lg transform transition 
                            bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 
                            active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg">Submit</button>
                    </div>
                </div>
            </div>
            <div class="flex flex-row border-b-2 border-rose-700 ">

                <div class="flex basis-1/3 justify-center bg-slate-400">

                    <div>

                        
                        <ul class="p-5">

                            <li><span class="text-lg font-bold uppercase text-slate-600">Experiment</span>:
                                {{ $image->exptID }}</li>
                            <li><span class="text-lg font-bold uppercase text-slate-600">Image Type</span>:
                                {{ $image->imageType }}</li>
                            <li><span class="text-lg font-bold uppercase text-slate-600">width</span>: {{ $image->width }}
                            </li>
                            <li><span class="text-lg font-bold uppercase text-slate-600">height</span>:
                                {{ $image->height }}
                            </li>

                        </ul>
<ul>
                            <li><img class="" src="{{ $image->URL }}"></li>
                        </ul>
                    </div>
                </div>

                <div class="flex basis-1/3 justify-center pt-5 pb-5">
                    <div>
                        @csrf
                        @method('PUT')

                        <label class="block pt-2">
                            <span class="text-gray-700">Filename</span>
                            <input type="text" class="form-input mt-1  pt-2 rounded-md w-full"
                                value="{{ $image->filename }}" name="filename" />
                        </label>
                        <label class="block pt-2">
                            <span class="text-gray-700">Caption for the image</span>
                            <textarea class="form-textarea mt-1 block rounded-lg w-full h-24" rows="3"
                                name="caption">{{ $image->caption }}</textarea>
                        </label>
                        <label class="block pt-2">
                            <span class="text-gray-700">Description</span>
                            <textarea class="form-textarea mt-1 block rounded-lg w-full h-24" rows="3"
                                name="description">{{ $image->description }}</textarea>
                        </label>
                        <label class="block pt-2">
                            <span class="text-gray-700">Credits</span>
                            <select class="form-select block w-full rounded-lg mt-1" name="authorID">
                                <option value="1">Rothamsted Research</option>
                                <option value="2">Other</option>
                            </select>
                        </label>

                    </div>
                </div>

                <div class="flex basis-1/3 justify-center pt-5 ">
                    <div>
                        @if ($image->orientation == 'landscape')
                            @php
                                $landscape = ' selected';
                                $portrait = ' ';
                            @endphp
                        @else
                            @php
                                $landscape = ' ';
                                $portrait = ' selected';
                            @endphp
                        @endif
                        <label class="block pt-2">
                            <span class="text-gray-700">Orientation</span>
                            <select class="form-select block w-full rounded-lg mt-1" name="orientation">
                                <option value="landscape" {{ $landscape }}>Landscape</option>
                                <option value="portrait" {{ $portrait }}>Portrait</option>
                            </select>
                        </label>
                        <fieldset class="block">
                            <legend class="text-gray-700  mt-3">For the Galleries</legend>
                            @if ($image->forWWW)
                                @php
                                    $checkedYes = ' checked ';
                                    $checkedNo = '';
                                @endphp
                            @else
                                @php
                                    $checkedYes = '';
                                    $checkedNo = ' checked ';
                                @endphp
                            @endif
                            <div class="">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input class="form-radio" type="radio" {{ $checkedYes }} name="forWWW"
                                            value="1" />
                                        <span class="ml-2">Yes</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input class="form-radio" type="radio" {{ $checkedNo }} name="forWWW"
                                            value="0" />
                                        <span class="ml-2">No</span>
                                    </label>
                                </div>

                            </div>
                        </fieldset>
                        <fieldset class="block">
                            <legend class="text-gray-700 mt-3">Accepted</legend>
                            @if ($image->isReviewed)
                                @php
                                    $revcheckedYes = ' checked ';
                                    $revcheckedNo = '';
                                @endphp
                            @else
                                @php
                                    $revcheckedYes = '';
                                    $revcheckedNo = ' checked ';
                                @endphp
                            @endif
                            <div class="">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input class="form-radio" type="radio" {{ $revcheckedYes }} name="isReviewed"
                                            value="1" />
                                        <span class="ml-2">Yes</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input class="form-radio" type="radio" {{ $revcheckedNo }} name="isReviewed"
                                            value="0" />
                                        <span class="ml-2">No</span>
                                    </label>
                                </div>

                            </div>
                        </fieldset>
                        
                    </div>
                </div>

            </div>
        </form>
        <div class="border-b-2 border-rose-700 bg-orange-300  px-5">
            <h2 class="text-3xl  uppercase font-extrabold pt-5">Help</h2>
            <p></p>
        </div>

    </div>
@endsection
