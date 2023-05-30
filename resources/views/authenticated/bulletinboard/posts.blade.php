@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a class="post_title" href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex">
        @foreach($post->subCategories as $sub_category)
        <input type="submit" name="category_word" class="category_btn" value="{{ $sub_category->sub_category }}" >
        @endforeach
        <div class="d-flex post_status">
          <div class="mr-5">
            <i class="fa fa-comment" post_id="{{ $post->id }}"></i><span class="comment_counts{{ $post->id }}">{{ $post_comment->commentCounts($post->id) }}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area  w-25">
    <div class="">
      <div class="post-create category_btn"><a class="post-create-a" href="{{ route('post.input') }}">投稿</a></div>
      <div class="d-flex">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest" class="keyword">
        <input type="submit" value="検索" form="postSearchRequest" class="keyword_btn">
      </div>
      <input type="submit" name="like_posts" class="category_like" value="いいねした投稿" form="postSearchRequest">
      <input type="submit" name="my_posts" class="category_post" value="自分の投稿" form="postSearchRequest">
      <p class="search-category">カテゴリー検索</p>
      <ul>
        @foreach($categories as $category)
        <li class="main_categories" category_id="{{ $category->id }}"><span class="main_categories_span">{{ $category->main_category }}<span></li>
        <div class="categories_inner">
        @foreach($category->subCategories as $sub_category)
        <input type="submit" name="category_word" class="sub_category_btn" value="{{ $sub_category->sub_category }}" form="postSearchRequest">
         @endforeach
         </div>
        @endforeach
      </ul>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection
