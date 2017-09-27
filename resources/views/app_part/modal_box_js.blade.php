<script>
     var modal = document.getElementById('add_form');
     var btn = document.getElementById('modal_open');
     btn.onclick = function() {
         modal.style.display = "block";
     }
     window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
