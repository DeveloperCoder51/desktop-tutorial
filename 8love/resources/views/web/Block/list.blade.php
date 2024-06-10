@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">BlockList</h4>
                </li>
            </ul>
            {{-- <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Add Users</a>
                </li>
            </ul> --}}
            @include('web.msg.msg')
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Block Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead style="font-size: 13px">
                                            <tr>
                                                <th style="width: 4%">ID</th>
                                                <th>Image</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Country</th>
                                                <th>Status</th>
                                                <th style="width: 14%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 13px">
                                            @foreach ($users as $key => $user)
                                                <tr>
                                                    <td>
                                                        12
                                                    </td>
                                                    <td style="width: 10%">
                                                        @if ($user->profile && $user->profile->image)
                                                            @php
                                                                $images = json_decode($user->profile->image);
                                                                // Echo out the decoded images array for debugging
                                                                // dd($images);
                                                            @endphp

                                                            {{-- Check if images are available --}}
                                                            @if (is_array($images) && count($images) > 0)
                                                                {{-- Loop through each image --}}
                                                                @foreach ($images as $image)
                                                                    <a href="{{ asset('images/' . $image) }}"
                                                                        target="_blank">
                                                                        <img alt="image"
                                                                            src="{{ asset('images/' . $image) }}"
                                                                            width="45">
                                                                    </a>
                                                                @endforeach
                                                            @else
                                                                not available
                                                            @endif
                                                        @else
                                                            not available
                                                        @endif
                                                    </td>



                                                    <td>{{ $user->user_name }}</td>
                                                    <td class="align-middle">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td>{{ $user->phone ?? '' }}</td>
                                                    <td>{{ $user->country ?? '' }}</td>
                                                    <td>
                                                        @if ($user->status_to_use_app == 'block')
                                                            <span class="badge badge-danger">Block</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <form action="{{ route('user.unblock', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-info btn-sm"
                                                                onclick="return confirm('Are you sure you want to unblock this user?')">
                                                                UnBlock <i class="fas fa-unlock"></i>
                                                            </button>
                                                        </form>
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
