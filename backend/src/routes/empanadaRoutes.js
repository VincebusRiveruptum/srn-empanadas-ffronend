import express from "express";
import { empanadaController } from "../controllers/empanadaController.js";

const router = express.Router();

// Add prefix pending
router.get("empanadas", empanadaController.indexEmpanadas);
router.post("empanada", empanadaController.storeEmpanada);
router.put("empanada/:id", empanadaController.updateEmpanada);
router.delete("empanada/:id", empanadaController.deleteEmpanada);

export default router;
