@extends('admin.layouts.master')
@section('title')
    All Products
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        @include('admin.layouts.messages')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Products</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="col-2 ">
                    <a href="{{route('admin.products.create')}}">
                        <button type="button" class="btn btn-block btn-success">Add new</button>
                    </a>
                </div>
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Product Name
                        </th>
                        <th>
                            Product Photo
                        </th>
                        <th style="width: 28%">
                            Description
                        </th>
                        <th>
                            Product Price
                        </th>
                        <th>
                            Sales
                        </th>
                        <th>
                            Settings
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                           {{$loop->iteration}}
                        </td>
                        <td>
                            <a>
                                {{$product->name}}
                            </a>
                            <br/>
                            <small>
                                Added {{$product->created_at}}
                            </small>
                        </td>
                        <td>
                            <img width="100" src="{{asset('assets/images/default.png')}}">
                        </td
                        ><td>
                            <span>{{$product->short_description}}</span>
                        </td>
                        <td>
                            {{$product->price}}
                            <span style="color: #0f6674" class="product-currency">{{$product->currency_code}}</span>
                            <p> Discount <s class="product-discount"> {{$product->discount}}%</s></p>
                        </td>
                        <td>
                            {{$product->sales()}}
                        </td>
                        <td class="project-actions text-center">
                            <form method="Post" action="{{route('admin.products.destroy',$product->id)}}">
                                @csrf
                                @method('delete')
                            <a class="btn btn-sm btn-primary" href="{{route('admin.products.edit',$product->id)}}">Edit</a>
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <!-- /.card-body -->
            {{$products->links()}}
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@stop

@section('cssCode')
    <style>
        .product-currency {
            color: #55535d;
            font-weight: bold;
        }

        .product-discount {
            color: red;
        }
    </style>
@endsection
