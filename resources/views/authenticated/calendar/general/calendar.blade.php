@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <div class="w-75 m-auto border" style="border-radius:5px;">

      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
</div>
<!-- モーダル -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
      <div class="w-100">
        <div class="modal-day w-50 m-auto">
          <span>予約日:</span><span class="getDate" ></span>
          <input type="hidden" class="test" name="getDate" value="" form="deleteParts">
        </div>
        <div class="modal-part w-50 m-auto pt-3 pb-3">
          <span>時間:リモ</span><span class="getPart"></span><span>部</span>
          <input type="hidden" class="test-part" name="getPart" value="" form="deleteParts">
        </div>
        <div class="modal-confirm w-50 m-auto pt-3 pb-3">
          <p class="" name="" >上記の予約をキャンセルしてもよろしいですか？</p>
        </div>
        <div class="w-50 m-auto edit-modal-btn d-flex">
          <a class="js-modal-close btn btn-primary d-block" href="">閉じる</a>
          <input type="submit" class="btn btn-danger d-inline-block" value="キャンセル" form="deleteParts">
        </div>
      </div>
  </div>
</div>
@endsection
