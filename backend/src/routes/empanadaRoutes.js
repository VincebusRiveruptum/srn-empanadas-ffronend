import express from "express";
import { empanadaController } from "../controllers/empanadaController.js";

const router = express.Router();

// Add prefix pending
router.get("/", empanadaController.indexEmpanadas);
router.post("/", empanadaController.storeEmpanada);
router.put("/:id", empanadaController.updateEmpanada);
router.delete(":id", empanadaController.deleteEmpanada);

export default router;
