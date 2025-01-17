// Import EmployeeController
const EmployeeController = require("../Controller/EmployeeController");

// Import express
const express = require("express");

// Membuat object router
const router = express.Router();

/**
 * Routing default untuk API
 */
router.get("/", (req, res) => {
  res.send("Hello HRD API Express");
});

/**
 * Routing untuk resource Employees
 */
router.get("/Employees", EmployeeController.index); // Mendapatkan semua data
router.post("/Employees", EmployeeController.store); // Menambahkan data baru
router.put("/Employees/:id", EmployeeController.update); // Memperbarui data
router.delete("/Employees/:id", EmployeeController.destroy); // Menghapus data
router.get("/Employees/:id", EmployeeController.show); // Mendapatkan data spesifik
router.get("/Employees/search/:name", EmployeeController.search); // Mencari berdasarkan nama
router.get("/Employees/status/:status", EmployeeController.findByStatus); // Berdasarkan status

// Export router
module.exports = router;
