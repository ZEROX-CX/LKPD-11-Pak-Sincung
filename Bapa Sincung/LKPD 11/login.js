const users = {
  siswa1: '1111',
  siswa2: '2222',
  siswa3: '3333',
  admin: 'admin',
};

const existingUser = localStorage.getItem('currentUser');
if (existingUser) {
  window.location.href = 'index.html';
}

const loginForm = document.getElementById('loginForm');
const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');
const messageEl = document.getElementById('message');

loginForm.addEventListener('submit', (event) => {
  event.preventDefault();

  const username = usernameInput.value.trim().toLowerCase();
  const password = passwordInput.value.trim();

  if (!username || !password) {
    messageEl.innerText = 'Username dan password harus diisi.';
    return;
  }

  if (!users[username] || users[username] !== password) {
    messageEl.innerText = 'Username atau password salah.';
    return;
  }

  localStorage.setItem('currentUser', username);
  ensureUserStorage(username);
  window.location.href = 'index.html';
});

function ensureUserStorage(username) {
  const progressKey = `${username}_progress`;
  const xpKey = `${username}_xp`;

  if (localStorage.getItem(progressKey) === null) {
    localStorage.setItem(progressKey, '0');
  }

  if (localStorage.getItem(xpKey) === null) {
    localStorage.setItem(xpKey, '100');
  }
}
