@extends('admin.layouts.master')

@section('title', 'Subscribers')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center ">
                <div class="col-lg-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <i class="icon fas fa-check"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header text-right">
                            <a type="button" class="btn bg-gradient-success"href="{{ route('subscribers.email') }}">
                                <i class="fas fa-plus"></i> Send email
                            </a>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example2" class="table table-bordered table-hover "
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subscribers Email</th>
                                        <th>Status</th>
                                        <th>Creation Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subscribers as $subscriber)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                {{ $subscriber->email }}
                                            </td>
                                            <td class="text-center">
                                                @php
                                                    $badge = '';
                                                    if ($subscriber->status == 'active') {
                                                        $badge = 'success';
                                                    }else{
                                                        $badge = 'danger';
                                                    }
                                                @endphp
                                                <span class="badge bg-{{ $badge }}"> {{$subscriber->status  }}</span>
                                            </td>
                                            <td class="text-center">
                                                {{ $subscriber->created_at->diffForHumans() }}
                                            </td>
                                            <th class="text-center">
                                                <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this Category ?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer pb-0">
                            {{ $subscribers->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
