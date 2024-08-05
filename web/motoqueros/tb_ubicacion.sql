CREATE TABLE tb_ubicacion (
  id                  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email               VARCHAR (512) NULL,
  latitud             VARCHAR (512) NULL,
  longitud            VARCHAR (512) NULL,
  estado_delivery     VARCHAR (512) NULL,
  cargo               VARCHAR (512) NULL,
  nombre               VARCHAR (512) NULL,
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
