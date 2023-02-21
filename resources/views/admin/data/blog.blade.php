@extends('admin.layout.header')

@section('title')
    Blog - ikhsannawawi Admin
@endsection

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-11">
                        Data Blog
                    </div>
                    <div class="col-1">
                        <a href="/admin/blog/add-blog"><i class="bi bi-cloud-plus-fill fs-4"></i></a>
                    </div>
                </div>
                
            </div>
            <div class="card-body ">
                <table class="table " id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Tanggal</th>
                            <th>Sub Body</th>
                            <th>Body</th>
                            <th>Category Blog</th>
                            <th>Slug</th>
                            <th>Sub Foto</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $row)
                        <tr>
                            <td><a class="text-primary" href="/admin/blog/edit-blog/{{$row->id}}">{{$no++}}</a></td>
                            <td>{{$row->title_blog}}</td>
                            <td>{{$row->tanggal}}</td>
                            <td>{{Str::limit($row->body_blog, 15)}}</td>
                            <td>{{$row->body_blog}}</td>
                            <td>{{$row->category_blog->category_blog}}</td>
                            <td>{{$row->slug}}</td>
                            <td><img width="100px" src="{{asset('images/blog/'.$row->sub_foto)}}" alt="{{$row->sub_foto}}"></td>
                            <td><img width="100px" src="{{asset('images/blog/'.$row->foto)}}" alt="{{$row->foto}}"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
    @push('script')
@if (session()->has('success'))
<script>
    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "rtl": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": 300,
    "hideDuration": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };
      toastr["success"]("{{ Session::get('success') }}")
      @endif
      </script>
    <script>
        @if (session()->has('error'))
    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "rtl": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": 300,
    "hideDuration": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };
      toastr["error"]("{{ Session::get('error') }}")
      @endif
    </script>
@endpush
@endsection