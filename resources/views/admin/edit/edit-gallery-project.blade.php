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
                        <div class="row">
                            <div class="col-10">
                                <h4 class="card-title">Form Edit Gallery Project</h4>
                            </div>
                            <div class="col-1">
                                <a href="/admin/gallery-project/add-gallery-project"><i class="bi bi-cloud-plus-fill fs-4"></i></a>
                            </div>
                            <div class="col-1">
                                <a class="delete" href="#" data-id="{{$data->id}}" data-title="{{$data->nama_project}}"><i class="bi bi-trash3-fill fs-4"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/admin/gallery-project/update-gallery-project/{{$data->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama Project</label>
                                            <input type="text" id="first-name-column" class="form-control @error('nama_project') is-invalid @enderror"
                                                placeholder="Masukan Nama Project" name="nama_project" value="{{$data->nama_project}}">
                                                @error('nama_project')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Url Project</label>
                                            <input type="url" id="last-name-column" class="form-control @error('url') is-invalid @enderror"
                                                placeholder="Masukan URL Project" name="url" value="{{$data->url}}">
                                                @error('url')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-5 text-center">
                                        <img width="100px" src="{{asset('images/gallery-project/'.$data->foto)}}" alt="">
                                    </div>
                                    <div class=" col-md-5 col-12">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Foto</label>
                                            <input class="form-control @error('foto') is-invalid @enderror" value="{{$data->foto}}" type="file" id="formFile" name="foto">
                                            @error('foto')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12 mb-3">
                                        <label for="formCategory" class="form-label">Category Project</label>
                                        <div class="form-group @error('category_project_id') is-invalid @enderror">
                                            <select name="category_project_id" id="formCategory" class="choices form-select ">
                                                <option value="{{$data->category_project_id}}"selected>Web Developer</option>
                                            </select>
                                            @error('category_project_id')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                            <textarea placeholder="Masukan Deskripsi Project" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3">{{$data->deskripsi}}</textarea>
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
            text: "Kamu akan menghapus data Gallery Project dengan Judul " + title + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = "/admin/gallery-project/delete-gallery-project/" + id + ""
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