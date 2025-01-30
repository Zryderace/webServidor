CREATE SCHEMA tienda_bd;
USE tienda_bd;

CREATE TABLE proveedores (
    nombre_proveedor VARCHAR(80) PRIMARY KEY,
    ciudad VARCHAR(40),
    telefono VARCHAR(15)
);

CREATE TABLE productos (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre_producto VARCHAR(80) UNIQUE NOT NULL,
    categoria_producto VARCHAR(50) NOT NULL,
    precio NUMERIC(10,2) NOT NULL,
    stock INT NOT NULL,
    nombre_proveedor VARCHAR(80),
    FOREIGN KEY (nombre_proveedor) REFERENCES proveedores(nombre_proveedor)
);

CREATE TABLE usuarios (
    usuario VARCHAR(50) PRIMARY KEY,
    contrasena VARCHAR(255) NOT NULL,
    admin BOOLEAN NOT NULL
);

INSERT INTO proveedores (nombre_proveedor, ciudad, telefono)
VALUES 
    ('Electro Supplier', 'Madrid', '912345678'),
    ('Audio Experts', 'Barcelona', '931234567'),
    ('Tech World', 'Valencia', '961234567'),
    ('Office Comfort', 'Sevilla', '954321098'),
    ('Keyboards Inc.', 'Bilbao', '946789123');

INSERT INTO productos (nombre_producto, categoria_producto, precio, stock, nombre_proveedor)
VALUES 
    ('Camara Bridge Kodak PixPro', 'Electronica', 499.99, 10, 'Electro Supplier'),
    ('Auriculares Nothing Ear (a)', 'Electronica', 199.99, 25, 'Audio Experts'),
    ('ASUS TUF Gaming V4', 'Informatica', 1299.99, 5, 'Tech World'),
    ('Secret Lab Gaming', 'Mobiliario', 249.99, 15, 'Office Comfort'),
    ('Teclado Razer Huntsman', 'Informatica', 99.99, 50, 'Keyboards Inc.');

