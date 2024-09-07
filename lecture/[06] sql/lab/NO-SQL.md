## Part C :

We using `MongoDB`

### Data preparation

```bash
owl@Macintosh ~ % mongosh "mongodb+srv://cluster0.2scrx.mongodb.net/" --apiVersion 1 --username mokmaard646
Enter password: ****************
```

database in `MongoDB`
```sql
Atlas atlas-tti3y7-shard-0 [primary] test> show dbs
sample_mflix  110.43 MiB
student        12.00 KiB
admin         340.00 KiB
local           1.64 GiB
```

collections in `student` database
```bash
Atlas atlas-tti3y7-shard-0 [primary] student> show collections
course
register
student
```

inserting data 
```bash
Atlas atlas-tti3y7-shard-0 [primary] student> db.course.insertMany([
  {
course_id: "'322236'",
title: "'WEB APPLICATION PROGRAMMING'",
    credit: '3'
  },
  { course_id: "'322431'", title: "'WEB TECHNOLOGY'", credit: '3' },
  {
    course_id: "'322372'",
    title: "'SYSTEMS ANALYSIS AND DESIGN'",
    credit: '3'
  },
  {
    course_id: "'322224'",
    title: "'DIGITAL LOGIC AND COMPUTER INTERFACING'",
    credit: '3'
  },
  {
    course_id: "'322114'",
    title: "'STRUCTURED PROGRAMMING'",
    credit: '3'
  },
  {
    course_id: "'322473'",
    title: "'SOFTWARE DEVELOPMENT AND PROJECT MANAGEMENT'",
    credit: '3;'
  }
)]
```

data in `course` collection

```bash
Atlas atlas-tti3y7-shard-0 [primary] student> db.course.find()
[
  {
    _id: ObjectId('66dc1930e89cd2c8dbec309e'),
    course_id: "'322236'",
    title: "'WEB APPLICATION PROGRAMMING'",
    credit: '3'
  },
  {
    _id: ObjectId('66dc1930e89cd2c8dbec309f'),
    course_id: "'322431'",
    title: "'WEB TECHNOLOGY'",
    credit: '3'
  },
  {
    _id: ObjectId('66dc1930e89cd2c8dbec30a0'),
    course_id: "'322372'",
    title: "'SYSTEMS ANALYSIS AND DESIGN'",
    credit: '3'
  },
  {
    _id: ObjectId('66dc1930e89cd2c8dbec30a1'),
    course_id: "'322224'",
    title: "'DIGITAL LOGIC AND COMPUTER INTERFACING'",
    credit: '3'
  },
  {
    _id: ObjectId('66dc1930e89cd2c8dbec30a2'),
    course_id: "'322114'",
    title: "'STRUCTURED PROGRAMMING'",
    credit: '3'
  },
  {
    _id: ObjectId('66dc1930e89cd2c8dbec30a3'),
    course_id: "'322473'",
    title: "'SOFTWARE DEVELOPMENT AND PROJECT MANAGEMENT'",
    credit: '3;'
  }
]
```

insert data into `register` collections

```bash
Atlas atlas-tti3y7-shard-0 [primary] student> db.register.insertMany([
...   {
...     std_id: "'5001100348'",
...     courses: [
...       { cousre_id: "'322236'" },
...       { cousre_id: "'322114'" },
...       { cousre_id: "'322224'" }
...     ]
...   },
...   {
...     std_id: "'5001104807'",
...     courses: [ { cousre_id: "'322236'" }, { cousre_id: "'322431'" } ]
...   },
...   {
...     std_id: "'5001101634'",
...     courses: [ { cousre_id: "'322236'" }, { cousre_id: "'322431'" } ]
...   },
...   {
...     std_id: "'5001101811'",
120060'",
...     courses: [
...       { cousre_id: "'322236'" },
...       { cousre_id: "'322224'" },
...       { cousre_id: "'322114'" }
...     ]
...   },
...   {
...     std_id: "'5001120060'",
...     courses: [ { cousre_id: "'322372'" }, { cousre_id: "'322114'" } ]
...   }
... ])
{
  acknowledged: true,
  insertedIds: {
    '0': ObjectId('66dc2439e89cd2c8dbec30b7'),
    '1': ObjectId('66dc2439e89cd2c8dbec30b8'),
    '2': ObjectId('66dc2439e89cd2c8dbec30b9'),
    '3': ObjectId('66dc2439e89cd2c8dbec30ba'),
    '4': ObjectId('66dc2439e89cd2c8dbec30bb')
  }
}
```

insert student information into `student` collection

