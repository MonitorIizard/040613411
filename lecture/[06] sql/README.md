PHPmyAdmin : How can I install into my project ?

```
user : Wstd8
password : az02MP6a
database : sec1_8
```

Traditional website :
cost ต่ำ, maintanance ต่ำ

Single page : asynchonus เกิดการ connection ไม่กำหนดเวลา

### Workshop 1/13

```bash
 mariadb -u Wstd8 -p
```

My database is `sec1_8`

```bash
use sec1_8
```

insert

```sql
MariaDB [sec1_8]> INSERT INTO product (pid, pname, pdetail, price) VALUES (2,"Ester-C", "Vitamin C", 500)
    -> ;
Query OK, 1 row affected (0.004 sec)

MariaDB [sec1_8]> INSERT INTO product (pid, pname, pdetail, price) VALUES (3,"Glucosamine", "a boon for joint and protect joint from aging", 1200);
Query OK, 1 row affected (0.003 sec)
```

```sql
Database changed
MariaDB [sec1_8]> SELECT * FROM product;
+-----+-------------+-----------------------------------------------+-------+
| pid | pname       | pdetail                                       | price |
+-----+-------------+-----------------------------------------------+-------+
|   1 | Caltrate    | a boon for bone and improve vitamin D         |   760 |
|   2 | Ester-C     | Vitamin C                                     |   500 |
|   3 | Glucosamine | a boon for joint and protect joint from aging |  1200 |
+-----+-------------+-----------------------------------------------+-------+
```

### Workshop 2/13 : import file

command

```sql
mysql -u Wtsd8 -p sec1_8 < bluelock.sql
```

then type password

```
az02MP6a
```

```sql
MariaDB [(none)]> use sec1_8
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
MariaDB [sec1_8]> show tables;
+------------------+
| Tables_in_sec1_8 |
+------------------+
| item             |
| member           |
| orders           |
| product          |
+------------------+
4 rows in set (0.001 sec)
```

<hr>

### Workshop 3/13 : Select Field

![alt text](schema.png)

```sql
SELECT name, mobile, email FROM  member;
```

outcome

```sql
MariaDB [sec1_8]> SELECT (name, mobile, email) FROM  member;
ERROR 1241 (21000): Operand should contain 1 column(s)
MariaDB [sec1_8]> SELECT name, mobile, email FROM  member;
+------------------------------------------------------+--------------+---------------------+
| name                                                 | mobile       | email               |
+------------------------------------------------------+--------------+---------------------+
| สมศักดิ์ สุรเสถียร                                   |              | somsak@gmail.com    |
| บารมี บุญหลาย                                        | 08-9446-9955 | baramee@gmail.com   |
| เมธาสิทธิ์ สอนสั่ง                                   | 08-4456-9877 | metasit@outlook.com |
+------------------------------------------------------+--------------+---------------------+
```

<hr>

### Workshop 4/13 : Show product that have cost between 500 - 1000

sql command :

```sql
SELECT pname, price
FROM product
WHERE price >= 500
AND price < 1000;
```

output :

```sql
MariaDB [sec1_8]> SELECT pname, price
    -> FROM product
    -> WHERE price >= 500
    -> AND price < 1000
    -> ;
+----------+-------+
| pname    | price |
+----------+-------+
| Caltrate |   760 |
| Ester-C  |   500 |
+----------+-------+
2 rows in set (0.001 sec)
```

<hr>

### Workshop 5/13 : display member whose name start with `บ`

sql command :

```sql
SELECT name FROM member
WHERE name LIKE 'บ%';
```

outcome :

```sql
MariaDB [sec1_8]> SELECT name FROM member
    -> WHERE name LIKE 'บ%'
    -> ;
+---------------------------------------+
| name                                  |
+---------------------------------------+
| บารมี บุญหลาย                         |
+---------------------------------------+
1 row in set (0.000 sec)
```

note : `%` is mean zero, one, or multiple characters.

<hr>

### Workshop 6/13 : Display user who use Gmail and ascending from Z-A

```sql
SELECT * FROM  member
ORDER BY username DESC;
```

outcome :

