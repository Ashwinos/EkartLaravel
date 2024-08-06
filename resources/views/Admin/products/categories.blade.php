@extends('Admin.dashboard')
@section('page')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Products({{ $products->total() }})</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">
                        <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                Add Category
                            </button></li>

                    </ol>




                    <!-- Button trigger modal -->



                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @if (@session()->has('message'))
        <p style="padding-left: 2%; padding-bottom:2%; color:red;" class="flashmessage"> <b>{{ session()->get('message') }}
            </b></p>
    @endif
    <div class="content">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-10 py-3 bg-gray-50 dark:bg-gray-800">
                           Category name
                        </th>
                        <th scope="col" class="px-10 py-3 bg-gray-50 dark:bg-gray-800">
                             Image
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $category->name }} 
                            </th>
                            <td class="px-6 py-4">
                                <img src=""
                                    style="height: 100px; width:100px;">
                                
                            </td>
                            
                            <td class="px-6 py-4">
                                <a class="btn btn-primary btn-sm"
                                    href="">Edit</a>

                                <a class="btn btn-danger btn-sm"
                                    href="">Delete</a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        

    </div>



    <!-- Modal Add Product-->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('createproduct') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" name="name" class="form-control" id="inputEmail4"
                                    placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Price</label>
                                <input type="text" name="price" class="form-control" id="inputPassword4"
                                    placeholder="Price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Category</label>
                            
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

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>


                </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Script to open modal if there are validation errors -->
    <script type="text/javascript">
        $(document).ready(function() {
            @if ($errors->any())
                $('#exampleModalLong').modal('show');
            @endif
        });
    </script>
@endsection
