@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-between">
                <div class="basis-3/4 p-3">
                    <h1 class="text-4xl text-slate-100 text-bold justify-center p-8 ">eRAcuration - Updates
                    </h1>
                </div>
                <div class="basis-1/4 p-3">
                    <a class="float-right inline-block  px-5 py-3 rounded-lg transform transition
                    bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2
                    active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg"
                        href="/updates/create">Add an update</a>
                </div>
            </div>
        </div>
        <div class="card-body pt-10">
            <p>TOD0: make table of the updates</p>

        </div>
    </div>
    <div class="border-b-2 border-rose-700 bg-orange-100  px-5">


        <h2 class="text-3xl  uppercase font-extrabold pt-5">Documentation</h2>
        <h3 class="text-2xl uppercase font-semibold pt-5">Feature request</h3>
        <ul class="text-sm text-slate-900 pt-5 px-9 list-disc list-inside">
            <li>https://christoph-rumpel.com/2018/11/sending-laravel-notifications-via-twitter</li>
            <li>An update has a date, title, image, and message</li>
            <li>Could they be twitter several times? </li>
            <li>Could have more than one images: so image becomes a Many to Many</li>
            <li></li>
            <li>can we have more than one image per tweet: yes..
            <li>The updates could be edited until tweeted.</li>
            <li>it be that the updates are tweeted and could be tweeted again another day? so there would be more than one date for tweets</li>

        </ul>



    </div>
@endsection
