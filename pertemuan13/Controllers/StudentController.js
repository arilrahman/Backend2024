// import Model Student
const Student = require("../models/Student");

class StudentController {
  // menambahkan keyword async
  async index(req, res) {
    // memanggil method static all dengan async await.
    const students = await Student.all();
    if (students.length > 0) {
      const data = {
        message: "Menampilkkan semua students",
        data: students,
      };

      res.json(data);
    } else {
      const data = {
        message: "Students is empty",
      };
      res.status(200).json(data);
    }
  }

  //store
  async store(req, res) {
    // destructing object req.body
    const { nama, nim, email, jurusan } = req.body;

    // jika data undefined maka kirim response error
    if (!nama || !nim || !email || !jurusan) {
      const data = {
        message: "Semua data harus dikirim",
      };

      return res.status(422).json(data);
    }
    // else
    const student = await Student.create(req.body);

    const data = {
      message: "Menambahkan data student",
      data: student,
    };
    return res.status(201).json(data);
  }

  update(req, res) {
    const { id } = req.params;
    const { nama } = req.body;

    const data = {
      message: `Mengedit student id ${id}, nama ${nama}`,
      data: [],
    };

    res.json(data);
  }

  //destroy
  async destroy(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);

    if (student) {
      await Student.delete(id);
      const data = {
        message: `Menghapus data students`,
      };

      res.status(200).json(data);
    } else {
      const data = {
        message: `Student not found`,
      };

      res.status(404).json(data);
    }
  }

  //show
  async show(req, res) {
    const { id } = req.params;
    // cari student berdasarkan id
    const student = await Student.find(id);

    if (student) {
      const data = {
        message: `Menampilkan detail students`,
        data: student,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: `Student not found`,
      };
      res.status(404).json(data);
    }
  }
}
// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
