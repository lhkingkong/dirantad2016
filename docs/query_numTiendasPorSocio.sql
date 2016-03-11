/*mal
select distinct asociados_estados.asociado_id, sum(asociados_estados.asociado_estado_numtiendas),sum(asociados_estados.asociado_estado_m2pisoventas) from estados, asociados_estados
where estados.zona_id = 1
and estados.estado_id = asociados_estados.estado_id
group by asociados_estados.asociado_id*/



SELECT asociados_estados.asociado_id, sum( asociados_estados.asociado_estado_numtiendas ) , sum( asociados_estados.asociado_estado_m2pisoventas )
FROM estados, asociados_estados
WHERE estados.zona_id =1
AND estados.estado_id = asociados_estados.estado_id
GROUP BY asociados_estados.asociado_id
