<!-- The Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Category Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Form starts here -->
      <form action="{{route('category.addUpdate')}}" method="post" enctype="multipart/form-data">
        @csrf
        
        <!-- Modal Body -->
        <div class="modal-body">
          
          <div class="form-group mb-3">
            <label for="name">Category Name</label>
            <input type="text" 
                   value="{{isset($category)?$category->name:''}}" 
                   class="form-control" 
                   name="name" 
                   {{isset($category)? '':'required'}}/>
          </div>
          
          <div class="form-group mb-3">
            <label for="thumbnail">Category Thumbnail</label>
            <input type="file" 
                   class="form-control" 
                   name="thumbnail" 
                   {{isset($category)? '':'required'}} 
                   accept="image/*"/>
          </div>
          
        </div>
        
        <!-- Modal Footer -->
        <div class="modal-footer">
          <input type="hidden" name="id" value="{{isset($category)?$category->id:''}}">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
        
      </form>

    </div>
  </div>
</div>

@push('script')
@if ($category)
<script>
const myModalEl = document.getElementById('categoryModal');
const modalInstance = bootstrap.Modal.getOrCreateInstance(myModalEl);
modalInstance.show();
</script>
@endif    
@endpush