```sql
MariaDB [sec1_8]> SELECT * FROM  member
    -> ORDER BY username DESC;
+----------+----------+------------------------------------------------------+--------------------------------------------------------------------------+--------------+---------------------+
| username | password | name                                                 | address                                                                  | mobile       | email               |
+----------+----------+------------------------------------------------------+--------------------------------------------------------------------------+--------------+---------------------+
| somsak   | 1899     | สมศักดิ์ สุรเสถียร                                   | 174 ถ.มิตรภาพ จ.ขอนแก่น                                                  |              | somsak@gmail.com    |
| metasit  | m345     | เมธาสิทธิ์ สอนสั่ง                                   | 98/13 ถ.ศรีจันทร์ จ.ขอนแก่น                                               | 08-4456-9877 | metasit@outlook.com |
| baramee  | aafff1   | บารมี บุญหลาย                                        | 123 ถ.วิภาวดีรังสิต กรุงเทพฯ                                             | 08-9446-9955 | baramee@gmail.com   |
+----------+----------+------------------------------------------------------+--------------------------------------------------------------------------+--------------+---------------------+
3 rows in set (0.001 sec)

```

<hr>

### Workshop 7/13 : Display name of user and buying date from `member` and `orders` table

```sql
SELECT name, ord_date
FROM member INNER JOIN orders
ON member.username = orders.username;
```

outcome :

```sql
Database changed
MariaDB [sec1_8]> SELECT name, ord_date FROM member INNER JOIN orders ON member.username =
orders.username;
+------------------------------------------------------+---------------------+
| name                                                 | ord_date            |
+------------------------------------------------------+---------------------+
| บารมี บุญหลาย                                        | 2013-07-16 23:25:14 |
| เมธาสิทธิ์ สอนสั่ง                                   | 2013-02-12 23:25:40 |
| บารมี บุญหลาย                                        | 2013-12-27 23:26:44 |
| เมธาสิทธิ์ สอนสั่ง                                   | 2013-12-11 23:27:11 |
+------------------------------------------------------+---------------------+
4 rows in set (0.001 sec)
```

<hr>

### Workshop 8/13 : conclusion of each order

```sql
SELECT orders.ord_id, orders.ord_date, member.name FROM
orders INNER JOIN member
ON member.username = orders.username;
```

```sql
MariaDB [sec1_8]> SELECT orders.ord_id, orders.ord_date, member.name FROM
    -> orders INNER JOIN member
    -> ON member.username = orders.username;
+--------+---------------------+------------------------------------------------------+
| ord_id | ord_date            | name                                                 |
+--------+---------------------+------------------------------------------------------+
|      1 | 2013-07-16 23:25:14 | บารมี บุญหลาย                                        |
|      2 | 2013-02-12 23:25:40 | เมธาสิทธิ์ สอนสั่ง                                   |
|      3 | 2013-12-27 23:26:44 | บารมี บุญหลาย                                        |
|      4 | 2013-12-11 23:27:11 | เมธาสิทธิ์ สอนสั่ง                                   |
+--------+---------------------+------------------------------------------------------+
```

```sql
SELECT orders.ord_id, orders.ord_date, member.name, item.quantity, item.pid FROM
orders
INNER JOIN member
ON member.username = orders.username
INNER JOIN item
ON item.ord_id = orders.ord_id;
```

```sql
MariaDB [sec1_8]> SELECT orders.ord_id, orders.ord_date, member.name, item.quantity, item.pid FROM
    -> orders
    -> INNER JOIN member
    -> ON member.username = orders.username
    -> INNER JOIN item
    -> ON item.ord_id = orders.ord_id;
+--------+---------------------+------------------------------------------------------+----------+-----+
| ord_id | ord_date            | name                                                 | quantity | pid |
+--------+---------------------+------------------------------------------------------+----------+-----+
|      1 | 2013-07-16 23:25:14 | บารมี บุญหลาย                                        |        2 |   2 |
|      1 | 2013-07-16 23:25:14 | บารมี บุญหลาย                                        |        5 |   3 |
|      1 | 2013-07-16 23:25:14 | บารมี บุญหลาย                                        |        1 |   4 |
|      2 | 2013-02-12 23:25:40 | เมธาสิทธิ์ สอนสั่ง                                   |        2 |   1 |
|      2 | 2013-02-12 23:25:40 | เมธาสิทธิ์ สอนสั่ง                                   |        4 |   3 |
|      2 | 2013-02-12 23:25:40 | เมธาสิทธิ์ สอนสั่ง                                   |        3 |   4 |
|      3 | 2013-12-27 23:26:44 | บารมี บุญหลาย                                        |        3 |   2 |
|      3 | 2013-12-27 23:26:44 | บารมี บุญหลาย                                        |        5 |   4 |
|      4 | 2013-12-11 23:27:11 | เมธาสิทธิ์ สอนสั่ง                                   |        5 |   1 |
|      4 | 2013-12-11 23:27:11 | เมธาสิทธิ์ สอนสั่ง                                   |        1 |   3 |
+--------+---------------------+------------------------------------------------------+----------+-----+
```

