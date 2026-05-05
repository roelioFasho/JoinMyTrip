CREATE TABLE trip_chats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    trip_id INT,
    name VARCHAR(255),
    FOREIGN KEY (trip_id) REFERENCES Trips(trip_id)
);

CREATE TABLE trip_chat_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    chat_id INT,
    user_id INT,
    FOREIGN KEY (chat_id) REFERENCES trip_chats(id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    chat_id INT,
    user_id INT,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (chat_id) REFERENCES trip_chats(id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);