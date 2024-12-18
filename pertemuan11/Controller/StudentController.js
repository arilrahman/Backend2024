// TODO 3: Import data students dari folder data/students.js
// code here
const students = require('../data/students.js')

// Membuat Class StudentController
class StudentController {
    index(req, res) {
      // TODO 4: Tampilkan data students
      const data = {
        "msg" : "Menampilkan semua students",
        "data" : students
      }

      res.status(200).json(data)
    }
  
    store(req, res) {
      // TODO 5: Tambahkan data students
      const {name} = req.body;
      students.push(name)

      const data = {
        "msg" : `menambah data student : ${name}`,
        "data" : students
      }
      res.status(201).json(data)
    }
  
    update(req, res) {
      // TODO 6: Update data students
      const {id} = req.params;
      const {name} = req.body;

      students[id] = name;

      const data = {
        "msg" : `mengedit student : ${name}`,
        "data" : students
      }

      res.status(200).json(data)
    }

  
    destroy(req, res) {
      // TODO 7: Hapus data students
      const {id} = req.params;
      const deletedStudent = students.splice(id, 1);
      const name = deletedStudent[0];
       const data = {
        "msg" : `${name} berhasil di hapus`,
        "data" : students
      };
      
      res.status(200).json(data)
    }
  }
  
  // Membuat object StudentController
  const object = new StudentController();
  
  // Export object StudentController
  module.exports = object;