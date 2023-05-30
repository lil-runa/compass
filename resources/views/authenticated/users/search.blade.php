@extends('layouts.sidebar')

@section('content')
<div class="search_content w-100 border d-flex">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border one_person">
      <div class="search-menu">
        <span class="search-span">ID : </span><span class="search-span2">{{ $user->id }}</span>
      </div>
      <div class="search-menu"><span class="search-span">名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span class="search-span2">{{ $user->over_name }}</span>
          <span class="search-span2">{{ $user->under_name }}</span>
        </a>
      </div>
      <div class="search-menu">
        <span class="search-span">カナ : </span>
        <span class="search-span2">({{ $user->over_name_kana }}</span>
        <span class="search-span2">{{ $user->under_name_kana }})</span>
      </div>
      <div class="search-menu">
        @if($user->sex == 1)
        <span class="search-span">性別 : </span><span class="search-span2">男</span>
        @else
        <span class="search-span">性別 : </span><span class="search-span2">女</span>
        @endif
      </div>
      <div class="search-menu">
        <span class="search-span">生年月日 : </span><span class="search-span2">{{ $user->birth_day }}</span>
      </div>
      <div class="search-menu">
        @if($user->role == 1)
        <span class="search-span">権限 : </span><span class="search-span2">教師(国語)</span>
        @elseif($user->role == 2)
        <span class="search-span">権限 : </span><span class="search-span2">教師(数学)</span>
        @elseif($user->role == 3)
        <span class="search-span">権限 : </span><span class="search-span2">講師(英語)</span>
        @else
        <span class="search-span">権限 : </span><span class="search-span2">生徒</span>
        @endif
      </div>
      <div class="search-menu">
        @if($user->role == 4)
        <span class="search-span">選択科目 : </span>
        <span class="search-span2">
         @foreach($user->subjects as $subject)
         {{$subject->subject}}
         @endforeach
        </span>
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area w-25 border">
    <p class="searchTitle">検索</p>
    <div class="">
      <div>
        <input type="text" class="free_word" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div class="searchCategory">
        <label class="CategoryTitle">カテゴリ</label>
        <select form="userSearchRequest" name="category" class="category">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div class="searchCategory">
        <label class="CategoryTitle">並び替え</label>
        <select name="updown" form="userSearchRequest" class="category">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="">
        <p class="search_conditions"><span>検索条件の追加</span></p>
        <div class="search_conditions_inner">
          <div>
            <label class="CategoryTitle">性別</label><br>
            <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
          </div>
          <div>
            <label class="CategoryTitle">権限</label><br>
            <select name="role" form="userSearchRequest" class="category">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>
          <div class="selected_engineer">
            <label class="CategoryTitle">選択科目</label><br>
            @foreach($subjects as $subject)
          <div class="subject-select">
            <input type="checkbox" name="subject[]" form="userSearchRequest" value="{{ $subject->id }}">
            <label>{{ $subject->subject }}</label>
          </div>
          @endforeach
          </div>
        </div>
      </div>
      <div>
        <input type="submit" name="search_btn" value="検索" form="userSearchRequest" class="search_btn">
      </div>
            <div>
        <input type="reset" value="リセット" form="userSearchRequest" class="reset">
      </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
@endsection
