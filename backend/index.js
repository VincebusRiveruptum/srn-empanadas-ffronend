import express from "express";
import dotenv from "dotenv";
//import { notFound } from "./src/middlewares/notFound.js";
//import { handleError } from "./src/middlewares/handleError.js";
import empanadasRoute from "./src/routes/empanadaRoutes.js";
import cors from "cors";
dotenv.config();

const app = express();
const port = process.env.PORT || 3000;

const corsOptions = {
  origin: process.env.FRONTEND_URL,
  optionsSuccessStatus: 200,
};

//middleware
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
