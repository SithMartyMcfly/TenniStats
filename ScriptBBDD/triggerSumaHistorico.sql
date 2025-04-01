
/*Vamos a generar un trigger para que las stats vayan sumandose
en la tabla historico cada vez que insertamos en la tabla stats
las estadísticas de un partido, este trigger es solo de los datos
que deben sumarse*/
delimiter $$

CREATE TRIGGER SumaDatosHistoricos
AFTER INSERT ON stats
FOR EACH ROW
	begin
		declare existe int;
        select count(*) into existe
        from historico_stats
        where ficha_jugador = NEW.ficha_federativa;
        
        if existe = 0 then
			insert into historico_stats (
            ficha_jugador,
            numero_partidos_jugados,
            numero_partidos_ganados,
            aces,
            doble_falta,
            winners,
            errores,
            puntos_break_afrontados,
            porcentaje_primer_servicio,
            porcentaje_primeros_ganados, 
            porcentaje_segundos_ganados, 
            porcentaje_puntos_servicio_ganados, 
            porcentaje_break_salvados, 
            puntos_break_ganados, 
            puntos_break_jugados, 
            porcentaje_break_ganados
        ) values (
            new.ficha_federativa, 
            0, 
            0, 
            new.aces, 
            new.doble_falta, 
            new.winner, 
            new.errores, 
            new.puntos_break_afrontados, 
            new.porcentaje_primer_servicio, 
            new.porcentaje_primeros_ganados, 
            new.porcentaje_segundos_ganados, 
            new.porcentaje_puntos_servicio_ganados, 
            new.porcentaje_break_salvados, 
            new.puntos_break_ganados, 
            new.puntos_break_jugados, 
            new.porcentaje_break_ganados
        );
	else
		update historico_stats
        set
			numero_partidos_jugados = numero_partidos_jugados + 1,
            aces = aces + new.aces,
            doble_falta = doble_falta + new.doble_falta,
            winners = winners + new.winner,
            errores = errores + new.errores,
            puntos_break_afrontados = puntos_break_afrontados + new.puntos_break_afrontados,
            puntos_break_ganados = puntos_break_ganados + new.puntos_break_ganados,
            puntos_break_jugados = puntos_break_jugados + new.puntos_break_jugados
		where ficha_jugador = new.ficha_federativa;
	end if;
    end$$
    delimiter ;