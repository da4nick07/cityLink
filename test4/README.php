/**
* @charset UTF-8
*/

Задание 4. Mysql

1) /* Составьте список пользователей users, которые осуществили хотя бы один заказ orders в интернет магазине. */
create DATABASE shop;
use shop;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
id SERIAL PRIMARY KEY,
name VARCHAR(255) COMMENT 'Имя покупателя',
birthday_at DATE COMMENT 'Дата рождения',
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) COMMENT = 'Покупатели';

DROP TABLE IF EXISTS orders;
CREATE TABLE orders (
id SERIAL PRIMARY KEY,
user_id INT UNSIGNED,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
KEY index_of_user_id(user_id)
) COMMENT = 'Заказы';

INSERT INTO orders VALUES
(DEFAULT, 1, DEFAULT, DEFAULT),
(DEFAULT, 1, DEFAULT, DEFAULT),
(DEFAULT, 2, DEFAULT, DEFAULT)

INSERT INTO users VALUES
(DEFAULT, 'alex73', '1982-10-11', NOW(), NOW()),
(DEFAULT, 'admin', '1990-01-01', NOW(), NOW()),
(DEFAULT, 'third client', '1990-01-01', NOW(), NOW())

2) /* Выведите список товаров products и разделов catalogs, который соответствует товару. */
USE shop;
DROP TABLE IF EXISTS products;
CREATE TABLE products (
id SERIAL PRIMARY KEY,
name VARCHAR(255) COMMENT 'Название',
desription TEXT COMMENT 'Описание',
price DECIMAL (11,2) COMMENT 'Цена',
catalog_id INT UNSIGNED,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
KEY index_of_catalog_id (catalog_id)
) COMMENT = 'Товарные позиции';

INSERT INTO products VALUES
(DEFAULT, 'Intel 8080', '', 8, 1, DEFAULT, DEFAULT),
(DEFAULT, 'Intel 8086', '', 9, 1, DEFAULT, DEFAULT),
(DEFAULT, 'MSI 123', '', 34, 2, DEFAULT, DEFAULT);

DROP TABLE IF EXISTS catalogs;
CREATE TABLE catalogs (
id SERIAL PRIMARY KEY,
name VARCHAR(255) COMMENT 'Название раздела',
UNIQUE unique_name(name(10))
) COMMENT = 'Разделы интернет-магазина';


INSERT INTO catalogs VALUES
(DEFAULT, 'Processors'),
(DEFAULT, 'Mother boards'),
(DEFAULT, 'Video cards');

3) /*  В базе данных shop и sample присутствуют одни и те же таблицы.
* Переместите запись id = 1 из таблицы shop.users в таблицу sample.users. Используйте транзакции. */

create DATABASE sample;
use sample;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
id SERIAL PRIMARY KEY,
name VARCHAR(255) COMMENT 'Имя покупателя',
birthday_at DATE COMMENT 'Дата рождения',
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) COMMENT = 'Покупатели';

INSERT INTO users VALUES
(DEFAULT, 'sample user', '1990-01-01', DEFAULT, DEFAULT);

4)  /* Выведите одного случайного пользователя из таблицы shop.users, старше 30 лет, сделавшего минимум 3 заказа за последние полгода */
USE shop;

