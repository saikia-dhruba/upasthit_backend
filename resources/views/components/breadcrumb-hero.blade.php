{{--
    This is the reusable hero section for all inner pages.
    It expects two variables:
    - $title: The main heading for the page.
    - $breadcrumbs: An array of breadcrumb links.
--}}
<div class="bg-breadcrumb">
    {{-- The animation elements --}}
    <ul class="orbs">
        <li></li> <li></li> <li></li> <li></li> <li></li>
        <li></li> <li></li> <li></li> <li></li> <li></li>
    </ul>

    <div class="container text-center pt-5 pb-1" style="max-width: 900px;">
        {{-- Use the dynamic $title variable --}}
        <h1 class="text-white display-4 mb-3 wow fadeInDown" data-wow-delay="0.1s">{{ $title }}</h1>

        {{-- Dynamically generate the breadcrumbs --}}
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($loop->last)
                    {{-- The last breadcrumb is always the active page --}}
                    <li class="breadcrumb-item active text-primary">{{ $breadcrumb['name'] }}</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
                @endif
            @endforeach
        </ol>
    </div>
</div>
