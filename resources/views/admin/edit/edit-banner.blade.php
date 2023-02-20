@extends('admin.layout.header')

@section('title')
    Edit Banner
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
                                <h4 class="card-title">Form Edit Banner</h4>
                            </div>
                            <div class="col-1">
                                <a href="/admin/banner/add-banner"><i class="bi bi-cloud-plus-fill fs-4"></i></a>
                            </div>
                            <div class="col-1">
                                <a class="delete" href="#" data-id="{{$data->id}}" data-title="{{$data->title_banner}}"><i class="bi bi-trash3-fill fs-4"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/admin/banner/update-banner/{{$data->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Title</label>
                                            <input type="text" id="first-name-column" class="form-control" value="{{$data->title_banner}}"
                                                placeholder="Masukan Title Banner" name="title_banner">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Body</label>
                                            <input type="text" id="last-name-column" class="form-control" value="{{$data->body_banner}}"
                                                placeholder="Masukan Body Banner" name="body_banner">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <img width="100px" src="{{asset('images/banner/'.$data->foto)}}" alt="{{$data->foto}}">
                                    </div>
                                    <div class=" col-10">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Foto</label>
                                            <input class="form-control" type="file" id="formFile" name="foto" value="{{$data->foto}}">
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
            text: "Kamu akan menghapus data Banner dengan Judul " + title + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = "/admin/banner/delete-banner/" + id + ""
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