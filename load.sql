-- insert into season
INSERT INTO Seasons (Season_Year, Start_date, End_date)
VALUES (2023, '2023-03-01', '2023-10-01');

-- insert into division
INSERT INTO Division (Division_ID, Division_Name, Season_Year)
VALUES 
('E1', 'East', 2023),
('W1', 'West', 2023);

-- insert into teams
INSERT INTO Teams (Abbreviation, Team_Name, Location, Division_ID, Season_Year)
VALUES 
('NYM', 'Mets', 'New York', 'E1', 2023),
('LAD', 'Dodgers', 'Los Angeles', 'W1', 2023);

-- insert into players
INSERT INTO Players (Player_ID, Fname, Lname, Team_abb, Is_Pitcher, Position, Throwing_hand, Batting_hand)
VALUES 
(1, 'Jacob', 'deGrom', 'NYM', 1, NULL, 'R', 'L'),
(2, 'Pete', 'Alonso', 'NYM', 0, '1B', 'R', 'R'),
(3, 'Mookie', 'Betts', 'LAD', 0, 'RF', 'R', 'R'),
(4, 'Clayton', 'Kershaw', 'LAD', 1, NULL, 'L', 'L');

-- insert into position_players
INSERT INTO Position_Players (Player_ID, Season_Year, At_Bats, Hits, Home_runs, Strikeouts, Walks)
VALUES 
(2, 2023, 600, 160, 40, 120, 70),
(3, 2023, 580, 170, 30, 90, 85);

-- insert into Pitchers
INSERT INTO Pitchers (Player_ID, Season_Year, Innings_pitched, Strikeouts, Walks, ERA)
VALUES 
(1, 2023, 190.2, 230, 40, 2.43),
(4, 2023, 180.1, 210, 35, 3.11);

-- make basic users
INSERT INTO users (username, password, role)
VALUES
('fan1',     'test123', 'fan'),
('coach1',   'test123', 'coach'),
('admin1',   'test123', 'admin');