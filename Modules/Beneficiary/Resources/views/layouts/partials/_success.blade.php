@if(session()->get('success'))
    <div id="alertMessage" style="display: none;">
        <script>
            let startMsg = setTimeout(function(){
            let alertMessage = document.getElementById('alertMessage');
            alertMessage.style.display = 'block';
            let firstLevel = document.createElement('div');
            firstLevel.setAttribute('class', 'row');

            let secondLevel = document.createElement('div');
            secondLevel.setAttribute('class', 'col-md-12');

            let msg = document.createElement('div');
            msg.setAttribute('class', 'alert alert-success');
            msg.innerHTML = __('shared::commons.operation_done');
            secondLevel.appendChild(msg);

            firstLevel.appendChild(secondLevel);
            alertMessage.appendChild(firstLevel);
    }, 1000);

    setTimeout(function(){
        clearTimeout(startMsg);
        alertMessage.style.display = 'none';
    }, 4000);
        </script>
    </div>
@endif