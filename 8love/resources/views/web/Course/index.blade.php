@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Course</h4>
                </li>
            </ul>
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <a href="{{ route('course.create') }}" class="btn btn-primary">Add Course</a>
                </li>
            </ul>
            @include('web.msg.msg')
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Course</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead style="font-size: 13px">
                                            <tr>
                                                <th style="width: 4%">ID</th>
                                                <th style="width: 10%">Course Name</th>
                                                <th style="width: 10%">Type</th>
                                                <th style="width: 10%">Category</th>
                                                <th>Description</th>
                                                <th style="width: 8%">Status</th>
                                                <th style="width: 6%">Charges</th>
                                                <th style="width: 6%">Price</th>
                                                <th style="width: 12%">Created By</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 13px">
                                            @foreach ($courses as $key => $course)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $course->name }}</td>
                                                <td>{{ $course->type ?? '' }}</td>
                                                <td>{{ $course->category->name ?? '' }}</td>
                                                <td>{{ $course->description ?? '' }}</td>

                                                <td>
                                                    @if ($course->status == 'active')
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Block</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($course->charges == 'paid')
                                                        <span class="badge badge-success">Paid</span>
                                                    @else
                                                        <span class="badge badge-info">Free</span>
                                                    @endif
                                                </td>
                                                <td>{{ $course->price ?? 'Free' }}</td>
                                                <td>{{ $course->author->user_name ?? '' }} | {{ $course->author->role ?? '' }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="{{ route('course.edit', $course->id) }}">Edit
                                                                <i class="fas fa-edit"></i></a>
                                                            {{-- <a class="dropdown-item" href="#">Delete <i class="fas fa-trash-alt"></i></a> --}}
                                                            <form action="{{ route('course.destroy', $course->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item"
                                                                    onclick="return confirm('Are you sure you want to delete this Course?')">
                                                                    Delete <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                            @if ($course->status == 'active')
                                                                <form action="{{ route('course.block', $course->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit" class="dropdown-item"
                                                                        onclick="return confirm('Are you sure you want to block this category?')">
                                                                        Block <i class="fas fa-ban"></i>
                                                                    </button>
                                                                </form>
                                                            @else
                                                                <form action="{{ route('course.unblock', $course->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit" class="dropdown-item"
                                                                        onclick="return confirm('Are you sure you want to unblock this category?')">
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
