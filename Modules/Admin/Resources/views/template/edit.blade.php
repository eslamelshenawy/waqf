@extends('admin::layouts.master')
@section('content')
    <section class="users">
        <div class="container">
            <iframe src="http://localhost:8000" width="100%" height="2000px">
            </iframe>
        </div>
    </section>
@endsection
@section('scripting...')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        const addColumnBtn = document.getElementById('addColumnBtn');
        const columnsMachine = document.getElementById('columnsMachine');
        const isHasOne = true;
        addColumnBtn.onclick = function(event){
            event.preventDefault();
            drawPopupWindow();
        };
        const drawPopupWindow = function(){
            let formRow = document.createElement('div');
            formRow.setAttribute('class', 'form-row');
            let rowCol = document.createElement('div');
            rowCol.setAttribute('class', 'col-md-12 mb-3');
            formRow.appendChild(rowCol);
            let colLabelInput = document.createElement('input');
            colLabelInput.setAttribute('class', 'form-control')
            colLabelInput.placeholder = 'Label here click over text to change text';
            rowCol.appendChild(colLabelInput);
            let clearDiv = document.createElement('div');
            clearDiv.setAttribute('class', 'clear');
            rowCol.appendChild(clearDiv);
            let btnGroup = document.createElement('div');
            btnGroup.setAttribute('class', 'btn-group');
            let btn = document.createElement('button');
            btn.innerText = 'Choose input type';
            btn.setAttribute('type', 'button');
            btn.setAttribute('class', 'btn btn-primary dropdown-toggle');
            btn.setAttribute('data-toggle', 'dropdown');
            btn.setAttribute('aria-haspopup', 'true');
            btn.setAttribute('aria-expanded', 'false');
            btnGroup.appendChild(btn);
            rowCol.appendChild(btnGroup);
            columnsMachine.appendChild(formRow);
        }
    </script>
@endsection