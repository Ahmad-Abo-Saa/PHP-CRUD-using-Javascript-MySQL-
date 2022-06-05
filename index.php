<!DOCTYPE html>
<html>

<head>
    <title>
        CRUD operation
    </title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.6.0.min.js"></script>
</head>

<body>
    <table>
        <tr>
            <td>
                <form id="form" onsubmit="onFormSubmit(event);" autocomplete="off" style="width: 200px;">
                    <div class="mb-2">
                        <label>Full name</label>
                        <input type="text" name="full_name" id="full_name" required>
                    </div>
                    <div class="mb-2">
                        <label>Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="mb-2">
                        <label>Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="mb-2">
                        <label>Type</label>
                        <select id="type" name="type" required>
                            <option>Admin</option>
                            <option>User</option>
                        </select>
                    </div>
                    <div class="form-action-buttons" style="width: 300px; height: 45px;">
                        <input type="submit" value="Submit" id="submit">
                    </div>
                </form>
            </td>
            <td>
                <table class="list" id="users_list">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Password</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="dy_data">

                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <script src="script.js"></script>
</body>

</html>