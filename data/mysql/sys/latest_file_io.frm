TYPE=VIEW
query=select if(isnull(`information_schema`.`processlist`.`ID`),concat(substring_index(`performance_schema`.`threads`.`NAME`,\'/\',-(1)),\':\',`performance_schema`.`events_waits_history_long`.`THREAD_ID`),concat(`information_schema`.`processlist`.`USER`,\'@\',`information_schema`.`processlist`.`HOST`,\':\',`information_schema`.`processlist`.`ID`)) AS `thread`,`sys`.`format_path`(`performance_schema`.`events_waits_history_long`.`OBJECT_NAME`) AS `file`,`sys`.`format_time`(`performance_schema`.`events_waits_history_long`.`TIMER_WAIT`) AS `latency`,`performance_schema`.`events_waits_history_long`.`OPERATION` AS `operation`,`sys`.`format_bytes`(`performance_schema`.`events_waits_history_long`.`NUMBER_OF_BYTES`) AS `requested` from ((`performance_schema`.`events_waits_history_long` join `performance_schema`.`threads` on((`performance_schema`.`events_waits_history_long`.`THREAD_ID` = `performance_schema`.`threads`.`THREAD_ID`))) left join `information_schema`.`processlist` on((`performance_schema`.`threads`.`PROCESSLIST_ID` = `information_schema`.`processlist`.`ID`))) where ((`performance_schema`.`events_waits_history_long`.`OBJECT_NAME` is not null) and (`performance_schema`.`events_waits_history_long`.`EVENT_NAME` like \'wait/io/file/%\')) order by `performance_schema`.`events_waits_history_long`.`TIMER_START`
md5=4e328242d0813b94f74ca02cfb85c9a0
updatable=0
algorithm=2
definer_user=mysql.sys
definer_host=localhost
suid=0
with_check_option=0
timestamp=2020-12-05 14:12:25
create-version=1
source=SELECT IF(id IS NULL,  CONCAT(SUBSTRING_INDEX(name, \'/\', -1), \':\', thread_id),  CONCAT(user, \'@\', host, \':\', id) ) thread,  sys.format_path(object_name) file,  sys.format_time(timer_wait) AS latency,  operation,  sys.format_bytes(number_of_bytes) AS requested FROM performance_schema.events_waits_history_long  JOIN performance_schema.threads USING (thread_id) LEFT JOIN information_schema.processlist ON processlist_id = id WHERE object_name IS NOT NULL AND event_name LIKE \'wait/io/file/%\' ORDER BY timer_start
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select if(isnull(`information_schema`.`processlist`.`ID`),concat(substring_index(`performance_schema`.`threads`.`NAME`,\'/\',-(1)),\':\',`performance_schema`.`events_waits_history_long`.`THREAD_ID`),concat(`information_schema`.`processlist`.`USER`,\'@\',`information_schema`.`processlist`.`HOST`,\':\',`information_schema`.`processlist`.`ID`)) AS `thread`,`sys`.`format_path`(`performance_schema`.`events_waits_history_long`.`OBJECT_NAME`) AS `file`,`sys`.`format_time`(`performance_schema`.`events_waits_history_long`.`TIMER_WAIT`) AS `latency`,`performance_schema`.`events_waits_history_long`.`OPERATION` AS `operation`,`sys`.`format_bytes`(`performance_schema`.`events_waits_history_long`.`NUMBER_OF_BYTES`) AS `requested` from ((`performance_schema`.`events_waits_history_long` join `performance_schema`.`threads` on((`performance_schema`.`events_waits_history_long`.`THREAD_ID` = `performance_schema`.`threads`.`THREAD_ID`))) left join `information_schema`.`processlist` on((`performance_schema`.`threads`.`PROCESSLIST_ID` = `information_schema`.`processlist`.`ID`))) where ((`performance_schema`.`events_waits_history_long`.`OBJECT_NAME` is not null) and (`performance_schema`.`events_waits_history_long`.`EVENT_NAME` like \'wait/io/file/%\')) order by `performance_schema`.`events_waits_history_long`.`TIMER_START`
