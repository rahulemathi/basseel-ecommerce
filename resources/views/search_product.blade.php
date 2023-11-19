<x-app-layout>
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
    <div class="flex items-center justify-center my-10 bg-gray-100">
      
<div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
  <div class="flex items-center">
    <form action="{{ url('search') }}" method="get">
      <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" name="search" placeholder="Search name, categories">
      <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md">Search</button>
    </form>
  </div>
</div>
    </div>
<section class="pt-4 lg:pt-[40px] pb-4 lg:pb-4 bg-[#F3F4F6]">
    <div class="container">
      <h1 class="text-4xl text-center my-6">Products</h1>
      <div class="flex flex-wrap -mx-4">
        @foreach($product as $product)
        <div class="w-full md:w-1/2 xl:w-1/3 px-4">
          <div class="bg-white rounded-lg overflow-hidden mb-10">
            <img
              src="{{ asset('images/'.$product->product_image) }}"
              alt="{{ $product->product_image }}"
              class="w-full"
            />
            <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
              <h3>
                <a
                  href="javascript:void(0)"
                  class="font-semibold text-dark text-xl sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px] mb-4 block hover:text-primary"
                >
                  {{ $product->product_name }}
                </a>
              </h3>
              <p class="text-base text-body-color leading-relaxed mb-7">
              {{ Str::limit($product->product_description,100,'...') }}
              </p>
             
              <form action="{{ url('add_cart',$product->id) }}" method="post">
                @csrf
                <a
                href="{{ url('single_product',$product->id) }}"
                class="inline-block py-2 px-7 border border-[#E5E7EB] rounded-full text-base text-body-color font-medium hover:border-primary hover:bg-primary hover:text-white transition"
              >
                View Details
              </a>  
              <button type="submit" class="inline-block py-2 px-7 border border-[#E5E7EB] rounded-full text-base text-body-color font-medium hover:border-primary hover:bg-primary hover:text-white transition">
                Add to cart
              </button>
              <input type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 m-4" name="quantity" value="1" placeholder="quantity">
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
</x-app-layout>