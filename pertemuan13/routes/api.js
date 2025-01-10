// import StudentController
const StudentController = require("../Controllers/StudentController");

const express = require("express");
const router = express.Router();

router.get("/", (req, res) => {
  res.send("Welcome to Student API");
});

// student routes
router.get("/students", StudentController.index);
router.post("/students", StudentController.store);
router.put("/students/:id", StudentController.update);
router.delete("/students/:id", StudentController.destroy);
// menambahkan route untuk get detail resource
router.get("/students/:id", StudentController.show);

// export router
module.exports = router;