CREATE TABLE `countries` (
  `id` int(16) NOT NULL,
  `countryname` varchar(255) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `countries` (`id`, `countryname`) VALUES
(1, 'Ukraine'),
(2, 'Germany'),
(3, 'Belarus'),
(4, 'USA'),
(5, 'Poland'),
(6, 'Britain'),
(7, 'China'),
(8, 'Japan');

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL DEFAULT 'NOT NULL',
  `login` varchar(255) NOT NULL DEFAULT 'NOT NULL',
  `password` varchar(255) NOT NULL DEFAULT 'NOT NULL',
  `real_name` varchar(255) NOT NULL DEFAULT 'NOT NULL',
  `birth` varchar(255) NOT NULL,
  `regstamp` int(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `authhash` varchar(255) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `countries`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
