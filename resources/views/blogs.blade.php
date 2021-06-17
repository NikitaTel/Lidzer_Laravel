@extends('layouts.app')

@section('title-block')
    Blogs
@endsection

@section('content')

    <section class="blogs-section">
        @foreach($blogs->reverse() as $blog)
           <div class="blog">
               <div class="date">{{$blog->created_at->format('d.m.Y')}}</div>
               <h2>{{$blog->blog_heading}},</h2>
               <span class="dashes"></span>
               <p>{{$blog->blog_content}}</p>
               <div style="margin-top: 20px;">
                   <img src="{{asset('/storage/' . $blog->blog_image  ) }}" alt="">
               </div>
           </div>
        @endforeach
    </section>
@endsection
