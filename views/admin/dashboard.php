<?php include __DIR__ . '/../../partials/header.php';

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

?>

<style>
    body {
        font-family: 'Arial', sans-serif;
    }

    /* Custom styles for sidebar */
    #sidebar {
        min-height: 100vh;
        background-color: #343a40;
        color: white;
        padding-top: 20px;
    }

    #sidebar .nav-link {
        color: white;
        padding: 10px;
    }

    #sidebar .nav-link:hover {
        background-color: #495057;
    }

    #logo {
        margin-bottom: 20px;
        text-align: center;
    }

    #logo img {
        max-width: 100px;
    }

    .content {
        padding: 20px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
            <div id="" class="m-2">
                <img class="rounded float-start w-25" src="/assets//img//logo.jpeg" alt="Logo">
                <div class="text-primary">
                    <span class="ms-3">Fasyt</span><br>
                    <span class="ms-3">Innovations</span>
                </div>
            </div>
            <ul class="nav flex-column mt-5">
                <!-- <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-person"></i> Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-gear"></i> Profile
                    </a>
                </li>
                <li class="nav-item position-absolute ms-1 mb-3 bottom-0">
                    <form action="/logout.php">
                        <button class="btn btn-outline-danger ">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="content">
                <h1 class="h2">Welcome to the <?php echo ucfirst($_SESSION['user_role']); ?> Dashboard</h1>
                <p>This is where your dashboard content will go.</p>
            </div>
        </main>
    </div>
</div>

<?php include __DIR__ . '/../../partials/footer.php';
