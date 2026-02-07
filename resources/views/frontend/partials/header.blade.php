<!-- Top Header -->
<div class="top-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="contact-info">
                {{-- <i class="fa-solid fa-phone"></i> +977 9809809980 --}}
            </div>
            <div class="user-links">
                <a href="{{ route('category.index') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                <a href="{{ route('login') }}"><i class="fa-solid fa-user"></i> Login</a>
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
                <div class="search-wrapper">

                    <form action="{{ url('/') }}" method="GET" class="search-bar">

                        <select name="category_id" id="category_filter" onchange="filterSubCategories()">
                            <option value="">All Category</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>

                        <div class="search-divider"></div>

                        <select name="sub_category_id" id="subcategory_filter">
                            <option value="">Sub-Category</option>
                        </select>

                        <div class="search-divider"></div>

                        <input type="text" id="search_input" name="search" placeholder="Search products..."
                            autocomplete="off">

                        <button type="submit">
                            <i class="fa-solid fa-search"></i>
                        </button>
                    </form>

                    <div id="search_results_box" class="search-results-box">
                        <ul id="search_results_list" class="search-results-list">
                        </ul>
                    </div>

                </div>
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
<script>
    // 
    const allSubCategories = @json($subCategories);
    const allProducts = @json($products);

    // --- Part A: Sub-Categories ---
    function filterSubCategories() {
        const categoryId = document.getElementById('category_filter').value;
        const subCatSelect = document.getElementById('subcategory_filter');

        subCatSelect.innerHTML = '<option value="">All Sub-Cats</option>';

        if (categoryId) {
            const filteredSubs = allSubCategories.filter(sub => sub.category_id == categoryId);
            filteredSubs.forEach(sub => {
                const option = document.createElement('option');
                option.value = sub.id;
                option.text = sub.name;
                subCatSelect.add(option);
            });
        }
    }

    // --- Part B: Live Search  ---
    const searchInput = document.getElementById('search_input');
    const resultsBox = document.getElementById('search_results_box');
    const resultsList = document.getElementById('search_results_list');

    searchInput.addEventListener('keyup', function() {
        let query = searchInput.value.toLowerCase();

        if (query.length > 0) {

            // Filter products
            const matches = allProducts.filter(product => {
                return product.name.toLowerCase().includes(query);
            });

            // Clear old results
            resultsList.innerHTML = '';

            if (matches.length > 0) {
                resultsBox.style.display = 'block'; // Show box

                
                matches.slice(0, 5).forEach(product => {
                    let li = document.createElement('li');

                    
                    li.className = 'search-result-item';

                    
                    li.onclick = function() {
                        searchInput.value = product.name;
                        resultsBox.style.display = 'none';
                    };

                    
                    li.innerHTML = `
                        <img src="/${product.thumbnail}" class="search-result-thumb">
                        <div class="search-result-info">
                            <span class="search-result-name">${product.name}</span>
                            <span class="search-result-price">$${product.price}</span>
                        </div>
                    `;

                    resultsList.appendChild(li);
                });
            } else {
                resultsBox.style.display = 'none'; // No matches
            }
        } else {
            resultsBox.style.display = 'none'; // Input empty
        }
    });

    // Close when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !resultsBox.contains(e.target)) {
            resultsBox.style.display = 'none';
        }
    });
</script>
