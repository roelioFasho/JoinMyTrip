CREATE TABLE trip_chats (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    trip_id BIGINT UNSIGNED,
    name VARCHAR(255),

    FOREIGN KEY (trip_id) REFERENCES Trips(trip_id)
);

CREATE TABLE trip_chat_members (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    chat_id BIGINT UNSIGNED,
    user_id BIGINT UNSIGNED,

    FOREIGN KEY (chat_id) REFERENCES trip_chats(id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE messages (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    chat_id BIGINT UNSIGNED,
    user_id BIGINT UNSIGNED,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (chat_id) REFERENCES trip_chats(id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);