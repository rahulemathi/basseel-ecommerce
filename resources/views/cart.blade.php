<x-app-layout>
    <!-- Create By Joker Banny -->
<style>
    @layer utilities {
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  }
</style>

@if($cart_items >0)
  <div class="h-screen bg-gray-100 pt-20">
    <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
        
      <div class="rounded-lg md:w-2/3">
        @foreach($cart as $cart)
        <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
          <img src="{{ asset('images/'.$cart->image) }}" alt="product-image" class="w-full rounded-lg sm:w-40" />
          <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
            <div class="mt-5 sm:mt-0">
              <h2 class="text-lg font-bold text-gray-900">{{ $cart->product_name }}</h2>
            </div>
            <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
              <div class="flex items-center border-gray-100">
                <input class="h-8 w-10 border bg-white text-center text-xs outline-none" type="number" value="{{ $cart->quantity }}" disabled />
              </div>
              <div class="flex items-center space-x-4">
                <p class="text-sm">₹ {{ $cart->price }} / Unit</p>
                <form action="{{ url('remove_cart_item/'.$cart->id) }}" method="get">
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">remove</button>
                </form>
                
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    
    
      <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
        <hr class="my-4" />
        <div class="flex justify-between">
          <p class="text-lg font-bold">Total</p>
          <div class="">
            <form action="{{ url('checkout') }}" method="get">
            <p class="mb-1 text-lg font-bold">₹ {{ $total_price }}</p>
            <input type="hidden" name="checkoutprice" value="{{ $total_price }}">
            <p class="text-sm text-gray-700">including VAT</p>
          </div>
        </div>
        <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button>
        </form>
      </div>
    </div>
  </div>
  @else
  <p>No items in cart please continue shopping</p>
@endif
</x-app-layout>