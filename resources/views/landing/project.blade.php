@extends('landing.layouts.header')

@section('title')
    Project
@endsection

@section('content')
<div class="container mt-5">
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 left-box">
            @foreach ($data as $row)
                
            <div class="card single_post">
                <div class="body">
                    <div class="img-post">
                        <img class="d-block img-fluid" src="{{asset('images/gallery-project/'.$row->foto)}}" alt="{{$row->foto}}">
                    </div>
                    <h3><a href="blog-details.html">{{$row->nama_project}}</a></h3>
                    <p>{{Str::limit($row->deskripsi,200)}}</p>
                </div>
                <div class="footer">
                    <div class="actions">
                        <a href="/project/{{$row->slug}}" class="btn btn-outline-secondary">Details</a>
                    </div>
                    <ul class="stats">
                        <li><a href="javascript:void(0);">{{$row->category_project->category_project}}</a></li>
                        <li><a href="javascript:void(0);" class="fa fa-comment">{{$row->comment_project->count()}}</a></li>
                    </ul>
                </div>
            </div>
            @endforeach

            
                                    
                           
        </div>
        <div class="col-lg-4 col-md-12 right-box">
            
            <div class="card">
                <div class="header">
                    <h2>Categories Project</h2>
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
                                    <img src="https://www.bootdey.com/image/280x280/FFB6C1/000000" alt="Awesome Image">                                        
                                </div>                                            
                            </div>
                            <div class="single_post">
                                <p class="m-b-0">new rules, more cars, more races</p>
                                <span>jun 8, 2018</span>
                                <div class="img-post">
                                    <img src="https://www.bootdey.com/image/280x280/FFB6C1/000000" alt="Awesome Image">                                            
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
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/80x80/FFB6C1/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/80x80/FFB6C1/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/80x80/FFB6C1/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/80x80/FFB6C1/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/80x80/FFB6C1/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/80x80/FFB6C1/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/80x80/FFB6C1/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/80x80/FFB6C1/000000" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="https://www.bootdey.com/image/80x80/FFB6C1/000000" alt="image description"></a></li>
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