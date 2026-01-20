@extends('frontend.frontendLayout')

@section('title', 'Home')

@section('content')

@include('frontend.partials.hero')

<!-- Products Section -->
<section class="products-section" id="products">
    <div class="container">
        <div class="section-title">
            <h2>Featured Products</h2>
            <p>Discover our hand-picked collection</p>
        </div>
        
        <div class="product-grid">
            @forelse ($products as $product)
                @include('frontend.partials.product-card', ['product' => $product])
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 80px 20px;">
                    <i class="fa-solid fa-box-open" style="font-size: 80px; color: #ddd;"></i>
                    <p class="text-muted mt-3" style="font-size: 18px;">No products available right now.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection