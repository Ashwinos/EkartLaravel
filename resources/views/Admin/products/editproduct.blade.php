@extends('Admin.dashboard')
@section('page')
    <div class="container" style="padding-top: 50px; padding-left:25px; padding-right:25px;">
        <form method="post" action="{{ route('updateproduct') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id">
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
                <select name="category" id="inputState" class="form-control">
                    <option selected>Choose...</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Image</label>
                <input name="image" type="file" name="image" id="myFile" name="filename">

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Is Favourite</label>
                    <select name="is_favourite" id="inputState" class="form-control">
                        <option selected>Choose</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputZip">Is Active</label>
                    <select name="status" id="inputState" class="form-control">
                        <option selected>Choose</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection
