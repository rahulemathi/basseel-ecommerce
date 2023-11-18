<x-app-layout>
  @include('sweetalert::alert')
  <div class="max-w-lg mx-auto bg-white p-6 rounded-md shadow-md my-4">
    <h2 class="text-2xl font-semibold mb-4">Add Product</h2>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Product Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Product Name</label>
            <input type="text" name="product_name" id="name" class="mt-1 p-2 border w-full rounded" required>
        </div>
        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
            <textarea name="product_description" id="description" rows="3"
                class="mt-1 p-2 border w-full rounded" required></textarea>
        </div>
        <!-- Price -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-600">Price</label>
            <input type="number" name="product_price" id="price" class="mt-1 p-2 border w-full rounded" required>
        </div>
        <!-- Category -->
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
        <!-- Stock -->
        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-600">Stock</label>
            <input type="number" name="stock_quantity" id="stock" class="mt-1 p-2 border w-full rounded" required>
        </div>
        <!-- Image Upload -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-600">Image</label>
            <input type="file" name="product_image" id="image" class="mt-1 p-2 border w-full rounded" required>
        </div>
        <!-- Submit Button -->
        <button type="submit"
            class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Add</button>
    </form>
</div>
</x-app-layout>