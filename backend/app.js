import express from "express";
import dotenv from "dotenv";
//import { notFound } from "./src/middlewares/notFound.js";
//import { handleError } from "./src/middlewares/handleError.js";
import empanadasRoute from "./src/routes/empanadas.js";
import cors from "cors";
dotenv.config();

const app = express();
const port = process.env.PORT || 3000;

console.log(process.env.FRONTEND_URL);
const corsOptions = {
  origin: process.env.FRONTEND_URL,
  optionsSuccessStatus: 200,
};

app.use(cors(corsOptions));
app.use(express.json());

// api routes
app.use("/empanadas", empanadasRoute);

// temp
//app.use(notFound);

// temp
//app.use(handleError);

app.listen(port, () => {
  console.log(`server running on port ${port}`);
});
