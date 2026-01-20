{{-- for prouct list  --}}
@forelse ($products as $product)
    
   
    <div class="product-card">
        
        
        <img src="{{asset('/uploads/products/' . $product->thumbnail) }}" 
             alt="{{$product->name}}" 
             class="card-img-top">
             
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            
            <p class="text-muted small mb-1">
                Category: {{ $product->category->name ?? 'N/A' }}
            </p>
            
            <p class="text-muted small">
                SubCategory: {{ $product->subCategory->name ?? 'N/A' }}
            </p>
            
            <p class="card-text fs-4 fw-bold text-success">${{number_format($product->price, 2)}}</p>
            
            <a href="#" class="btn btn-primary">View Details</a>
        </div>
    </div>
@empty
    <p style="grid-column: 1 / -1; text-align: center;">No products available right now.</p>
@endforelse