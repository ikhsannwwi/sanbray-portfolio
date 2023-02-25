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
                    <h3><a href="blog-details.html">{{$data->nama_project}}</a></h3>
                    <p>{!!$data->deskripsi!!}</p>
                    <a href="{{$data->url}}">{{$data->url}}</a>
                </div>                        
            </div>
            <div class="card">
                    <div class="header">
                        @php
                            $count = $data->comment_project->count();
                        @endphp
                        <h2>Comments {{$count}}</h2>
                    </div>
                    <div class="body">
                        <ul class="comment-reply list-unstyled">
                            @foreach ($data->comment_project as $row)
                                    
                            <li class="row clearfix">
                                <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Awesome Image"></div>
                                <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                    <h5 class="m-b-0">{{$row->nama}} </h5>
                                    <p>{{$row->comment}}</p>
                                    <ul class="list-inline">
                                        <li><a href="javascript:void(0);">{{\Carbon\Carbon::parse($row->created_at)->format('F d, Y')}}</a></li>
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>                                        
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2>Leave a reply <small>Your email address will not be published. Required fields are marked*</small></h2>
                    </div>
                    <div class="body">
                        <div class="comment-form">
                            <form class="row clearfix" action="/project/insert-comment/{{$data->slug}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama">
                                        <input type="int" name="project_id" value="{{$data->id}}" class="form-control d-none" >
                                        @error('nama')
                                            <span class="invalid-feedback d-block">{{$message}}</span>
                                        @enderror 
                                    </div>
                                    

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email Address">
                                        @error('email')
                                            <span class="invalid-feedback d-block">{{$message}}</span>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" name="comment" class="form-control no-resize @error('comment') is-invalid @enderror" placeholder="Please type what you want..."></textarea>
                                        @error('comment')
                                            <span class="invalid-feedback d-block">{{$message}}</span>
                                        @enderror 
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary">SUBMIT</button>
                                </div>                                
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-lg-4 col-md-12 right-box">
            
            <div class="card">
                <div class="header">
                    <h2>Categories Clouds</h2>
                </div>
                <div class="body widget">
                    <ul class="list-unstyled categories-clouds m-b-0">
                        @foreach ($data_category as $row)
                        <li><a href="/project/category/{{$row->slug}}">{{$row->category_project}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>Popular Posts</h2>                        
                </div>
                <div class="body widget popular-post">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single_post">
                                <p class="m-b-0">Apple Introduces Search Ads Basic</p>
                                <span>jun 22, 2018</span>
                                <div class="img-post">
                                    <img src="https://www.bootdey.com/image/280x280/87CEFA/000000" alt="Awesome Image">                                        
                                </div>                                            
                            </div>
                            <div class="single_post">
                                <p class="m-b-0">new rules, more cars, more races</p>
                                <span>jun 8, 2018</span>
                                <div class="img-post">
                                    <img src="https://www.bootdey.com/image/280x280/87CEFA/000000" alt="Awesome Image">                                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>Instagram Post</h2>
                </div>
                <div class="body widget">
                    <ul class="list-unstyled instagram-plugin m-b-0">
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/100x100/87CEFA/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/100x100/87CEFA/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/100x100/87CEFA/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/100x100/87CEFA/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/100x100/87CEFA/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/100x100/87CEFA/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/100x100/87CEFA/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/100x100/87CEFA/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/100x100/87CEFA/000000" alt="image description"></a></li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>Email Newsletter <small>Get our products/news earlier than others, let’s get in touch.</small></h2>
                </div>
                <div class="body widget newsletter">                        
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Email">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="icon-paper-plane"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection