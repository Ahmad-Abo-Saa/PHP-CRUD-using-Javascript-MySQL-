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
    <div class="container">
        <div class="row my-5">
            <div class="col-4">
                <form id="form" onsubmit="onFormSubmit(event);">
                    <div class="mb-3">
                        <label>Full name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Type</label>
                        <select id="type" name="type" class="form-control" required>
                            <option>Admin</option>
                            <option>User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="text" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-end mt-2">
                        <button type="button" id="cancel" class="btn btn-outline-danger mx-2" onclick="resetForm()">Cancel</button>
                        <input type="submit" value="Submit" id="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-8">
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
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>