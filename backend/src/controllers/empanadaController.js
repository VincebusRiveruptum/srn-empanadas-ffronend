import { pool } from "../db/connect.js";

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
    res.json({ success: true, data: empanadas });
  },

  storeEmpanada: async (req, res) => {
    // Validation ???

    // Store
    const result = await pool.query(
      "INSERT INTO empanadas (name, type, filling, description, price, is_sold_out) VALUES (?, ?, ?, ?, ?, ?)",
      Object.values(req.body)
    );
    res.json({ success: true });
  },

  updateEmpanada: async (req, res) => {
    const id = req.params.id;

    // TERRIBLE!
    const body = {
      name: req.body.name ?? null,
      type: req.body.type ?? null,
      filling: req.body.filling ?? null,
      description: req.body.description ?? null,
      price: req.body.price ?? null,
      is_sold_out: req.body.is_sold_out ?? null,
    };

    const result = await pool.query(
      "REPLACE INTO empanadas (id, name, type, filling, description, price, is_sold_out) VALUES (?, ?, ?, ?, ?, ?, ?)",
      [id, ...Object.values(body)]
    );
    res.json({ success: true });
  },

  deleteEmpanada: async (req, res) => {
    // Check if exists
    const id = req.params.id;

    const result = await pool.query("DELETE FROM empanadas WHERE id = ?", [id]);

    res.json({ success: true, id: id });
  },
};
