USE pumpkin;

-- POLL MASTER
CREATE TABLE `poll_master` (
  `ID` int(4) NOT NULL,
  `name` text NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `poll_master` (`ID`, `name`, `desc`) VALUES
(1, 'Seth', 'Brexit');

ALTER TABLE `poll_master`
  ADD PRIMARY KEY (`ID`);

-- UPVOTES
CREATE TABLE `upvotes` (
  `ID` int(4) NOT NULL,
  `votes` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `upvotes` (`ID`, `votes`) VALUES
(1, 1);

CREATE VIEW standings_sub AS
SELECT ID, sum(votes) as Votes from upvotes group by ID order by sum(votes) desc;

CREATE VIEW standings AS
select b.name as Name, b.desc as Description, a.Votes as Votes
from standings_sub a left join poll_master b
    on a.ID = b.ID;

