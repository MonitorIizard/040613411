const util = require('util')

let course = `('322236', 'WEB APPLICATION PROGRAMMING', 3),
('322431', 'WEB TECHNOLOGY', 3),
('322372', 'SYSTEMS ANALYSIS AND DESIGN', 3),
('322224', 'DIGITAL LOGIC AND COMPUTER INTERFACING', 3),
('322114', 'STRUCTURED PROGRAMMING', 3),
('322473', 'SOFTWARE DEVELOPMENT AND PROJECT MANAGEMENT', 3);`;

let register = `
('5001100348', '322236'),
('5001100348', '322114'),
('5001100348', '322224'),
('5001104807', '322236'),
('5001104807', '322431'),
('5001101634', '322236'),
('5001101634', '322431'),
('5001101811', '322236'),
('5001101811', '322224'),
('5001101811', '322114'),
('5001120060', '322372'),
('5001120060', '322114');`;

let std = `('5001100348', 'นุชนารถ ขําทอง', 'ขอนแก่น'),
('5001104807', 'มัณฑนา ทองอยู่', 'เลย'),
('5001101634', 'จักรพงศ์ คนล่ํ่ำ', 'กรุงเทพฯ'),
('5001101811', 'นัยนา คําภู', 'ขอนแก่น'),
('5001102962', 'พรเทพ ชัยราชย์', 'อุดรธานี'),
('5001120060', 'มงคล บัวขาว', 'อุบลราชธานี'),
('5001130201', 'ชํานาญ  สุ่มนุช', 'นครราชสีมา');`;


let no_sql = [];
let obj_number = 0;
let mode = 0;

register = register.split(',');

let stdIdPrev;

let i = 0;
while ( i < register.length ) {
  let currentElement = register[i].replace(' ', '').replaceAll('\n', '');
  let firstCharOfEle = currentElement[0];
  let stdIdCur = currentElement.replaceAll('(', '');

  if ( firstCharOfEle == '(' && currentElement.slice(1) != stdIdPrev ) {
    mode = 0;
    no_sql[obj_number] = {};

    stdIdPrev = stdIdCur;
    no_sql[obj_number]["std_id"] = stdIdPrev;
    no_sql[obj_number]["courses"] = [];

    obj_number++;

    mode = 1;
  }

  if ( stdIdCur == stdIdPrev ) {
    i++;
    continue;
  }

  if ( mode == 1 ) {
    let arrayOfCourse = no_sql[obj_number - 1]["courses"];
    no_sql[obj_number - 1]["courses"] = [...arrayOfCourse, { cousre_id : currentElement.replaceAll(')', '').replace(';', '')}];
  }

  i++;
} 

console.log(util.inspect(no_sql, {showHidden: false, depth: null, colors: true}));

std = std.split(',');

i = 0;
while ( i < std.length ) {
  let currentElement = std[i].replace(' ', '').replaceAll('\n', '');
  let firstCharOfEle = currentElement[0];

  if ( firstCharOfEle == '(' ) {
    mode = 0;
    no_sql[obj_number] = {};

    no_sql[obj_number]["std_id"] = currentElement.replaceAll('(', '');
  }

  if ( mode == 1 ) {
    no_sql[obj_number]["std_name"] = currentElement;

  }

  if ( mode == 2 ) {
    no_sql[obj_number++]["province"] = currentElement.replaceAll(')', '').replace(';', '');
  }

  mode++;
  i++;
} 

console.log(no_sql);