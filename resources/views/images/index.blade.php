@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header sticky top-0  bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-between">
                <div class="basis-3/4 p-3">
                    <h1 class="text-bold justify-center p-4 text-3xl text-slate-100">eRAcuration - Images
                    </h1>
                </div>
                <div class="basis-1/4 p-3">
                    <a class="float-right inline-block  px-5 py-3 rounded-lg transform transition
                    bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2
                    active:bg-blue-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg"
                        href="/images/create">Add an image</a>
                </div>
            </div>
        </div>
        <div class="card-body pt-10">
            <livewire:eratables.image-datatables searchable="fileLocation, exptID" />

        </div>
    </div>
    <div class="border-b-2 border-rose-700 bg-orange-100  px-5">
        <h2 class="text-3xl  uppercase font-extrabold pt-5"><a name="localHelp"></a> Quick Help</h2>
        <ul class="text-sm text-slate-900 pt-5 px-9 list-disc list-inside">
            <li>The image in the pink border is present in the intranet version - eRA2018-new</li>
            <li>The image in the green border is present in the WWW. So if image missing, please correct</li>
            <li>Flag: For Galleries: check YES if you want the image to appear in the main media gallery</li>
            <li>Reviewed? </li>

        </ul>
        <h2 class="text-3xl  uppercase font-extrabold pt-5">Documentation</h2>

        <h3 class="text-2xl uppercase font-semibold pt-5">Image location</h3>
        <p>all the images are located in the `images` folder.
        </p>

        <ul class="text-sm text-slate-900 pt-5 px-9 list-disc list-inside">
            <li>`600X400`: a series of standard images in that format</li>
            <li>`banners`: Wide and short images that can be used as banner. Ratio: 4/1 Max width needed is 1200</li>
            <li>`golden`: a selection of nice pictures formatted as 1.618/1 (golden ration)</li>
            <li>`logos`: different official logos for the site</li>
            <li>`metadata`: images related to the experiments and the farms. The structure in images/metadata is the same as
                in the metadata folder. So if you have a folder in metadata make sure he has a folder in images too.</li>
            <li>`people`: pictures of the staff</li>
            <li>`squares`: a selection of nice pictures formatted as squares: useful for twitter</li>
            <li>`stock`: images obtain from stock websites</li>

        </ul>

        <h3 class="text-2xl uppercase font-semibold pt-5">Sizing</h3>
        <p>
            It is nice to have the full size image to work on, and may be so that people can download it. However, the max
            size
            we need is 1200 width. For the web site, there is no need for bigger. <br>

            At the root of the folder are the original images. Each image can be triplicated using scanhandler into the
            following sizes usng the scanhandler tool from eradoc:</p>
        <ul class="text-sm text-slate-900 pt-5 px-9 list-disc list-inside">
            <li>`FullSize`: no modification of the size: just some cropping as you set an orientate the image
            </li>
            <li>`Pages`: set to 300
            </li>
            <li>`Thumbs`: set to 150</li>
        </ul>


        <h3 class="text-2xl uppercase font-semibold pt-5">Naming metadata images</h3>

        <p>The images are organised by folders representing their experiment. Use the name that makes the most sense.
            use hyphens (-), no space, no underscores. Running the Imapge processing tool can give a clue of the name is
            legal or not.
        <h3 class="text-2xl uppercase font-semibold pt-5"> Using images</h3>

        <ul class="text-sm text-slate-900 pt-5 px-9 list-disc list-inside">
            <li>Images marked as isGallery will be automatically incorporated in the media tab of the relevant experiment
            </li>
            <li>Or use the normal way to link these images in a file</li>
            <li>There is a good example of usage of the different sizes images in the _people.php page.
                The different sizes are loaded at different breakpoint so as to appear sharp at all resolutions.</li>
        </ul>


    </div>
@endsection
