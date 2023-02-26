@extends('landing.layouts.header')

@section('title')
    {{$data->nama_project}}
@endsection

@section('content')
<div class="container mt-5">
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 left-box">
            <div class="card single_post">
                <div class="body">
                    <div class="img-post">
                                              <button type="button" class="btn btn-primary"
                          data-toggle="modal" data-target="#exampleModal">
                              <img class="d-block img-fluid" src="{{asset('images/gallery-project/'.$data->foto)}}" alt="{{$data->foto}}">
                        </button>
                              <!--Bootstrap modal -->
                              <div class="modal fade" id="exampleModal" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <!-- Modal heading -->
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">
                                        {{$data->nama_project}}
                                      </h5>
                                      <button type="button" class="close"
                                        data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                          ×
                                        </span>
                                      </button>
                                    </div>
                                    <!-- Modal body with image -->
                                    <div class="modal-body">
                                      <img width="100%" src="{{asset('images/gallery-project/'.$data->foto)}}" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                    </div>
                    <h3><a href="#">{{$data->nama_project}}</a></h3>
                    <p>{!!$data->deskripsi!!}</p>
                    <a href="{{$data->url}}">{{$data->url}}</a>
                </div>                        
            </div>
            <div class="pt-5 mt-5" id="comment-project">
                <h4 class="mb-5 font-weight-bold">{{$data->comment_project->count()}} Comments</h4>
                <ul class="comment-list">
                    @foreach($data->comment_project as $row)
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
                
                <div class="comment-form-wrap pt-5">
                  <h3 class="mb-5">Leave a comment</h3>
                  <form action="/project/insert-comment/{{$data->slug}}" method="post" class="p-5 bg-light">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name *</label>
                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="name">
                      <input type="text" name="project_id" value="{{$data->id}}" class="form-control d-none" id="name">
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