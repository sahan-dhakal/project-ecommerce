@extends('backend.layout')

@section('title')
Edit Supplier
@endsection

@section('breadcrumb')
@include('backend.breadcrumb',['text'=>'Edit Supplier'])
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Supplier</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.suppliers.update', $supplier->id) }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Supplier Company Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{ $supplier->name }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="contact_person" class="form-label">Contact Person</label>
                        <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $supplier->contact_person }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required value="{{ $supplier->email }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="phone" name="phone" required value="{{ $supplier->phone }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="2">{{ $supplier->address }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update Supplier</button>
                    <a href="{{ route('admin.suppliers') }}" class="btn btn-light mt-3 ms-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection