<?php if(session()->get('success')): ?>
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
                msg.innerHTML = 'تمت العملية بنجاح';
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\waqf\Modules/Admin\Resources/views/layouts/partials/_success.blade.php ENDPATH**/ ?>