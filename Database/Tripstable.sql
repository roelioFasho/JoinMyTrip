CREATE TABLE Trips (
    trip_id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    trip_name VARCHAR(100) NOT NULL,
    time DATETIME,
    destination VARCHAR(100),
    itinerary TEXT,
    cost DECIMAL(10,2),
    departure DATETIME,
    return_date DATETIME,
    category VARCHAR(100),
    image VARCHAR(255)
);