SELECT detalleorden.idorden AS "Orden No.",
			 cliente.nombre||' '||cliente.apellido AS "Nombre del cliente",
			 SUM(SUM(detalleorden.preciounitario*detalleorden.cantidad)) OVER (PARTITION BY detalleorden.idorden) AS "Total"
FROM detalleorden
INNER JOIN orden ON orden.idorden = detalleorden.idorden
INNER JOIN cliente ON cliente.idcliente = orden.idcliente
GROUP BY "Orden No.", "Nombre del cliente"
ORDER BY "Total" DESC



SELECT * FROM detalleorden WHERE detalleorden.preciounitario BETWEEN 100 AND 200

SELECT * FROM orden WHERE orden.fechaentrega BETWEEN '2020-02-20' AND '2020-03-01'

SELECT * FROM ordenalquiler WHERE (ordenalquiler.fechadespacho BETWEEN '2020-02-20' AND '2020-02-28') AND (ordenalquiler.fechaentrega BETWEEN '2020-02-01' AND '2020-03-12')



CREATE FUNCTION user_valid() RETURNS TRIGGER AS $user_valid$
	BEGIN
		IF NEW.nombre IS NULL THEN
			RAISE EXCEPTION 'El nombre no puede estar vacío.';
		ELSIF NEW.apellido IS NULL THEN
			RAISE EXCEPTION 'El apellido no puede estar vacío.';
		ELSIF NEW.email IS NULL THEN
			RAISE EXCEPTION 'El correo electrónico no puede estar vacío.';
		ELSIF NEW.contrasena IS NULL THEN
			RAISE EXCEPTION 'La contraseña no puede estar vacía.';
		ELSIF NEW.idtipousuario IS NULL THEN
			RAISE EXCEPTION 'El tipo de usuario no puede estar vacío.';
		END IF;

		RETURN NEW;
	END;
$user_valid$ LANGUAGE plpgsql;

CREATE TRIGGER user_valid BEFORE INSERT ON usuario
	FOR EACH ROW EXECUTE PROCEDURE user_valid();

INSERT INTO usuario VALUES (DEFAULT,'a','b','w','c')



CREATE FUNCTION mod_exist() RETURNS TRIGGER AS $mod_exist$
	BEGIN
		IF NEW.detalleorden.idproducto
	END;
$mod_exist$ LANGUAGE plpgsql;

CREATE TRIGGER mod_exist BEFORE INSERT OR UPDATE
	FOR EACH ROW EXECUTE PROCEDURE mod_exist();



CREATE FUNCTION mod_exist() RETURNS TRIGGER AS $mod_exist$
	BEGIN
		IF NEW.detalleorden.idproducto
	END;
$mod_exist$ LANGUAGE plpgsql;

CREATE TRIGGER mod_exist BEFORE INSERT OR UPDATE
	FOR EACH ROW EXECUTE PROCEDURE mod_exist();
