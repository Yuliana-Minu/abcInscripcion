INSERT INTO principal.persona(
                                per_codigo, per_nombre, per_primerapellido,
                                per_segundoapellido, per_personacreo, per_personamodifico,
                                per_fechacreo, per_fechamodifico, per_genero,
                                per_tipoidentificacion, per_identificacion,
                                per_estado,  per_fechanacimiento)
                            VALUES (100, 'ISABEL SOFÍA', 'PERDOMO',
                                   'BOTINA', 1, 1,
                                    NOW(), NOW(), '2',
                                    6, '1079536706',
                                    '1',  '2012-08-10');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (200, 100, 'isabel.perdomo@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (300, 5, 100, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (400, 100, '', '1', NOW(), '1079536706');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (500, 100, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (101, 'SALOME', 'BOLIVAR', 'YUSTRES', 1, 1, NOW(), NOW(), '2', 6, '1029890806', '1', '2015-08-06');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (202, 101, 'salome.bolivar@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (303, 5, 101, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (404, 101, '', '1', NOW(), '1029890806');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (505, 101, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (102, 'EMANUEL ', 'ESTRADA', 'VARGAS', 1, 1, NOW(), NOW(), '1', 6, '1076919020', '1', '2016-05-16');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (204, 102, 'megan.rodriguez@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (306, 5, 102, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (408, 102, '', '1', NOW(), '1076919020');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (510, 102, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (103, 'KIARA', 'GUTIERREZ', 'AMOROCHO', 1, 1, NOW(), NOW(), '2', 6, '1077234313', '1', '2010-11-09');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (206, 103, 'kiara.gutierrez@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (309, 5, 103, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (412, 103, '', '1', NOW(), '1077234313');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (515, 103, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (104, 'THOMAS', 'MENZA', 'VARGAS', 1, 1, NOW(), NOW(), '1', 6, '1076512745', '1', '2015-07-13');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (208, 104, 'thomas.menza@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (312, 5, 104, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (416, 104, '', '1', NOW(), '1076512745');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (520, 104, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (105, 'MARIA ANDREA ', 'DIAZGRANADOS', 'BOHORQUEZ', 1, 1, NOW(), NOW(), '2', 6, '1019911049', '1', '2015-03-26');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (210, 105, 'maria.diazgranados@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (315, 5, 105, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (420, 105, '', '1', NOW(), '1019911049');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (525, 105, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (106, 'DIEGO ALEXANDER', 'CABRERA ', 'SANCHEZ', 1, 1, NOW(), NOW(), '1', 6, '1079607322', '1', '2013-04-11');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (212, 106, 'diego.cabrera@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (318, 5, 106, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (424, 106, '', '1', NOW(), '1079607322');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (530, 106, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (107, 'MARIANA', 'PEREIRA', 'CARVAJAL', 1, 1, NOW(), NOW(), '2', 6, '1077234721', '1', '2011-02-17');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (214, 107, 'mariana.pereira@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (321, 5, 107, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (428, 107, '', '1', NOW(), '1077234721');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (535, 107, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (108, 'VALERIA', 'MORALES ', 'LASSO', 1, 1, NOW(), NOW(), '2', 6, '1013016637', '1', '2012-12-17');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (216, 108, 'valeria.morales@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (324, 5, 108, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (432, 108, '', '1', NOW(), '1013016637');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (540, 108, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (109, 'MEGAN SOFIA', 'RODRIGUEZ', 'BELTRAN', 1, 1, NOW(), NOW(), '2', 6, '1029888210', '1', '2013-01-03');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (218, 109, 'megan.rodriguez@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (327, 5, 109, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (436, 109, '', '1', NOW(), '1029888210');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (545, 109, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (110, 'SALOME', 'PEREIRA', 'PACHÓN', 1, 1, NOW(), NOW(), '2', 6, '1077242265', '1', '2015-03-18');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (220, 110, 'salome.pereira@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (330, 5, 110, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (440, 110, '', '1', NOW(), '1077242265');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (550, 110, 2, NOW(), NOW(), 1, 1);

