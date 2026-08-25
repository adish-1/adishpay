# AdishPay

A secure, full-stack digital banking and wallet web application built for fast peer-to-peer transactions, secure authentication, and a modern, responsive UI.

**Status:** v1.0 — Core Engine & UI Complete (100% Functional)

---

## ✨ Features

- 🔐 Secure user registration & login (hashed passwords, 4-digit transaction PIN)
- 💸 Peer-to-peer money transfers with PIN authorization
- 📊 Transaction ledger / history
- 👤 User profile & account settings
- 🏦 Auto-generated 7-digit account numbers
- 🖥️ Clean, modular, responsive dashboard UI

---

## 🛠️ Tech Stack

| Layer | Tech |
|---|---|
| Frontend | HTML5, CSS3 (Flexbox/Grid), Font Awesome 6 |
| Typography | Poppins (headings/buttons), Inter (body/tables) |
| Backend | PHP (mysqli) |
| Database | MySQL |
| Security | `password_hash()`, PHP Sessions, Prepared Statements |

---

## 📁 Project Structure

```
AdishPay/
├── notes.md
├── auth/                  # Login/register redirect gateway
├── dashboard/             # Main authenticated app
│   ├── common.php
│   ├── logout.php
│   ├── css/
│   ├── feedback/
│   ├── home/
│   ├── profile/
│   ├── send/
│   ├── settings/
│   ├── statusBlock/
│   └── transactions/
├── database/
│   └── db.php
├── images/
├── login/
└── register/
```

---

## 🔒 Security Highlights

- All DB queries use **prepared statements** (`mysqli_prepare` + `mysqli_stmt_bind_param`) to prevent SQL injection.
- Passwords and transaction PINs are hashed with `password_hash()`.
- Strict frontend validation via regex patterns (`[0-9]{10}` for phone, `[0-9]{4}` for PIN).
- Session-based auth with cache-control headers to prevent stale/cached page access.

---

## ⚙️ Setup

1. Clone the repo
2. Import the SQL schema into MySQL
3. Update credentials in `database/db.php`
4. Serve via a local PHP server (e.g. XAMPP / `php -S localhost:8000`)
5. Visit `register/` to create an account, then `login/`

---

## 📌 Roadmap

- [ ] Add email/OTP verification
- [ ] Add transaction limits & fraud checks
- [ ] Mobile app version

---

## 👤 Author

Built by **Adish Jagan AV** 