```sql
    SELECT orders.ord_id, orders.ord_date, member.name, item.quantity, item.pid
    ,product.price
    FROM
    orders
    INNER JOIN member
    ON member.username = orders.username
    INNER JOIN item
    ON item.ord_id = orders.ord_id
    INNER JOIN product
    ON product.pid = item.pid;
```

```sql
MariaDB [sec1_8]> SELECT orders.ord_id, orders.ord_date, member.name, item.quantity, item.pid
    -> ,product.price
    -> FROM
    -> orders
    -> INNER JOIN member
    -> ON member.username = orders.username
    -> INNER JOIN item
    -> ON item.ord_id = orders.ord_id
    -> INNER JOIN product
    -> ON product.pid = item.pid;
+--------+---------------------+------------------------------------------------------+----------+-----+-------+
| ord_id | ord_date            | name                                                 | quantity | pid | price |
+--------+---------------------+------------------------------------------------------+----------+-----+-------+
|      1 | 2013-07-16 23:25:14 | บารมี บุญหลาย                                        |        2 |   2 |   760 |
|      1 | 2013-07-16 23:25:14 | บารมี บุญหลาย                                        |        5 |   3 |   500 |
|      1 | 2013-07-16 23:25:14 | บารมี บุญหลาย                                        |        1 |   4 |  1200 |
|      2 | 2013-02-12 23:25:40 | เมธาสิทธิ์ สอนสั่ง                                   |        2 |   1 |   350 |
|      2 | 2013-02-12 23:25:40 | เมธาสิทธิ์ สอนสั่ง                                   |        4 |   3 |   500 |
|      2 | 2013-02-12 23:25:40 | เมธาสิทธิ์ สอนสั่ง                                   |        3 |   4 |  1200 |
|      3 | 2013-12-27 23:26:44 | บารมี บุญหลาย                                        |        3 |   2 |   760 |
|      3 | 2013-12-27 23:26:44 | บารมี บุญหลาย                                        |        5 |   4 |  1200 |
|      4 | 2013-12-11 23:27:11 | เมธาสิทธิ์ สอนสั่ง                                   |        5 |   1 |   350 |
|      4 | 2013-12-11 23:27:11 | เมธาสิทธิ์ สอนสั่ง                                   |        1 |   3 |   500 |
+--------+---------------------+------------------------------------------------------+----------+-----+-------+
```

Add sum, Distinct

```sql
SELECT name, orders.ord_date,  member.name, Sum(item.quantity),  product.price * SUM(item.quantity)
    FROM
    orders
    INNER JOIN member
    ON member.username = orders.username
    INNER JOIN item
    ON item.ord_id = orders.ord_id
    INNER JOIN product
    ON product.pid = item.pid
GROUP BY
    orders.ord_id;
```

```sql
+------------------------------------------------------+---------------------+------------------------------------------------------+--------------------+------------------------------------+
| name                                                 | ord_date            | name                                                 | Sum(item.quantity) | product.price * SUM(item.quantity) |
+------------------------------------------------------+---------------------+------------------------------------------------------+--------------------+------------------------------------+
| บารมี บุญหลาย                                        | 2013-07-16 23:25:14 | บารมี บุญหลาย                                        |                  8 |                               6080 |
| เมธาสิทธิ์ สอนสั่ง                                   | 2013-02-12 23:25:40 | เมธาสิทธิ์ สอนสั่ง                                   |                  9 |                               3150 |
| บารมี บุญหลาย                                        | 2013-12-27 23:26:44 | บารมี บุญหลาย                                        |                  8 |                               6080 |
| เมธาสิทธิ์ สอนสั่ง                                   | 2013-12-11 23:27:11 | เมธาสิทธิ์ สอนสั่ง                                   |                  6 |                               2100 |
+------------------------------------------------------+---------------------+------------------------------------------------------+--------------------+------------------------------------+

```

<hr>

