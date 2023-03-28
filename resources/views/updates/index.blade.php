@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-center">
                <div class="p-5">
                    <h1 class="text-4xl text-slate-100 text-bold   ">eRA-curation - News and tweets
                    </h1>
                </div>

            </div>
        </div>
        <div class="card-body p-3">
            <p>This is an idea - in case we need to have a way to keep the updates and keep track of what has been sent.
                In GIT: issue #42
            </p>

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
            <li>can we have more than one image per tweet: yes..</li>
            <li>How to upload files: https://harrk.dev/uploading-files-with-laravel/</li>
            <li>The updates could be edited until tweeted.</li>
            <li>it be that the updates are tweeted and could be tweeted again another day? so there would be more than one date for tweets</li>

        </ul>



    </div>
@endsection
