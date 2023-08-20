USE farmnote;

CREATE TABLE IF NOT EXISTS Farm (
    farmId INT AUTO_INCREMENT PRIMARY KEY,
    farmName VARCHAR(255) NOT NULL,
    farmDescription TEXT,
    farmImage VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Pasture (
    pastureId INT AUTO_INCREMENT PRIMARY KEY,
    pastureName VARCHAR(255) NOT NULL,
    pastureDescription VARCHAR(300),
    pastureStatus ENUM('livre','ocupado','recuperacao'),
    farmImage VARCHAR(255),
    farmId INT,
    FOREIGN KEY (farmId) REFERENCES Farm(farmId)
);

CREATE TABLE IF NOT EXISTS Bull (
    bullId INT AUTO_INCREMENT PRIMARY KEY,
    bullName VARCHAR(255) NOT NULL,
    bullDescription VARCHAR(300),
    bullWeightKg DOUBLE,
    bullWeightArroba DOUBLE,
    bullGrowthRate DOUBLE,
    farmImage VARCHAR(255),
    farmId INT,
    pastureId INT,
    FOREIGN KEY (pastureId) REFERENCES Pasture(pastureId),
    FOREIGN KEY (farmId) REFERENCES Farm(farmId)
);
