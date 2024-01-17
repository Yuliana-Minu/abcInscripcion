INSERT INTO principal.persona(
                                per_codigo, per_nombre, per_primerapellido,
                                per_segundoapellido, per_personacreo, per_personamodifico,
                                per_fechacreo, per_fechamodifico, per_genero,
                                per_tipoidentificacion, per_identificacion,
                                per_estado,  per_fechanacimiento)
                            VALUES (67, 'JERONIMO', 'MEDINA ',
                                   'SALAZAR', 1, 1,
                                    NOW(), NOW(), '1',
                                    6, '1077728175',
                                    '1',  '2010-12-21');
                                    
INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (134, 67, 'jeronimo.medina@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (201, 5, 67, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (268, 67, '', '1', NOW(), '1077728175');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (335, 67, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (68, 'MARIA CAMILA', 'TIJARO', 'ROZO', 1, 1, NOW(), NOW(), '2', 6, '1013014216', '1', '2012-01-24');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (136, 68, 'maria.tijaro@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (204, 5, 68, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (272, 68, '', '1', NOW(), '1013014216');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (340, 68, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (69, 'JUAN ESTEBAN', 'LUNA', 'CARRANZA', 1, 1, NOW(), NOW(), '1', 6, '1076912474', '1', '2012-05-14');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (138, 69, 'juan.luna@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (207, 5, 69, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (276, 69, '', '1', NOW(), '1076912474');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (345, 69, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (70, 'XIOMARA', 'PASCUAS', 'FORERO', 1, 1, NOW(), NOW(), '2', 6, '1076910709', '1', '2011-07-11');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (140, 70, 'xiomara.pascuas@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (210, 5, 70, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (280, 70, '', '1', NOW(), '1076910709');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (350, 70, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (71, 'JUANA SOFIA', 'PALACIOS', 'PEREZ', 1, 1, NOW(), NOW(), '2', 6, '1077236266', '1', '2011-12-15');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (142, 71, 'juana.palacios@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (213, 5, 71, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (284, 71, '', '1', NOW(), '1077236266');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (355, 71, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (72, 'THALIANA CAMILA', 'PASTRANA', 'TIQUE', 1, 1, NOW(), NOW(), '2', 6, '1075269769', '1', '2011-03-08');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (144, 72, 'thaliana.pastrana@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (216, 5, 72, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (288, 72, '', '1', NOW(), '1075269769');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (360, 72, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (73, 'DANNA SOFIA', 'TORRES ', 'ARANGO', 1, 1, NOW(), NOW(), '2', 6, '1077236711', '1', '2012-03-29');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (146, 73, 'danna.torres@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (219, 5, 73, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (292, 73, '', '1', NOW(), '1077236711');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (365, 73, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (74, 'MIGUEL ANGEL', 'VARGAS', 'LOPEZ', 1, 1, NOW(), NOW(), '1', 6, '1077236473', '1', '2012-01-25');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (148, 74, 'miguel.vargas@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (222, 5, 74, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (296, 74, '', '1', NOW(), '1077236473');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (370, 74, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (75, 'KARLA XIMENA', 'SERRANO', 'FERNÁNDEZ', 1, 1, NOW(), NOW(), '2', 6, '1077234922', '1', '2011-02-28');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (150, 75, 'karla.serrano@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (225, 5, 75, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (300, 75, '', '1', NOW(), '1077234922');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (375, 75, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (76, 'MARIA ISABELLA ', 'SERRANO', 'FERNÁNDEZ', 1, 1, NOW(), NOW(), '2', 6, '1077233114', '1', '2010-03-08');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (152, 76, 'maria.serrano@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (228, 5, 76, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (304, 76, '', '1', NOW(), '1077233114');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (380, 76, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (77, 'GABRIELA', 'GAMBOA', 'GONZALEZ', 1, 1, NOW(), NOW(), '2', 6, '1076910986', '1', '2011-09-02');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (154, 77, 'gabriela.gamboa@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (231, 5, 77, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (308, 77, '', '1', NOW(), '1076910986');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (385, 77, 2, NOW(), NOW(), 1, 1);

