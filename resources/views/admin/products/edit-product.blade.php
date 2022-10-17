@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Product</h3></div>
                    <div class="card-body">
                        <form method="post" action="{{ route('update-product') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $products->id }}">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="product_name" type="text" value="{{ $products->product_name }}" />
                                        <label for="inputFirstName">Product name</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="category_name" type="text" value="{{ $products->cateory_name }}" />
                                        <label for="inputFirstName">Category name</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="brand_name" type="text" value="{{ $products->brand_name }}" />
                                        <label for="inputFirstName">Brand name</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="product_price" type="text" value="{{ $products->product_price }}" />
                                        <label for="inputFirstName">Product_price</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <textarea name="product_description" id="" cols="30" rows="10" class="form-control">{{ $products->product_description }}</textarea>
                                        <label for="inputFirstName">Product Description</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input type="file" name="product_imae"  class="form-control">
                                        <img src="{{ asset($products->product_image) }}" alt="" style="height: 50px; width: 50px;" >
                                        <label for="inputFirstName">Product Image</label>
                                    </div>
                                </div>

                            </div>


                            <div class="mt-4 mb-0">

                                <input type="submit" name="submit" class="form-control btn btn-primary" value="Submit" >

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


