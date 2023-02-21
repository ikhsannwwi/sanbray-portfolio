@extends('admin.layout.header')

@section('title')
    Add Gallery Project
@endsection


@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Add Gallery Project</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/admin/gallery-project/insert-gallery-project" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama Project</label>
                                            <input type="text" id="first-name-column" class="form-control @error('nama_project') is-invalid @enderror"
                                                placeholder="Masukan Nama Project" name="nama_project">
                                                @error('nama_project')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Url Project</label>
                                            <input type="url" id="last-name-column" class="form-control @error('url') is-invalid @enderror"
                                                placeholder="Masukan URL Project" name="url">
                                                @error('url')
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
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="formCategory" class="form-label">Category Project</label>
                                        <div class="form-group @error('category_project_id') is-invalid @enderror">
                                            <select name="category_project_id" id="formCategory" class="choices form-select ">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="1">Web Developer</option>
                                            </select>
                                            @error('category_project_id')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                            <textarea placeholder="Masukan Deskripsi Project" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            @error('deskripsi')
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