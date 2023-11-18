<x-app-layout>

    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
        
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
                  <a
                    href="javascript:void(0)"
                    class="inline-block py-2 px-7 border border-[#E5E7EB] rounded-full text-base text-body-color font-medium hover:border-primary hover:bg-primary hover:text-white transition"
                  >
                    View Details
                  </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      

</x-app-layout>
