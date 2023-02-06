/**
* @charset UTF-8
*/

Задание 4.1
1) /* Составьте список пользователей users, которые осуществили хотя бы один заказ orders в интернет магазине. */


Варианты:

SELECT u.name FROM users u INNER JOIN orders o ON (o.user_id = u.id) GROUP BY u.name HAVING COUNT(o.id) > 0

SELECT DISTINCT name FROM users u INNER JOIN orders o  ON u.id = o.user_id;

SELECT DISTINCT name FROM users u RIGHT OUTER JOIN orders o  ON u.id = o.user_id;

SELECT DISTINCT name FROM users u LEFT OUTER JOIN orders o  ON u.id = o.user_id WHERE o.id IS NOT null;



2) /* Выведите список товаров products и разделов catalogs, который соответствует товару. */


SELECT p.name, c.name
FROM products p
INNER JOIN catalogs AS c ON (p.catalog_id = c.id)
GROUP BY p.id

или
ORDER BY p.name



3) /*  В базе данных shop и sample присутствуют одни и те же таблицы.
* Переместите запись id = 1 из таблицы shop.users в таблицу sample.users. Используйте транзакции. */

SET AUTOCOMMIT=0;
START TRANSACTION;
INSERT INTO sample.users (name, birthday_at)
SELECT shop.users.name, shop.users.birthday_at
FROM shop.users
WHERE (id = 1);
COMMIT;


4)  /* Выведите одного случайного пользователя из таблицы shop.users, старше 30 лет, сделавшего минимум 3 заказа за последние полгода */
USE shop;

сделал "минимум 2 заказа", чтоб вывод был не пустой.

SELECT u.name
FROM users u
INNER JOIN orders o ON (o.user_id = u.id)
WHERE ( TIMESTAMPDIFF( YEAR, u.birthday_at, CURDATE() ) ) > 30 AND
(TIMESTAMPDIFF( DAY, o.created_at, CURDATE() )  < 183)
GROUP BY u.name
HAVING COUNT(o.id) >= 2
ORDER BY RAND() LIMIT 1;