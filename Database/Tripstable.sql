CREATE TABLE Trips (
    trip_id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    trip_name VARCHAR(100) NOT NULL,
    time DATETIME,
    destination VARCHAR(100),
    itinerary TEXT,
    cost DECIMAL(10,2),
    trip_photo VARCHAR(255)
);