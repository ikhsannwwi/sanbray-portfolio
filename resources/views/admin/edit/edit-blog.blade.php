@extends('admin.layout.header')

@section('title')
    Edit Blog
@endsection


@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="card-title">Form Edit Blog</h4>
                            </div>
                            <div class="col-1">
                                <a href="/admin/blog/add-blog"><i class="bi bi-cloud-plus-fill fs-4"></i></a>
                            </div>
                            <div class="col-1">
                                <a class="delete" href="#" data-id="{{$data->id}}" data-title="{{$data->title_blog}}"><i class="bi bi-trash3-fill fs-4"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/admin/blog/update-blog/{{$data->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Title Blog</label>
                                            <input type="text" id="first-name-column" class="form-control @error('title_blog') is-invalid @enderror"
                                                placeholder="Masukan Title Blog" name="title_blog"value="{{$data->title_blog}}">
                                                @error('title_blog')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="formCategory" class="form-label">Category Blog</label>
                                        <div class="form-group @error('category_blog_id') is-invalid @enderror">
                                            <select name="category_blog_id" id="formCategory" class="choices form-select ">
                                                <option value="{{$data->category_blog_id}}" selected>{{$data->category_blog->category_blog}}</option>
                                                @foreach ($data_category_blog as $row)
                                                <option value="{{$row->id}}">{{$row->category_blog}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_blog_id')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    
                                    <div class=" col-md-6 col-12">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Tanggal</label>
                                            <input class="form-control @error('tanggal') is-invalid @enderror"value="{{$data->tanggal}}" type="date" id="formFile" name="tanggal">
                                            @error('tanggal')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    
                                    
                                    <div class=" col-md-4 col-12">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Foto</label>
                                            <input class="form-control @error('foto') is-invalid @enderror" value="{{$data->foto}}" type="file" id="formFile" name="foto">
                                            @error('foto')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    <div class=" col-md-2 col-12 text-center">
                                        <img width="100px" src="{{asset('images/blog/'.$data->foto)}}" alt="{{$data->foto}}">
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Body Blog</label>
                                            <textarea placeholder="Masukan Artikel" name="body_blog" class="form-control @error('body_blog') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3">{{$data->body_blog}}</textarea>
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

    @push('script')

    <script>
      $('.delete').click(function () {
          var id = $(this).attr('data-id');
          var title = $(this).attr('data-title');
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          swalWithBootstrapButtons.fire({
            title: 'Yakin?',
            text: "Kamu akan menghapus data Blog dengan Nama " + title + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = "/admin/blog/delete-blog/" + id + ""
              swalWithBootstrapButtons.fire(
                'Deleted!',
                'Data '+ title +' has been deleted.',
                'success'
              )
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'Data '+ nama +' is safe :)',
                'error'
              )
            }
          })
          
      });
    </script>
    @endpush
@endsection