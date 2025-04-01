DROP TRIGGER IF EXISTS MediasPorcentualesHistoricos;

DELIMITER $$

CREATE TRIGGER MediasPorcentualesHistoricos
AFTER INSERT ON stats
FOR EACH ROW
BEGIN
    DECLARE total_partidos INT;
    DECLARE suma_porcentaje_primer_servicio DECIMAL(5,2);
    DECLARE suma_porcentaje_primeros_ganados DECIMAL(5,2);
    DECLARE suma_porcentaje_segundos_ganados DECIMAL(5,2);
    DECLARE suma_porcentaje_puntos_servicio_ganados DECIMAL(5,2);
    DECLARE suma_porcentaje_break_salvados DECIMAL(5,2);
    DECLARE suma_porcentaje_break_ganados DECIMAL(5,2);

    -- Obtener el total de partidos jugados
    SELECT COUNT(*)
    INTO total_partidos
    FROM stats
    WHERE ficha_federativa = NEW.ficha_federativa;

    -- Obtener las sumas
    SELECT SUM(porcentaje_primer_servicio)
    INTO suma_porcentaje_primer_servicio
    FROM stats
    WHERE ficha_federativa = NEW.ficha_federativa;

    SELECT SUM(porcentaje_primeros_ganados)
    INTO suma_porcentaje_primeros_ganados
    FROM stats
    WHERE ficha_federativa = NEW.ficha_federativa;

    SELECT SUM(porcentaje_segundos_ganados)
    INTO suma_porcentaje_segundos_ganados
    FROM stats
    WHERE ficha_federativa = NEW.ficha_federativa;

    SELECT SUM(porcentaje_puntos_servicio_ganados)
    INTO suma_porcentaje_puntos_servicio_ganados
    FROM stats
    WHERE ficha_federativa = NEW.ficha_federativa;

    SELECT SUM(porcentaje_break_salvados)
    INTO suma_porcentaje_break_salvados
    FROM stats
    WHERE ficha_federativa = NEW.ficha_federativa;

    SELECT SUM(porcentaje_break_ganados)
    INTO suma_porcentaje_break_ganados
    FROM stats
    WHERE ficha_federativa = NEW.ficha_federativa;

    -- Actualizar los promedios en historico_stats si total_partidos es mayor a 0
    IF total_partidos > 0 THEN
        UPDATE historico_stats
        SET
            porcentaje_primer_servicio = suma_porcentaje_primer_servicio / total_partidos,
            porcentaje_primeros_ganados = suma_porcentaje_primeros_ganados / total_partidos,
            porcentaje_segundos_ganados = suma_porcentaje_segundos_ganados / total_partidos,
            porcentaje_puntos_servicio_ganados = suma_porcentaje_puntos_servicio_ganados / total_partidos,
            porcentaje_break_salvados = suma_porcentaje_break_salvados / total_partidos,
            porcentaje_break_ganados = suma_porcentaje_break_ganados / total_partidos
        WHERE ficha_jugador = NEW.ficha_federativa;
    END IF;
END$$

DELIMITER ;
