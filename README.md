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