<!-- The Modal -->
<div class="modal fade" id="productModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Product Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Form -->
      <form action="{{route('product.addUpdate')}}" method="post" enctype="multipart/form-data">
        @csrf
        
        <!-- Modal Body -->
        <div class="modal-body">
          
          <div class="form-group mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required class="form-select">
              <option value="">Select Category</option>
              @foreach ($categories as $value)
                <option value="{{$value->id}}"
                  {{isset($product) ? ($product->category_id == $value->id ? 'selected' : '') : ''}}>
                  {{$value->name}}
                </option>
              @endforeach
            </select>
          </div>

          <div class="form-group mb-3">
            <label for="sub_category_id">Sub-Category</label>
            <select name="sub_category_id" id="sub_category_id" required class="form-select">
              <option value="">Select Sub-Category</option>
              @foreach ($subCategories as $value)
                <option value="{{$value->id}}"
                  {{isset($product) && $product->sub_category_id == $value->id ? 'selected' : ''}}>
                  {{$value->category->name}} / {{$value->name}}
                </option>
              @endforeach
            </select>
          </div>
          
          <div class="form-group mb-3">
            <label for="name">Product Name</label>
            <input type="text" 
                   value="{{isset($product) ? $product->name : ''}}" 
                   class="form-control" 
                   name="name" 
                   required/>
          </div>
          
          <div class="form-group mb-3">
            <label for="price">Price</label>
            <input type="number" 
                   value="{{isset($product) ? $product->price : ''}}" 
                   class="form-control" 
                   name="price" 
                   step="0.01"
                   required/>
          </div>
          
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="color">Color</label>
              <input type="text" 
                     name="color" 
                     value="{{isset($product) ? $product->color : ''}}" 
                     class="form-control" 
                     placeholder="e.g. Red, Blue"/>
            </div>
            
            <div class="col-md-6 mb-3">
              <label for="size">Size</label>
              <input type="text" 
                     name="size" 
                     value="{{isset($product) ? $product->size : ''}}" 
                     class="form-control" 
                     placeholder="e.g. S, M, L, XL"/>
            </div>
          </div>

          {{-- <div class="form-group mb-3">
            <label for="description">Product Description</label>
            <textarea name="description" 
                      class="form-control" 
                      rows="4"
                      placeholder="Enter product description here...">{{isset($product) ? $product->description : ''}}</textarea>
          </div> --}}

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="quantity">Quantity (Stock)</label>
              <input type="number" 
                     name="quantity" 
                     value="{{isset($product) ? $product->quantity : ''}}" 
                     class="form-control"/>
            </div>
            
            <div class="col-md-6 mb-3">
              <label for="outofstock">Out of Stock?</label>
              <select name="outofstock" class="form-select">
                <option value="0" {{isset($product) && $product->outofstock == 0 ? 'selected' : ''}}>
                  In Stock
                </option>
                <option value="1" {{isset($product) && $product->outofstock == 1 ? 'selected' : ''}}>
                  Out of Stock
                </option>
              </select>
            </div>
          </div>
          

          <div class="form-group mb-3">
            <label for="thumbnail">Product Thumbnail</label>
            <input type="file" 
                   class="form-control" 
                   name="thumbnail" 
                   {{isset($product) ? '' : 'required'}} 
                   accept="image/*"/>
          </div>
          
        </div>
        
        <!-- Modal Footer -->
        <div class="modal-footer">
          <input type="hidden" name="id" value="{{isset($product) ? $product->id : ''}}">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
        
      </form>

    </div>
  </div>
</div>

@push('script')
@if ($product)
<script>
const myModalEl = document.getElementById('productModal');
const modalInstance = bootstrap.Modal.getOrCreateInstance(myModalEl);
modalInstance.show();
</script>
@endif
@endpush