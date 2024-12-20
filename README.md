Create Fresh Laravel Web Application  

create routes, layout and login page

update users migration based on requirement

create middlware to check authenticated user has authorization access page

call middlware into App/Http/AppMiddleware.php

register AppMiddleware into bootrap/app.php file

Create RouteServiceProvider to make different route file for different users

Use Laravel Inbuild Auth functionality to login or register

Create files for admin, super admin, category, product, order, and cart

Create Factory and Seeder for all users

Create functionality super admin can add or edit the admins 

Create functionality to super admin can add or update category and catory produuct

Added SoftDelete and HardDelete functionality on Product module

User session to store current user product added to cart and see their all product

Implment functionality guest user can do product add into the cart and after that login all the card product store into datbase

Set 18% gst into the configuration file

Implement yajra datatable for list of admins, categories, orders, products and users

Create Scheduler for Hard delete the softedeled item, check the deleted_at column time and compare with current time, set cron will be run on everyMinutes