```bash
Atlas atlas-tti3y7-shard-0 [primary] student> db.student.insertMany([
...   {
...     std_id: "'5001100348'",
...     std_name: "'นุชนารถ ขําทอง'",
...     province: "'ขอนแก่น'"
...   },
ฑนา ทองอยู่'",
    province: "'เลย'"
  },
  {
...   {
...     std_id: "'5001104807'",
...     std_name: "'มัณฑนา ทองอยู่'",
...     province: "'เลย'"
...   },
...   {
...     std_id: "'5001101634'",
...     std_name: "'จักรพงศ์ คนล่ํ่ำ'",
...     province: "'กรุงเทพฯ'"
...   },
...   {
...     std_id: "'5001101811'",
...     std_name: "'นัยนา คําภู'",
...     province: "'ขอนแก่น'"
...   },
...   {
...     std_id: "'5001102962'",
...     std_name: "'พรเทพ ชัยราชย์'",
...     province: "'อุดรธานี'"
...   },
...   {
...     std_id: "'5001120060'",
...     std_name: "'มงคล บัวขาว'",
...     province: "'อุบลราชธานี'"
...   },
...   {
...     std_id: "'5001130201'",
...     std_name: "'ชํานาญ  สุ่มนุช'",
...     province: "'นครราชสีมา'"
...   }
... ])
{
  acknowledged: true,
  insertedIds: {
    '0': ObjectId('66dc1c77e89cd2c8dbec30b0'),
    '1': ObjectId('66dc1c77e89cd2c8dbec30b1'),
    '2': ObjectId('66dc1c77e89cd2c8dbec30b2'),
    '3': ObjectId('66dc1c77e89cd2c8dbec30b3'),
    '4': ObjectId('66dc1c77e89cd2c8dbec30b4'),
    '5': ObjectId('66dc1c77e89cd2c8dbec30b5'),
    '6': ObjectId('66dc1c77e89cd2c8dbec30b6')
  }
}
```

### 1. Display student information and ascending by name

```bash
Atlas atlas-tti3y7-shard-0 [primary] student> db.student.find({}, {"std_id" : 1, std_name : 1, province:1, _id : 0}).sort( {std_name : 1} )
[
  {
    std_id: "'5001101634'",
    std_name: "'จักรพงศ์ คนล่ํ่ำ'",
    province: "'กรุงเทพฯ'"
  },
  {
    std_id: "'5001130201'",
    std_name: "'ชํานาญ  สุ่มนุช'",
    province: "'นครราชสีมา'"
  },
  {
    std_id: "'5001101811'",
    std_name: "'นัยนา คําภู'",
    province: "'ขอนแก่น'"
  },
  {
    std_id: "'5001100348'",
    std_name: "'นุชนารถ ขําทอง'",
    province: "'ขอนแก่น'"
  },
  {
    std_id: "'5001102962'",
    std_name: "'พรเทพ ชัยราชย์'",
    province: "'อุดรธานี'"
  },
  {
    std_id: "'5001120060'",
    std_name: "'มงคล บัวขาว'",
    province: "'อุบลราชธานี'"
  },
  {
    std_id: "'5001104807'",
    std_name: "'มัณฑนา ทองอยู่'",
    province: "'เลย'"
  }
]
```

breakdown

|  command |  meaning |
|---|---|
| `db.student`  | access `student collection`  |
| `.find({}, {"std_id" : 1, std_name : 1, province : 1, _id : 0})` | SELECT std_id, and std_name field only. By default `MongoDB` will select `_id` to so turn it into `0`. <br><br>  first `{}` is for `WHERE` condition since we don't have any, I'm going to let it empty. 
|
|`.sort( {std_name : 1} )`| `sort` by name|


<hr>

### 2. Display student id and name

```bash
Atlas atlas-tti3y7-shard-0 [primary] student> db.student.find({}, {std_id : 1, std_name: 1, _id:0})
[
  { std_id: "'5001100348'", std_name: "'นุชนารถ ขําทอง'" },
  { std_id: "'5001104807'", std_name: "'มัณฑนา ทองอยู่'" },
  { std_id: "'5001101634'", std_name: "'จักรพงศ์ คนล่ํ่ำ'" },
  { std_id: "'5001101811'", std_name: "'นัยนา คําภู'" },
  { std_id: "'5001102962'", std_name: "'พรเทพ ชัยราชย์'" },
  { std_id: "'5001120060'", std_name: "'มงคล บัวขาว'" },
  { std_id: "'5001130201'", std_name: "'ชํานาญ  สุ่มนุช'" }
]
```

<hr>

### 3. Display all student information that stay in ขอนเเก่น

```bash
Atlas atlas-tti3y7-shard-0 [primary] student> db.student.find({province:"'ขอนแก่น'"}, {std_id : 1, std_name: 1, province: 1, _id:0})
[
  {
    std_id: "'5001100348'",
    std_name: "'นุชนารถ ขําทอง'",
    province: "'ขอนแก่น'"
  },
  {
    std_id: "'5001101811'",
    std_name: "'นัยนา คําภู'",
    province: "'ขอนแก่น'"
  }
]
```

<hr>

### 4. Display subject that have been enroll by student who have id `500100348`.

```bash

```
