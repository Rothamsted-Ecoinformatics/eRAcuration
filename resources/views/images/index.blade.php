@extends('layouts.app')
@section('content')
    <div class="card">

        <div class="card-header bg-blue-600 text-center">
            <div class="flex flex-row items-center justify-center">
                <div class="basis-3/4 p-5">
                    <h1 class="text-bold text-4xl text-slate-100">eRA-curation - Images
                    </h1>
                </div>
                <div class="basis-1/4 p-5">
                    <a class="float-right inline-block transform rounded-lg bg-blue-500 px-5 py-3 text-sm font-semibold uppercase tracking-wider text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-2 active:bg-blue-900"
                        href="#addImage">Add an image</a>
                </div>
            </div>
        </div>
        <div class="card-body pt-10">
            <livewire:eratables.image-datatables searchable="fileLocation, exptID" />

        </div>
    </div>
    <div class="border-b-2 border-rose-700 bg-orange-100 px-5">
        <h2 class="pt-5 text-3xl font-extrabold uppercase"><a name="localHelp"></a> Quick Help</h2>
        <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">

            <li>The image in the green border is present in the WWW. So if image missing, please correct</li>
            <li>Flag: For Galleries: check YES or 1 if you want the image to appear in the main media gallery</li>
            <li>Reviewed?: say yes when the image is ready to be displayed on the live site </li>
            <li>Some images could be in there but not displayed in the Gallery or reviewed, but still needed as they might
                have been put there for a page.

        </ul>
        <h2 class="pt-5 text-3xl font-extrabold uppercase">Documentation</h2>

        <h3 class="pt-5 text-2xl font-semibold uppercase">Image location</h3>
        <p>All the images are located in the `images` folder.
        </p>

        <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
            <li>`600X400`: a series of standard images in that format</li>
            <li>`banners`: Wide and short images that can be used as banner. Ratio: 4/1 Max width needed is 1200</li>
            <li>`golden`: a selection of nice pictures formatted as 1.618/1 (golden ration)</li>
            <li>`logos`: different official logos for the site</li>
            <li>`metadata`: images related to the experiments and the farms. The structure in images/metadata is the same as
                in the metadata folder. So if you have a folder in metadata make sure he has a folder in images too.</li>
            <li>`people`: pictures of the staff</li>
            <li>`squares`: a selection of nice pictures formatted as squares: useful for twitter</li>
            <li>`stock`: images obtained from stock websites</li>

        </ul>

        <h3 class="pt-5 text-2xl font-semibold uppercase">Sizing</h3>
        <p>
            It is nice to have the full size image to work on, and may be so that people can download it. However, the max
            size
            we need is 1200 width. For the web site, there is no need for bigger. <br>

            At the root of the folder are the original images. Each image can be triplicated using scanhandler into the
            following sizes using the scanhandler tool from eradoc:</p>
        <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
            <li>`FullSize`: no modification of the size: just some cropping as you set an orientate the image
            </li>
            <li>`Pages`: set to 300
            </li>
            <li>`Thumbs`: set to 150</li>
        </ul>

        <h3 class="pt-5 text-2xl font-semibold uppercase">Naming metadata images</h3>

        <p>The images are organised by folders representing their experiment. Use the name that makes the most sense.
            use hyphens (-), no space, no underscores. Running the Imapge processing tool can give a clue of the name is
            legal or not.
        <h3 class="pt-5 text-2xl font-semibold uppercase"> Using images</h3>

        <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
            <li>Images marked as isGallery will be incorporated in the media tab of the relevant experiment
            </li>
            <li>Or use the normal way to link these images in a file - a src code is available for you to copy</li>
            <li>There is a good example of usage of the different sizes images in the _people.php page.
                The different sizes are loaded at different breakpoint so as to appear sharp at all resolutions.</li>
        </ul>
        <a name="addImage"></a>
        <h2 class="pt-5 text-3xl font-extrabold uppercase">Add Images</h2>
        <ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
            <li>Save images in the "INTRANET-SERVER/eRA/era2018-new/images" folder under the relevant folder (metadata
                for image that is relevant to the experiments or the stations, banners, people and so on) </li>
            <li>NIC to run <a
                    class="rounded-lg border-2 border-transparent px-3 py-1 text-blue-600 hover:border-blue-500 hover:bg-blue-100 hover:shadow-lg"
                    href="http://local-info.rothamsted.ac.uk/eRA/era2018-new/zdevProcessImages.php">the image
                    processing tool</a> - on demand or on a friday as part of updates</li>
            <li>NIC to run the relevant  codes that need to be ran.

            <li>NIC to import the resulting csv into the database </li>
            <li>Only when image can be seen in this table, is it safe to use in a web page.  </li>
        </ul>

    </div>
@endsection
