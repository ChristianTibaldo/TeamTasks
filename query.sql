-- inserimento utente
INSERT INTO users (username, password)
VALUES (?, ?);


-- verifica credenziali
SELECT *
FROM users
WHERE username = ?;

-- recupero task per utente
SELECT *
FROM tasks
WHERE user_id = ?;