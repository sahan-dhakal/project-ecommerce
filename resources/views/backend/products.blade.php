@extends('backend.layout')

@section('title')
Product
@endsection
@section('breadcrumb')
@include('backend.breadcrumb',['text'=>'Category'])
@endsection

@section('content')

  <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary" style="float: left;" 
            data-bs-toggle="modal" data-bs-target="#productModal"> ADD Products &plus;</button>

        </div>
        
        @include('backend.modals.product-modal',['product'=>$product,'categories'=>$categories ,'subCategories'=>$subCategories])

        <div class="row">
            <div class="table-responsive">
                <table class="table table-responsive table-hovered">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>out of stock</th>
                            <th>price</th>
                            <th>color</th>
                            <th>size</th>
                            <th>quantity</th>
                            <th>Thumbnail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            
                       <tr>
                            <td>{{ $loop->iteration }}</td>
                           <td>{{ $product->category->name }}</td>
                           <td>{{ $product->subCategory->name }}</td>
                           <td>{{$product->name}}</td>
                           <td>{{$product->description}}</td>
                           <td>{{$product->out_of_stock ? 'Yes' : 'No'}}</td>
                           <td>{{$product->price}}</td>
                           <td>{{$product->color}}</td>
                           <td>{{$product->size}}</td>
                           <td>{{$product->quantity}}</td>
                           
                           <td>
                               @if ($product->thumbnail)
                               <img src="/{{$product->thumbnail}}" style="max-width: 100px;">
                               @endif
                           </td>
                           <td>
                               <div class="btn-group">
    
                                   <a href="/{{$product->thumbnail}}" target="_blank" class="btn btn-primary"> <i class="fa-solid fa-eye"></i> </a>
    
                                  <a href="{{route('products.index',['product_id'=>$product->id])}}" class="btn btn-success"> <i class="fa-solid fa-pen-to-square"></i> </a>
                          
    
                                  <a href="{{route('product.delete',['product_id'=>$product->id])}}" class="btn btn-danger"> <i class="fa-solid fa-trash"></i></a>
                           </td>
                               </div> 

                       </tr>
                            
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end row-->
                        

@endsection
