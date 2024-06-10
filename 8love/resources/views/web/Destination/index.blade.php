@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Destinations</h4>
                </li>
            </ul>
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <a href="{{ route('destinations.create') }}" class="btn btn-primary">Add Destinations</a>
                </li>
            </ul>
            @include('web.msg.msg')
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Destinations</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead style="font-size: 13px">
                                            <tr>
                                                <th style="width: 4%">ID</th>
                                                <th style="width: 6%">Image</th>
                                                <th style="width: 10%">Category Name</th>
                                                <th>Description</th>
                                                <th style="width: 8%">Status</th>
                                                <th style="width: 8%">Type</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 13px">
                                            @foreach ($destinations as $key => $destination)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        <a href="{{ asset('Destination/' . $destination->image) }}"
                                                            target="_blank">
                                                            <img src="{{ asset('Destination/' . $destination->image) }}"
                                                                alt="User Image" style="width: 50px; height: 50px;">
                                                        </a>
                                                    </td>

                                                    <td>{{ $destination->name }}</td>
                                                    <td>{{ $destination->description ?? '' }}</td>
                                                    <td>
                                                        @if ($destination->status == 'active')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Block</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($destination->type == 'mostpopular')
                                                            <span class="badge badge-success">Most Popular</span>
                                                        @else
                                                            <span class="badge badge-warning">Popular</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                                id="dropdownMenuButton" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('destinations.edit', $destination->id) }}">Edit
                                                                    <i class="fas fa-edit"></i></a>
                                                                {{-- <a class="dropdown-item" href="#">Delete <i class="fas fa-trash-alt"></i></a> --}}
                                                                <form
                                                                    action="{{ route('destinations.destroy', $destination->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item"
                                                                        onclick="return confirm('Are you sure you want to delete this user?')">
                                                                        Delete <i class="fas fa-trash-alt"></i>
                                                                    </button>
                                                                </form>
                                                                @if ($destination->status == 'active')
                                                                    <form
                                                                        action="{{ route('destinations.block', $destination->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Are you sure you want to block this destinations?')">
                                                                            Block <i class="fas fa-ban"></i>
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <form
                                                                        action="{{ route('destinations.unblock', $destination->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Are you sure you want to unblock this destinations?')">
                                                                            Unblock <i class="fas fa-check"></i>
                                                                        </button>
                                                                    </form>
                                                                @endif


                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
