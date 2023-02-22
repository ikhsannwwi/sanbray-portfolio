@extends('admin.layout.header')

@section('title')
    Edit Testimoni
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
                                <h4 class="card-title">Form Edit Testimoni</h4>
                            </div>
                            <div class="col-1">
                                <a href="/admin/testimoni/add-testimoni"><i class="bi bi-cloud-plus-fill fs-4"></i></a>
                            </div>
                            <div class="col-1">
                                <a class="delete" href="#" data-id="{{$data->id}}" data-title="{{$data->nama_client}}"><i class="bi bi-trash3-fill fs-4"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/admin/testimoni/update-testimoni/{{$data->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama</label>
                                            <input type="text" id="first-name-column" class="form-control @error('nama_client') is-invalid @enderror"
                                                placeholder="Masukan Nama" name="nama_client" value="{{$data->nama_client}}">
                                                @error('nama_client')
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
                                        <img width="100px" src="{{asset('images/testimoni/'.$data->foto)}}" alt="{{$data->foto}}">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                            <textarea placeholder="Masukan Pesan" name="message" class="form-control @error('message') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3">{{$data->message}}</textarea>
                                            @error('message')
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
            text: "Kamu akan menghapus data Testimoni dengan Nama " + title + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = "/admin/testimoni/delete-testimoni/" + id + ""
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