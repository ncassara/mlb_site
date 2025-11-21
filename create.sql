CREATE TABLE Umpires (
    Umpire_ID INT PRIMARY KEY AUTO_INCREMENT,
    Fname VARCHAR(50) NOT NULL,
    Lname VARCHAR(50) NOT NULL
);

CREATE TABLE Seasons (
    Season_Year INT PRIMARY KEY,
    Start_date DATETIME NOT NULL,
    End_date DATETIME NOT NULL,
    WS_Champ VARCHAR(3),
    WS_Loser VARCHAR(3),
    AL_MVP INT,
    NL_MVP INT,
    AL_POY INT,
    NL_POY INT
    -- foreign keys added later
);

CREATE TABLE Division (
    Division_ID VARCHAR(2) NOT NULL,
    Division_Name VARCHAR(25) NOT NULL,
    Season_Year INT NOT NULL,
    PRIMARY KEY (Division_ID, Season_Year),
    FOREIGN KEY (Season_Year) REFERENCES Seasons(Season_Year)
);

CREATE TABLE Teams (
    Abbreviation VARCHAR(3) PRIMARY KEY,
    Team_Name VARCHAR(50) NOT NULL,
    Location VARCHAR(50) NOT NULL,
    Division_ID VARCHAR(2) NOT NULL,
    Season_Year INT NOT NULL,
    FOREIGN KEY (Division_ID, Season_Year) REFERENCES Division(Division_ID, Season_Year)
);

CREATE TABLE Players (
    Player_ID INT PRIMARY KEY AUTO_INCREMENT,
    Fname VARCHAR(50) NOT NULL,
    Lname VARCHAR(50) NOT NULL,
    Team_abb VARCHAR(3) NOT NULL,
    Is_Pitcher TINYINT(1) NOT NULL,
    Position VARCHAR(2) NULL,
    Throwing_hand VARCHAR(1) NULL CHECK (Throwing_hand IN ('R', 'L')),
    Batting_hand VARCHAR(1) NULL CHECK (Batting_hand IN ('R', 'L', 'S')),
    FOREIGN KEY (Team_abb) REFERENCES Teams(Abbreviation)
);

CREATE TABLE Games (
    Game_ID INT PRIMARY KEY AUTO_INCREMENT,
    Date DATETIME NOT NULL,
    Location VARCHAR(50) NOT NULL,
    Home_team_abb VARCHAR(3) NOT NULL,
    Away_team_abb VARCHAR(3) NOT NULL,
    Umpire_ID INT NOT NULL,
    Duration DECIMAL(5,2) NOT NULL,
    Innings INT NOT NULL,
    Home_Score INT NOT NULL,
    Away_Score INT NOT NULL,
    Winning_team VARCHAR(3) NOT NULL,
    FOREIGN KEY (Home_team_abb) REFERENCES Teams(Abbreviation),
    FOREIGN KEY (Away_team_abb) REFERENCES Teams(Abbreviation),
    FOREIGN KEY (Winning_team) REFERENCES Teams(Abbreviation),
    FOREIGN KEY (Umpire_ID) REFERENCES Umpires(Umpire_ID)
);

CREATE TABLE Player_Position (
    Player_ID INT,
    Position VARCHAR(2),
    PRIMARY KEY (Player_ID, Position),
    FOREIGN KEY (Player_ID) REFERENCES Players(Player_ID)
);

CREATE TABLE Record (
    Abbreviation VARCHAR(3) NOT NULL,
    Season_Year INT NOT NULL,
    Wins INT NOT NULL,
    Losses INT NOT NULL,
    PRIMARY KEY (Abbreviation, Season_Year),
    FOREIGN KEY (Abbreviation) REFERENCES Teams(Abbreviation),
    FOREIGN KEY (Season_Year) REFERENCES Seasons(Season_Year)
);

CREATE TABLE Position_Players (
    Player_ID INT,
    Season_Year INT,
    At_Bats INT NOT NULL,
    Hits INT NOT NULL,
    Home_runs INT NOT NULL,
    Strikeouts INT NOT NULL,
    Walks INT NOT NULL,
    PRIMARY KEY (Player_ID, Season_Year),
    FOREIGN KEY (Player_ID) REFERENCES Players(Player_ID),
    FOREIGN KEY (Season_Year) REFERENCES Seasons(Season_Year)
);

CREATE TABLE Pitchers (
    Player_ID INT,
    Season_Year INT,
    Innings_pitched DECIMAL(5,2) NOT NULL,
    Strikeouts INT NOT NULL,
    Walks INT NOT NULL,
    ERA DECIMAL(5,2) NOT NULL,
    PRIMARY KEY (Player_ID, Season_Year),
    FOREIGN KEY (Player_ID) REFERENCES Players(Player_ID),
    FOREIGN KEY (Season_Year) REFERENCES Seasons(Season_Year)
);
