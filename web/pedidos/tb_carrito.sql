CREATE TABLE tb_carrito (
  id                     INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_pedido           VARCHAR (512) NULL,
  producto            VARCHAR (512) NULL,
  detalle             VARCHAR (512) NULL,
  cantidad            VARCHAR (512) NULL,
  precio_unitario     VARCHAR (512) NULL,
  precio_total        VARCHAR (512) NULL,
  extra1              VARCHAR (512) NULL,
  extra2              VARCHAR (512) NULL,
  extra3              VARCHAR (512) NULL,
  user_creacion       VARCHAR (512) NULL,
  user_actualizacion  VARCHAR (512) NULL,
  user_eliminacion    VARCHAR (512) NULL,
  fyh_creacion        DATETIME NULL,
  fyh_actualizacion   DATETIME NULL,
  fyh_eliminacion     DATETIME NULL,
  estado              VARCHAR (255) NULL
);