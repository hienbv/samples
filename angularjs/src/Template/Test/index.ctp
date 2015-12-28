<!--<div>
    <label>Name: </label>
    <input type="text" ng-model="name" placeholder="Input Name"/>
    <hr>
    <h1>Hello {{name}}!</h1>
</div>-->

<div>
    <h2>TODO</h2>
    <div ng-controller="TodoListController as todoList">
        <span>{{todoList.remaining()}} of {{todoList.todos.length}} remaining</span> 
        [ <a href="" ng-click="todoList.archive()">archive</a> ]
        <ul class="unstyled">
            <li ng-repeat="todo in todoList.todos">
                <input type="checkbox" ng-model="todo.done" id="{{todo.id}}"/>
                <label class="done-{{todo.done}}" for="{{todo.id}}">{{todo.text}}</label>
            </li>
        </ul>
        <form ng-submit="todoList.addTodo()">
            <input type="text" ng-model="todoList.todoText" size="30" placeholder="add new todo here"/>
            <input type="submit" value="add"/>
        </form>
    </div>
</div>