-- Aggiunge i ruoli 'Admin' e 'User' alla tabella dei ruoli.
INSERT INTO users.roles (role) VALUES ('Admin'),('User');

-- Crea un utente amministratore
INSERT INTO users.users (email,username,password,role_id) 
VALUES ('admin@great-notes.com','admin','7b27503b7c61087b9a2922a89e5d5c1f73eee78b',(SELECT id FROM users.roles WHERE role='Admin'));