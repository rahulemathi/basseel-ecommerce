<x-app-layout>
<div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">  
    <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
      <img class="w-full" alt="{{ $product->product_image }}" src="{{ asset('images/'.$product->product_image) }}" />
    </div>
    <div class="md:hidden">
      <img class="w-full" alt="image of a girl posing" src="https://i.ibb.co/QMdWfzX/component-image-one.png" />
      <div class="flex items-center justify-between mt-3 space-x-4 md:space-x-0">
        <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="https://i.ibb.co/cYDrVGh/Rectangle-245.png" />
        <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="https://i.ibb.co/f17NXrW/Rectangle-244.png" />
        <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="https://i.ibb.co/cYDrVGh/Rectangle-245.png" />
        <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="https://i.ibb.co/f17NXrW/Rectangle-244.png" />
      </div>
    </div>
    <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
      <div class="border-b border-gray-200 pb-6">
        <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white mt-2">{{ $product->product_name }}</h1>
      </div>
    
      <div>
        <p class="xl:pr-48 text-base lg:leading-tight leading-normal text-gray-600 dark:text-gray-300 mt-7">{{ $product->product_description }}</p>
        <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Price:₹ {{ $product->product_price }}</p>
        <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">In Stock: {{ $product->stock_quantity }} units avaliable</p>
        <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Product Category: {{ $product->product_category }}</p>
        <form action="{{ url('add_cart/'.$product->id) }}" method="post">
          @csrf
        <button type="submit" class="px-3 md:px-4 py-1 md:py-2 my-4 bg-sky-600 border border-sky-600 text-white rounded-lg hover:bg-sky-700"><i class="fa-solid fa-arrow-right-to-bracket"></i> Add to Cart</button>
        </form>
      </div>
      <div>
        <div class="border-t border-b py-4 mt-7 border-gray-200">
          <div data-menu class="flex justify-between items-center cursor-pointer">
            <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Shipping and returns</p>
            <button class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded" role="button" aria-label="show or hide">
              <svg class="transform text-gray-300 dark:text-white" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 1L5 5L1 1" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
          </div>
          <div class="hidden pt-4 text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300" id="sect">You will be responsible for paying for your own shipping costs for returning your item. Shipping costs are nonrefundable</div>
        </div>
      </div>
      <div>
        <div class="border-b py-4 border-gray-200">
          <div data-menu class="flex justify-between items-center cursor-pointer">
            <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Contact us</p>
            <button class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded" role="button" aria-label="show or hide">
              <svg class="transform text-gray-300 dark:text-white" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 1L5 5L1 1" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
          </div>
          <div class="hidden pt-4 text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300" id="sect">If you have any questions on how to return your item to us, contact us.</div>
        </div>
      </div>
    </div>
  </div>
  <script>
      let elements = document.querySelectorAll("[data-menu]");
  for (let i = 0; i < elements.length; i++) {
    let main = elements[i];
    main.addEventListener("click", function () {
      let element = main.parentElement.parentElement;
      let andicators = main.querySelectorAll("svg");
      let child = element.querySelector("#sect");
      child.classList.toggle("hidden");
      andicators[0].classList.toggle("rotate-180");
    });
  }
  </script>
</x-app-layout>