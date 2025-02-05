<?php include 'admin.html'; ?>

<script>
    // Load user management content dynamically (using AJAX)
    fetch('user_management_data.php') 
        .then(response => response.text())
        .then(data => {
            document.getElementById('main-content').innerHTML = data;
        });
</script>