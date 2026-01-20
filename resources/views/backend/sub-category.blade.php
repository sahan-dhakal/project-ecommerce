@extends('backend.layout')

@section('title')
Sub Category
@endsection
@section('breadcrumb')
@include('backend.breadcrumb',['text'=>'Category'])
@endsection

@section('content')

  <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary" style="float: left;" 
            data-bs-toggle="modal" data-bs-target="#categoryModal"> ADD Sub-Category &plus;</button>

        </div>

        @include('backend.modals.sub-category-modal',['category'=>$subCategory,'categories'=>$categories])
        
        <div class="row">
            <div class="table-responsive">
                <table class="table table-responsive table-hovered">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Thumbnail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subCategories as $category)
                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$category->category->name}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                @if ($category->thumbnail)
                                <img src="/{{$category->thumbnail}}" style="max-width: 100px;">
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">

                                    <a href="/{{$category->thumbnail}}" target="_blank" class="btn btn-primary"> <i class="fa-solid fa-eye"></i> </a>
   
                                   <a href="{{route('subCategory.index',['sub_category_id'=>$category->id])}}" class="btn btn-success"> <i class="fa-solid fa-pen-to-square"></i> </a>
                           
   
                                   <a href="{{route('subCategory.delete',['sub_category_id'=>$category->id])}}" class="btn btn-danger"> <i class="fa-solid fa-trash"></i></a></td>
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
