@extends('Admin.dashboard')
@section('page')

    <div class="container" style="padding-top: 50px; padding-left:25px; padding-right:25px;">
        @if (@session()->has('message'))
            <p style="padding-left: 2%; padding-bottom:2%; color:red;" class="flashmessage"> <b>{{ session()->get('message') }}
                </b></p>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="POST" action="{{route('updateproduct')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" id="inputEmail4"
                        placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Price</label>
                    <input type="text" name="price" class="form-control" value="{{ $product->price }}"
                        id="inputPassword4" placeholder="Price">
                </div>
            </div>
            <div class="form-group">
                <label for="inputState">Category</label>
                <select name="category_id" id="inputState" class="form-control">
                    
                   
                    @foreach ($categories as $category)
                    <option @selected($category->id == $product->category_id) value="{{$category->id}}">{{$category->name}}</option>
                       
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Image</label>
                <input name="image" type="file" name="image" id="myFile" name="filename">
                <img src="{{ asset('product_images/' . $product->image) }}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Is Favourite</label>
                    <select name="is_favourite" id="inputState" class="form-control">
                        <option >Choose</option>
                        <option {{$product->is_favourite==1 ? "selected" : "" }}  value="1">Yes</option>
                        <option {{$product->is_favourite==0 ? "selected" : "" }}   value="0">No</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputZip">Is Active</label>
                    <select name="status" id="inputState" class="form-control">
                        <option >Choose</option>
                        <option {{$product->status=='Active' ? "selected" : "" }} value="1">Yes</option>
                        <option {{$product->status=='Inactive' ? "selected" : "" }}  value="0">No</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection

