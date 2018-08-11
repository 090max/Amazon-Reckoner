#create table reckoner

CREATE TABLE `cart` (
  `sno` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `url` varchar(10000) NOT NULL,
  `disount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`sno`);
ALTER TABLE `cart`
  MODIFY `sno` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;