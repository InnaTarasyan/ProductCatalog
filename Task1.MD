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