@extends('landing.layouts.header')

@section('title')
    {{Str::limit($data->title_blog,10)}}
@endsection

@section('content')
<section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
            <p>
              <img src="{{asset('images/blog/'.$data->foto)}}" alt="{{$data->foto}}" class="img-fluid">
            </p>
          <h2 class="mb-3">{{$data->title_blog}}</h2>
          <p>{!!$data->body_blog!!}</p>
          <div class="tag-widget post-tag-container mb-5 mt-5">
            <div class="tagcloud">
                <a href="/blog/category/{{$data->category_blog->slug}}" class="tag-cloud-link">{{$data->category_blog->category_blog}}</a>
            </div>
          </div>
          
          {{-- <div class="about-author d-flex p-4 bg-light">
            <div class="bio mr-5">
              <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
            </div>
            <div class="desc">
              <h3>George Washington</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div> --}}
  
  
          <div class="pt-5 mt-5" id="comment-blog">
            <h4 class="mb-5 font-weight-bold">{{$data->comment_blog->count()}} Comments</h4>
            <ul class="comment-list">
                @foreach($data->comment_blog as $row)
                    <li class="comment">
                        <div class="vcard bio">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                        <h3>{{$row->nama}}</h3>
                        @php
                            $hour = \Carbon\Carbon::parse($row->created_at)->format('H') + 7;
                            if ($hour >= 24) {
                                $day = \Carbon\Carbon::parse($row->created_at)->format('d') + 1;
                            }else {
                                $day = \Carbon\Carbon::parse($row->created_at)->format('d');
                            }

                            $h = \Carbon\Carbon::parse($hour)->format('h');
                        @endphp
                        <div class="meta">{{\Carbon\Carbon::parse($row->created_at)->format('F '.$day.', Y - '.$h.':i A')}}</div>
                        <p>{{$row->comment}}</p>
                        <p><a href="#" class="reply">Reply</a></p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            <!-- END comment-list -->
            
            <div class="comment-form-wrap pt-5" >
              <h3 class="mb-5">Leave a comment</h3>
              <form action="/blog/insert-comment/{{$data->slug}}" method="post" class="p-5 bg-light">
                @csrf
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="name">
                  <input type="text" name="blog_id" value="{{$data->id}}" class="form-control d-none" id="name">
                  @error('nama')
                  <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
                  @error('email')
                  <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="comment" id="message" cols="30" rows="10" class="form-control @error('comment') is-invalid @enderror"></textarea>
                  @error('comment')
                  <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                </div>
  
              </form>
            </div>
          </div>
  
        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate">
          {{-- <div class="sidebar-box">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
              </div>
            </form>
          </div> --}}
          <div class="sidebar-box ftco-animate">
           <h3 class="heading-sidebar">Categories</h3>
           <ul class="categories">
            @foreach ($data_category as $row)
            <li><a href="/blog/category/{{$row->slug}}">{{$row->category_blog}}<span>({{$row->blog->count()}})</span></a></li>
            @endforeach
          </ul>
        </div>
  
        <div class="sidebar-box ftco-animate">
          <h3 class="heading-sidebar">Recent Blog</h3>
          @foreach ($recent_blog as $row)
              
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url({{asset('images/blog/'.$row->foto)}});"></a>
            <div class="text">
              <h3 class="heading"><a href="/blog/{{$row->slug}}">{{$row->title_blog}}</a></h3>
              <div class="meta">
                  <div><a href="/blog/{{$row->slug}}"><span class="icon-calendar"></span> {{\Carbon\Carbon::parse($row->created_at)->format('F d, Y')}}</a></div>
                </div>
            </div>
        </div>
        @endforeach
          
        <div class="sidebar-box ftco-animate">
          <h3 class="heading-sidebar">Tag Cloud</h3>
          <div class="tagcloud">
            @foreach ($data_category as $row)
            <a href="/blog/category/{{$row->slug}}" class="tag-cloud-link">{{$row->category_blog}}</a>
            @endforeach
          </div>
        </div>
  
        
      </div>
  
    </div>
  </div>
  </section> <!-- .section -->
@endsection