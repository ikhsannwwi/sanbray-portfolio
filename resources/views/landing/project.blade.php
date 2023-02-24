@extends('landing.layouts.header')

@section('title')
    Home
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
                        <li><a href="javascript:void(0);" class="fa fa-heart">28</a></li>
                        <li><a href="javascript:void(0);" class="fa fa-comment">128</a></li>
                    </ul>
                </div>
            </div>
            @endforeach

            
                                    
            <ul class="pagination pagination-primary">
                <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
            </ul>                
        </div>
        <div class="col-lg-4 col-md-12 right-box">
            
            <div class="card">
                <div class="header">
                    <h2>Categories Clouds</h2>
                </div>
                <div class="body widget">
                    <ul class="list-unstyled categories-clouds m-b-0">
                        <li><a href="javascript:void(0);">eCommerce</a></li>
                        <li><a href="javascript:void(0);">Microsoft Technologies</a></li>
                        <li><a href="javascript:void(0);">Creative UX</a></li>
                        <li><a href="javascript:void(0);">Wordpress</a></li>
                        <li><a href="javascript:void(0);">Angular JS</a></li>
                        <li><a href="javascript:void(0);">Enterprise Mobility</a></li>
                        <li><a href="javascript:void(0);">Website Design</a></li>
                        <li><a href="javascript:void(0);">HTML5</a></li>
                        <li><a href="javascript:void(0);">Infographics</a></li>
                        <li><a href="javascript:void(0);">Wordpress Development</a></li>
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