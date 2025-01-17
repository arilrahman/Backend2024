// Import Sequelize dan koneksi database
const { DataTypes } = require("sequelize");
const db = require("../config/database");

// Membuat class Employee
const Employee = db.define("Employee", {
  id: {
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true,
  },
  name: {
    type: DataTypes.STRING,
    allowNull: false,
  },
  gender: {
    type: DataTypes.CHAR(1),
    allowNull: false,
    validate: {
      isIn: [["M", "F"]], // M untuk Male, F untuk Female
    },
  },
  phone: {
    type: DataTypes.STRING,
    allowNull: false,
    validate: {
      isNumeric: true,
    },
  },
  address: {
    type: DataTypes.TEXT,
    allowNull: false,
  },
  email: {
    type: DataTypes.STRING,
    allowNull: false,
    unique: true,
    validate: {
      isEmail: true,
    },
  },
  status: {
    type: DataTypes.ENUM("active", "inactive", "terminated"),
    allowNull: false,
  },
  hired_on: {
    type: DataTypes.DATE,
    allowNull: false,
  },
}, {
  tableName: "Employees", // Nama tabel sesuai ketentuan
  timestamps: false, // Disable createdAt dan updatedAt jika tidak diperlukan
});

// Ekspor model Employee
module.exports = Employee;
