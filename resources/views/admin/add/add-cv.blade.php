@extends('admin.layout.header')

@section('title')
    Add Cv
@endsection

@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Add Cv</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/admin/cv/insert-cv" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class=" col-12">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Cv</label>
                                            <input class="form-control @error('cv') is-invalid @enderror" type="file" id="formFile" name="cv">
                                            @error('cv')
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
    </section>
    <!-- // Basic multiple Column Form section end -->
@endsection