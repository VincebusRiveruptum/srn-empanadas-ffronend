import { pool } from "../db/connect.js";
import { empanadaSchema } from "../schemas/empanada.js";

export const empanadaController = {
  indexEmpanadas: async (req, res) => {
    // Pagination
    let [empanadas] = await pool.query(
      "SELECT * FROM empanadas ORDER BY created_at DESC"
    );
    res.json({ success: true, data: empanadas });
  },

  showEmpanada: async (req, res) => {
    const empanadaId = req.params.id;
    const [empanadas] = await pool.query(
      "SELECT * FROM empanadas WHERE id = ?",
      empanadaId
    );
    res.json({ success: true, data: empanadas[0] });
  },

  storeEmpanada: async (req, res) => {
    try {
      const empandadaForm = await empanadaSchema.safeParseAsync(req.body);

      if (!empandadaForm.success) {
        res.json({ success: false, errors: empandadaForm.error });
      }
      // Store
      const result = await pool.query(
        "INSERT INTO empanadas (name, type, filling, description, price, is_sold_out) VALUES (?, ?, ?, ?, ?, ?)",
        Object.values(req.body)
      );
      res.json({ success: true });
    } catch (err) {
      res.json({ success: false, message: err });
    }
  },

  updateEmpanada: async (req, res) => {
    try {
      const id = req.params.id;

      const result = await pool.query(
        "REPLACE INTO empanadas (id, name, type, filling, description, price, is_sold_out) VALUES (?, ?, ?, ?, ?, ?, ?)",
        [id, ...Object.values(body)]
      );
      res.json({ success: true });
    } catch (e) {
      res.json({ success: false, message: err });
    }
  },

  deleteEmpanada: async (req, res) => {
    try {
      const id = req.params.id;

      const result = await pool.query("DELETE FROM empanadas WHERE id = ?", [
        id,
      ]);

      res.json({ success: true, id: id });
    } catch (e) {
      res.json({ success: false, message: err });
    }
  },
};
