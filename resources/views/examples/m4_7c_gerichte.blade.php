@extends("app")
@section("title")
    m4_7c_gerichte
@endsection
@section("content")
    <div class="container-fluid py-8">
        <div class="prose mb-8">
            <h1>7c) Gerichte</h1>
        </div>
        @if(!empty($gerichte))
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            @foreach($gerichte[0] as $key => $value)
                                <th class="bg-primary">{{ $key }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gerichte as $gericht)
                            <tr>
                                @foreach($gericht as $key => $value)
                                    <td>{{ $value }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="prose">
                <p>Es sind keine Gerichte vorhanden.</p>
            </div>
        @endif
    </div>
@endsection
