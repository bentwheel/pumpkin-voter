USE pumpkin;

-- POLL MASTER
CREATE TABLE `poll_master` (
  `ID` int(4) NOT NULL,
  `name` text NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `poll_master` (`ID`, `name`, `desc`) VALUES
(1, 'Seth', 'Brexit!');

ALTER TABLE `poll_master`
  ADD PRIMARY KEY (`ID`);

-- UPVOTES
CREATE TABLE `upvotes` (
  `ID` int(4) NOT NULL,
  `votes` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `upvotes` (`ID`, `votes`) VALUES
(1, 1);
