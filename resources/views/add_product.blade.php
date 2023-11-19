<x-app-layout>

  <div class="max-w-lg mx-auto bg-white p-6 rounded-md shadow-md my-4">
    <h2 class="text-2xl font-semibold mb-4">Add Product</h2>
    <form action="add_product" method="post" enctype="multipart/form-data">
        @csrf
       
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Product Name</label>
            <input type="text" name="product_name" id="name" class="mt-1 p-2 border w-full rounded" required>
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
            <textarea name="product_description" id="description" rows="3"
                class="mt-1 p-2 border w-full rounded" required></textarea>
        </div>
       
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-600">Price</label>
            <input type="number" name="product_price" id="price" class="mt-1 p-2 border w-full rounded" required>
        </div>
        
        <div class="mb-4"> 
          <label for="select" class="block text-sm font-medium text-gray-600">Select Category</label>
          <select id="select" name="product_category"
          class="block appearance-none w-full  hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline-blue focus:border-blue-300" required>
          <option value="" selected disabled>Select a category</option>
          @foreach($categories as $category)
          <option value="{{ $category->category }}">{{ $category->category }}</option>
          @endforeach
      </select>
        </div>
       
        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-600">Stock</label>
            <input type="number" name="stock_quantity" id="stock" class="mt-1 p-2 border w-full rounded" required>
        </div>
       
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-600">Image</label>
            <input type="file" name="product_image" id="image" class="mt-1 p-2 border w-full rounded" required>
        </div>
        
        <button type="submit"
            class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Add</button>
    </form>
</div>

<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div class="flex flex-col justify-center">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Products</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Image</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Category</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Price</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">In Stock</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Edit</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Delete</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach($product as $product)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="{{ asset('images/'.$product->product_image) }}" width="40" height="40" alt="Alex Shatov"></div>
                                        <div class="font-medium text-gray-800"> {{ $product->product_name }}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $product->product_category }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium text-green-500">₹ {{ $product->product_price }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">{{ $product->stock_quantity }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">
                                        <button  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="{{ url('product_edit/'.$product->id) }}">Edit</a></button>
                                    </div>
                                </td>

                                <td class="p-2 whitespace-nowrap">
                                   <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><a href="{{ url('delete_product/'.$product->id) }}" onclick="return confirm('are you sure to delete this product')">Delete</a></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</x-app-layout>