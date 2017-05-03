

-- Структура таблицы autos


CREATE TABLE `autos` (
  `id` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `auto` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Дамп данных таблицы autos


INSERT INTO `autos` (`id`, `x`, `y`, `auto`) VALUES
(1, 1, 2, 'a'),
(2, 5, 3, 'b'),
(3, 4, 6, 'c'),
(4, 1, 2, 'd'),
(5, 7, 7, 'e'),
(6, 4, 6, 'f'),
(7, 5, 3, 'b'),
(8, 9, 4, 'h'),
(9, 4, 6, 'f');


ALTER TABLE `autos`
  ADD PRIMARY KEY (`id`);
  
  
  
  --Выборка 2 варианта (один не совсем как в ТЗ)
  --Колонки не индексировал из за небольшого кол-ва данных
  
  SELECT DISTINCT `auto`, x, y FROM autos WHERE CONCAT(`x`, '+', `y`) IN (SELECT CONCAT(x, '+', y)  AS val FROM autos GROUP BY x, y HAVING COUNT(*) > 1 AND COUNT(DISTINCT auto) > 1) ORDER BY x;

  SELECT count(*) AS cnt, x, y, GROUP_CONCAT(DISTINCT `auto` SEPARATOR ',') AS autos FROM autos GROUP BY x, y HAVING cnt > 1 AND LOCATE(',', `autos`);
  
  

