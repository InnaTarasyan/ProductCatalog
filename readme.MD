# Каталог Продуктов 

## Описание
   Каталог товаров на Laravel.
   
   Базу данных необходимо регулярно пополнять с адреса https://markethot.ru/export/bestsp
   
   На главной странице можно увидеть 20 самых популярных товаров, а также перейти в одну из категорий. На странице категории будут отображаться товары данной категории.

   На главной странице есть поле для поиска по товарам. Товары можно искать по названию и описанию.
   

## Prerequisites
1) Ensure you have php version >= 7.0.0 <br/>
2) Make sure that you have MySQL installed 

## Run the site
After you have cloned or downloaded the project, navigate to the corresponding directory<br/>

1) Install all the dependencies as specified in the composer.json file:  <br/>
   composer install  <br/>
   php artisan vendor:publish <br/> 

2) Copy the .env.example file to the .env file, and set the corresponding keys <br/>
   CATALOG_URL=https://markethot.ru/export/bestsp

3) Execute the migrations<br/>
   php artisan migrate<br/>
   php artisan db:seed<br/>
   
4) Run the following: <br/> 
   php artisan key:generate <br/>
      
5) Run the site<br/>
   php artisan serve<br/>
   (alternatively create a virtual host)<br/>

6) For the Linux system cron, add the following Cron entry to your server: 
* * * * * php /path-to-the-project/artisan schedule:run >> /dev/null 2>&1 

Windows has GUI equivalent called Task Scheduler, that can be made to perform similar function.
 
7) You can get the data manually, executing the following command:
   php artisan import_cat:start

## Used Technologies
<ul> 
   <li>Laravel task scheduling</li>
   <li>Creating own artisan commands</li>
   <li>Laravel Guzzle HTTP library</li>
   <li>Laravel Datatables</li>
   <li></li>
</ul>

![ScreenShot](https://imgur.com/a/kFdNipC.png)


## Задание 1
### Напишите следующие SQL-запросы:
 Вывести список заказов вместе с количеством товаров в данных заказах

  ### Решение: 
  SELECT orders.*, count(orders_products.product_id) as product_count FROM `orders` join orders_products on orders.id = orders_products.order_id 
   group by orders.id


  Вывести все заказы, в которых больше 10 товаров
  ### Решение  
    
  SELECT orders.*  FROM `orders` join orders_products on orders.id = orders_products.order_id 
  group by orders.id
  having count(orders_products.product_id) > 10

  Вывести два любых заказа, у которых максимальное количество общих товаров    
  ### Решение
  
  
  
  #### Соединеняем таблицу orders_products саму с собой по одинаковому полю product_id и разным полям order_id ( условие t1.order_id < t2.order_id, чтобы не было повторяющихся пар типа 1,3 и 3,1). После этого смотрим количество совпадений у данной строки, берем самую первую из них, она и будет содержать два заказа, у которых максимальное количество общих товаров.
  select (select order_number from orders where id = t1.order_id) as first_order, 
  (select order_number from orders where id = t2.order_id) as second_order ,
  count(*) as cnt
  from orders_products t1 join orders_products t2 ON t1.product_id = t2.product_id and t1.order_id < t2.order_id
  group by t1.product_id, t2.product_id
  order by cnt desc limit 1