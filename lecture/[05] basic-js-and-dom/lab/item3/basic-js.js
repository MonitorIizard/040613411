let students = [
  {
    fullname: "นายตั้งใจ เรียนมาก",
    age: 18,
    year: 1,
    gpa: 3.4,
    help: true,
  },
  {
    fullname: "นายส่งงาน ตลอดมา",
    age: 19,
    year: 2,
    gpa: 3.0,
    help: false,
  },
  {
    fullname: "นางสาวใสใจ ดีงาม",
    age: 20,
    year: 3,
    gpa: 2.9,
    help: true,
  },
  {
    fullname: "นายโมกข์ มาอาจ",
    age: 20,
    year: 3,
    gpa: 2.0,
    help: true,
  },
];

let passing = {};

for (let i = 0; i < students.length; i++) {
  const { fullname, year, gpa, help, age } = students[i];
  const date = new Date();

  if (!passing[`year${year}`]) {
    passing[`year${year}`] = {pass : []};
  }

  if (gpa > 3.2 || (gpa > 2.75 && help)) {
    passing[`year${year}`].pass.push(fullname);

    console.log(
      `${fullname} เกิดเมื่อปี ${
        date.getFullYear() + 543 - age
      } ได้ทุนการศึกษา เนื่องจากเกรดเฉลี่ยถึงเกณฑ์และยังช่วยงานภาควิชาด้วย`
    );

  } else {
    console.log(
      `${fullname} เกิดเมื่อปี ${
        date.getFullYear() + 543 - age
      } ไม่ได้ทุนการศึกษา เนื่องจากเกรดเฉลี่ยไม่ถึงเกณฑ์และยังไม่ได้ช่วยงานภาควิชาด้วย`
    );
  }
}

for (let year in passing) {
  const passList = passing[year].pass;
  
  console.log(year);

  if (passList) {
    for (let i = 0; i < passList.length; i++) {
      console.log(
        `${passList[i]} ได้ทุนการศึกษา เนื่องจากเกรดเฉลี่ยถึงเกณฑ์และยังช่วยงานภาควิชาด้วย`
      );
    }
  } else {
    console.log("ไม่มี");
  }

  console.log();
}
