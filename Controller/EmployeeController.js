// Import Model Employee
const Employee = require("../Models/Employee");

// Buat class EmployeeController
class EmployeeController {
  // Mendapatkan semua data karyawan
  async index(req, res) {
    try {
      const Employees = await Employee.findAll();
      res.status(200).json({
        message: "Get All Resource",
        data: Employees,
      });
    } catch (error) {
      res.status(500).json({ message: error.message });
    }
  }

  // Menambahkan data karyawan baru
  async store(req, res) {
    try {
      const { name, gender, phone, address, email, status, hired_on } = req.body;
      if (!name || !gender || !phone || !address || !email || !status || !hired_on) {
        return res.status(422).json({ message: "All fields must be filled correctly" });
      }

      const Employee = await Employee.create({
        name,
        gender,
        phone,
        address,
        email,
        status,
        hired_on,
      });

      res.status(201).json({
        message: "Resource is added successfully",
        data: Employee,
      });
    } catch (error) {
      res.status(500).json({ message: error.message });
    }
  }

  // Memperbarui data karyawan berdasarkan ID
  async update(req, res) {
    try {
      const { id } = req.params;
      const { name, gender, phone, address, email, status, hired_on } = req.body;

      const Employee = await Employee.findByPk(id);
      if (!Employee) {
        return res.status(404).json({ message: "Resource not found" });
      }

      await Employee.update({ name, gender, phone, address, email, status, hired_on });
      res.status(200).json({
        message: "Resource is updated successfully",
        data: Employee,
      });
    } catch (error) {
      res.status(500).json({ message: error.message });
    }
  }

  // Menghapus data karyawan berdasarkan ID
  async destroy(req, res) {
    try {
      const { id } = req.params;

      const Employee = await Employee.findByPk(id);
      if (!Employee) {
        return res.status(404).json({ message: "Resource not found" });
      }

      await Employee.destroy();
      res.status(200).json({ message: "Resource is deleted successfully" });
    } catch (error) {
      res.status(500).json({ message: error.message });
    }
  }

  // Mendapatkan data karyawan berdasarkan ID
  async show(req, res) {
    try {
      const { id } = req.params;

      const Employee = await Employee.findByPk(id);
      if (!Employee) {
        return res.status(404).json({ message: "Resource not found" });
      }

      res.status(200).json({
        message: "Get Detail Resource",
        data: Employee,
      });
    } catch (error) {
      res.status(500).json({ message: error.message });
    }
  }

  // Mencari karyawan berdasarkan nama
  async search(req, res) {
    try {
      const { name } = req.params;

      const Employees = await Employee.findAll({ where: { name } });
      if (Employees.length === 0) {
        return res.status(404).json({ message: "Resource not found" });
      }

      res.status(200).json({
        message: "Get searched resource",
        data: Employees,
      });
    } catch (error) {
      res.status(500).json({ message: error.message });
    }
  }

  // Mendapatkan karyawan berdasarkan status
  async findByStatus(req, res) {
    try {
      const { status } = req.params;

      const Employees = await Employee.findAll({ where: { status } });
      res.status(200).json({
        message: `Get ${status} resource`,
        total: Employees.length,
        data: Employees,
      });
    } catch (error) {
      res.status(500).json({ message: error.message });
    }
  }
}

// Membuat object EmployeeController
const object = new EmployeeController();

// Export object EmployeeController
module.exports = object;
