-- Aggiunge i ruoli 'Admin' e 'User' alla tabella dei ruoli.
INSERT INTO roles (role) VALUES ('Admin'),('User');

-- Crea un utente amministratore
INSERT INTO users (email,username,password,role_id) 
VALUES ('admin@great-notes.com','admin','df8ad99f013b2452b7721e75163f343f1f7fcfde',(SELECT id FROM roles WHERE role='Admin'));