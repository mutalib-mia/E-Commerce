@extends('admin.master')

@section('content')

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Product Table
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>SL NO</th>
                    <th>Product Name</th>
                    <th>Category Name</th>
                    <th>Brand Name</th>
                    <th>Product Price</th>
                    <th>Product Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                @php $i=1 @endphp

                @foreach($products as $product)


                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->category_name }}</td>
                        <td>{{ $product->brand_name}}</td>
                        <td>{{ $product->product_price }}</td>
                        <td>{{ $product->product_description }}</td>


                        {{--                    <img src="{{ asset($product->product_imae) }}" style="width: 50px; height: 50px" alt="">--}}
                        <td><img src="{{ asset($product->product_image) }}" alt="" style="height: 50px ; width: 50px"></td>

                        <td>{{ $product->status==1?'published':'unpublished'}}</td>
                        <td>

                            @if($product->status==1)

                                <a href="{{ route('status-product',['id'=>$product->id]) }}" class="btn btn-warning" onclick="return confirm('Are You Sure unPublished it')">unPublished</a>

                            @else
                                <a href="{{ route('status-product',['id'=>$product->id]) }}" class="btn btn-primary" onclick="return confirm('Are You Sure Published it')">Published</a>


                            @endif

                            <a href="{{ route('edit-product',['id'=>$product->id]) }}" class="btn btn-primary" >Edit</a>||

                            <form action="{{ route('delete-product',['id'=>$product->id]) }}" method="post" id="delete" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are You sure Delete ')">

                            </form>

                        </td>


                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection

