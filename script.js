const apiUrl =
  "https://laraveltodocorscsrf-production.up.railway.app/api/todos";

function showMessage(msg) {
  const messageElement = document.getElementById("message");
  messageElement.innerText = msg;
  messageElement.style.display = "block";
  setTimeout(() => {
    messageElement.style.display = "none";
  }, 3000);
}

// Fetch todos when page loads
fetchTodos();

// Fetch todos and split them into completed and not completed
function fetchTodos() {
  fetch(apiUrl)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Failed to fetch data: " + response.statusText);
      }
      return response.json();
    })
    .then((todos) => {
      const notCompletedList = document.getElementById("not-completed-todos");
      const completedList = document.getElementById("completed-todos");
      notCompletedList.innerHTML = "";
      completedList.innerHTML = "";
      let todoData = todos.data;
      if (Array.isArray(todoData)) {
        todoData.forEach((todo) => {
          if (todo && todo.title) {
            const col = document.createElement("div");
            col.className = "col-md-12";
            const card = document.createElement("div");
            card.className = "todo-item";
            card.innerHTML = `
                                    <h5>${todo.title}</h5>
                                    <small>${todo.description}</small><br>
                                    <span class="todo-status">${
                                      todo.completed
                                        ? "Completed"
                                        : "Not Completed"
                                    }</span>
                                    <br>
                                    <button class="btn btn-sm btn-primary" onclick="editTodo(${
                                      todo.id
                                    }, '${todo.title}', '${
              todo.description
            }', ${
              todo.completed
            })" data-bs-toggle="modal" data-bs-target="#todoModal"><i class="fa fa-edit"></i> Edit</button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteTodo(${
                                      todo.id
                                    })"><i class="fa fa-trash"></i> Delete</button>
                                `;
            if (todo.completed) {
              completedList.appendChild(col);
            } else {
              notCompletedList.appendChild(col);
            }
            col.appendChild(card);
          }
        });
      } else {
        console.error("Invalid data format:", todos);
      }
    })
    .catch((error) => {
      console.error("Error fetchTodos:", error);
    });
}

// Add or update todo
document
  .getElementById("saveTodoBtn")
  .addEventListener("click", function (event) {
    event.preventDefault();

    const title = document.getElementById("todo-title").value;
    const description = document.getElementById("todo-description").value;
    const completed = document.getElementById("todo-completed").checked;
    const todoId = document.getElementById("todo-id").value;

    if (!title) {
      showMessage("Please enter todo title");
      return;
    }

    const method = todoId ? "PUT" : "POST";
    const url = todoId ? `${apiUrl}/${todoId}` : apiUrl;

    fetch(url, {
      method: method,
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
      },
      body: JSON.stringify({
        title: title,
        description: description,
        completed: completed ? 1 : 0,
      }),
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Failed to save todo: " + response.statusText);
        }
        return response.json();
      })
      .then((data) => {
        showMessage(data.message);
        fetchTodos();
        document.getElementById("todo-title").value = "";
        document.getElementById("todo-description").value = "";
        document.getElementById("todo-completed").checked = false;
        document.getElementById("todo-id").value = "";
        const modal = bootstrap.Modal.getInstance(
          document.getElementById("todoModal")
        );
        modal.hide();
      })
      .catch((error) => {
        console.error("Error saveTodo:", error);
      });
  });

// Delete todo
function deleteTodo(id) {
  if (confirm("Are you sure you want to delete this todo?")) {
    fetch(`${apiUrl}/${id}`, {
      method: "DELETE",
    })
      .then((response) => {
        if (!response.ok) {
          if (response.status === 405) {
            throw new Error(
              "Method DELETE is not allowed. CORS policy blocks the request."
            );
          }
          throw new Error("Failed to delete todo: " + response.statusText);
        }
        return response.json();
      })
      .then(() => {
        showMessage("Todo deleted successfully");
        fetchTodos();
      })
      .catch((error) => {
        if (error.message.includes("CORS")) {
          showMessage(
            "Action not allowed due to CORS policy. Please check server settings."
          );
        } else {
          console.error("Error deleteTodo:", error);
          showMessage(
            "Method DELETE is not allowed. CORS policy blocks the request."
          );
        }
      });
  }
}

// Edit todo
function editTodo(id, title, description, completed) {
  document.getElementById("todo-id").value = id;
  document.getElementById("todo-title").value = title;
  document.getElementById("todo-description").value = description;
  document.getElementById("todo-completed").checked = completed;
}
