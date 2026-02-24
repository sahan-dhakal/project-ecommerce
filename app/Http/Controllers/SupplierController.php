<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::all();
        return view ('backend.suppliers', compact('suppliers'));
    }

    public function create(){
        return view ('admin.supplier.create');

    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        Supplier::create([
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Supplier created successfully.');
        
    }
    // Show the Edit Page
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('backend.edit-supplier', compact('supplier'));
    }

    // Save the Updated Data
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email,' . $id,
            'phone' => 'required|string|max:20',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.suppliers')->with('success', 'Supplier updated successfully!');
    }

    // Delete a Supplier
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->back()->with('success', 'Supplier deleted successfully!');
    }
}
