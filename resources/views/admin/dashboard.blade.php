<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Notes | Admin</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #0f0f0f;
            color: #f5f5f5;
        }

        button, input, textarea {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        .hidden {
            display: none !important;
        }

        /* LOGIN */

        .login-page {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-box {
            width: 380px;
            background: #181818;
            border: 1px solid #292929;
            border-radius: 14px;
            padding: 35px;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .brand span {
            color: #ef4444;
        }

        .login-box h1 {
            margin-bottom: 8px;
        }

        .muted {
            color: #999;
        }

        .login-box .muted {
            margin-bottom: 25px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            background: #222;
            color: white;
            border: 1px solid #333;
            border-radius: 7px;
            margin-bottom: 12px;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #ef4444;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .primary {
            border: 0;
            background: #ef4444;
            color: white;
            padding: 11px 18px;
            border-radius: 7px;
            font-weight: bold;
        }

        .primary:hover {
            background: #dc2626;
        }

        .login-box .primary {
            width: 100%;
        }

        #loginError {
            color: #f87171;
            margin-top: 15px;
        }

        /* DASHBOARD */

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            background: #171717;
            border-right: 1px solid #292929;
            padding: 28px 18px;
        }

        .sidebar .brand {
            padding-left: 10px;
        }

        .nav-button {
            width: 100%;
            display: block;
            padding: 12px;
            margin-bottom: 6px;
            border: 0;
            border-radius: 7px;
            background: transparent;
            color: #aaa;
            text-align: left;
        }

        .nav-button:hover {
            background: #242424;
            color: white;
        }

        .logout-button {
            margin-top: 35px;
            color: #f87171;
        }

        .main {
            flex: 1;
            padding: 35px;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .card,
        .panel {
            background: #181818;
            border: 1px solid #292929;
            border-radius: 10px;
        }

        .card {
            padding: 22px;
        }

        .card p {
            color: #999;
            margin-bottom: 10px;
        }

        .card strong {
            font-size: 30px;
        }

        .red {
            color: #ef4444;
        }

        .panel {
            padding: 24px;
            margin-bottom: 20px;
        }

        .panel h2 {
            margin-bottom: 20px;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }

        .item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            background: #222;
            border: 1px solid #303030;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .item p {
            color: #aaa;
            margin-top: 5px;
        }

        .delete {
            border: 0;
            background: #7f1d1d;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 180px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .main {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<!-- LOGIN -->
<div id="loginPage" class="login-page">

    <div class="login-box">

        <div class="brand">
            SIMPLE<span>NOTES</span>
        </div>

        <h1>Admin Login</h1>

        <p class="muted">
            Sign in to manage Simple Notes.
        </p>

        <input
            id="email"
            type="email"
            placeholder="Email"
        >

        <input
            id="password"
            type="password"
            placeholder="Password"
        >

        <button class="primary" onclick="login()">
            Login
        </button>

        <p id="loginError"></p>

    </div>

</div>


<!-- DASHBOARD -->
<div id="dashboardPage" class="layout hidden">

    <aside class="sidebar">

        <div class="brand">
            SIMPLE<span>NOTES</span>
        </div>

        <button class="nav-button" onclick="showSection('dashboard')">
            Dashboard
        </button>

        <button class="nav-button" onclick="showSection('notes')">
            Notes
        </button>

        <button class="nav-button" onclick="showSection('categories')">
            Categories
        </button>

        <button class="nav-button logout-button" onclick="logout()">
            Logout
        </button>

    </aside>


    <main class="main">

        <div class="header">
            <h1>Admin Dashboard</h1>
            <p class="muted">Manage your notes and categories.</p>
        </div>


        <!-- DASHBOARD SECTION -->
        <section id="dashboard" class="section active">

            <div class="cards">

                <div class="card">
                    <p>Total Notes</p>
                    <strong id="totalNotes" class="red">0</strong>
                </div>

                <div class="card">
                    <p>Total Categories</p>
                    <strong id="totalCategories">0</strong>
                </div>

                <div class="card">
                    <p>Database</p>
                    <strong>MongoDB</strong>
                </div>

            </div>

            <div class="panel">
                <h2>Recent Notes</h2>
                <div id="recentNotes">Loading...</div>
            </div>

        </section>


        <!-- NOTES SECTION -->
        <section id="notes" class="section">

            <div class="panel">

                <h2>Create Note</h2>

                <input id="noteTitle" placeholder="Note title">

                <textarea
                    id="noteContent"
                    placeholder="Write your note..."
                ></textarea>

                <input
                    id="noteCategory"
                    placeholder="Category"
                >

                <button class="primary" onclick="createNote()">
                    Create Note
                </button>

            </div>

            <div class="panel">
                <h2>All Notes</h2>
                <div id="notesList"></div>
            </div>

        </section>


        <!-- CATEGORY SECTION -->
        <section id="categories" class="section">

            <div class="panel">

                <h2>Create Category</h2>

                <input
                    id="categoryName"
                    placeholder="Category name"
                >

                <textarea
                    id="categoryDescription"
                    placeholder="Description"
                ></textarea>

                <button class="primary" onclick="createCategory()">
                    Create Category
                </button>

            </div>

            <div class="panel">
                <h2>All Categories</h2>
                <div id="categoriesList"></div>
            </div>

        </section>

    </main>

</div>


<script>

let token = localStorage.getItem('admin_token');


async function login()
{
    const email =
        document.getElementById('email').value;

    const password =
        document.getElementById('password').value;

    const response = await fetch('/api/admin/login', {
        method: 'POST',

        headers: {
            'Content-Type': 'application/json'
        },

        body: JSON.stringify({
            email: email,
            password: password
        })
    });

    const data = await response.json();

    if (!response.ok) {
        document.getElementById('loginError').innerText =
            data.message || 'Login failed';
        return;
    }

    token = data.token;

    localStorage.setItem('admin_token', token);

    openDashboard();
}


async function openDashboard()
{
    const response = await fetch('/api/admin/dashboard', {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    });

    if (!response.ok) {
        localStorage.removeItem('admin_token');
        token = null;

        document.getElementById('dashboardPage')
            .classList.add('hidden');

        document.getElementById('loginPage')
            .classList.remove('hidden');

        return;
    }

    const data = await response.json();

    document.getElementById('loginPage')
        .classList.add('hidden');

    document.getElementById('dashboardPage')
        .classList.remove('hidden');

    document.getElementById('totalNotes').innerText =
        data.total_notes;

    document.getElementById('totalCategories').innerText =
        data.total_categories;

    loadNotes();
    loadCategories();
    loadRecentNotes();
}


function showSection(sectionId)
{
    document.querySelectorAll('.section')
        .forEach(function(section) {
            section.classList.remove('active');
        });

    document.getElementById(sectionId)
        .classList.add('active');
}


async function loadNotes()
{
    const response = await fetch('/api/notes');
    const notes = await response.json();
    
    console.log(notes);

    const list = document.getElementById('notesList');

    list.innerHTML = '';

    notes.forEach(function(note) {

        const item = document.createElement('div');
        item.className = 'item';

        item.innerHTML = `
            <div>
                <strong>${note.title ?? 'Untitled'}</strong>
                <p>${note.content ?? ''}</p>
            </div>

            <button
                class="delete"
                onclick="deleteNote('${note.id ?? note._id}')"
                Delete
            </button>
        `;

        list.appendChild(item);
    });
}


async function createNote()
{
    await fetch('/api/notes', {
        method: 'POST',

        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        },

        body: JSON.stringify({
            title:
                document.getElementById('noteTitle').value,

            content:
                document.getElementById('noteContent').value,

            category:
                document.getElementById('noteCategory').value
        })
    });

    document.getElementById('noteTitle').value = '';
    document.getElementById('noteContent').value = '';
    document.getElementById('noteCategory').value = '';

    await loadNotes();
    await openDashboard();
}

async function deleteNote(id)
{
    const response = await fetch('/api/notes/' + id, {
        method: 'DELETE',

        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    });

    const data = await response.json();

    if (!response.ok) {
        alert(data.message || 'Failed to delete note');
        return;
    }

    alert('Note deleted successfully');

    await loadNotes();
    await openDashboard();
}

async function loadCategories()
{
    const response = await fetch('/api/categories');
    const categories = await response.json();

    const list =
        document.getElementById('categoriesList');

    list.innerHTML = '';

    categories.forEach(function(category) {

        const item = document.createElement('div');
        item.className = 'item';

        item.innerHTML = `
            <div>
                <strong>${category.name ?? 'Unnamed'}</strong>
                <p>${category.description ?? ''}</p>
            </div>

            <button
                class="delete"
                onclick="deleteCategory('${category.id ?? category._id}')"
                Delete
            </button>
        `;

        list.appendChild(item);
    });
}


async function createCategory()
{
    await fetch('/api/categories', {
        method: 'POST',

        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        },

        body: JSON.stringify({
            name:
                document.getElementById('categoryName').value,

            description:
                document.getElementById('categoryDescription').value
        })
    });

    document.getElementById('categoryName').value = '';
    document.getElementById('categoryDescription').value = '';

    await loadCategories();
    await openDashboard();
}



async function deleteCategory(id)
{
    await fetch('/api/categories/' + id, {
        method: 'DELETE',

        headers: {
            'Authorization': 'Bearer ' + token
        }
    });

    await loadCategories();
    await openDashboard();
}

async function loadRecentNotes()
{
    const response =
        await fetch('/api/recent-notes');

    const notes = await response.json();

    const list =
        document.getElementById('recentNotes');

    list.innerHTML = '';

    notes.forEach(function(note) {

        const item =
            document.createElement('div');

        item.className = 'item';

        item.innerHTML = `
            <div>
                <strong>${note.title ?? 'Untitled'}</strong>
                <p>${note.category ?? 'No category'}</p>
            </div>
        `;

        list.appendChild(item);
    });
}


async function logout()
{
    await fetch('/api/admin/logout', {
        method: 'POST',

        headers: {
            'Authorization': 'Bearer ' + token
        }
    });

    localStorage.removeItem('admin_token');

    token = null;

    location.reload();
}


if (token) {
    openDashboard();
}

</script>

</body>
</html>