<x-layout>

    <div class="header">
        <div class="header-content">
            <div>
                <h1>Edit Profile</h1>
                <p>Update your account information and security settings</p>
            </div>
            <a href="{{route('dashboard')}}" class="back-btn">⬅️ Back to Dashboard</a>
        </div>
    </div>

    <div class="container">
        <!-- Success/Error Messages -->
        <!-- <div class="alert alert-success">
            ✅ Profile updated successfully!
        </div> -->

        <!-- <div class="alert alert-error">
            ❌ Please fix the errors below.
        </div> -->

        <div class="profile-grid">
            <!-- Edit Information Card -->
            <div class="profile-card">
                <div class="card-header">
                    <h2>📝 Edit Information</h2>
                    <p>Update your personal details</p>
                </div>
                <div class="card-body">
                    <!-- Profile Avatar -->
                    <div class="profile-avatar">
                        <div class="avatar-circle">JD</div>
                        <div class="avatar-info">
                            <h3>{{ucFirst($user->first_name)}} {{ucFirst($user->last_name)}}</h3>
                            <p>Member since 2024</p>
                        </div>
                    </div>

                    <form id="profileForm" action="{{route('update.user', Auth::id())}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                value="{{$user->email}}"
                                placeholder="Enter your email address"
                                required>
                            <!-- <div class="field-error">⚠️ This email is already taken</div> -->
                        </div>

                        <div class="form-group">
                            <label for="first_name">First name:</label>
                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                class="form-control"
                                value="{{$user->first_name}}"
                                placeholder="Enter your first name"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last name:</label>
                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                class="form-control"
                                value="{{$user->last_name}}"
                                placeholder="Enter your last name"
                                required>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">💾 Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Password Card -->
            <div class="profile-card">
                <div class="card-header">
                    <h2>🔒 Change Password</h2>
                    <p>Update your account security</p>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    @endif
                    <form id="passwordForm" action="{{route('update.user.password', Auth::id())}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="old_password">Old Password:</label>
                            <input
                                type="password"
                                id="old_password"
                                name="old_password"
                                class="form-control"
                                placeholder="Enter your current password"
                                required>
                            <!-- <div class="field-error">⚠️ Current password is incorrect</div> -->
                        </div>

                        <div class="form-group">
                            <label for="new_password">New Password:</label>
                            <input
                                type="password"
                                id="new_password"
                                name="new_password"
                                class="form-control"
                                placeholder="Enter your new password"
                                required>
                            <div class="password-strength" id="passwordStrength" style="display: none;">
                                <div class="strength-bar">
                                    <div class="strength-fill"></div>
                                </div>
                                <div class="strength-text">Password strength: Weak</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input
                                type="password"
                                id="confirm_password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Confirm your new password"
                                required>
                            <div class="field-error" id="passwordMatchError" style="display: none;">
                                ⚠️ Passwords do not match
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">🔐 Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('style')
            <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 20px 0;
            margin-bottom: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .header-content {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
        }

        .header p {
            font-size: 14px;
            opacity: 0.9;
            margin-top: 5px;
        }

        .back-btn {
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* Profile Grid */
        .profile-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 20px;
        }

        /* Card Styles */
        .profile-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: box-shadow 0.3s ease;
        }

        .profile-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: #f8f9fa;
            padding: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .card-header h2 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .card-header p {
            color: #666;
            font-size: 14px;
        }

        .card-body {
            padding: 25px;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8f9fa;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        .form-control::placeholder {
            color: #999;
            font-style: italic;
        }

        /* Button Styles */
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.4);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.5);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }

        /* Password Strength Indicator */
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
            background: #dc3545;
        }

        .strength-fair .strength-fill {
            width: 50%;
            background: #ffc107;
        }

        .strength-good .strength-fill {
            width: 75%;
            background: #17a2b8;
        }

        .strength-strong .strength-fill {
            width: 100%;
            background: #28a745;
        }

        .strength-text {
            margin-top: 5px;
            font-size: 11px;
            color: #666;
        }

        /* Error Messages */
        .field-error {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .form-group.error .form-control {
            border-color: #dc3545;
            background: #fff5f5;
        }

        /* Success Messages */
        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Profile Avatar Section */
        .profile-avatar {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .avatar-circle {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .avatar-info h3 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .avatar-info p {
            color: #666;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .header-content {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .profile-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .card-body {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* Loading State */
        .btn.loading {
            opacity: 0.8;
            cursor: not-allowed;
        }

        .btn.loading::after {
            content: '';
            width: 16px;
            height: 16px;
            border: 2px solid currentColor;
            border-top: 2px solid transparent;
            border-radius: 50%;
            display: inline-block;
            animation: spin 1s linear infinite;
            margin-left: 8px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    @endpush

</x-layout>
