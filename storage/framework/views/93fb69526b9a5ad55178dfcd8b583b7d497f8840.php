<script>
    let images = document.querySelectorAll(".blurred-img");
    images.forEach(function (e, t) {
        let img = images[t].querySelector('img');
        if (img.complete)
        {
            e.classList.add("loaded")
        }
        else
        {
            // if the img.complete is not true then wait until image loaded
            img.addEventListener("load", function () {
                e.classList.add("loaded")
            });
        }
    });
</script>
<?php /**PATH /home/crux/public_html/core/resources/views/components/custom-js/lazy-load-image.blade.php ENDPATH**/ ?>