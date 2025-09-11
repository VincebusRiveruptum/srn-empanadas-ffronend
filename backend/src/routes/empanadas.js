import express from "express";
import { empanadaController } from "../controllers/empanadaController.js";

const router = express.Router();

// Add prefix pending
router.get("/", empanadaController.indexEmpanadas);
router.get("/:id", empanadaController.showEmpanada);
router.post("/", empanadaController.storeEmpanada);
router.patch("/:id", empanadaController.updateEmpanada);
router.delete("/:id", empanadaController.deleteEmpanada);

export default router;
