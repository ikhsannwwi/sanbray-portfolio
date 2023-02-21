@extends('admin.layout.header')

@section('title')
    Add Blog
@endsection


@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Add Blog</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/admin/blog/insert-blog" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Title Blog</label>
                                            <input type="text" id="first-name-column" class="form-control @error('title_blog') is-invalid @enderror"
                                                placeholder="Masukan Title Blog" name="title_blog">
                                                @error('title_blog')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    
                                    <div class=" col-md-6 col-12">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Foto</label>
                                            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="formFile" name="foto">
                                            @error('foto')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    <div class=" col-md-6 col-12">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Foto</label>
                                            <input class="form-control @error('sub_foto') is-invalid @enderror" type="file" id="formFile" name="sub_foto">
                                            @error('sub_foto')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    <div class=" col-md-6 col-12">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Tanggal</label>
                                            <input class="form-control @error('tanggal') is-invalid @enderror" type="date" id="formFile" name="tanggal">
                                            @error('tanggal')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="formCategory" class="form-label">Category Blog</label>
                                        <div class="form-group @error('category_blog_id') is-invalid @enderror">
                                            <select name="category_blog_id" id="formCategory" class="choices form-select ">
                                                <option value="" selected>Open this select menu</option>
                                                @foreach ($data_category_blog as $row)
                                                <option value="{{$row->id}}">{{$row->category_blog}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_blog_id')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Body Blog</label>
                                            <textarea placeholder="Masukan Artikel" name="body_blog" class="form-control @error('body_blog') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            @error('body_blog')
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