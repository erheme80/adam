@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="multisteps-form mb-9">
                    <div class="row">
                        <div class="col-12 col-lg-8 m-auto">
                            <div class="card">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                        <div class="multisteps-form__progress">
                                            <h6 class="text-white text-capitalize ps-2 mb-0">Create a Category</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data"
                                    class="multisteps-form__form" style="height: 280px;">
                                        @csrf
                                        <div class="multisteps-form__panel border-radius-xl bg-white js-active"
                                             data-animation="FadeIn">
                                            <div class="multisteps-form__content">
                                                <br>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <label class="form-label">Category Name</label>
                                                            <input class="multisteps-form__input form-control" name="name"
                                                                   type="text" onfocus="focused(this)"
                                                                   onfocusout="defocused(this)">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                        <div class="input-group input-group-dynamic">
                                                            <label class="form-label">Slug</label>
                                                            <input class="multisteps-form__input form-control" name="slug"
                                                                   type="text" onfocus="focused(this)"
                                                                   onfocusout="defocused(this)">
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="">
                                                            <label class="">Image</label><br>
                                                            <input class="" type="file" name="image">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                        <div class="">
                                                            <label class="">Status</label><br>
                                                            <input class="" type="checkbox" name="status">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                            type="submit" title="Next" >Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
