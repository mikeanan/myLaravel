@extends("layouts.main")


@section("title", "標題列")


@section("sidebar")
    @parent

    <h2>這是子視圖的側邊欄</h2>
@endsection



@section("content_1")
    <h2>測試子視圖的內容: {{$from_server}}</h2>

    @if($year == "2015")
        目前的日期:{{date("Y-M-D")}}
    @else

        @foreach($students as $student)
            {{$student}}<br>
        @endforeach

    @endif

@endsection


