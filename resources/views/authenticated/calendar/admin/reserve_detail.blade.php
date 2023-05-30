@extends('layouts.sidebar')

@section('content')
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-75 m-auto h-75">
    <p><span>{{$date}}日</span><span class="ml-3">リモ{{$part}}部</span></p>
    <div class="h-75 border reserve-area">
      <table class="parson-area">
        <tr class="text-parson">
          <th class="student">ID</th>
          <th class="student">名前</th>
          <th class="student">場所</th>
        </tr>

          @foreach($reservePersons as $reservePerson)
          @foreach($reservePerson->users as $reserveUser)
          <tr class="text-parson2">
          <td class="student">{{$reserveUser->id}}</td>
          <td class="student">{{$reserveUser->over_name}}{{$reserveUser->under_name}}</td>
          <td class="student">リモート</td>
          @endforeach
          @endforeach
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection
