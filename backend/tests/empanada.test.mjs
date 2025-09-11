import { jest } from "@jest/globals";
import request from "supertest";

const { pool } = await import("../src/db/connect.js");
const app = (await import("../app.js")).default;

jest.unstable_mockModule("../src/db/connect.js", () => ({
  pool: {
    query: jest.fn(),
  },
}));

// ==== TESTS
describe("Empanada API", () => {
  beforeEach(() => {
    jest.clearAllMocks();
  });

  it("Index empanadas", async () => {
    pool.query.mockResolvedValueOnce([
      [
        { id: 1, name: "Empanada de Pino", price: 2000, is_sold_out: false },
        { id: 2, name: "Empanada de Queso", price: 1500, is_sold_out: true },
      ],
    ]);

    const res = await request(app).get("/empanadas");

    expect(res.statusCode).toBe(200);
    expect(res.body).toHaveProperty("success", true);
    expect(res.body.data).toHaveLength(2);
    expect(res.body.data[0].name).toBe("Empanada de Pino");
  });

  it("Create empanada", async () => {
    const newEmpanada = {
      name: "Empanada de Pollo",
      type: "Baked", // Baked or Fried remember
      filling: "Chicken",
      description: "Tasty chicken empanada",
      price: 1800,
      is_sold_out: false,
    };

    pool.query.mockResolvedValueOnce([{ insertId: 123 }]);

    const res = await request(app).post("/empanadas").send(newEmpanada);

    expect(res.statusCode).toBe(200);
    expect(res.body).toHaveProperty("success", true);
  });

  it("Delete empanada", async () => {
    pool.query.mockResolvedValueOnce([{ affectedRows: 1 }]);

    const res = await request(app).delete("/empanadas/1");

    expect(res.statusCode).toBe(200);
    expect(res.body).toHaveProperty("success", true);
    expect(res.body.id).toBe("1");
  });
});
