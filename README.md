# Qur'an Assessment System (Asesmen Al-Qur'an)

A web-based assessment application designed to simplify the evaluation of Qur'an memorization and reading progress for Grade 2 elementary students. Built to digitize the manual assessment process into a more efficient and manageable system.

## 🚀 Tech Stack
- **Framework:** Laravel 11
- **Frontend:** Livewire (TALL Stack)
- **Styling:** Tailwind CSS
- **Interactivity:** Alpine.js

## ✨ Core Features
- **Student Management:** Manage up to 15 students in a single class view.
- [cite_start]**Batch Assessment:** Quick-fill grading system (SL, L, C, BL) for surah memorization[cite: 5, 13].
- [cite_start]**Observation Progress:** Tracks Articulation (Fashohah), Fluency, Tajweed, and Adab[cite: 7].
- [cite_start]**IQRO Tracking:** Specifically designed for monitoring progress in IQRO levels (Level 3 focus)[cite: 14, 15].
- **Auto-Comment Logic:** Automated feedback generation based on mastery level to minimize repetitive typing.
- [cite_start]**Print-Ready Reports:** Generates official reports formatted for Bandung, June 2026[cite: 22].

## 📋 Assessment Logic
Based on the official school guidelines:
- [cite_start]**SL (Sudah Lancar):** Very smooth, no assistance needed[cite: 13].
- [cite_start]**L (Lancar):** Smooth and clear[cite: 13].
- [cite_start]**C (Cukup Lancar):** Moderate, needs some reminders[cite: 13].
- [cite_start]**BL (Belum Lancar):** Needs significant teacher assistance[cite: 13].

## 🛠️ Installation





-composer install && npm install
-cp .env.example .env
-php artisan key:generate
-php artisan migrate
1. Clone the repository:
   ```bash
   git clone [https://github.com/firdhan29/asesmen.git](https://github.com/firdhan29/asesmen.git)
