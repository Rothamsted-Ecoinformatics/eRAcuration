@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-center">
                <div class=" p-5">
                    <h1 class="text-4xl text-slate-100 text-bold   ">eRA-curation - Add an image
                    </h1>
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
                <li>And the rename codes that need to be ran. Only once the code has been ran can we use the images.

                <li>Import the resulting csv into the database</li>
            </ul>
        </div>
    </div>
    <div class="border-b-2 border-orange-500 border bg-orange-100  px-5">
        <h2 class="text-3xl  uppercase font-extrabold pt-5"><a name="localHelp"></a> Quick Help</h2>
    </div>
@endsection
