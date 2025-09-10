CREATE TABLE empanadas ( id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, filling TEXT, description TEXT, price DECIMAL(10, 2), is_sold_out BOOLEAN DEFAULT FALSE, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);

INSERT INTO empanadas (name, type, filling, description, price, is_sold_out)
VALUES 
  ('Pino', 'Baked', 'Beef, onion, egg, olives', 'Classic Chilean empanada', 1500.00, 0),
  ('Queso', 'Fried', 'Melted Fried filling', 'Simple and cheesy', 1200.00, 0),
  ('Vegetarian', 'Baked', 'Vegetarian Pino with soy beef', 'A good vegetarian alternative', 2000.00, 0),
  ('Fried Vegetarian', 'Fried', 'Vegetable filling with cheese, mushrooms and corn ', 'A more interesting vegetarian alternative ', 2000.00, 0),
  ('Camarón Queso ', 'Fried', 'Melted cheese filling with prawns', 'Cheesy and tasty', 2000.00, 0),
  ('Napolitana ', 'Baked', 'Italian filling with cheese, tomato, oregano and corn', 'Varied and tasteful!', 1600.00, 0);
