<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact | Contact Management</title>

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

        /* MAIN CONTAINER */
        .container {
            width: 100%;
            max-width: 1050px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .form-card {
            background: #fff;
            padding: 36px;
            border-radius: 14px;
            box-shadow: 0 8px 30px rgba(20, 50, 100, 0.07);
        }

        .heading {
            padding-bottom: 24px;
            margin-bottom: 28px;
            border-bottom: 1px solid #e5eaf3;
        }

        h1 {
            font-size: 30px;
            margin: 0 0 10px;
            color: #172b4d;
        }

        .subtitle {
            color: #71809a;
            margin: 0;
            line-height: 1.6;
        }

        /* VALIDATION ERRORS */
        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 22px;
            background: #fff1f2;
            color: #be123c;
            font-size: 14px;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert li+li {
            margin-top: 5px;
        }

        .error {
            display: block;
            color: #dc2626;
            font-size: 13px;
            line-height: 1.4;
            margin: 7px 0 0;
        }

        .field input.input-invalid,
        .field textarea.input-invalid {
            border-color: #dc2626;
            background: #fffafa;
        }

        .field input.input-invalid:focus,
        .field textarea.input-invalid:focus {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.10);
        }

        /* FORM */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px 28px;
        }

        .field {
            min-width: 0;
        }

        .field label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            font-size: 15px;
        }

        .required {
            color: #ef4444;
        }

        .optional {
            color: #8290a8;
            font-weight: normal;
        }

        .field input,
        .field textarea {
            display: block;
            width: 100%;
            border: 1px solid #d5deec;
            border-radius: 8px;
            padding: 13px 14px;
            font-family: inherit;
            font-size: 15px;
            color: #172b4d;
            background: #fff;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .field input {
            height: 49px;
        }

        .field textarea {
            min-height: 120px;
            resize: vertical;
        }

        .field input:focus,
        .field textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .field input::placeholder,
        .field textarea::placeholder {
            color: #9aa7ba;
        }

        /* ACTION BUTTONS */
        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
            padding-top: 24px;
            border-top: 1px solid #e5eaf3;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 14px 22px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid transparent;
            transition: background 0.2s, border-color 0.2s;
        }

        .btn-primary {
            background: #2563eb;
            color: #fff;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #fff;
            color: #526582;
            border-color: #cbd5e1;
        }

        .btn-secondary:hover {
            background: #f8fafc;
            border-color: #94a3b8;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 650px) {
            .top-header {
                padding: 15px;
                flex-wrap: wrap;
            }

            .top-header .brand {
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

            .form-card {
                padding: 22px 18px;
            }

            h1 {
                font-size: 25px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .btn {
                width: 100%;
            }
        }

        @media (max-width: 380px) {
            .top-header .brand {
                font-size: 16px;
            }

            .header-actions {
                gap: 8px;
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

    <!-- HEADER -->
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

    <!-- ADD CONTACT FORM -->
    <main class="container">

        <section class="form-card">

            <div class="heading">
                <h1>Add Contact</h1>
                <p class="subtitle">
                    Fill in the details below to create a new contact.
                </p>
            </div>

            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="contactForm" action="{{ route('contacts.store') }}" method="POST" novalidate>
                @csrf

                <div class="form-grid">

                    <!-- Name -->
                    <div class="field">
                        <label for="name">
                            Name <span class="required">*</span>
                        </label>

                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                            placeholder="Enter contact name" maxlength="255" required
                            class="@error('name') input-invalid @enderror"
                            aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}">

                        <p class="error" id="name-error" style="{{ $errors->has('name') ? '' : 'display: none;' }}">
                            {{ $errors->first('name') }}
                        </p>
                    </div>

                    <!-- Email -->
                    <div class="field">
                        <label for="email">
                            Email Address <span class="required">*</span>
                        </label>

                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="example@gmail.com" maxlength="254" required
                            class="@error('email') input-invalid @enderror"
                            aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}">

                        <p class="error" id="email-error" style="{{ $errors->has('email') ? '' : 'display: none;' }}">
                            {{ $errors->first('email') }}
                        </p>
                    </div>

                    <!-- Phone -->
                    <div class="field">
                        <label for="phone">
                            Phone Number <span class="required">*</span>
                        </label>

                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="9876543210"
                            pattern="[6-9][0-9]{9}" minlength="10" maxlength="10" inputmode="numeric" required
                            class="@error('phone') input-invalid @enderror"
                            aria-invalid="{{ $errors->has('phone') ? 'true' : 'false' }}">

                        <p class="error" id="phone-error" style="{{ $errors->has('phone') ? '' : 'display: none;' }}">
                            {{ $errors->first('phone') }}
                        </p>
                    </div>

                    <!-- Address -->
                    <div class="field">
                        <label for="address">
                            Address <span class="optional">(Optional)</span>
                        </label>

                        <textarea id="address" name="address" rows="4" maxlength="2000" placeholder="Enter address"
                            class="@error('address') input-invalid @enderror">{{ old('address') }}</textarea>

                        <p class="error" id="address-error" style="{{ $errors->has('address') ? '' : 'display: none;' }}">
                            {{ $errors->first('address') }}
                        </p>
                    </div>

                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">
                        Save Contact
                    </button>

                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">
                        Back to Contacts
                    </a>
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