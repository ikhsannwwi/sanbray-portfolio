@extends('admin.layout.header')

@section('title')
    Add Comment Blog
@endsection

@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Add Comment Blog</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/admin/comment-blog/insert-comment-blog" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama</label>
                                            <input type="text" id="first-name-column" class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="Masukan Nama" name="nama">
                                                @error('nama')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Email</label>
                                            <input type="email" id="first-name-column" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Masukan Email" name="email">
                                                @error('email')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="formCategory" class="form-label">Blog</label>
                                        <div class="form-group @error('blog_id') is-invalid @enderror">
                                            <select name="blog_id" id="formCategory" class="choices form-select ">
                                                <option value="" selected>Open this select menu</option>
                                                @foreach ($data_blog as $row)
                                                <option value="{{$row->id}}">{{$row->title_blog}}</option>
                                                @endforeach
                                            </select>
                                            @error('blog_id')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                                            <textarea placeholder="Masukan Comment" name="comment" class="form-control @error('comment') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            @error('comment')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
@endsection