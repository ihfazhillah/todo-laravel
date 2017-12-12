<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Todo Example - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body{
    background-color:#EEEEEE;
}
.todolist{
    background-color:#FFF;
    padding:20px 20px 10px 20px;
    margin-top:30px;
}
.todolist h1{
    margin:0;
    padding-bottom:20px;
    text-align:center;
}
.form-control{
    border-radius:0;
}
li.ui-state-default{
    background:#fff;
    border:none;
    border-bottom:1px solid #ddd;
}

li.ui-state-default:last-child{
    border-bottom:none;
}

.todo-footer{
    background-color:#F4FCE8;
    margin:0 -20px -10px -20px;
    padding: 10px 20px;
}
#done-items li{
    padding:10px 0;
    border-bottom:1px solid #ddd;
    text-decoration:line-through;
}
#done-items li:last-child{
    border-bottom:none;
}
#checkAll{
    margin-top:10px;
}
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="todolist not-done">
             <h1>Todos</h1>
             <form action="/todos" method="post">
                 {{ csrf_field() }}
                <input type="text" name="title" class="form-control add-todo" placeholder="Add todo">
             </form>

             <form action="/todos/mark-all-completed" method="post">
                 {{ csrf_field() }}
                <button id="checkAll" class="btn btn-success">Mark all as done</button>
            </form>
                    
                    <hr>

                    <ul id="sortable" class="list-unstyled">
                    @forelse ($todos as $todo)
                        @if (!$todo->completed)
                        <li class="ui-state-default">
                            <form action="/todos/{{$todo->id}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="completed" value="1"/>
                                <button class="btn btn-success btn-sm">Complete</button><span style="margin-left: 10px;">
                                    {{$todo->title}}
                            </span>
                            </form>
                        </li>
                        @endif
                    @empty
                        <p class="text-danger">no todo list</p>
                    @endforelse

                </ul>
                <div class="todo-footer">
                    <strong><span class="count-todos">{{ $uncompletedCount }}</span></strong> Items Left
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="todolist">
             <h1>Already Done</h1>
                <ul id="done-items" class="list-unstyled">
                    @forelse($todos as $todo)
                        @if ($todo->completed)
                            <form action="/todos/{{$todo->id}}" method="post">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                            <li>{{$todo->title}}<button class="remove-item btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-remove"></span></button></li>
                            </form>
                        @endif
                    @empty
                        <p>no item displayed</p>
                    @endforelse
                    
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
