@extends('layouts.app')
@section('content')
    <div class="card">
        <form action="/images/{{ $image->id }}" method="POST">


            <div class="card-header bg-blue-600 text-center">
                <div class="flex flex-row items-center justify-center">
                    <div class="basis-3/4  p-5">
                        <h1 class="text-4xl text-slate-100 text-bold   ">eRA-curation - Edit an image
                        </h1>
                    </div>
                    <div class="basis-1/4 p-5">
                        <button
                            class="float-right ml-3 inline-block transform rounded-lg bg-gray-500 px-5 py-3 text-sm font-semibold uppercase tracking-wider text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-500 focus:ring-opacity-50 focus:ring-offset-2 active:bg-gray-900"
                            type="Cancel">Cancel</button>
                        <button
                            class="float-right ml-3 inline-block transform rounded-lg bg-blue-500 px-5 py-3 text-sm font-semibold uppercase tracking-wider text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-2 active:bg-blue-900"
                            type="submit">Submit</button>
                    </div>
                </div>
            </div>
            <div class="flex  flex-row border-b-2 border-rose-700">
                <div class="flex basis-1/3 justify-center bg-slate-400">
                    <div>
                        <ul class="p-5">
                            <li><span class="text-lg font-bold uppercase text-slate-600">Filename</span>:
                                {{ $image->filename }}</li>
                            <li><span class="text-lg font-bold uppercase text-slate-600">Experiment</span>:
                                {{ $image->experiment_code }}</li>
                            <li><span class="text-lg font-bold uppercase text-slate-600">Image Type</span>:
                                {{ $image->image_type }}</li>
                            <li><span class="text-lg font-bold uppercase text-slate-600">width</span>: {{ $image->width }}
                            </li>
                            <li><span class="text-lg font-bold uppercase text-slate-600">height</span>:
                                {{ $image->height }}
                            </li>
                            <li><span class="text-lg font-bold uppercase text-slate-600" title="Paste this in the SRC attribute of an image tag to display an image in the web site. ">SRC to embed*</span>:
                                images/{{ $image->file_location }}
                            </li>

                        </ul>
                        <ul>
                            <li><img class=""
                                    src="https://www.era.rothamsted.ac.uk/images/{{ $image->file_location }}">https://www.era.rothamsted.ac.uk/images/{{ $image->file_location }}
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="flex basis-2/3 justify-center pt-5 px-5">
                    <div>

                        @csrf
                        @method('PUT')

                        <div class="mt-3 p-2 text-lg font-semibold text-blue-700">Once saved, the changes will be incorporated into the web site when the BEXPT tool is run</div>

                        <label class="">
                            <span class="mt-3 p-2 text-lg font-semibold text-gray-700">Caption for the image</span>
                            <textarea class="form-textarea  w-full  rounded-lg" name="caption" rows="2">{{ $image->caption }}</textarea>
                        </label>
                        <label class="">
                            <span class="mt-3 p-2 text-lg font-semibold text-gray-700"  title="A larger description might be needed sometimes. This field gives flexibility">Description*</span>
                            <textarea class="form-textarea  w-full  rounded-lg" name="description" rows="3">{{ $image->description }}</textarea>
                        </label>
                        <label class="">
                            <span class="mt-3 p-2 text-lg font-semibold text-gray-700" title="Please ask to add more options if needed">Credits*</span>
                            <select class="form-select  w-full  rounded-lg" name="person_id">
                                <option value="1">Rothamsted Research</option>
                                <option value="2">Other</option>
                            </select>
                        </label>

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
                        <label class="">
                            <span class="mt-3 p-2 text-lg font-semibold text-gray-700">Orientation</span>
                            <select class="form-select  w-full  rounded-lg" name="orientation">
                                <option value="landscape" {{ $landscape }}>Landscape</option>
                                <option value="portrait" {{ $portrait }}>Portrait</option>
                            </select>
                        </label>
                        <fieldset class="">
                            <legend class="mt-3 p-2 text-lg font-semibold text-gray-700" title="Toggles display of image in the media tab">For the Media Tab* </legend>
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
                                        <input class="form-radio" name="forWWW" type="radio" value="1"
                                            {{ $checkedYes }} />
                                        <span class="ml-2">Yes -  display this in the media tab</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input class="form-radio" name="forWWW" type="radio" value="0"
                                            {{ $checkedNo }} />
                                        <span class="ml-2">No - only available for inline images or other use</span>
                                    </label>
                                </div>

                            </div>
                        </fieldset>
                        <fieldset class="">
                            <legend class="mt-3 p-2 text-lg font-semibold text-gray-700" title="When you are happy with captionand description, please toggle to YES">Accepted</legend>
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
                                        <input class="form-radio" name="isReviewed" type="radio" value="1"
                                            {{ $revcheckedYes }} />
                                        <span class="ml-2">Yes - this can be used online, in a media tab or another page. </span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input class="form-radio" name="isReviewed" type="radio" value="0"
                                            {{ $revcheckedNo }} />
                                        <span class="ml-2">No - do not use on the web site - considered: not reviewed, or not deemed good enough</span>
                                    </label>
                                </div>

                            </div>
                        </fieldset>
                    </div>
                </div>

            </div>
        </form>
        <div class="border-b-2 border-rose-700 bg-orange-300 px-5">
            <h2 class="pt-5 text-3xl font-extrabold uppercase">Help</h2>
            <p></p>
        </div>

    </div>
@endsection
