@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-2 mb-0">All Brands</h6>

                            <a href="{{route('admin.brands.create')}}" class="btn bg-gradient-primary btn-sm mb-0 me-3">
                                +&nbsp; New Brand
                            </a>
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Brand Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($brands as $item)

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{asset($item->image)}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if($item->status == 0)
                                            <span class="badge badge-sm bg-gradient-success">Public</span>
                                        @elseif ($item->status == 1)
                                            <span class="badge badge-sm bg-gradient-primary">Private</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-warning">Other</span>
                                        @endif

                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$item->created_at}}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ url('admin/brands/edit/'.$item->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>

                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Delete
                                        </a>
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
@endsection