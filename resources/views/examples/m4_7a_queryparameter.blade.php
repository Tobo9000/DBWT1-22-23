@extends("app")
@section("title")
    m4_7a_queryparameter
@endsection
@section("content")
    <div class="container-fluid py-8">
        <div class="sm:w-1/2 prose">
            <h3>Der Wert von ?name lautet: {{ $name }}</h3>
        </div>
    </div>
@endsection
