<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <?php include '../dashboard.php'; ?>
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Account Management</h1>
                <button class="btn btn-primary" id="openModal"><i class="fas fa-plus"></i> Add New Account</button>
            </div>

            <!-- Stats Cards -->
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-info">
                        <h3>24</h3>
                        <p>Total Accounts</p>
                    </div>
                    <div class="stat-icon blue">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <h3>8</h3>
                        <p>Admin Users</p>
                    </div>
                    <div class="stat-icon green">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <h3>16</h3>
                        <p>Standard Users</p>
                    </div>
                    <div class="stat-icon orange">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>

            <!-- Account Table -->
            <div class="table-container">
                <div class="table-header">
                    <h2>User Accounts</h2>
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search accounts...">
                    </div>
                </div>
                <table class="accounts-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1001</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td><span class="status admin">Administrator</span></td>
                            <td><span class="status active">Active</span></td>
                            <td>
                                <button class="action-btn btn-success"><i class="fas fa-edit"></i></button>
                                <button class="action-btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>#1002</td>
                            <td>Sarah Johnson</td>
                            <td>sarah@example.com</td>
                            <td><span class="status editor">Editor</span></td>
                            <td><span class="status active">Active</span></td>
                            <td>
                                <button class="action-btn btn-success"><i class="fas fa-edit"></i></button>
                                <button class="action-btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>#1003</td>
                            <td>Michael Brown</td>
                            <td>michael@example.com</td>
                            <td><span class="status viewer">Viewer</span></td>
                            <td><span class="status active">Active</span></td>
                            <td>
                                <button class="action-btn btn-success"><i class="fas fa-edit"></i></button>
                                <button class="action-btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>#1004</td>
                            <td>Lisa Williams</td>
                            <td>lisa@example.com</td>
                            <td><span class="status editor">Editor</span></td>
                            <td><span class="status active">Active</span></td>
                            <td>
                                <button class="action-btn btn-success"><i class="fas fa-edit"></i></button>
                                <button class="action-btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Account Modal -->
    <div class="modal-overlay" id="accountModal">
        <div class="modal">
            <div class="modal-header">
                <h2>Add New Account</h2>
                <button class="modal-close" id="closeModal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select>
                            <option>Administrator</option>
                            <option>Editor</option>
                            <option>Viewer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" id="cancelModal">Cancel</button>
                <button class="btn btn-primary">Create Account</button>
            </div>
        </div>
    </div>

    <script>
        // Modal functionality
        const modal = document.getElementById('accountModal');
        const openModalBtn = document.getElementById('openModal');
        const closeModalBtn = document.getElementById('closeModal');
        const cancelModalBtn = document.getElementById('cancelModal');

        openModalBtn.addEventListener('click', () => {
            modal.classList.add('active');
        });

        closeModalBtn.addEventListener('click', () => {
            modal.classList.remove('active');
        });

        cancelModalBtn.addEventListener('click', () => {
            modal.classList.remove('active');
        });

        // Close modal when clicking outside
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('active');
            }
        });
    </script>
</body>
</html>