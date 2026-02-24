@extends('backend.layout')

@section('title')
    Suppliers
@endsection

@section('breadcrumb')
    @include('backend.breadcrumb', ['text' => 'Suppliers'])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary mb-3" style="float: left;" data-bs-toggle="modal"
                data-bs-target="#addSupplierModal">
                ADD Supplier +
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">All Suppliers</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Contact Person</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $key => $supplier)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->contact_person ?? '-' }}</td>
                                        <td>{{ $supplier->email }}</td>
                                        <td>{{ $supplier->phone }}</td>
                                        <td>{{ $supplier->address ?? '-' }}</td>
                                        
                                        <td>
                                            <a href="{{ route('admin.suppliers.edit', $supplier->id) }}"
                                                class="btn btn-sm btn-info"><i class="ri-edit-line"></i> Edit</a>

                                            <a href="{{ route('admin.suppliers.delete', $supplier->id) }}"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this supplier?')"><i
                                                    class="ri-delete-bin-line"></i> Delete</a>
                                        </td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Include --}}
    @include('backend.modals.supplier-modal')
@endsection
