<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta title="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Todo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <!-- Content Container -->
    <div class="container mt-4 rounded-container">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex flex-column">
                <h1 class="mb-0 fs-3"><i class="fas fa-tasks"></i> Simple Todo</h1>
                <span class="navbar-text fs-6">A simple todo app using Laravel API with CORS and CSRF protection</span>
            </div>
            <button class="btn btn-primary btn-sm" id="addTodoBtn" data-bs-toggle="modal" data-bs-target="#todoModal">
                <i class="fas fa-plus"></i> Add Todo
            </button>
        </div>
        <!-- Response -->
        <span id="message" class="message mb-4" style="display:none;"></span>

        <!-- Todo Tabs -->
        <div class="glass-card">
            <ul class="nav nav-tabs" id="todoTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="not-completed-tab" data-bs-toggle="tab"
                        data-bs-target="#not-completed" type="button" role="tab" aria-controls="not-completed"
                        aria-selected="true">Not Completed
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed"
                        type="button" role="tab" aria-controls="completed" aria-selected="false">Completed
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="todoTabContent">
                <div class="tab-pane fade show active" id="not-completed" role="tabpanel"
                    aria-labelledby="not-completed-tab">
                    <div class="row mt-2" id="not-completed-todos"></div>
                </div>
                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                    <div class="row mt-2" id="completed-todos"></div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-3">
            <span class="navbar-text fs-6">Made with <i class="fas fa-heart text-danger"></i> by <a
                    href="https://www.instagram.com/swn.setiawan/" target="_blank">Arif Setiawan</a></span>
        </div>
    </div>


    <!-- Modal for Adding/Editing Todo -->
    <div class="modal fade" id="todoModal" tabindex="-1" aria-labelledby="todoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="todoModalLabel">Add / Edit Todo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-todo">
                        <input type="hidden" id="todo-id">
                        <div class="input-group mb-3">
                            <input type="text" id="todo-title" title="title" class="form-control"
                                placeholder="Enter todo title" required>
                        </div>
                        <div class="input-group mb-3">
                            <textarea id="todo-description" title="description" class="form-control"
                                placeholder="Enter todo description" rows="3"></textarea>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="todo-completed">
                            <label class="form-check-label" for="todo-completed">Completed</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i>
                        Close</button>
                    <button type="submit" class="btn btn-outline-secondary" id="saveTodoBtn"><i class="fas fa-save"></i>
                        Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <!-- JS -->
    <script src="script.js"></script>
</body>

</html>