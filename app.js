const API_BASE = 'http://localhost/api-jwt'; // es: http://localhost/api

const form = document.getElementById('loginForm');
const output = document.getElementById('output');

form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    try {
        const response = await fetch(`${API_BASE}/login`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ username, password })
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.error || 'Errore di login');
        }

        // salva JWT
        localStorage.setItem('token', data.token);

        output.textContent = 'Login effettuato con successo';
    } catch (err) {
        output.textContent = err.message;
    }
});
//