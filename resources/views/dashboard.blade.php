<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | Contact Management</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f6fc;
            color: #172b4d;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        /* Header */
        .top-header {
            width: 100%;
            min-height: 70px;
            margin: 0;
            padding: 0 32px;
            background: #fff;
            border-radius: 0;
            border-bottom: 1px solid #e5eaf3;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            box-shadow: 0 2px 10px rgba(37, 99, 235, 0.04);
        }

        .top-header .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
            color: #142c53;
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
            justify-content: center;
            gap: 10px;
            color: #526582;
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
            display: inline-block;
            white-space: nowrap;
        }

        .chevron {
            line-height: 1;
            font-size: 18px;
        }

        .header-actions form {
            margin: 0;
            flex-shrink: 0;
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
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #f3f6fc;
            color: #2563eb;
        }

        /* Dashboard content */
        .main-container {
            max-width: 1050px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .welcome-card {
            background: #ffffff;
            padding: 45px 30px;
            border: 1px solid #e8edf5;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(30, 50, 90, 0.05);
            text-align: center;
        }

        .welcome-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 22px;
            border-radius: 18px;
            background: #e9efff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .welcome-card h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #172b4d;
        }

        .welcome-card p {
            color: #718096;
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        /* Manage Contacts button */
        .manage-contacts-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 13px 22px;
            border: 1px solid #2563eb;
            border-radius: 8px;
            background: #2563eb;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            transition: background 0.2s, transform 0.2s;
        }

        .manage-contacts-btn:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
            color: #ffffff;
            transform: translateY(-1px);
        }

        .manage-contacts-btn svg {
            width: 19px;
            height: 19px;
        }

        @media (max-width: 600px) {
            .top-header {
                width: 100%;
                padding: 14px 18px;
                margin: 0;
                gap: 10px;
            }

            .top-header .brand {
                gap: 8px;
                font-size: 14px;
            }

            .brand-icon {
                width: 30px;
                height: 30px;
            }

            .header-actions {
                gap: 10px;
            }

            .user-link {
                gap: 6px;
            }

            .user-avatar {
                width: 32px;
                height: 32px;
                font-size: 12px;
            }

            .user-name {
                max-width: 75px;
                overflow: hidden;
                text-overflow: ellipsis;
                font-size: 12px;
            }

            .chevron {
                font-size: 14px;
            }

            .logout-btn {
                padding: 9px 10px;
                font-size: 12px;
            }

            .main-container {
                margin: 30px auto;
                padding: 0 12px;
            }

            .welcome-card {
                padding: 35px 18px;
            }

            .welcome-card h2 {
                font-size: 23px;
            }

            .welcome-card p {
                font-size: 14px;
            }
        }

        @media (max-width: 390px) {
            .top-header .brand {
                font-size: 12px;
                gap: 5px;
            }

            .brand-icon {
                width: 25px;
                height: 25px;
            }

            .header-actions {
                gap: 7px;
            }

            .user-name {
                max-width: 55px;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
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
                    {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                </span>

                <span class="user-name">
                    {{ $user->name ?? 'User' }}
                </span>

                <span class="chevron">▾</span>
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>

        </div>
    </header>

    <!-- Dashboard -->
    <main class="main-container">

        <section class="welcome-card">

            <div class="welcome-icon">👋</div>

            <h2>Hello, {{ $user->name }}!</h2>

            <p>
                Welcome to your Contact Management dashboard.
            </p>

            <!-- Manage Contacts button -->
            <a href="{{ route('contacts.index') }}" class="manage-contacts-btn">

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true">
                    <circle cx="9" cy="8" r="4"></circle>
                    <path d="M3 21v-2a6 6 0 0 1 12 0v2"></path>
                    <path d="M16 11a4 4 0 0 0 0-8"></path>
                    <path d="M19 14a5 5 0 0 1 2 4v2"></path>
                </svg>

                Manage Contacts
            </a>

        </section>

    </main>

</body>

</html>