<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        window.addEventListener("scroll",function(){
            var target = document.getElementById('scroll');
            if(window.pageYOffset > 20){
                target.style.display = "inline-block";
            }
            else if(window.pageYOffset < 20){
                target.style.display = "none";
            }
        },false);

    });

</script>
