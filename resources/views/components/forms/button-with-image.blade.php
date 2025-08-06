@props(['text', 'imgSrc'=>''])
<button class="btn btn-default flex justify-center items-center gap-1">
    @if($imgSrc)
        <img src="{{ $imgSrc }}" alt="" style="width: 20px"/>
    @endif
    {{ $text }}
</button>
