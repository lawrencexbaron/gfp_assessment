# GitHub Issues Viewer (Laravel)

GFP Coding Assessment

## 🛠 Features

-   View all open GitHub issues assigned to you
-   Click an issue to see its details
-   Uses Laravel
-   Token authentication via `.env.local`

---

## 🚀 Getting Started

### 1. Clone the Repository
```bash
git clone https://github.com/gfp_assessment.git

cd gfp_assessment
```

### 2. Install Dependencies

composer install

### 3. Set Up Environment Variables

Copy `.env.example` to `.env.local` and update the following variables:

```bash
GITHUB_PERSONAL_TOKEN=your_github_token
```

### 4. Generate Application Key

php artisan key:generate

### 5. Serve the Application

php artisan serve
Open your browser and navigate to `http://localhost:8000`.

### 6. Folder Structure
```bash
routes/web.php
  - GET /issues            → List all assigned open issues
  - GET /issue/{encoded}   → View issue details

app/Services/GitHubService.php
  - getOpenAssignedIssues() → Fetches issues via GitHub API
  - getIssueDetails()       → Fetches specific issue details

resources/views/issues/
  - index.blade.php         → Issues list view
  - show.blade.php          → Single issue detail view
```

