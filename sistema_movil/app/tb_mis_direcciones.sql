CREATE TABLE tb_mis_direcciones (
  id                  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email               VARCHAR (512) NULL,
  nombre_direccion    VARCHAR (512) NULL,
  direccion           VARCHAR (512) NULL,
  referencia          VARCHAR (512) NULL,
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