CREATE TABLE user(
    user_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(64) NOT NULL,
    user_password VARCHAR(32) NOT NULL,
    user_image_path VARCHAR(128),
    user_coordinate VARCHAR(128)
);

CREATE TABLE chatroom(
    chatroom_id INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    PRIMARY KEY(chatroom_id,user_id),
    FOREIGN KEY(user_id) REFERENCES user(user_id)
);

CREATE TABLE message(
    message_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    chatroom_id INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    message_data VARCHAR(320),
    FOREIGN KEY(chatroom_id) REFERENCES chatroom(chatroom_id),
    FOREIGN KEY(user_id) REFERENCES user(user_id)
);