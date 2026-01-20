<div class="product-card">
    
    <!-- Product Image -->
    <div class="product-image">
        @if ($product->thumbnail)
            <img src="/{{$product->thumbnail}}" alt="{{$product->name}}">
        @else
            <img src="https://via.placeholder.com/400x500?text=No+Image" alt="No Image">
        @endif
        
        <!-- Quick Actions -->
        <div class="quick-actions">
            <button class="quick-action-btn" title="Add to Wishlist">
                <i class="fa-regular fa-heart"></i>
            </button>
            <button class="quick-action-btn" title="Quick View">
                <i class="fa-solid fa-eye"></i>
            </button>
        </div>
    </div>
    
    <!-- Product Info -->
    <div class="product-info">
        <div class="product-category">
            {{$product->category->name ?? 'Uncategorized'}}
        </div>
        <h3 class="product-title">{{$product->name}}</h3>
        <div class="product-price">
            ${{number_format($product->price, 2)}}
        </div>
        <button class="add-to-cart">
            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
        </button>
    </div>
</div>