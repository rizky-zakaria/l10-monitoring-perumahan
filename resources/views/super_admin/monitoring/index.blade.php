@extends('super_admin.templates.layouts')
@section('content')
    <div class="main-content">
        {{-- <video width="720" height="480" controls>
            <source src="{{ url('http://10.32.250.233:8080/') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video> --}}
        <iframe src="http://10.32.250.233:8080/" width="600" height="400"></iframe>
    </div>
@endsection
