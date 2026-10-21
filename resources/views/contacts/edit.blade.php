<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact | Contact Management</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #1e293b;
        }

        /* HEADER */
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

        .top-header .brand {
            display: inline-flex;
            flex-direction: row;
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
            flex-direction: row;
            align-items: center;
            justify-content: flex-end;
            gap: 24px;
            flex-shrink: 0;
        }

        .user-link {
            display: inline-flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
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
        }

        .logout-btn:hover {
            background: #f3f6fc;
            color: #2563eb;
        }

        /* Main content */
        .page-container {
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 22px;
        }

        .breadcrumb {
            margin-bottom: 22px;
            color: #64748b;
            font-size: 14px;
        }

        .breadcrumb a {
            color: #2563eb;
            text-decoration: none;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            margin: 0 0 8px;
            font-size: 28px;
            color: #0f172a;
        }

        .page-heading p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-card {
            max-width: 850px;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e5eaf1;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(15, 23, 42, 0.04);
        }

        .card-header {
            padding: 23px 28px;
            border-bottom: 1px solid #edf0f5;
        }

        .card-header h2 {
            margin: 0 0 6px;
            font-size: 18px;
        }

        .card-header p {
            margin: 0;
            color: #64748b;
            font-size: 13px;
        }

        .form-body {
            padding: 28px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 23px;
        }

        .form-group {
            min-width: 0;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 9px;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
        }

        .required {
            color: #dc2626;
        }

        input,
        textarea {
            display: block;
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            background: #ffffff;
            color: #0f172a;
            font: inherit;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input {
            min-height: 45px;
        }

        textarea {
            min-height: 115px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        input::placeholder,
        textarea::placeholder {
            color: #94a3b8;
        }

        .hint {
            margin-top: 7px;
            color: #64748b;
            font-size: 12px;
            line-height: 1.5;
        }

        .field-error,
        .error {
            display: block;
            margin-top: 7px;
            color: #dc2626;
            font-size: 13px;
            line-height: 1.4;
        }

        .input-invalid {
            border-color: #dc2626 !important;
            background: #fffafa;
        }

        .input-invalid:focus {
            border-color: #dc2626 !important;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.10) !important;
        }

        .error-box {
            margin-bottom: 24px;
            padding: 15px 18px;
            border: 1px solid #fecaca;
            border-radius: 10px;
            background: #fef2f2;
            color: #991b1b;
            font-size: 14px;
        }

        .error-box ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 20px 28px;
            border-top: 1px solid #edf0f5;
            background: #fafbfe;
        }

        .btn {
            display: inline-flex;
            min-height: 42px;
            align-items: center;
            justify-content: center;
            padding: 10px 17px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            border: 1px solid #2563eb;
            background: #2563eb;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            border: 1px solid #cbd5e1;
            background: #ffffff;
            color: #334155;
        }

        .btn-secondary:hover {
            background: #f1f5f9;
        }

        .success-message {
            margin-bottom: 20px;
            padding: 13px 16px;
            border-radius: 9px;
            background: #dcfce7;
            color: #166534;
            font-size: 14px;
        }

        @media (max-width: 650px) {
            .top-header {
                padding: 15px 18px;
                flex-wrap: wrap;
            }

            .brand {
                font-size: 17px;
            }

            .header-right {
                gap: 10px;
            }

            .user-role {
                display: none;
            }

            .page-container {
                margin: 25px auto;
                padding: 0 14px;
            }

            .page-heading h1 {
                font-size: 24px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 19px;
            }

            .full-width {
                grid-column: auto;
            }

            .form-body,
            .card-header {
                padding: 20px;
            }

            .card-footer {
                padding: 17px 20px;
            }

            .logout-btn {
                padding: 9px 11px;
            }
        }

        @media (max-width: 400px) {
            .brand-icon {
                width: 34px;
                height: 34px;
            }

            .brand {
                gap: 7px;
                font-size: 15px;
            }

            .header-right {
                gap: 7px;
            }

            .avatar {
                width: 32px;
                height: 32px;
            }

            .user-name {
                max-width: 75px;
                overflow-wrap: anywhere;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    {{-- Header --}}
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
                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>

        </div>
    </header>

    {{-- Page content --}}
    <main class="page-container">

        <div class="breadcrumb">
            <a href="{{ route('contacts.index') }}">Contacts</a>
            <span> / Edit Contact</span>
        </div>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <section class="form-card">
            <div class="card-header">
                <h2>Edit Contact Information</h2>
                <p>Fields marked with <span class="required">*</span> are required.</p>
            </div>

            <form id="contactForm" action="{{ route('contacts.update', $contact) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                <div class="form-body">
                    @if ($errors->any())
                        <div class="error-box">
                            <strong>Please correct the following errors:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name">
                                Full Name <span class="required">*</span>
                            </label>

                            <input id="name" type="text" name="name" value="{{ old('name', $contact->name) }}"
                                placeholder="Enter full name" maxlength="255" required
                                class="@error('name') input-invalid @enderror"
                                aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}">

                            <p class="field-error" id="name-error" style="{{ $errors->has('name') ? '' : 'display: none;' }}">
                                {{ $errors->first('name') }}
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="email">
                                Email Address <span class="required">*</span>
                            </label>

                            <input id="email" type="email" name="email" value="{{ old('email', $contact->email) }}"
                                placeholder="example@gmail.com" maxlength="254" required
                                class="@error('email') input-invalid @enderror"
                                aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}">

                            <p class="field-error" id="email-error" style="{{ $errors->has('email') ? '' : 'display: none;' }}">
                                {{ $errors->first('email') }}
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="phone">
                                Phone Number <span class="required">*</span>
                            </label>

                            <input id="phone" type="tel" name="phone" value="{{ old('phone', $contact->phone) }}"
                                placeholder="9876543210" pattern="[6-9][0-9]{9}" minlength="10" maxlength="10"
                                inputmode="numeric" required class="@error('phone') input-invalid @enderror"
                                aria-invalid="{{ $errors->has('phone') ? 'true' : 'false' }}">

                            <p class="field-error" id="phone-error" style="{{ $errors->has('phone') ? '' : 'display: none;' }}">
                                {{ $errors->first('phone') }}
                            </p>
                        </div>

                        <div class="form-group full-width">
                            <label for="address">Address</label>

                            <textarea id="address" name="address" rows="4" maxlength="2000"
                                placeholder="Enter address (optional)"
                                class="@error('address') input-invalid @enderror">{{ old('address', $contact->address) }}</textarea>

                            <p class="field-error" id="address-error" style="{{ $errors->has('address') ? '' : 'display: none;' }}">
                                {{ $errors->first('address') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Update Contact
                    </button>
                </div>
            </form>
        </section>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('contactForm');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const phoneInput = document.getElementById('phone');
            const addressInput = document.getElementById('address');

            const nameError = document.getElementById('name-error');
            const emailError = document.getElementById('email-error');
            const phoneError = document.getElementById('phone-error');
            const addressError = document.getElementById('address-error');

            // Track fields that have been blurred/touched by the user
            const touched = {
                name: false,
                email: false,
                phone: false,
                address: false
            };

            function validateName(value) {
                const val = (value || '').trim();
                if (!val) {
                    return 'Please enter the contact name.';
                }
                if (val.length < 2) {
                    return 'Name must be at least 2 characters.';
                }
                if (val.length > 255) {
                    return 'Name cannot exceed 255 characters.';
                }
                return '';
            }

            function validateEmail(value) {
                const val = (value || '').trim();
                if (!val) {
                    return 'Please enter the email address.';
                }
                if (val.length > 254) {
                    return 'Email cannot exceed 254 characters.';
                }
                if (!val.includes('@')) {
                    return "Email must contain '@' (e.g. name@gmail.com).";
                }

                const parts = val.split('@');
                if (parts.length > 2) {
                    return "Email cannot contain multiple '@' symbols.";
                }

                const localPart = parts[0].trim();
                const domainPart = parts[1].trim();

                if (!localPart) {
                    return "Please enter username before '@'.";
                }
                if (!domainPart) {
                    return "Please enter domain after '@' (e.g. gmail.com).";
                }
                if (!domainPart.includes('.')) {
                    return "Email domain must include a '.' (e.g. gmail.com).";
                }
                if (domainPart.startsWith('.')) {
                    return "Domain cannot start with '.' (e.g. gmail.com).";
                }
                if (domainPart.endsWith('.')) {
                    return "Please enter a domain extension after '.' (e.g. .com, .in).";
                }

                // Check common domain typos
                const domainLower = domainPart.toLowerCase();
                if (domainLower === 'gamil.com' || domainLower === 'gmal.com' || domainLower === 'gmial.com') {
                    return 'Did you mean @gmail.com?';
                }
                if (domainLower === 'yaho.com' || domainLower === 'yahooo.com') {
                    return 'Did you mean @yahoo.com?';
                }
                if (domainLower === 'hotmial.com' || domainLower === 'hotmai.com') {
                    return 'Did you mean @hotmail.com?';
                }

                // Full RFC-compatible regex matching backend rule
                const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (!emailRegex.test(val)) {
                    return 'Please enter a valid email address (e.g. name@gmail.com).';
                }

                return '';
            }

            function validatePhone(value) {
                const val = (value || '').trim();
                if (!val) {
                    return 'Please enter the phone number.';
                }
                if (!/^\d+$/.test(val)) {
                    return 'Phone number must contain only numbers.';
                }
                if (!/^[6-9]/.test(val)) {
                    return 'Phone number must start with 6, 7, 8, or 9.';
                }
                if (val.length !== 10) {
                    return 'Phone number must be exactly 10 digits.';
                }
                return '';
            }

            function validateAddress(value) {
                const val = value || '';
                if (val.length > 2000) {
                    return 'Address cannot exceed 2000 characters.';
                }
                return '';
            }

            function setFieldError(input, errorEl, message) {
                if (message) {
                    input.classList.add('input-invalid');
                    input.setAttribute('aria-invalid', 'true');
                    if (errorEl) {
                        errorEl.textContent = message;
                        errorEl.style.display = 'block';
                    }
                    return false;
                } else {
                    input.classList.remove('input-invalid');
                    input.setAttribute('aria-invalid', 'false');
                    if (errorEl) {
                        errorEl.textContent = '';
                        errorEl.style.display = 'none';
                    }
                    return true;
                }
            }

            function checkField(fieldName) {
                switch (fieldName) {
                    case 'name':
                        return setFieldError(nameInput, nameError, validateName(nameInput.value));
                    case 'email':
                        return setFieldError(emailInput, emailError, validateEmail(emailInput.value));
                    case 'phone':
                        return setFieldError(phoneInput, phoneError, validatePhone(phoneInput.value));
                    case 'address':
                        return setFieldError(addressInput, addressError, validateAddress(addressInput.value));
                }
                return true;
            }

            // Blur events: When moving away from an input to another input
            nameInput.addEventListener('blur', function () {
                touched.name = true;
                checkField('name');
            });

            emailInput.addEventListener('blur', function () {
                touched.email = true;
                checkField('email');
            });

            phoneInput.addEventListener('blur', function () {
                touched.phone = true;
                checkField('phone');
            });

            addressInput.addEventListener('blur', function () {
                touched.address = true;
                checkField('address');
            });

            // Live input events: Re-validate on keystroke once touched
            nameInput.addEventListener('input', function () {
                if (touched.name) {
                    checkField('name');
                }
            });

            emailInput.addEventListener('input', function () {
                if (touched.email) {
                    checkField('email');
                }
            });

            phoneInput.addEventListener('input', function () {
                // Ensure only digits can be entered
                this.value = this.value.replace(/[^0-9]/g, '');
                if (touched.phone) {
                    checkField('phone');
                }
            });

            addressInput.addEventListener('input', function () {
                if (touched.address) {
                    checkField('address');
                }
            });

            // Form Submit: Validate all fields
            if (form) {
                form.addEventListener('submit', function (e) {
                    touched.name = true;
                    touched.email = true;
                    touched.phone = true;
                    touched.address = true;

                    const isNameValid = checkField('name');
                    const isEmailValid = checkField('email');
                    const isPhoneValid = checkField('phone');
                    const isAddressValid = checkField('address');

                    if (!isNameValid || !isEmailValid || !isPhoneValid || !isAddressValid) {
                        e.preventDefault();

                        // Focus first invalid field
                        if (!isNameValid) {
                            nameInput.focus();
                        } else if (!isEmailValid) {
                            emailInput.focus();
                        } else if (!isPhoneValid) {
                            phoneInput.focus();
                        } else if (!isAddressValid) {
                            addressInput.focus();
                        }
                    }
                });
            }
        });
    </script>

</body>

</html>