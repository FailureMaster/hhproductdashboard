<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - VBB Merchandise</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 15px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .logo-icon::before {
            content: "VBB";
            color: white;
            font-weight: bold;
            font-size: 20px;
        }

        .logo h1 {
            color: #333;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .logo p {
            color: #666;
            font-size: 14px;
        }

        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
            flex: 1;
        }

        .form-group.full-width {
            flex: 1 1 100%;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }

        .input-wrapper {
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 15px 50px 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 18px;
        }

        .password-toggle {
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #667eea;
        }

        .password-strength {
            margin-top: 8px;
            font-size: 12px;
        }

        .strength-bar {
            width: 100%;
            height: 4px;
            background: #e1e5e9;
            border-radius: 2px;
            margin-top: 5px;
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak .strength-fill {
            width: 25%;
            background: #ff4757;
        }

        .strength-fair .strength-fill {
            width: 50%;
            background: #ffa726;
        }

        .strength-good .strength-fill {
            width: 75%;
            background: #26c6da;
        }

        .strength-strong .strength-fill {
            width: 100%;
            background: #66bb6a;
        }

        .password-requirements {
            margin-top: 10px;
            font-size: 12px;
            color: #666;
        }

        .requirement {
            display: flex;
            align-items: center;
            margin-bottom: 4px;
            transition: color 0.3s ease;
        }

        .requirement.met {
            color: #66bb6a;
        }

        .requirement-icon {
            margin-right: 8px;
            font-size: 14px;
        }

        .register-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            margin-bottom: 20px;
        }

        .register-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }

        .register-btn:active {
            transform: translateY(0);
        }

        .register-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 25px;
            font-size: 14px;
            color: #666;
        }

        .terms-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #667eea;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .terms-checkbox a {
            color: #667eea;
            text-decoration: none;
        }

        .terms-checkbox a:hover {
            text-decoration: underline;
        }

        .divider {
            text-align: center;
            margin: 30px 0;
            position: relative;
            color: #999;
            font-size: 14px;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e1e5e9;
            z-index: 1;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.95);
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        .login-link {
            text-align: center;
            color: #666;
            font-size: 14px;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #764ba2;
        }

        .error-message {
            background: #fee;
            color: #c33;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #c33;
            font-size: 14px;
        }

        .success-message {
            background: #efe;
            color: #363;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #363;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .register-container {
                padding: 30px 25px;
                margin: 10px;
            }

            .logo h1 {
                font-size: 24px;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .form-group input {
                padding: 12px 45px 12px 15px;
                font-size: 14px;
            }
        }

        /* Loading state */
        .register-btn.loading {
            opacity: 0.8;
            cursor: not-allowed;
        }

        .register-btn.loading::after {
            content: '';
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-top: 2px solid transparent;
            border-radius: 50%;
            display: inline-block;
            animation: spin 1s linear infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .field-error {
            color: #c33;
            font-size: 12px;
            margin-top: 5px;
        }

        .form-group.error input {
            border-color: #c33;
            background: #fff5f5;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="logo">
            <div class="logo-icon"></div>
            <h1>Join VBB Merchandise</h1>
            <p>Create your account and start shopping today</p>
        </div>

        <!-- Error message (show this conditionally in Laravel) -->
        <!-- <div class="error-message">
            Please fix the errors below and try again.
        </div> -->

        <form id="registerForm" action="{{route('store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-row">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <div class="input-wrapper">
                        <input type="text" id="first_name" name="first_name" required>
                        <span class="input-icon">👤</span>
                    </div>
                    <!-- <div class="field-error">First name is required</div> -->
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <div class="input-wrapper">
                        <input type="text" id="last_name" name="last_name" required>
                        <span class="input-icon">👤</span>
                    </div>
                    <!-- <div class="field-error">Last name is required</div> -->
                </div>
            </div>

            <div class="form-group full-width">
                <label for="email">Email Address</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" required>
                    <span class="input-icon">📧</span>
                </div>
                <!-- <div class="field-error">Please enter a valid email address</div> -->
            </div>

            <div class="form-group full-width">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" required>
                    <span class="input-icon password-toggle" onclick="togglePassword('password')">👁️</span>
                </div>

                <div class="password-strength" id="passwordStrength" style="display: none;">
                    <div class="strength-bar">
                        <div class="strength-fill"></div>
                    </div>
                    <span class="strength-text">Password strength: Weak</span>
                </div>

                <div class="password-requirements">
                    <div class="requirement" id="req-length">
                        <span class="requirement-icon">❌</span>
                        At least 8 characters
                    </div>
                    <div class="requirement" id="req-uppercase">
                        <span class="requirement-icon">❌</span>
                        One uppercase letter
                    </div>
                    <div class="requirement" id="req-lowercase">
                        <span class="requirement-icon">❌</span>
                        One lowercase letter
                    </div>
                    <div class="requirement" id="req-number">
                        <span class="requirement-icon">❌</span>
                        One number
                    </div>
                </div>
            </div>

            <div class="form-group full-width">
                <label for="password_confirmation">Confirm Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                    <span class="input-icon password-toggle" onclick="togglePassword('password_confirmation')">👁️</span>
                </div>
                <div class="field-error" id="passwordMatchError" style="display: none;">
                    Passwords do not match
                </div>
            </div>

            <div class="terms-checkbox">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">
                    I agree to the <a href="#" target="_blank">Terms of Service</a> and
                    <a href="#" target="_blank">Privacy Policy</a>
                </label>
            </div>

            <button type="submit" class="register-btn" id="submitBtn" disabled>Create Account</button>
        </form>

        <div class="divider">
            <span>or</span>
        </div>

        <div class="login-link">
            Already have an account? <a href="#">Sign In</a>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const passwordToggle = passwordInput.nextElementSibling;

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                passwordToggle.textContent = '👁️';
            }
        }

        // Password strength checker
        function checkPasswordStrength(password) {
            const strengthElement = document.getElementById('passwordStrength');
            const strengthBar = strengthElement.querySelector('.strength-bar');
            const strengthText = strengthElement.querySelector('.strength-text');

            if (password.length === 0) {
                strengthElement.style.display = 'none';
                return;
            }

            strengthElement.style.display = 'block';

            let score = 0;
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[^A-Za-z0-9]/.test(password)
            };

            // Update requirement indicators
            document.getElementById('req-length').classList.toggle('met', requirements.length);
            document.getElementById('req-length').querySelector('.requirement-icon').textContent = requirements.length ? '✅' : '❌';

            document.getElementById('req-uppercase').classList.toggle('met', requirements.uppercase);
            document.getElementById('req-uppercase').querySelector('.requirement-icon').textContent = requirements.uppercase ? '✅' : '❌';

            document.getElementById('req-lowercase').classList.toggle('met', requirements.lowercase);
            document.getElementById('req-lowercase').querySelector('.requirement-icon').textContent = requirements.lowercase ? '✅' : '❌';

            document.getElementById('req-number').classList.toggle('met', requirements.number);
            document.getElementById('req-number').querySelector('.requirement-icon').textContent = requirements.number ? '✅' : '❌';

            // Calculate score
            Object.values(requirements).forEach(met => {
                if (met) score++;
            });

            // Update strength bar
            strengthBar.className = 'strength-bar';
            if (score <= 1) {
                strengthBar.classList.add('strength-weak');
                strengthText.textContent = 'Password strength: Weak';
            } else if (score <= 2) {
                strengthBar.classList.add('strength-fair');
                strengthText.textContent = 'Password strength: Fair';
            } else if (score <= 3) {
                strengthBar.classList.add('strength-good');
                strengthText.textContent = 'Password strength: Good';
            } else {
                strengthBar.classList.add('strength-strong');
                strengthText.textContent = 'Password strength: Strong';
            }

            return score >= 3; // Require at least "Good" strength
        }

        // Password confirmation checker
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmation = document.getElementById('password_confirmation').value;
            const errorElement = document.getElementById('passwordMatchError');

            if (confirmation.length === 0) {
                errorElement.style.display = 'none';
                return true;
            }

            const match = password === confirmation;
            errorElement.style.display = match ? 'none' : 'block';
            return match;
        }

        // Form validation
        function validateForm() {
            const firstName = document.getElementById('first_name').value.trim();
            const lastName = document.getElementById('last_name').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const confirmation = document.getElementById('password_confirmation').value;
            const terms = document.getElementById('terms').checked;

            const isValid = firstName && lastName && email &&
                          checkPasswordStrength(password) &&
                          checkPasswordMatch() &&
                          terms;

            document.getElementById('submitBtn').disabled = !isValid;
            return isValid;
        }

        // Event listeners
        document.getElementById('password').addEventListener('input', function() {
            checkPasswordStrength(this.value);
            if (document.getElementById('password_confirmation').value) {
                checkPasswordMatch();
            }
            validateForm();
        });

        document.getElementById('password_confirmation').addEventListener('input', function() {
            checkPasswordMatch();
            validateForm();
        });

        // Add validation to all form fields
        const formFields = ['first_name', 'last_name', 'email', 'terms'];
        formFields.forEach(fieldId => {
            document.getElementById(fieldId).addEventListener('input', validateForm);
            document.getElementById(fieldId).addEventListener('change', validateForm);
        });

        // Form submission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            if (validateForm()) {
                const submitBtn = document.getElementById('submitBtn');
                submitBtn.classList.add('loading');
                submitBtn.textContent = 'Creating Account...';
            } else {
                e.preventDefault();
            }
        });

        // Add input focus animations
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>
