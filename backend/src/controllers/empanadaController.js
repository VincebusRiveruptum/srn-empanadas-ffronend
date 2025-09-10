import { pool } from "../db/connect.js";

export const empanadaController = {
  indexEmpanadas: async (req, res) => {
    // Pagination
    let [empanadas] = await pool.query(
      "SELECT * FROM empanadas ORDER BY created_at DESC"
    );
    res.json(empanadas);
  },

  showEmpanada: async (req, res) => {
    let empanadaId = req.params.id;
    let [empanadas] = await pool.query(
      "SELECT * FROM empanadas WHERE id = ?",
      empanadaId
    );
    res.json(empanadas);
  },
  
  storeEmpanada: (req, res) => {
    // Store here
    res.send("Hello World!");
  },

  updateEmpanada: (req, res) => {
    res.send("Hello World!");
  },

  deleteEmpanada: (req, res) => {
    res.send("Hello World!");
  },
};
