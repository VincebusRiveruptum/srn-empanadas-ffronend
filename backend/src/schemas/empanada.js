import { maxLength, z } from "zod";

export const empanadaSchema = z.object({
  name: z.string().max(255),
  type: z.enum(["Baked", "Fried"]),
  filling: z.string(),
  description: z.string(),
  price: z.number(),
  is_sold_out: z.boolean(),
});
