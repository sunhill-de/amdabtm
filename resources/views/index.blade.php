@extends('template')

@section('content')
<ul>
 <li><button onclick="location.href='/Import'"><img src="/img/Import.png" /></button></li>
 <li><button onclick="location.href='/Export'"><img src="/img/Export.png" /></button></li>
 <li><button onclick="location.href='/Statistics'"><img src="/img/Statistics.png" /></button></li>
 <li><button onclick="location.href='/Diary'"><img src="/img/Diary.png" /></button></li>
 <li><button onclick="location.href='/Tables'"><img src="/img/Tables.png" /></button></li>
 <li><button onclick="location.href='/Review'"><img src="/img/Review.png" /></button></li>
 <li><button onclick="location.href='/Setting'"><img src="/img/Settings.png" /></button></li>
</ul> 
@endsection