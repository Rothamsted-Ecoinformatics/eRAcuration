<a name="images"></a>
<h2 class="px-5 pt-5 text-3xl font-bold uppercase">Images</h2>
<h3 class="px-7 pt-5 text-2l font-bold text-slate-900">In short</h3>
<ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
    <li>Images location: All the images are located in the `images` folder. Upload them in <b>INTRANET-SERVER\era2023\images\</b></li>
    <li>Images in the pink border are in the eracuration storage folder - that might be relevant later. </li>
    <li>Images in the green border are present on the WWW interface. So if image missing, please correct</li>
    <li>Flag is_www: For Galleries, or Media tab: check YES or 1 if you want the image to appear in the main media gallery for the experiment</li>
    <li>Flag is_reviewed: say yes when the image is ready to be displayed on the live site: the captions are correct or not</li>
    <li>No Flags? Some images have no flags or all flags set to no: that is OK: they might be included in pages -
        Some images could be in there but not displayed in the Gallery or reviewed, but still needed as they might
        have been put there for a page.</li>
    <li>Naming conventions: The images are organised by folders representing their experiment or type.
        Use the name that makes the most sense.
            use hyphens (-), no space, no underscores. The image processing tool will rename the images.
</ul>
<h3 class="px-7 pt-5 text-2l font-bold text-slate-900">Images folder - types</h2>

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

<h3 class="px-7 pt-5 text-2l font-bold text-slate-900">Sizing</h3>
<p>
    It is nice to have the full size image to work on, and may be so that people can download it. However, the max
    size we need is 1200 width. For the web site, there is no need for bigger. <br>

    At the root of the folder are the original images. Each image can be triplicated using scanhandler into the
    following sizes using the scanhandler tool from eradoc:</p>
<ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
    <li>`FullSize`: no modification of the size: just some cropping as you set an orientate the image
    </li>
    <li>`Pages`: set to 300
    </li>
    <li>`Thumbs`: set to 150</li>
</ul>
<p>
<h3 class="px-7 pt-5 text-2l font-bold text-slate-900"> Using images</h3>

<ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
    <li>Images marked as is_www (for Media Tab) will be incorporated in the media tab of the relevant experiment
    </li>
    <li>Or use the normal way to link these images in a file - a src code is available for you to copy</li>
    <li>There is a good example of usage of the different sizes images in the _people.php page.
        The different sizes are loaded at different breakpoint so as to appear sharp at all resolutions.</li>
</ul>
<a name="addImage"></a>
<h3 class="px-7 pt-5 text-2l font-bold text-slate-900">Add Images</h3>
<ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
    <li>Save images in the "INTRANET-SERVER/eRA/era2023/images" folder under the relevant folder (metadata
        for image that is relevant to the experiments or the stations, banners, people and so on) </li>
    <li>Run GImages.exe in the website maintenace (--- \Rothamsted Research\e-RA - Documents\Website maintenance\update eRA website from eraGILBERT )app folder to rename and insert images</li>
    <li>Only when image can be seen in this table, is it safe to use in a web page. </li>
</ul>

<h3 class="px-7 pt-5 text-2l  font-bold text-slate-900">Improvements? </h3>

<ul class="list-inside list-disc px-9 pt-5 text-sm text-slate-900">
    <li>Make the intranet images read from storage folder</li>
    <li>Make function to import images into the storage folder and edit captions and so on</li>
    <li>Think about how we transfer images from the storage folder to the internet</li>
</ul>
