## procedure para retornar o numero de estações por grupo em tempo real
create procedure heatmap ()
select GRUPO_AP.nome, count(*) from GRUPO_AP inner join
AP on AP.ap_cod_grupo = GRUPO_AP.id
inner join 
MAC_STA on MAC_STA.mac_ap = AP.ap_mac
WHERE DATE_SUB(DATE_SUB(NOW(), INTERVAL '3' HOUR), INTERVAL '1' MINUTE) <= MAC_STA.date
group by GRUPO_AP.nome;