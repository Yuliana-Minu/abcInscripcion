INSERT INTO principal.persona(
                                per_codigo, per_nombre, per_primerapellido,
                                per_segundoapellido, per_personacreo, per_personamodifico,
                                per_fechacreo, per_fechamodifico, per_genero,
                                per_tipoidentificacion, per_identificacion,
                                per_estado,  per_fechanacimiento)
                            VALUES (78, 'ANDRES JERONIMO', 'MONTAÑA',
                                   'PAVA', 1, 1,
                                    NOW(), NOW(), '1',
                                    6, '1077237713',
                                    '1',  '2012-11-17');
                                    
INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (156, 78, 'andres.montana@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (234, 5, 78, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (312, 78, '', '1', NOW(), '1077237713');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (390, 78, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (79, 'DANNA SOPHIA', 'MORALES ', 'RAMIREZ', 1, 1, NOW(), NOW(), '2', 6, '1076911134', '1', '2011-09-23');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (158, 79, 'danna.morales@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (237, 5, 79, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (316, 79, '', '1', NOW(), '1076911134');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (395, 79, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (80, 'CYNTHIA', 'CHEN', 'CHEN', 1, 1, NOW(), NOW(), '2', 6, '1077236989', '1', '2012-05-17');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (160, 80, 'cynthia.chen@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (240, 5, 80, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (320, 80, '', '1', NOW(), '1077236989');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (400, 80, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (81, 'ISABELLA', 'HERNANDEZ', 'CASTRO', 1, 1, NOW(), NOW(), '2', 6, '1076913737', '1', '2013-01-15');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (162, 81, 'isabella.hernandez@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (243, 5, 81, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (324, 81, '', '1', NOW(), '1076913737');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (405, 81, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (82, 'JUAN SEBASTIAN', 'GARCIA ', 'CABRERA', 1, 1, NOW(), NOW(), '1', 6, '1077237005', '1', '2012-06-01');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (164, 82, 'juan.garcia@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (246, 5, 82, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (328, 82, '', '1', NOW(), '1077237005');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (410, 82, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (83, 'SARA SOFIA', 'URIBE', 'CACERES', 1, 1, NOW(), NOW(), '2', 6, '1145928366', '1', '2013-01-15');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (166, 83, 'sara.uribe@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (249, 5, 83, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (332, 83, '', '1', NOW(), '1145928366');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (415, 83, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (84, 'GABRIELA', 'ROJAS', 'ARTUNDUAGA', 1, 1, NOW(), NOW(), '2', 6, '1077237322', '1', '2012-08-16');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (168, 84, 'gabriela.rojas@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (252, 5, 84, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (336, 84, '', '1', NOW(), '1077237322');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (420, 84, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (85, 'LUCIANA ', 'PERDOMO', 'QUEVEDO', 1, 1, NOW(), NOW(), '2', 6, '1077729878', '1', '2013-01-14');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (170, 85, 'luciana.perdomo@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (255, 5, 85, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (340, 85, '', '1', NOW(), '1077729878');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (425, 85, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (86, 'SALOME', 'DIAZ', 'CORTES', 1, 1, NOW(), NOW(), '2', 6, '1075279886', '1', '2012-05-16');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (172, 86, 'salome.diaz@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (258, 5, 86, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (344, 86, '', '1', NOW(), '1075279886');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (430, 86, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (87, 'ANDRÉS DAVID', 'QUESADA', 'JARAMILLO', 1, 1, NOW(), NOW(), '1', 6, '1076913203', '1', '2012-09-22');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (174, 87, 'andres.quesada@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (261, 5, 87, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (348, 87, '', '1', NOW(), '1076913203');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (435, 87, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (88, 'JUAN ANDRÉS ', 'GONZALEZ', 'PERDOMO', 1, 1, NOW(), NOW(), '1', 6, '1076510946', '1', '2013-11-04');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (176, 88, 'juan.gonzalez@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (264, 5, 88, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (352, 88, '', '1', NOW(), '1076510946');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (440, 88, 2, NOW(), NOW(), 1, 1);