### Workshop 9/13

```sql
MariaDB [sec1_8]> SELECT product.pname, SUM(quantity)
    -> FROM product
    -> INNER JOIN item
    -> ON product.pid = item.pid
    -> GROUP BY product.pid;
+-------------+---------------+
| pname       | SUM(quantity) |
+-------------+---------------+
| Centrum     |             7 |
| Caltrate    |             5 |
| Ester-C     |            10 |
| Glucosamine |             9 |
+-------------+---------------+
```

### Workshop 10/13

```sql
MariaDB [sec1_8]> SELECT product.pname, orders.ord_date 
    -> FROM product 
    -> INNER JOIN item
    -> ON product.pid = item.pid
    -> INNER JOIN orders
    -> ON item.ord_id = orders.ord_id 
    -> ORDER BY product.pname; 
+-------------+---------------------+
| pname       | ord_date            |
+-------------+---------------------+
| Caltrate    | 2013-12-27 23:26:44 |
| Caltrate    | 2013-07-16 23:25:14 |
| Centrum     | 2013-12-11 23:27:11 |
| Centrum     | 2013-02-12 23:25:40 |
| Ester-C     | 2013-12-11 23:27:11 |
| Ester-C     | 2013-07-16 23:25:14 |
| Ester-C     | 2013-02-12 23:25:40 |
| Glucosamine | 2013-02-12 23:25:40 |
| Glucosamine | 2013-12-27 23:26:44 |
| Glucosamine | 2013-07-16 23:25:14 |
+-------------+---------------------+
```

<hr>

### Workshop 11/13

```sql
SELECT product.pname, product.price * SUM(item.quantity)
FROM product
INNER JOIN item
ON product.pid = item.pid
GROUP BY product.pname;
```

```sql
MariaDB [sec1_8]> SELECT product.pname, product.price * SUM(item.quantity)
    -> FROM product
    -> INNER JOIN item
    -> ON product.pid = item.pid
    -> GROUP BY product.pname;
+-------------+------------------------------------+
| pname       | product.price * SUM(item.quantity) |
+-------------+------------------------------------+
| Caltrate    |                               3800 |
| Centrum     |                               2450 |
| Ester-C     |                               5000 |
| Glucosamine |                              10800 |
+-------------+------------------------------------+
```

<hr>

### Workshop 12/13

```sql
SELECT member.name, SUM(item.quantity) * product.price
FROM member
INNER JOIN orders
ON member.username = orders.username
INNER JOIN item
ON orders.ord_id = item.ord_id
INNER JOIN product
ON product.pid = item.pid
GROUP BY member.name;
```

```sql
MariaDB [sec1_8]> SELECT member.name, SUM(item.quantity) * product.price
    -> FROM member
    -> INNER JOIN orders
    -> ON member.username = orders.username
    -> INNER JOIN item
    -> ON orders.ord_id = item.ord_id
    -> INNER JOIN product
    -> ON product.pid = item.pid
    -> GROUP BY member.name;
+------------------------------------------------------+------------------------------------+
| name                                                 | SUM(item.quantity) * product.price |
+------------------------------------------------------+------------------------------------+
| บารมี บุญหลาย                                        |                              12160 |
| เมธาสิทธิ์ สอนสั่ง                                   |                               5250 |
+------------------------------------------------------+------------------------------------+
2 rows in set (0.002 sec)
```

<hr>

### Workshop 13/13

```sql
SELECT orders.ord_date, SUM(item.quantity) * product.price
FROM orders
INNER JOIN item
ON orders.ord_id = item.ord_id
INNER JOIN product
ON product.pid = item.pid
GROUP BY orders.ord_date;
```

```sql
MariaDB [sec1_8]> SELECT orders.ord_date, SUM(item.quantity) * product.price
    -> FROM orders
    -> INNER JOIN item
    -> ON orders.ord_id = item.ord_id
    -> INNER JOIN product
    -> ON product.pid = item.pid
    -> GROUP BY orders.ord_date;
+---------------------+------------------------------------+
| ord_date            | SUM(item.quantity) * product.price |
+---------------------+------------------------------------+
| 2013-02-12 23:25:40 |                               3150 |
| 2013-07-16 23:25:14 |                               6080 |
| 2013-12-11 23:27:11 |                               2100 |
| 2013-12-27 23:26:44 |                               6080 |
+---------------------+------------------------------------+
```