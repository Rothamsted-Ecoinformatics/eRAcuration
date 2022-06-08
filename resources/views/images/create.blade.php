@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-between">
                <div class="basis-3/4 p-3">
                    <h1 class="text-4xl text-slate-100 text-bold justify-center p-8 ">Add and Image
                    </h1>
                </div>
                <div class="basis-1/4 p-3">
                    <a class="float-right inline-block  px-5 py-3 rounded-lg transform transition 
                    bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 
                    active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg"
                        href="/images">Save</a>
                </div>
            </div>
        </div>
        <div class="card-body px-9 ">
            <h2 class="text-3xl font-extrabold pt-5 border-t px-5">Bulk Processing</h2>
            <ul class="px-9 py-5 text-sm text-grey-800 italic list-decimal  border-l-2  ">
                <li>Save images in the "INTRANET-SERVER/eRA/era2018-new/images" folder under the relevant folder (metadata
                    for image that is relevant to the experiments or the stations, banners, people and so on) </li>
                <li>Run <a
                        class="border-2 border-transparent hover:border-blue-500 hover:bg-blue-100 hover:shadow-lg text-blue-600 rounded-lg px-3 py-1"
                        href="http://local-info.rothamsted.ac.uk/eRA/era2018-new/zdevProcessImages.php">the image
                        processing tool</a></li>
                <li>Import the resulting csv into the database</li>
            </ul>
        </div>
    </div>
    <div class="border-b-2 border-orange-500 border bg-orange-100  px-5">
        <h2 class="text-3xl  uppercase font-extrabold pt-5"><a name="localHelp"></a> Quick Help</h2>
    </div>
@endsection
