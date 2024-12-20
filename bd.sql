
CREATE TABLE players
(
    id_players INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    img VARCHAR(244),
    position  varchar(200),
    rating INT CHECK (rating >= 1 AND rating <= 100) ,
    pace INT CHECK  (pace >= 1 AND pace <= 100),
    shooting INT CHECK (shooting >= 1 AND shooting <= 100),
    passing INT CHECK (passing >= 1 AND passing <= 100),
    dribbling INT CHECK (dribbling >= 1 AND dribbling <= 100),
    defending INT CHECK (defending >= 1 AND defending <= 100),
    physical INT CHECK (physical >= 1 AND physical <= 100),
    diving INT CHECK (diving >= 1 AND diving <= 100),
    handling INT CHECK (handling >= 1 AND handling <= 100),
    kicking INT CHECK (kicking >= 1 AND kicking <= 100),
    reflexes INT CHECK (reflexes >= 1 AND reflexes <= 100),
    speed INT CHECK (speed >= 1 AND speed <= 100),
    positioning INT CHECK (positioning >= 1 AND positioning <= 100),
    id_clubb INT ,
    FOREIGN KEY (id_clubb) REFERENCES clubs(id_club),
    id_nationalite INT,
    FOREIGN KEY (id_nationalite) REFERENCES nationnnalites(id_nationnalite)
);