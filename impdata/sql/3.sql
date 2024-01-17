INSERT INTO principal.persona(
                                per_codigo, per_nombre, per_primerapellido,
                                per_segundoapellido, per_personacreo, per_personamodifico,
                                per_fechacreo, per_fechamodifico, per_genero,
                                per_tipoidentificacion, per_identificacion,
                                per_estado,  per_fechanacimiento)
                            VALUES (23, 'SALOME ', 'AVILEZ',
                                   'CAMACHO', 1, 1,
                                    NOW(), NOW(), '2',
                                    6, '1075277850',
                                    '1',  '2012-02-25');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (46, 23, 'salome.avilez@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (69, 5, 23, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (92, 23, '', '1', NOW(), '1075277850');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (115, 23, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (24, 'SILVANA', 'DIAZ', 'PERDOMO', 1, 1, NOW(), NOW(), '2', 6, '1075799530', '1', '2010-12-14');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (48, 24, 'silvana.diaz@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (72, 5, 24, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (96, 24, '', '1', NOW(), '1075799530');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (120, 24, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (25, 'TOMAS', 'CERQUERA', 'MONTEALEGRE', 1, 1, NOW(), NOW(), '1', 6, '1077733035', '1', '2015-04-11');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (50, 25, 'tomas.cerquera@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (75, 5, 25, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (100, 25, '', '1', NOW(), '1077733035');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (125, 25, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (26, 'JULIETA', 'CORTES', 'LEGUIZAMO', 1, 1, NOW(), NOW(), '2', 6, '1028445192', '1', '2015-09-23');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (52, 26, 'julieta.cortes@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (78, 5, 26, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (104, 26, '', '1', NOW(), '1028445192');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (130, 26, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (27, 'LUCIA ISABELA', 'GONZALEZ', 'ORDOÑEZ', 1, 1, NOW(), NOW(), '2', 6, '1079536554', '1', '2011-04-29');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (54, 27, 'lucia.gonzalez@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (81, 5, 27, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (108, 27, '', '1', NOW(), '1079536554');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (135, 27, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (28, 'SIMÓN EDUARDO', 'MEDINA ', 'VARGAS', 1, 1, NOW(), NOW(), '1', 6, '1077232822', '1', '2010-01-14');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (56, 28, 'simon.medina@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (84, 5, 28, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (112, 28, '', '1', NOW(), '1077232822');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (140, 28, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (29, 'ISABELLA', 'PEREZ', 'HORTA', 1, 1, NOW(), NOW(), '2', 6, '1077234815', '1', '2011-03-04');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (58, 29, 'isabella.perez@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (87, 5, 29, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (116, 29, '', '1', NOW(), '1077234815');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (145, 29, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (30, 'FELIPE', 'CRUZ', 'GOMEZ', 1, 1, NOW(), NOW(), '1', 6, '1077731611', '1', '2014-05-10');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (60, 30, 'felipe.cruz@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (90, 5, 30, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (120, 30, '', '1', NOW(), '1077731611');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (150, 30, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (31, 'ALEJANDRO', 'CRUZ', 'GOMEZ', 1, 1, NOW(), NOW(), '1', 6, '1077727816', '1', '2010-08-23');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (62, 31, 'alejandro.cruz@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (93, 5, 31, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (124, 31, '', '1', NOW(), '1077727816');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (155, 31, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (32, 'ISABELLA', 'CASTRO', 'SANCHEZ', 1, 1, NOW(), NOW(), '2', 6, '1077243119', '1', '2015-08-31');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (64, 32, 'isabella.castro@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (96, 5, 32, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (128, 32, '', '1', NOW(), '1077243119');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (160, 32, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (33, 'NOHELIA', 'POLANIA', 'TRIVIÑO', 1, 1, NOW(), NOW(), '2', 6, '1077235531', '1', '2011-07-03');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (66, 33, 'nohelia.polania@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (99, 5, 33, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (132, 33, '', '1', NOW(), '1077235531');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (165, 33, 2, NOW(), NOW(), 1, 1);

