const { body, validationResult } = require("express-validator");

const validateEmployee = [
  // Validasi field nama
  body("name")
    .notEmpty().withMessage("Name is required")
    .isLength({ min: 3 }).withMessage("Name must be at least 3 characters"),

  // Validasi field email
  body("email")
    .notEmpty().withMessage("Email is required")
    .isEmail().withMessage("Invalid email format"),

  // Validasi field status
  body("status")
    .notEmpty().withMessage("Status is required")
    .isIn(["active", "inactive", "terminated"]).withMessage("Invalid status"),

  // Middleware untuk menangkap error validasi
  (req, res, next) => {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).json({ errors: errors.array() });
    }
    next();
  },
];

module.exports = { validateEmployee };
