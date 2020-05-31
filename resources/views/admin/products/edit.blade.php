@extends('admin.layouts.master')
@section('title')
    Edit new Product
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Details</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-remove"></i></button>
                    </div>
                </div>
                <form method="post" action="{{route('admin.products.update',$product->id)}}">
                @csrf
                    @method('PUT')
                <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                           value="{{$product->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Product Category</label>
                                    <select class="form-control custom-select" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                {{$category->id == $product->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Product Price</label>
                                    <input type="text" id="price" name="price" class="form-control"
                                           value="{{$product->price}}">
                                </div>
                                <div class="form-group">
                                    <label for="short_description">Product Short Description</label>
                                    <textarea id="short_description" name="short_description" class="form-control"
                                              rows="4">
                                    {{$product->short_description}}
                                </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="currency_code">Product Currency</label>
                                    <select class="form-control custom-select" name="currency_code">
                                        @foreach($currency as $currency_item)
                                            <option value="{{$currency_item->code}}"
                                                {{$currency_item->code == $product->currency_code ? 'selected' : ''}}>{{$currency_item->code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="supplier_id">Product Supplier</label>
                                    <select class="form-control custom-select" name="supplier_id">
                                        @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}"
                                            {{$supplier->id == $product->supplier_id ? 'selected' : ''}}
                                            >{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="discount">Product Discount</label>
                                    <input type="text" id="discount" name="discount" class="form-control"
                                           value="{{$product->discount}}">
                                </div>
                                <div class="form-group">
                                    <label for="details">Product Details</label>
                                    <textarea id="details" name="details" class="form-control" rows="4">
                                    {{$product->details}}
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-12">
                                <a href="" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="submit" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->

    </section>

    <!-- /.content -->
@stop
