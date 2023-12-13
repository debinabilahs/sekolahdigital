@foreach($breadcrumbs as $breadcrumb)
        <li class="breadcrumb-item active">{{ $breadcrumb }}</li>
        {{-- <li class="breadcrumb-item"><a href="{{ route($breadcrumb) }}">{{ $breadcrumb }}</a></li> --}}
    
@endforeach