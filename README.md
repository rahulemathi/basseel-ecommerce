# Project

This is a simple ecommerce web application in which it has 3 users Admin,Seller,Customer
by default the user is customer.

## Installation

Clone the repo from below link

```bash
https://github.com/rahulemathi/basseel-ecommerce.git
```

rename the .env.example file to .env file

```bash
mv .env.example .env
```

then install composer
```bash
composer install
```
then generate key 
```bash
php artisan key:generate
```
then install node packages
```bash
npm i
```
then migrate the packages
```bash
php artisan migrate
```
ive added default admin and seller login details in seeder , to run seeder 
```bash
php artisan db:seed --class=defaultLogin
```
## Usage
start the app
```bash
php artisan serve
```
the start the npm
```bash
npm run dev
```

## Login Details
Administrator email : admin@gmail.com | 
 password : Admin@123
| seller email : ram@gmail.com | password : ram@123

## adding a product
login in as  a admin and the click in on the dropdown near your name, to add categories and add the categories as you wish. then click on add product in the same menu and add the fill the details;

## check as customer
login in as customer and then add a product, the item will be added in cart and the moment you click checkout it will be completed

## routes details

1. Route::get('categories',[mainController::class,'show_categories']); // used to show categories only to admins
2. Route::post('add_category',[mainController::class,'add_category']); // used to add categories, only admin can add categories
3. Route::get('remove_category/{id}',[mainController::class,'remove_category']); // used to remove categories, only admin can remove categories
4. Route::post('add_product',[mainController::class,'add_product'])->name('add_products'); // used to add product
5. Route::get('add_product',[mainController::class,'show_product_form'])->name('view_products'); // used to show product
6. Route::get('product',[mainController::class,'view_product'])->name('product'); // used to view product
7. Route::get('single_product/{id}',[mainController::class,'single_product']); // used to visit product details
8. Route::post('add_cart/{id}',[mainController::class,'add_cart']); // used to add to cart
9. Route::get('show_cart',[mainController::class,'show_Cart']); //used to visit cart
10. Route::get('remove_cart_item/{id}',[mainController::class,'remove_cart']); // used to remove from cart
11. Route::get('product_edit/{id}',[mainController::class,'edit_product']); // used to edit product, only admin and seller can edit
12. Route::post('update_product/{id}',[mainController::class,'update_product']); //update route
13. Route::get('delete_product/{id}',[mainController::class,'delete_product']); // used to delete the product, only admins and sellers can delete
14. Route::get('orders',[mainController::class,'orders']); // used to visit orders
15. Route::get('search',[mainController::class,'search']); // used to search product
16.Route::get('checkout',[mainController::class,'checkout']); // used to checkout with ordered