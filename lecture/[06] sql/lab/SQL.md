# Lab 7 SQL

## Part B :

Before we start, import database into `DBMS`

1. scp file in to remote host

```bash
scp [src/file] cs6520159@202.44.40.193:[destination]
```

2. import file

```bash
[02:47 PM] cs6520159 : 10 [predefined-db] $ mariadb -u Wstd8 -p sec1_8 < student.sql 
```

3. check

```sql
MariaDB [sec1_8]> show tables
    -> ;
+------------------+
| Tables_in_sec1_8 |
+------------------+
| course           |
| item             |
| member           |
| orders           |
| product          |
| register         |
| student          |
+------------------+
```

<hr>

### 1. Display student information and ascending by name

command:

```sql
SELECT std_id, std_name, province
FROM student
ORDER BY std_name;
```

outcome : 

```sql
MariaDB [sec1_8]> SELECT std_id, std_name, province
    -> FROM student
    -> ORDER BY std_name;
+------------+------------------------------------------------+-----------------------------------+
| std_id     | std_name                                       | province                          |
+------------+------------------------------------------------+-----------------------------------+
| 5001101634 | จักรพงศ์ คนล่ํ่ำ                               | กรุงเทพฯ                          |
| 5001130201 | ชํานาญ  สุ่มนุช                                | นครราชสีมา                        |
| 5001101811 | นัยนา คําภู                                    | ขอนแก่น                           |
| 5001100348 | นุชนารถ ขําทอง                                 | ขอนแก่น                           |
| 5001102962 | พรเทพ ชัยราชย์                                 | อุดรธานี                          |
| 5001120060 | มงคล บัวขาว                                    | อุบลราชธานี                       |
| 5001104807 | มัณฑนา ทองอยู่                                 | เลย                               |
+------------+------------------------------------------------+-----------------------------------+
```

<hr>

### 2. Display student id and name

```sql
SELECT std_id, std_name
FROM student;
```

```sql
MariaDB [sec1_8]> SELECT std_id, std_name
    -> FROM student;
+------------+------------------------------------------------+
| std_id     | std_name                                       |
+------------+------------------------------------------------+
| 5001100348 | นุชนารถ ขําทอง                                 |
| 5001104807 | มัณฑนา ทองอยู่                                 |
| 5001101634 | จักรพงศ์ คนล่ํ่ำ                               |
| 5001101811 | นัยนา คําภู                                    |
| 5001102962 | พรเทพ ชัยราชย์                                 |
| 5001120060 | มงคล บัวขาว                                    |
| 5001130201 | ชํานาญ  สุ่มนุช                                |
+------------+------------------------------------------------+

```

### 3. Display all student information that stay in ขอนเเก่น

command :

```sql
SELECT *
FROM student
WHERE province = "ขอนแก่น";
```

outcome :

```sql
MariaDB [sec1_8]> SELECT *
    -> FROM student
    -> WHERE province = "ขอนแก่น";
+------------+------------------------------------------+-----------------------+
| std_id     | std_name                                 | province              |
+------------+------------------------------------------+-----------------------+
| 5001100348 | นุชนารถ ขําทอง                           | ขอนแก่น               |
| 5001101811 | นัยนา คําภู                              | ขอนแก่น               |
+------------+------------------------------------------+-----------------------+
2 rows in set (0.001 sec)

```

<hr>

### 4. Display subject that have been enroll by student who have id `500100348`.

command : 
```sql
SELECT course.course_id, course.title, course.credit
FROM student
INNER JOIN register
ON student.std_id = register.std_id
INNER JOIN course
ON register.course_id = course.course_id
WHERE student.std_id = '5001100348';
```

output:

```sql
MariaDB [sec1_8]> SELECT course.course_id, course.title, course.credit
    -> FROM student
    -> INNER JOIN register
    -> ON student.std_id = register.std_id
    -> INNER JOIN course
    -> ON register.course_id = course.course_id
    -> WHERE student.std_id = '5001100348';
+-----------+----------------------------------------+--------+
| course_id | title                                  | credit |
+-----------+----------------------------------------+--------+
| 322236    | WEB APPLICATION PROGRAMMING            |      3 |
| 322114    | STRUCTURED PROGRAMMING                 |      3 |
| 322224    | DIGITAL LOGIC AND COMPUTER INTERFACING |      3 |
+-----------+----------------------------------------+--------+
3 rows in set (0.001 sec)
```

<hr>

### 5. Display number of credits each student enrolled.

command :

```sql
SELECT student.std_id, SUM(course.credit)
FROM student
INNER JOIN register
ON student.std_id = register.std_id
INNER JOIN course
ON register.course_id = course.course_id
GROUP BY student.std_id;
```

output : 

```sql
MariaDB [sec1_8]> SELECT student.std_id, SUM(course.credit)
    -> FROM student
    -> INNER JOIN register
    -> ON student.std_id = register.std_id
    -> INNER JOIN course
    -> ON register.course_id = course.course_id
    -> GROUP BY student.std_id;
+------------+--------------------+
| std_id     | SUM(course.credit) |
+------------+--------------------+
| 5001100348 |                  9 |
| 5001101634 |                  6 |
| 5001101811 |                  9 |
| 5001104807 |                  6 |
| 5001120060 |                  6 |
+------------+--------------------+
5 rows in set (0.001 sec)

```

note :

without `GROUP BY` it seem to `SUM` every row and give it to first  `row`.

```sql
MariaDB [sec1_8]> SELECT student.std_id, SUM(course.credit)
    -> FROM student
    -> INNER JOIN register
    -> ON student.std_id = register.std_id
    -> INNER JOIN course
    -> ON register.course_id = course.course_id;
+------------+--------------------+
| std_id     | SUM(course.credit) |
+------------+--------------------+
| 5001100348 |                 36 |
+------------+--------------------+
1 row in set (0.001 sec)
```