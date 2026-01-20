@extends('backend.layout')

@section('title')
Edit Category
@endsection

@section('breadcrumb')
@include('backend.breadcrumb',['text'=>'Edit category'])
@endsection

@section('content')

<div class="row">
  <div class="col-md-8 offset-md-2">
    <div class="card">
      <div class="card-header">
        <h4>Edit Category</h4>
      </div>
      
      <div class="card-body">
        <form action="{{route('category.addUpdate')}}" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="form-group mb-3">
            <label for="name">Category Name</label>
            <input type="text" 
                   class="form-control" 
                   value="{{$category->name}}" 
                   name="name" 
                   required/>
          </div>
          
          <div class="form-group mb-3">
            <label for="thumbnail">Category Thumbnail</label>
            @if ($category->thumbnail)
              <div class="mb-2">
                <img src="/{{$category->thumbnail}}" 
                     style="max-width: 200px; border-radius: 8px;" 
                     alt="Current thumbnail">
                <p class="text-muted small mt-1">Current image (upload new to replace)</p>
              </div>
            @endif
            <input type="file" 
                   class="form-control" 
                   name="thumbnail" 
                   accept="image/*"/>
          </div>
          
          <div class="d-flex gap-2">
            <input type="hidden" name="id" value="{{$category->id}}">
            <button type="submit" class="btn btn-primary">
              <i class="fa-solid fa-save"></i> Update Category
            </button>
            <a href="{{route('category.index')}}" class="btn btn-secondary">
              <i class="fa-solid fa-arrow-left"></i> Back to List
            </a>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>

@endsection