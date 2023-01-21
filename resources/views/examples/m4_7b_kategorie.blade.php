@extends("app")
@section("title")
    m4_7b_kategorie
@endsection
@section("content")
    <div class="container-fluid py-8">
        <div class="prose mb-8">
            <h1>7b) Kategorien</h1>
        </div>
        <ul class="list-disc mx-8">
            @foreach($kategorien as $kategorie)
                @if($loop->index % 2 == 1)
                    <li class="font-bold">{{ $kategorie->name }}</li>
                @else
                    <li>{{ $kategorie->name }}</li>
                @endif
            @endforeach
        </ul>
        <div class="divider my-8">ODER</div>
        @if(!empty($gerichte_mit_kategorie))
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                    <tr>
                        @foreach($gerichte_mit_kategorie[0] as $key => $value)
                            <th class="bg-primary">{{ $key }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gerichte_mit_kategorie as $kategorie)
                        @if($loop->index % 2 == 1)<tr class="font-bold">
                        @else<tr>
                        @endif
                            @foreach($kategorie as $key => $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="prose">
                <p>Es sind keine Kategorien vorhanden.</p>
            </div>
        @endif
    </div>
@endsection
