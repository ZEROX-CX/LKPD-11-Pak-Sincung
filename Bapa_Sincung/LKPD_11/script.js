const currentUser = localStorage.getItem('currentUser');

if (!currentUser) {
  window.location.href = 'login.html';
}

const progressKey = `${currentUser}_progress`;
const xpKey = `${currentUser}_xp`;

let progress = parseInt(localStorage.getItem(progressKey) || '0', 10);
let xp = parseInt(localStorage.getItem(xpKey) || '100', 10);

function saveProgress() {
  localStorage.setItem(progressKey, progress);
}

function saveXp() {
  localStorage.setItem(xpKey, xp);
}

function updateUI() {
  const allProgressTexts = document.querySelectorAll('.progress-text');
  const allProgressCircles = document.querySelectorAll('.progress-circle');

  allProgressTexts.forEach(text => {
    text.innerText = progress + '%';
  });

  const offset = 472 - (472 * progress / 180);
  allProgressCircles.forEach(circle => {
    circle.style.strokeDashoffset = offset;
  });
}

function updateXpUI() {
  const allXpValues = document.querySelectorAll('.xp-value');
  allXpValues.forEach(xpValue => {
    xpValue.innerText = xp;
  });
}

function updateUserHeader() {
  const userName = document.getElementById('userName');
  if (userName) {
    userName.innerText = `Halo, ${currentUser.charAt(0).toUpperCase() + currentUser.slice(1)}`;
  }
  
  loadProfilePic();
}

function loadProfilePic() {
  const profilePic = document.getElementById('profilePic');
  const profilePicKey = `${currentUser}_profilePic`;
  const savedPic = localStorage.getItem(profilePicKey);
  
  if (savedPic) {
    profilePic.src = savedPic;
  }
}

function uploadProfilePic() {
  const fileInput = document.getElementById('profileInput');
  const file = fileInput.files[0];
  
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      const profilePicKey = `${currentUser}_profilePic`;
      localStorage.setItem(profilePicKey, e.target.result);
      loadProfilePic();
    };
    reader.readAsDataURL(file);
  }
}

function menu(menuKey) {
  const template = document.querySelector(`[data-menu="${menuKey}"]`);
  const c = document.getElementById('content');

  if (template) {
    c.innerHTML = template.innerHTML;
    updateUI();
    updateXpUI();
    updateUserHeader();

    const tambahBtn = c.querySelector('button[onclick*="tambahProgress"]');
    if (tambahBtn) {
      tambahBtn.onclick = function() {
        tambahProgress();
        tambahXp();
      };
    }
  }
}

function logout() {
  localStorage.removeItem('currentUser');
  window.location.href = 'login.html';
}

function tambahProgress() {
  if (progress >= 100) return;

  progress += 10;
  saveProgress();
  updateUI();
}

function kurangiProgress() {
  if (progress <= 0) return;

  progress -= 10;
  saveProgress();
  updateUI();
}

function tambahXp() {
  xp += 50;
  saveXp();
  updateXpUI();
}

updateUI();
updateXpUI();
menu('dashboard');
loadProfilePic();

function setTheme(theme) {
  if (theme === 'dark') {
    document.documentElement.classList.add('dark');
  } else {
    document.documentElement.classList.remove('dark');
  }
  localStorage.setItem('theme', theme);
}

function toggleTheme() {
  const isDark = document.documentElement.classList.contains('dark');
  setTheme(isDark ? 'light' : 'dark');
}

// load theme saat pertama buka
(function () {
  const savedTheme = localStorage.getItem('theme') || 'dark';
  setTheme(savedTheme);
})();


// =======================
// DATA KUIS
// =======================
const quizData = [
  {
    question: "Apa kepanjangan dari HTML?",
    answers: [
      "Hyper Text Markup Language",
      "High Tech Modern Language",
      "Hyper Transfer Machine Language",
      "Home Tool Markup Language"
    ],
    correct: 0
  },
  {
    question: "CSS digunakan untuk?",
    answers: [
      "Struktur website",
      "Styling / tampilan",
      "Database",
      "Backend logic"
    ],
    correct: 1
  },
  {
    question: "Bahasa pemrograman untuk interaksi web?",
    answers: [
      "HTML",
      "CSS",
      "JavaScript",
      "SQL"
    ],
    correct: 2
  }
];

let currentQuestion = 0;
let score = 0;
let selectedAnswer = null;

// =======================
// LOAD SOAL
// =======================
function loadQuestion() {
  const q = quizData[currentQuestion];

  document.getElementById("question").innerText = q.question;

  const answersContainer = document.getElementById("answers");
  answersContainer.innerHTML = "";

  q.answers.forEach((answer, index) => {
    const btn = document.createElement("button");

    btn.innerText = answer;
    btn.className =
      "w-full text-left py-3 px-4 rounded-lg bg-[#131432] text-white hover:bg-[#8CA9FF] hover:text-[#131432] transition";

    btn.onclick = () => selectAnswer(index, btn);

    answersContainer.appendChild(btn);
  });
}

// =======================
// PILIH JAWABAN
// =======================
function selectAnswer(index, button) {
  selectedAnswer = index;

  // reset semua button
  const buttons = document.querySelectorAll("#answers button");
  buttons.forEach(btn => {
    btn.classList.remove("bg-[#8CA9FF]", "text-[#131432]");
    btn.classList.add("bg-[#131432]", "text-white");
  });

  // highlight pilihan
  button.classList.remove("bg-[#131432]", "text-white");
  button.classList.add("bg-[#8CA9FF]", "text-[#131432]");
}

// =======================
// NEXT QUESTION
// =======================
function nextQuestion() {
  if (selectedAnswer === null) {
    alert("Pilih jawaban dulu!");
    return;
  }

  const correct = quizData[currentQuestion].correct;

  if (selectedAnswer === correct) {
    score += 10;
    tambahXp(); // bonus XP
    tambahProgress(); // tambah progress
  }

  currentQuestion++;
  selectedAnswer = null;

  if (currentQuestion < quizData.length) {
    loadQuestion();
  } else {
    finishQuiz();
  }

  document.getElementById("score").innerText = score;
}

// =======================
// SELESAI KUIS
// =======================
function finishQuiz() {
  document.getElementById("question").innerText = "Kuis Selesai 🎉";
  document.getElementById("answers").innerHTML = "";

  const result = document.createElement("div");
  result.className = "text-[#8CA9FF] text-lg mt-4";
  result.innerText = "Skor akhir: " + score;

  document.getElementById("answers").appendChild(result);
}

// =======================
// AUTO LOAD SAAT MENU KUIS
// =======================
const originalMenu = menu;
menu = function(menuKey) {
  originalMenu(menuKey);

  if (menuKey === "kuis") {
    currentQuestion = 0;
    score = 0;
    selectedAnswer = null;

    setTimeout(() => {
      loadQuestion();
      document.getElementById("score").innerText = score;
    }, 100);
  }
};