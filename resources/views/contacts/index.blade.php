<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts | Contact Management</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f6fc;
            color: #172b4d;
        }

        /* HEADER — consistent with Add Contact */
        .top-header {
            width: 100%;
            min-height: 70px;
            margin: 0;
            padding: 0 32px;
            background: #fff;
            border-radius: 0;
            border-bottom: 1px solid #e5eaf3;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            box-shadow: 0 2px 10px rgba(37, 99, 235, 0.04);
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
            color: #142c53;
            text-decoration: none;
            font-size: 23px;
            font-weight: 700;
            white-space: nowrap;
        }

        .brand-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            color: #2563eb;
            flex-shrink: 0;
        }

        .brand-icon svg {
            display: block;
            width: 100%;
            height: 100%;
        }

        .header-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 24px;
            flex-shrink: 0;
        }

        .user-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #526582;
            text-decoration: none;
            white-space: nowrap;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #edf2fa;
            color: #2563eb;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex-shrink: 0;
        }

        .user-name {
            white-space: nowrap;
        }

        .chevron {
            line-height: 1;
            font-size: 18px;
        }

        .header-actions form {
            margin: 0;
        }

        .logout-btn {
            padding: 10px 15px;
            border: 1px solid #d5deec;
            border-radius: 7px;
            background: #fff;
            color: #526582;
            font-size: 14px;
            cursor: pointer;
            white-space: nowrap;
        }

        .logout-btn:hover {
            background: #f3f6fc;
            color: #2563eb;
        }

        /* PAGE LAYOUT */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 36px auto;
            padding: 0 22px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .page-heading h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .subtitle {
            margin: 0;
            color: #71809a;
            line-height: 1.6;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 18px;
            border-radius: 8px;
            border: 1px solid transparent;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s, border-color 0.2s;
            white-space: nowrap;
        }

        .btn-primary {
            color: #fff;
            background: #2563eb;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            color: #526582;
            background: #fff;
            border-color: #d5deec;
        }

        .btn-secondary:hover {
            background: #f8fafc;
        }

        /* CONTACTS CARD */
        .contacts-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 8px 30px rgba(20, 50, 100, 0.06);
            overflow: hidden;
        }

        .card-top {
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 18px;
            border-bottom: 1px solid #e8edf5;
        }

        .card-title {
            margin: 0;
            font-size: 19px;
            font-weight: 700;
        }

        .contact-count {
            display: inline-block;
            margin-top: 6px;
            color: #71809a;
            font-size: 13px;
        }

        .filter-form {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
            flex-wrap: wrap;
        }

        .search-input-wrapper {
            position: relative;
            display: inline-flex;
            align-items: center;
        }

        .search-input-wrapper .search-icon {
            position: absolute;
            left: 13px;
            width: 16px;
            height: 16px;
            color: #94a3b8;
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-input-wrapper .search-icon svg {
            width: 100%;
            height: 100%;
        }

        .filter-form input[type="text"],
        .filter-form input[type="search"] {
            width: 320px;
            max-width: 100%;
            height: 42px;
            padding: 0 14px 0 38px;
            border: 1px solid #d5deec;
            border-radius: 8px;
            background: #ffffff;
            color: #172b4d;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .filter-form input[type="text"]::placeholder,
        .filter-form input[type="search"]::placeholder {
            color: #9aa7ba;
            font-size: 13.5px;
        }

        .filter-form input[type="text"]:focus,
        .filter-form input[type="search"]:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .filter-form button,
        .filter-form .btn-search {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            height: 42px;
            padding: 0 18px;
            border: 1px solid #2563eb;
            border-radius: 8px;
            background: #2563eb;
            color: #ffffff;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, border-color 0.2s;
            white-space: nowrap;
        }

        .filter-form button:hover,
        .filter-form .btn-search:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }

        .filter-form a,
        .filter-form .btn-clear {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            height: 42px;
            padding: 0 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: #ffffff;
            color: #526582;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .filter-form a:hover,
        .filter-form .btn-clear:hover {
            background: #f8fafc;
            color: #172b4d;
            border-color: #94a3b8;
        }

        /* TABLE */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background: #f8faff;
        }

        th {
            padding: 16px 20px;
            color: #64748b;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
            white-space: nowrap;
            border-bottom: 1px solid #e8edf5;
        }

        td {
            padding: 17px 20px;
            font-size: 14px;
            border-bottom: 1px solid #edf1f7;
            color: #475569;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #f8faff;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .contact-name {
            color: #172b4d;
            font-weight: 600;
        }

        .contact-address {
            min-width: 150px;
            max-width: 260px;
            overflow-wrap: anywhere;
        }

        .muted {
            color: #94a3b8;
        }

        .actions-cell {
            white-space: nowrap;
        }

        .action-link {
            display: inline-block;
            padding: 7px 10px;
            margin-right: 4px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .edit-link {
            color: #1d4ed8;
            background: #eff6ff;
        }

        .edit-link:hover {
            background: #dbeafe;
        }

        .delete-btn {
            padding: 7px 10px;
            border: 0;
            border-radius: 6px;
            color: #be123c;
            background: #fff1f2;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: #ffe4e6;
        }

        .delete-form {
            display: inline;
            margin: 0;
        }

        /* ALERTS AND EMPTY STATE */
        .alert-success {
            padding: 14px 18px;
            margin-bottom: 20px;
            border-radius: 8px;
            color: #166534;
            background: #dcfce7;
        }

        .empty-state {
            padding: 48px 20px;
            text-align: center;
            color: #71809a;
        }

        .empty-state h3 {
            margin: 0 0 8px;
            color: #172b4d;
        }

        .empty-state p {
            margin: 0 0 20px;
        }

        /* PAGINATION */
        .pagination-wrapper {
            padding: 20px 24px;
            border-top: 1px solid #e8edf5;
            overflow-x: auto;
        }

        .pagination-wrapper nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .pagination-wrapper nav p {
            color: #71809a;
            font-size: 13px;
        }

        .pagination-wrapper nav a,
        .pagination-wrapper nav span[aria-current="page"] {
            display: inline-block;
            padding: 7px 11px;
            margin: 2px;
            border: 1px solid #d5deec;
            border-radius: 6px;
            text-decoration: none;
            color: #526582;
            font-size: 13px;
        }

        .pagination-wrapper nav span[aria-current="page"] {
            color: #fff;
            background: #2563eb;
            border-color: #2563eb;
        }

        /* RESPONSIVE */
        @media (max-width: 650px) {
            .top-header {
                padding: 15px;
                flex-wrap: wrap;
            }

            .brand {
                font-size: 18px;
                gap: 10px;
            }

            .brand-icon {
                width: 32px;
                height: 32px;
            }

            .header-actions {
                width: 100%;
                justify-content: space-between;
                gap: 10px;
            }

            .container {
                margin: 24px auto;
                padding: 0 14px;
            }

            .page-heading h1 {
                font-size: 25px;
            }

            .page-heading .btn {
                width: 100%;
            }

            .card-top {
                padding: 18px;
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .filter-form {
                width: 100%;
                gap: 8px;
            }

            .search-input-wrapper {
                width: 100%;
            }

            .filter-form input[type="text"],
            .filter-form input[type="search"] {
                width: 100%;
            }

            .filter-form button,
            .filter-form a {
                flex: 1;
            }

            th,
            td {
                padding: 14px;
            }
        }

        @media (max-width: 380px) {
            .brand {
                font-size: 16px;
            }

            .user-link {
                gap: 6px;
                font-size: 13px;
            }

            .logout-btn {
                padding: 9px;
            }
        }
    </style>
</head>

<body>

    <!-- SAME HEADER AS ADD CONTACT PAGE -->
    <header class="top-header">
        <a href="{{ route('contacts.index') }}" class="brand">
            <span class="brand-icon">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path
                        d="M16 11a4 4 0 1 0-3.8-5.2A5 5 0 0 1 16 11ZM8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm8 2c-1.4 0-2.7.3-3.7.9A5.5 5.5 0 0 1 14 19v1h7v-2c0-2.2-2.2-4-5-4ZM8 14c-3.3 0-6 1.8-6 4v2h12v-2c0-2.2-2.7-4-6-4Z" />
                </svg>
            </span>
            <span>Contact Management</span>
        </a>

        <div class="header-actions">
            <a href="{{ route('dashboard') }}" class="user-link">
                <span class="user-avatar">
                    {{ strtoupper(substr(auth('api')->user()->name ?? auth()->user()->name ?? 'U', 0, 1)) }}
                </span>
                <span class="user-name">
                    {{ auth('api')->user()->name ?? auth()->user()->name ?? 'User' }}
                </span>
                <span class="chevron">▾</span>
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </header>

    <main class="container">

        <!-- PAGE TITLE -->
        <div class="page-heading">
            <div>
                <h1>My Contacts</h1>
                <p class="subtitle">
                    Manage your contacts in one place.
                </p>
            </div>

            <a href="{{ route('contacts.create') }}" class="btn btn-primary">
                + Add Contact
            </a>
        </div>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- CONTACTS TABLE -->
        <section class="contacts-card">

            <div class="card-top">
                <div>
                    <h2 class="card-title">Contact List</h2>
                    <span class="contact-count">
                        {{ $contacts->total() }} contact(s) found
                    </span>
                </div>


                <form action="{{ route('contacts.index') }}" method="GET" class="filter-form" id="searchForm">
                    <div class="search-input-wrapper">
                        <span class="search-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </span>
                        <input type="text" name="search" id="searchInput" value="{{ request('search') }}"
                            placeholder="Search name, email, phone or address..." aria-label="Search contacts" autocomplete="off">
                    </div>

                    <button type="submit" class="btn-search">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 15px; height: 15px;" aria-hidden="true">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <span>Search</span>
                    </button>

                    <a href="{{ route('contacts.index') }}" class="btn-clear" id="clearSearchBtn">
                        Clear
                    </a>
                </form>

            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="contactsTableBody">
                        @forelse ($contacts as $contact)
                            <tr>
                                <td>
                                    <span class="contact-name">
                                        {{ $contact->name }}
                                    </span>
                                </td>

                                <td>
                                    {{ $contact->email ?: '—' }}
                                </td>

                                <td>
                                    {{ $contact->phone ?: '—' }}
                                </td>

                                <td class="contact-address">
                                    {{ $contact->address ?: '—' }}
                                </td>

                                <td class="actions-cell">
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="action-link edit-link">
                                        Edit
                                    </a>

                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                        class="delete-form"
                                        onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="delete-btn">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <h3>No contacts found</h3>
                                        <p>
                                            Add a contact to get started, or
                                            clear your search.
                                        </p>
                                        <a href="{{ route('contacts.create') }}" class="btn btn-primary">
                                            + Add Contact
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination-wrapper" id="paginationWrapper" style="{{ $contacts->hasPages() ? '' : 'display: none;' }}">
                @if ($contacts->hasPages())
                    {{ $contacts->withQueryString()->links() }}
                @endif
            </div>

        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchForm = document.getElementById('searchForm');
            const searchInput = document.getElementById('searchInput');
            const clearBtn = document.getElementById('clearSearchBtn');
            const tableBody = document.getElementById('contactsTableBody');
            const contactCount = document.querySelector('.contact-count');
            const paginationWrapper = document.getElementById('paginationWrapper');

            let debounceTimer = null;
            let abortController = null;

            // 1. Instant client-side DOM filter on currently visible rows
            function filterLocalRows(query) {
                if (!tableBody) return;
                const rows = tableBody.querySelectorAll('tr:not(#noClientMatchRow)');
                const q = (query || '').toLowerCase().trim();

                const emptyState = tableBody.querySelector('.empty-state');
                if (emptyState && rows.length <= 1) {
                    return;
                }

                let visibleCount = 0;

                rows.forEach(function (row) {
                    const nameEl = row.querySelector('.contact-name');
                    const cells = row.querySelectorAll('td');

                    if (!nameEl || cells.length < 4) return;

                    const nameText = (nameEl.textContent || '').toLowerCase();
                    const emailText = (cells[1] ? cells[1].textContent : '').toLowerCase();
                    const phoneText = (cells[2] ? cells[2].textContent : '').toLowerCase();
                    const addressText = (cells[3] ? cells[3].textContent : '').toLowerCase();

                    if (!q || nameText.includes(q) || emailText.includes(q) || phoneText.includes(q) || addressText.includes(q)) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Display dynamic no-match row if needed
                let noMatchRow = document.getElementById('noClientMatchRow');
                if (visibleCount === 0 && q) {
                    if (!noMatchRow) {
                        noMatchRow = document.createElement('tr');
                        noMatchRow.id = 'noClientMatchRow';
                        noMatchRow.innerHTML = `
                            <td colspan="5">
                                <div class="empty-state">
                                    <h3>No contacts found</h3>
                                    <p>No contacts match "${query}". Try another search term or clear the filter.</p>
                                </div>
                            </td>
                        `;
                        tableBody.appendChild(noMatchRow);
                    } else {
                        noMatchRow.style.display = '';
                    }
                } else if (noMatchRow) {
                    noMatchRow.style.display = 'none';
                }

                if (contactCount && q) {
                    contactCount.textContent = `${visibleCount} contact(s) found`;
                }
            }

            // 2. Fetch full search results from server (queries entire database across all pages)
            function fetchServerResults(query) {
                if (abortController) {
                    abortController.abort();
                }
                abortController = new AbortController();

                const url = new URL("{{ route('contacts.index') }}", window.location.origin);
                const trimmed = (query || '').trim();
                if (trimmed) {
                    url.searchParams.set('search', trimmed);
                }

                fetch(url.toString(), {
                    signal: abortController.signal,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    const newTableBody = doc.getElementById('contactsTableBody');
                    const newCount = doc.querySelector('.contact-count');
                    const newPagination = doc.getElementById('paginationWrapper');

                    if (newTableBody && tableBody) {
                        tableBody.innerHTML = newTableBody.innerHTML;
                    }
                    if (newCount && contactCount) {
                        contactCount.textContent = newCount.textContent;
                    }
                    if (paginationWrapper) {
                        if (newPagination && newPagination.innerHTML.trim() !== '') {
                            paginationWrapper.innerHTML = newPagination.innerHTML;
                            paginationWrapper.style.display = '';
                        } else {
                            paginationWrapper.innerHTML = '';
                            paginationWrapper.style.display = 'none';
                        }
                    }

                    // Update browser address bar without full page reload
                    window.history.replaceState({}, '', url.toString());
                })
                .catch(err => {
                    if (err.name !== 'AbortError') {
                        console.error('Search request failed:', err);
                    }
                });
            }

            // Live typing in input: Instant 0ms local filter + 300ms debounced server fetch
            if (searchInput) {
                searchInput.addEventListener('input', function () {
                    const val = this.value;

                    // 0ms instant DOM filter
                    filterLocalRows(val);

                    // 300ms debounced server database search
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(function () {
                        fetchServerResults(val);
                    }, 300);
                });
            }

            // Form Submit: Clicking Search button or pressing Enter
            if (searchForm) {
                searchForm.addEventListener('submit', function (e) {
                    e.preventDefault();
                    clearTimeout(debounceTimer);
                    const val = searchInput ? searchInput.value : '';
                    filterLocalRows(val);
                    fetchServerResults(val);
                });
            }

            // Clear Button: Resets search input and table
            if (clearBtn) {
                clearBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    clearTimeout(debounceTimer);
                    if (searchInput) {
                        searchInput.value = '';
                        searchInput.focus();
                    }
                    filterLocalRows('');
                    fetchServerResults('');
                });
            }
        });
    </script>

</body>

</html>