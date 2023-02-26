@extends('landing.layouts.header')

@section('title')
    Project
@endsection

@section('content')
<div class="container mt-5">
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 left-box">
            @foreach ($data->gallery_project as $row)
                
            <div class="card single_post">
                <div class="body">
                    <div class="img-post">
                        <img class="d-block img-fluid" src="{{asset('images/gallery-project/'.$row->foto)}}" alt="{{$row->foto}}">
                    </div>
                    <h3><a href="project-details.html">{{$row->nama_project}}</a></h3>
                    <p>{{Str::limit($row->deskripsi,200)}}</p>
                </div>
                <div class="footer">
                    <div class="actions">
                        <a href="/project/{{$row->slug}}" class="btn btn-outline-secondary">Details</a>
                    </div>
                    <ul class="stats">
                        <li><a href="/project/category/{{$row->category_project->slug}}">{{$row->category_project->category_project}}</a></li>
                        <li><a href="/project/{{$row->slug}}#comment-project" class="fa fa-comment">{{$row->comment_project->count()}}</a></li>
                    </ul>
                </div>
            </div>
            @endforeach

            
                                    
                           
        </div>
        <div class="col-lg-4 sidebar ftco-animate mt-3">
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
              <li><a href="/project/category/{{$row->slug}}">{{$row->category_project}}<span>({{$row->gallery_project->count()}})</span></a></li>
              @endforeach
            </ul>
          </div>
    
          <div class="sidebar-box ftco-animate">
            <h3 class="heading-sidebar">Recent project</h3>
            @foreach ($recent_project as $row)
                
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url({{asset('images/gallery-project/'.$row->foto)}});"></a>
              <div class="text">
                <h3 class="heading"><a href="/project/{{$row->slug}}">{{$row->nama_project}}</a></h3>
                <div class="meta">
                    <div><a href="/project/{{$row->slug}}"><span class="icon-calendar"></span> {{\Carbon\Carbon::parse($row->created_at)->format('F d, Y')}}</a></div>
                  </div>
              </div>
          </div>
          @endforeach
            
          <div class="sidebar-box ftco-animate">
            <h3 class="heading-sidebar">Tag Cloud</h3>
            <div class="tagcloud">
              @foreach ($data_category as $row)
              <a href="/project/category/{{$row->slug}}" class="tag-cloud-link">{{$row->category_project}}</a>
              @endforeach
            </div>
          </div>
    
          
        </div>
    
      </div>
    </div>

</div>

@endsection