<!-- Top Header -->
<div class="top-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="contact-info">
                {{-- <i class="fa-solid fa-phone"></i> +977 9809809980 --}}
            </div>
            <div class="user-links">
                <a href="{{ route('category.index') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                <a href="#"><i class="fa-solid fa-user"></i> My Account</a>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="main-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-2">
                <a href="/" class="logo">Eleven AM</a>
            </div>
            <div class="col-md-7">
                <form action="/" method="GET" class="search-bar"
                    style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 50px; padding: 5px; background: #fff;">

                    <select name="category_id" id="category_filter" onchange="updateSubCategories()"
                        style="border: none; background: transparent; padding: 0 10px; outline: none; border-right: 1px solid #eee;">
                        <option value="">All Categories</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>

                    <select name="sub_category_id" id="subcategory_filter"
                        style="border: none; background: transparent; padding: 0 10px; outline: none; border-right: 1px solid #eee;">
                        <option value="">All Sub-Categories</option>
                    </select>

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search for products..."
                        style="border: none; padding: 0 15px; flex-grow: 1; outline: none;">

                    <button type="submit"
                        style="background: white; border: none; border-radius: 50%; padding: 10px; cursor: pointer;">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="col-md-3">
                <div class="header-icons justify-content-end">
                    <a href="#" class="header-icon">
                        <i class="fa-regular fa-heart"></i>
                        <span class="badge-count">0</span>
                    </a>
                    <a href="#" class="header-icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="badge-count">0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
