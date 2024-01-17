INSERT INTO principal.persona(
                                per_codigo, per_nombre, per_primerapellido,
                                per_segundoapellido, per_personacreo, per_personamodifico,
                                per_fechacreo, per_fechamodifico, per_genero,
                                per_tipoidentificacion, per_identificacion,
                                per_estado,  per_fechanacimiento)
                            VALUES (111, 'MARIANA ', 'CALDERÓN ',
                                   'ALMARIO', 1, 1,
                                    NOW(), NOW(), '2',
                                    6, '1077240193',
                                    '1',  '2014-03-17');
                                    
INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (222, 111, 'mariana.calderon@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (333, 5, 111, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (444, 111, '', '1', NOW(), '1077240193');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (555, 111, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (112, 'VALERIA ', 'CASTELLANOS', 'CASTAÑEDA', 1, 1, NOW(), NOW(), '2', 6, '1011328828', '1', '2015-04-12');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (224, 112, 'valeria.castellanos@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (336, 5, 112, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (448, 112, '', '1', NOW(), '1011328828');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (560, 112, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (113, 'MELISSA', 'AMAYA', 'ALBAN', 1, 1, NOW(), NOW(), '2', 6, '1075804687', '1', '2015-08-30');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (226, 113, 'melissa.amaya@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (339, 5, 113, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (452, 113, '', '1', NOW(), '1075804687');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (565, 113, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (114, 'MARIA JOSE', 'GONZALEZ', 'RIVERA', 1, 1, NOW(), NOW(), '2', 6, '1076912612', '1', '2012-06-28');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (228, 114, 'maria.gonzalez@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (342, 5, 114, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (456, 114, '', '1', NOW(), '1076912612');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (570, 114, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (115, 'SARAH SOFHIA ', 'CÉSPEDES', 'PINZÓN', 1, 1, NOW(), NOW(), '2', 6, '1076912322', '1', '2012-04-28');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (230, 115, 'sarah.cespedes@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (345, 5, 115, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (460, 115, '', '1', NOW(), '1076912322');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (575, 115, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (116, 'JUAN DIEGO', 'VARGAS', 'POLANIA', 1, 1, NOW(), NOW(), '1', 6, '1076917758', '1', '2015-07-15');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (232, 116, 'antonella.valenzuela@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (348, 5, 116, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (464, 116, '', '1', NOW(), '1076917758');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (580, 116, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (117, 'VALERIA', 'VARGAS', 'POLANIA ', 1, 1, NOW(), NOW(), '2', 6, '1076915767', '1', '2014-04-11');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (234, 117, 'valeria.vargas@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (351, 5, 117, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (468, 117, '', '1', NOW(), '1076915767');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (585, 117, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (118, 'JUANITA', 'VARGAS', 'POLANIA', 1, 1, NOW(), NOW(), '2', 6, '1076910591', '1', '2011-06-15');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (236, 118, 'juanita.vargas@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (354, 5, 118, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (472, 118, '', '1', NOW(), '1076910591');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (590, 118, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (119, 'CRISTOPHER ANDRÉS', 'GUIO', 'FIESCO', 1, 1, NOW(), NOW(), '1', 6, '1076914507', '1', '2013-06-30');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (238, 119, 'cristopher.guio@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (357, 5, 119, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (476, 119, '', '1', NOW(), '1076914507');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (595, 119, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (120, 'ANTONELLA ', 'VALENZUELA', 'MUÑOZ', 1, 1, NOW(), NOW(), '2', 6, '1077237380', '1', '2012-08-24');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (240, 120, 'antonella.valenzuela@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (360, 5, 120, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (480, 120, '', '1', NOW(), '1077237380');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (600, 120, 2, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona( per_codigo, per_nombre, per_primerapellido, per_segundoapellido, per_personacreo, per_personamodifico, per_fechacreo, per_fechamodifico, per_genero, per_tipoidentificacion, per_identificacion, per_estado, per_fechanacimiento) VALUES (121, 'ALANNA ', 'CLAROS', 'MONTES', 1, 1, NOW(), NOW(), '1', 6, '1077874970', '1', '2015-11-13');

INSERT INTO principal.datos_basicos( dba_codigo, dba_persona, dba_correo, dba_estado, dba_fechacreo, dba_fechamodifico, dba_personacreo, dba_personamodifico) VALUES (242, 121, 'alanna.claros@abc.edu.co', 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.persona_tipopersona( ptp_codigo, ptp_tipopersona, ptp_persona, ptp_estado, ptp_fechacreo, ptp_fechamodifico, ptp_personacreo, ptp_personamodifico) VALUES (363, 5, 121, 1, NOW(), NOW(), 1, 1);

INSERT INTO principal.usepersona( use_codigo, per_codigo, use_pswd, use_estado, use_fechacreo, use_alias) VALUES (484, 121, '', '1', NOW(), '1077874970');

INSERT INTO principal.estado_ninio( eni_codigo, eni_ninio, eni_estado, eni_fechacreo, eni_fechamodifico, eni_personacreo, eni_personamodifico) VALUES (605, 121, 2, NOW(), NOW(), 1, 1);

