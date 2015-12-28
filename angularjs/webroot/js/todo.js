angular.module('todoApp', [])
        .controller('TodoListController', function () {
            var todoList = this;
            todoList.todos = [
                {text: 'Learn Angularjs', done: true, id: 1},
                {text: 'Learn CakePHP3', done: false, id: 2}
            ];
            todoList.remaining = function () {
                var count = 0;
                angular.forEach(todoList.todos, function(todo) {
                    count += todo.done ? 0 : 1;
                });
                return count;
            };
            todoList.archive = function() {
                var oldTodos = todoList.todos;
                todoList.todos = [];
                angular.forEach(oldTodos, function(todo) {
                    if (!todo.done) todoList.todos.push(todo);
                });
            };
            todoList.id = function() {
                var max = 1;
                angular.forEach(todoList.todos, function(todo) {
                    max = todo.id > max ? (todo.id + 1) : 1;
                });
                return max;
            };
            todoList.addTodo = function() {
                todoList.todos.push({text:todoList.todoText, done:false, id: todoList.id()});
                todoList.todoText = '';
            };
        });