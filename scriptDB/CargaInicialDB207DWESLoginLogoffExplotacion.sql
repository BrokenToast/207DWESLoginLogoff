use dbs9174075;
INSERT INTO T02_Usuario VALUES
    ('luis',SHA2(concat('luis','paso'),256),'administrador',UNIX_TIMESTAMP(),0,'administrador',null),
    ('david',SHA2(concat('david','paso'),256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
    ('manuel',SHA2(concat('manuel','paso'),256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
    ('ricardo',SHA2(concat('ricardo','paso'),256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
    ('josue',SHA2(concat('josue','.paso'),256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
    ('alejandro',SHA2(concat('alejandro','paso'),256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
    ('heraclio',SHA2(concat('heraclio','paso'),256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
    ('amor',SHA2(concat('amor','paso'),256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
    ('antonio',SHA2(concat('antonio','paso'),256),'Usuario estandar',unix_timestamp(),0,'usuario',null),
    ('alberto',SHA2(concat('alberto','paso'),256),'Usuario estandar',unix_timestamp(),0,'usuario',null);
insert into  T02_Departamento values
     ('DPB',"Departamento de Bases de datos",unix_timestamp(),605.65,null),
     ('DPI',"Departamento de informatica",unix_timestamp(),500.65,null),
     ('DLE',"Departamento de lenguan española",unix_timestamp(),200.65,null);