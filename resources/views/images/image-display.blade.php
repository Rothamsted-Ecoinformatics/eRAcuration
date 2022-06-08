<div class="flex space-x-1 justify-around">
    
    @if ($imageType == 'metadata')
    <a class="p-1 rounded-lg transform transition bg-rose-500 hover:bg-rose-400 hover:-translate-y-0.5 focus:ring-rose-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 active:bg-rose-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg sm:text-base"    target = "_blank" href="http://local-info.rothamsted.ac.uk/eRA/era2018-new/images/{{ $imageType }}/{{ $exptID }}/{{ $filename }}"><img src="http://local-info.rothamsted.ac.uk/eRA/era2018-new/images/{{ $imageType }}/{{ $exptID }}/{{ $filename }}" width="75"></a>
    <a class="p-1 rounded-lg transform transition bg-lime-500 hover:bg-lime-400 hover:-translate-y-0.5 focus:ring-lime-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 active:bg-lime-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg sm:text-base"    target = "_blank" href="http://www.era.rothamsted.ac.uk/images/{{ $imageType }}/{{ $exptID }}/{{ $filename }}"><img src="http://www.era.rothamsted.ac.uk/images/{{ $imageType }}/{{ $exptID }}/{{ $filename }}" width="75"></a>
     
    @else
    <a class="p-1 rounded-lg transform transition bg-rose-500 hover:bg-rose-400 hover:-translate-y-0.5 focus:ring-rose-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 active:bg-rose-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg sm:text-base "    target = "_blank" href="http://local-info.rothamsted.ac.uk/eRA/era2018-new/images/{{ $imageType }}/{{ $filename }}"><img src="http://local-info.rothamsted.ac.uk/eRA/era2018-new/images/{{ $imageType }}/{{ $filename }}" width="75"></a>
    <a class="p-1 rounded-lg transform transition bg-lime-500 hover:bg-lime-400 hover:-translate-y-0.5 focus:ring-lime-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 active:bg-lime-900 uppercase tracking-wider font-semibold text-sm text-white shadow-lg sm:text-base"    target = "_blank" href="http://www.era.rothamsted.ac.uk/images/{{ $imageType }}/{{ $exptID }}/{{ $filename }}"><img src="http://www.era.rothamsted.ac.uk/images/{{ $imageType }}/{{ $exptID }}/{{ $filename }}" width="75"></a>
    
    @endif
    
</div>